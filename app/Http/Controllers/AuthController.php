<?php

namespace App\Http\Controllers;

use App\Mail\PasswordReset;
use App\Mail\WelcomeEmail;
use App\Models\Setting;
use App\Models\Student;
use App\Models\User;
use App\Models\Workspace;
use App\Models\Region;
use App\Models\District;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Services\Notifications\Sms;
use Illuminate\Support\Facades\View;
use App\Traits\AddToCart;

class AuthController extends Controller
{
    use AddToCart;
    protected $settings;
    protected $super_settings;

    public function __construct()
    {
        parent::__construct();

        $this->middleware(function ($request, $next) {
            $super_settings = [];

            $super_settings_data = Setting::where("workspace_id", 1)->get();
            foreach ($super_settings_data as $super_setting) {
                $super_settings[$super_setting->key] = $super_setting->value;
            }

            $this->super_settings = $super_settings;
            View::share("super_settings", $super_settings);
            $language = $this->student->language ?? "sw";
            \App::setLocale($language);
            return $next($request);
        });
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect("/admin/dashboard");
        }

        return \view("auth.login");
        // return \view("billing.invoice");
    }

    public function superAdminlogin()
    {
        return \view("auth.admin-login");
    }
    public function passwordReset(Request $request)
    {
        $request->validate([
            "id" => "required|integer",
            "token" => "required|uuid",
        ]);

        $user = User::find($request->id);

        if (!$user) {
            return redirect("/")->withErrors([
                "key" => "Invalid user or link expired",
            ]);
        }

        if ($user->password_reset_key !== $request->token) {
            return redirect("/")->withErrors([
                "key" => "Invalid key",
            ]);
        }

        return \view("auth.reset-password", [
            "id" => $request->id,
            "password_reset_key" => $request->token,
        ]);
    }

    public function signup()

    {

      $regions = Region::all();
      $districts = District::all();

        return \view("auth.signup", [
        
            "regions" => $regions,
            "districts" => $districts,
           
        ]);
    }

    public function forgotPassword()
    {
        return \view("auth.forgot-password");
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => "required|email",
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return redirect()
                ->back()
                ->withErrors([
                    "email" => "No account found with this email",
                ]);
        }

        $user->password_reset_key = Str::uuid();
        $user->save();

        if (!empty($this->super_settings["smtp_host"])) {
            try {
                Config::set(
                    "mail.mailers.smtp.host",
                    $this->super_settings["smtp_host"]
                );
                Config::set(
                    "mail.mailers.smtp.username",
                    $this->super_settings["smtp_username"]
                );
                Config::set(
                    "mail.mailers.smtp.password",
                    $this->super_settings["smtp_password"]
                );
                Config::set(
                    "mail.mailers.smtp.port",
                    $this->super_settings["smtp_port"]
                );
                Mail::to($user->email)->send(new PasswordReset($user));
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }

        session()->flash(
            "status",
            "We sent you an email with the instruction to reset the password."
        );

        return redirect("/");
    }

    public function newPasswordPost(Request $request)
    {
        $request->validate([
            "password" => "required|confirmed",
            "id" => "required|integer",
            "password_reset_key" => "required|uuid",
        ]);

        $user = User::find($request->id);

        if (!$user) {
            return redirect()
                ->back()
                ->withErrors([
                    "email" => "No account found with this email",
                ]);
        }

        if ($user->password_reset_key !== $request->password_reset_key) {
            return redirect()
                ->back()
                ->withErrors([
                    "key" => "Invalid key",
                ]);
        }

        $user->password = Hash::make($request->password);

        $user->password_reset_key = null;

        $user->save();

        session()->flash(
            "status",
            "Your password has been reset, login with the new password."
        );

        return redirect("/");
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        $remember = false;

        if ($request->remember) {
            $remember = true;
        }

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if ($user) {
                $workspace = Workspace::find($user->workspace_id);
                if ($workspace && $workspace->id != 1 && !$workspace->plan_id) {
                    $super_admin_settings = Setting::getSuperAdminSettings();
                    if (!empty($super_admin_settings["free_trial_days"])) {
                        $free_trial_days =
                            $super_admin_settings["free_trial_days"];
                        $free_trial_days = (int) $free_trial_days;
                        $workspace_creation_date = $workspace->created_at;

                        $trial_will_expire =
                            strtotime($workspace_creation_date) +
                            $free_trial_days * 24 * 60 * 60;
                        if ($trial_will_expire < time()) {
                            return back()->withErrors([
                                "trial_expired" => __(
                                    "Your trial has been expired."
                                ),
                            ]);
                        }
                    }
                }
            }

            $user->last_login = Carbon::now()->toDateTimeString();
            $user->save();
            $request->session()->regenerate();

            return redirect()->intended("/admin/dashboard");
        }

        return back()->withErrors([
            "email" => "The provided credentials do not match our records.",
        ]);
    }

    public function studentLoginPost(Request $request)
    {
        $request->validate([
            "username" => ["required"],
            "password" => ["required"],
        ]);

        $user_by_email = Student::where("email", $request->username)->first();
        $user_by_phone = Student::where("phone_number", $request->username)->first();
        
        
        // if (!($user_by_email || $user_by_phone)) {
        //     return back()->withErrors([
        //         "email" => __("User not found!"),
        //     ]);
        // }
//dd($user_by_phone);
        if($user_by_email && $user_by_email->count()){
            $user = $user_by_email;
        }
        elseif($user_by_phone && $user_by_phone->count()){
            $user = $user_by_phone;
        }
        else{
            return back()->withErrors([
                "email" => __("User not found!"),
            ]); 
        }

        if (Hash::check($request->password, $user->password)) {
            session([
                "student_id" => $user->id,
            ]);

            $user->last_login = Carbon::now()->toDateTimeString();
            $user->save();



            if(!$user->registration_paid){
                $id =1;
                  
                $input = new Request([
                    'type' => 'registration',
                ]);

                $this->addItemsToCart( $id, $input);
                return redirect()->route("cart");
            }
            else {
                return redirect()->route("student.dashboard");
            }
           
        }

        return back()->withErrors([
            "email" => __("Invalid user."),
        ]);
    }

    public function superAdminAuthenticate(Request $request)
    {
        $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                "email" => __("User not found!"),
            ]);
        }

        if (!$user->super_admin) {
            return back()->withErrors([
                "email" => __("Invalid user."),
            ]);
        }

        if (Hash::check($request->password, $user->password)) {
            Auth::login($user, true);

            $user->last_login = Carbon::now()->toDateTimeString();
            $user->save();

            $request->session()->regenerate();

            return redirect(config("app.url") . "/admin/dashboard");
        }

        return back()->withErrors([
            "email" => __("Invalid user."),
        ]);
    }

    public function signupPost(Request $request)
    {
        $request->validate([
  
            "first_name" => ["required"],
            "last_name" => ["required"],
            "phone_number" => ["phone_number"],
            "password" => ["required"]
            
        ]);

        $check = User::where("email", $request->email)->first();
        $check_phone = User::where("phone_number", $request->phone_number)->first();
        if ($check) {
            return back()->withErrors([
                "email" => "Email imejirudia",
            ]);
        }
        if ($check_phone) {
            return back()->withErrors([
                "phone_number" => "Namba ya simu imejirudia",
            ]);
        }
     
        $workspace = new Workspace();
        $workspace->name = $request->first_name . "'s workspace";
        $workspace->save();

        $user = new User();

        $password = Hash::make($request->password);

        $user->password = $password;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
      
        $user->email = $request->input("email");

        $user->workspace_id = $workspace->id;

        $user->save();

        $workspace->owner_id = $user->id;
        $workspace->save();

       
        if (!empty($this->super_settings["smtp_host"])) {
            try {
                Config::set(
                    "mail.mailers.smtp.host",
                    $this->super_settings["smtp_host"]
                );
                Config::set(
                    "mail.mailers.smtp.username",
                    $this->super_settings["smtp_username"]
                );
                Config::set(
                    "mail.mailers.smtp.password",
                    $this->super_settings["smtp_password"]
                );
                Config::set(
                    "mail.mailers.smtp.port",
                    $this->super_settings["smtp_port"]
                );
                Mail::to($user)->send(new WelcomeEmail($user));
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }

        return redirect(config("app.url") . "/login");
    }

    public function studentSignupPost(Request $request)
    {

       // dd($request);
        $request->validate([
            // "email" => ["required", "email"],
            "first_name" => ["required"],
            "last_name" => ["required"],
            "password" => ["required"],
            "phone_number"=>["required"],
            "region_id"=>["required"]
        ]);


if($request->email){
    $check_mail = Student::where("email", $request->email)->first();
    if ($check_mail) {
        return back()->withErrors([
            "email" => "Barua pepe imejirudia",
        ]);
    }
}
       
        $check_phone_number = Student::where("phone_number", $request->phone_number)->first();
  
        if ($check_phone_number) {
            return back()->withErrors([
                "phone_number" => "Namba ya simu imejirudia",
            ]);
        }
        $check_region_id = $request->input("region_id");
        if($check_region_id == 0){
            return back()->withErrors([
                "region_id" => "Select Region",
            ]);
        }

        
        $student = new Student();

        $password = Hash::make($request->password);

        $student->password = $password;

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->region_id = $request->input("region_id");
        $student->ward = $request->input("ward");
        $student->village = $request->input("village");
        $student->district_id = $request->input("district_id");
        $student->phone_number = $request->input("phone_number");
        $student->email = $request->input("email");
       
        $student->save();

    

        if (!empty($this->super_settings["smtp_host"])) {
            try {
                Config::set(
                    "mail.mailers.smtp.host",
                    $this->super_settings["smtp_host"]
                );
                Config::set(
                    "mail.mailers.smtp.username",
                    $this->super_settings["smtp_username"]
                );
                Config::set(
                    "mail.mailers.smtp.password",
                    $this->super_settings["smtp_password"]
                );
                Config::set(
                    "mail.mailers.smtp.port",
                    $this->super_settings["smtp_port"]
                );
                Mail::to($student)->send(new WelcomeEmail($student));
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }

       // return \view("billing.invoice");

        return redirect(config("app.url") . "/student/login");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/");
    }
    public function studentLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/student/login");
    }
}
