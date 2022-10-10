<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Course;
use App\Models\CoursePurchase;
use App\Models\Payment;
use App\Models\CreditCard;
use App\Models\Customer;
use App\Models\EbookPurchase;
use App\Models\Order;
use App\Models\Region;
use App\Models\OrderItem;
use App\Services\Notifications\Sms;
use App\Models\PaymentGateway;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Student;
use App\Models\RegistrationPurchase;
use App\Traits\AddToCart;
use App\Models\SubscriptionPlan;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Stripe\Stripe;
use Illuminate\Support\Facades\Auth;

class BillingController extends WebsiteBaseController
{
    use AddToCart;
    //
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
            return $next($request);
        });
    }

    public function cartPage()
    {
        return \view("billing.cart", []);
    }

    public function checkout()
    {

if ($this->student) {

    $order_id = $this->orderConfirmed();
    $order = Order::find($order_id);
    $order_total = $order->order_total;
    $region = Region::find($this->student->region_id);
    return \view("billing.invoice", [
        "first_name" => $this->student->first_name,
        "last_name" => $this->student->last_name,
        "phone_number" => $this->student->phone_number,
        "number" => $this->student->number,
        "email" => $this->student->email,
        "region" => $region->name,
        "order_id" => $order_id,
        "order_total" => $order_total,
    ]);
}else
{
    return redirect('/student/login');
}

 

        // $payment_gateways = PaymentGateway::get()
        //     ->keyBy("api_name")
        //     ->all();

        // if (empty($payment_gateways)) {
        //     return response("No payment gateway is configured");
        // }

        // return \view("billing.checkout", [
        //     "payment_gateways" => $payment_gateways,
        // ]);
    }

    public function addToCart($id, Request $request)
    {
        $this->addItemsToCart($id,$request);
        return redirect()->route("cart");
    }

    public function removeItemFromCart($id)
    {
        $cart = session()->get("cart");

        if (isset($cart["course"][$id])) {
            unset($cart["course"][$id]);
        } else {
            unset($cart["ebook"][$id]);
        }

        session()->put("cart", $cart);

        return redirect()->route("cart");
    }

    public function processPayment(Request $request){

        $error = "";
        $status = "";
        $success = true;
        $reference = "";
       try {
       $nextpay_url = "http://18.220.121.223:8980/gateway/services/v1/collect/push";
       $invoice = $_POST['invoice'];
       $phone = $_POST['phone_number'];
       $amount = $_POST['amount'];
   
    
        if (!preg_match("/^(255|0)\\d{9}$/", $phone)) {
            throw new \Exception("Phone number not correct, sample input 255654001001 | 0654001001");
        }
        if (substr($phone, 0, 1) == '0') {
            $phone = substr_replace($phone, "255", 0, 1);
        }
    
        $body = [
            "request" => [
                "command" => "UssdPush",
                "transactionNumber" => $invoice,
                "msisdn" => $phone,
                "amount" => $amount,
            ],
        ];
    
        $username = "9";
        $password = "Bakwata@2022";
        $timestamp = date("YmdHis");
    
        $apipassword = base64_encode(hash('sha256', $username . $password . $timestamp, true));
        $request = [
            "body" => $body,
            "header" => [
                "username" => $username,
                "password" => $apipassword,
                "timestamp" => $timestamp,
            ],
        ];
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $nextpay_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($request),
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "content-type: application/json"
            ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
    
        if ($err) {
            $return = "cURL Error #:" . $err;
            $status = $return;
        } else {
            $return = $response;
            $data = json_decode($return, true);
            $reference = $data["body"]["response"]["reference"] ?? "";
            $status = $data["body"]["response"]["responseStatus"] ?? "";
        }
  
    } catch (\Exception $e) {
        $success = false;
        $error = $e->getMessage();
    }
    header('Content-type: application/json');

    echo json_encode([
        'success' => $success, 
        'error' => $error,
        'status' => $status,
        'reference' => $reference,
        //'request' => $request,
        //'return' => $return,
        'response_data' => $data,
        'message' => '', 
        'response' => '',
    ]);

    }

    public function orderConfirmed()
    {
        // $payment_gateways = PaymentGateway::get()
        //     ->keyBy("api_name")
        //     ->all();

        // if (empty($payment_gateways)) {
        //     return response("No payment gateway is configured");
        // }

        $cart = $this->cart;

        if (empty($cart)) {
            abort(401);
        }

        $order = new Order();
        $order->order_total = getCartTotalPrice();
        $order->student_id = $this->student->id;

        $order->save();

        if (!empty($cart["course"])) {
            foreach ($cart["course"] as $course) {
                $order_item = new OrderItem();
                $order_item->order_id = $order->id;
                $order_item->item_id = $course["id"];
                $order_item->item_name = $course["name"];

                $order_item->type = "course";

                $order_item->price = $course["price"];
                $order_item->save();
            }
        }
        if (!empty($cart["ebook"])) {
            foreach ($cart["ebook"] as $ebook) {
                $order_item = new OrderItem();
                $order_item->order_id = $order->id;

                $order_item->type = "ebook";
                $order_item->item_id = $ebook["id"];
                $order_item->item_name = $ebook["name"];

                $order_item->price = $ebook["price"];
                $order_item->save();
            }
        }
        if (!empty($cart["registration"])) {
            foreach ($cart["registration"] as $registration) {
                $order_item = new OrderItem();
                $order_item->order_id = $order->id;

                $order_item->type = "registration";
                $order_item->item_id = $registration["id"];
                $order_item->item_name = $registration["name"];

                $order_item->price = $registration["price"];
                $order_item->save();
            }
        }

     session()->forget("cart");

     return $order->id;
        // return \view("billing.order", [
        //     "payment_gateways" => $payment_gateways,
        //     "order" => $order,
        //     "order_item" => $order_item,
        // ]);
    }

    public function orders()
    {
        $orders = Order::where("student_id", $this->student->id)->get();

        return \view("settings.billing", [
            "selected_navigation" => "orders",
            "orders" => $orders,
        ]);
    }
    public function viewOrder(Request $request)
    {
        if ($request->id) {
            $order = Order::where("id", $request->id)->first();

            if (empty($order)) {
                abort(401);
            }
        }

        $order_items = OrderItem::where("order_id", $order->id)->get();

        return \view("billing.view-order", [
            "selected_navigation" => "orders",
            "order" => $order,
            "order_items" => $order_items,
        ]);
    }

    public function paymentStripe(Request $request)
    {
        $request->validate([
            "token_id" => "required",
        ]);

        $gateway = PaymentGateway::where("api_name", "stripe")->first();

        if (!$gateway) {
            abort(401);
        }

        $token = $request->token_id;

        $amount = getCartTotalPrice();

        if ($amount > 0) {
            try {
                // Set your secret key: remember to change this to your live secret key in production
                // See your keys here: https://dashboard.stripe.com/account/apikeys
                Stripe::setApiKey($gateway->private_key);

                // Create a Customer:

                $customer_data = [];

                $customer_data["source"] = $token;
                $customer_data["email"] = $this->student->email;
                $customer_data["name"] =
                    $this->student->first_name .
                    " " .
                    $this->student->last_name;

                $customer = \Stripe\Customer::create($customer_data);

                $card = new CreditCard();
                $card->gateway_id = $gateway->id;
                $card->user_id = $this->student->id;
                $card->token = $customer->id;
                $card->save();

                $amount_x_100 = (int) $amount * 100;
                // Charge the Customer instead of the card:
                $charge = \Stripe\Charge::create([
                    "amount" => $amount_x_100,
                    "currency" => config("app.currency"),
                    "customer" => $customer->id,
                    "description" =>
                        config("app.name") . " - " . $this->student->email,
                    "statement_descriptor" => substr(config("app.name"), 0, 22), // Maximum 22 character
                ]);

                // Add courses to student

                $cart = $this->cart;
                if (!empty($cart["course"])) {
                    foreach ($cart["course"] as $course) {
                        $course_purchased = new CoursePurchase();
                        $course_purchased->course_id = $course->id;
                        $course_purchased->student_id = $this->student->id;
                        $course_purchased->save();
                    }
                }

                // Add ebooks to student

                if (!empty($cart["ebook"])) {
                    foreach ($cart["ebook"] as $ebook) {
                        $ebook_purchased = new EbookPurchase();
                        $ebook_purchased->ebook_id = $ebook->id;
                        $ebook_purchased->student_id = $this->student->id;
                        $ebook_purchased->save();
                    }
                }

                return redirect("/student/dashboard")->with(
                    "status",
                    __("Payment successful")
                );
            } catch (\Exception $e) {
                return response(
                    [
                        "success" => false,
                        "errors" => [
                            "system" =>
                                "An error occurred! " . $e->getMessage(),
                        ],
                    ],
                    422
                );
            }
        }

        return redirect()->route("cart");
    }
    public function orderPaid(Request $request)
    {
        //dd('test');
    
        try {
        $decoded_params = $request->all();

        // $decoded_params['body']['result']['referenceNumber'];
        $receipt_number = $decoded_params['body']['result']['receiptNumber'];
        $reference_number = $decoded_params['body']['result']['referenceNumber'];
        $txn_date = $decoded_params['body']['result']['date'];
        $operator = $decoded_params['body']['result']['operator'];


        $order_id = $decoded_params['body']['result']['transactionNumber'];
   
        $order = Order::find($order_id);
        $order_items = OrderItem::where("order_id",$order_id)->get();
        foreach($order_items as $order_item){

                 if($order_item->type == 'course'){
                    $course_purchased = new CoursePurchase();
                    $course_purchased->course_id = $order_item->item_id;
                    $course_purchased->student_id = $order->student_id;
                    $course_purchased->save();
                    $phone = '0788330308';
                    $sms = new Sms($phone, 'Assalam Alleykum Warahamatullah Wabarakatuh. Malipo yamepokelewa risiti namba '.$receipt_number.', kiasi '.$order->order_total.', kozi uliyolipia '.$order_item->item_name.' .Karibu BAKWATA ONLINE ACADEMY');
                    $response = $sms->send();

                 }
                 
                 if($order_item->type == 'registration'){
                    $registration_purchased = new RegistrationPurchase();
                    $registration_purchased->registration_id = $order_item->item_id;
                    $registration_purchased->student_id = $order->student_id;
                    $registration_purchased->save();

                    $student = Student::find($order->student_id);
                    $student->registration_paid = 1;
                    $student->update();
                 }

        } 
        $order->paid = 1;
        $order->update();

        $payment = new Payment();
        $payment->receipt_number = $receipt_number;
        $payment->txn_number = $reference_number;  
        $payment->txn_date = $txn_date; 
        $payment->operator = $operator;
        $payment->order_id = $order_id;
        $payment->save(); 


         
$student = Student::find($order->student_id); 
if (is_null($student->number)) {
    $region = Region::find($student->region_id);
    $year = Carbon::now()->year;
    $month = Carbon::now()->month;
    $number = 'BOA/'.$region->hasc.'/'.$month.'/'.$year.'/'.$student->id;
    $phone = '0788330308';
    $sms = new Sms($phone, 'Assalam Alleykum Warahamatullah Wabarakatuh '.strtoupper($request->first_name).' '.strtoupper($request->last_name).' Namba yako ya usajili ni ' .$number.'  Namba hii utaitumia katika kutuma majibu ya mtihani wa moduli zako. Karibu BAKWATA ONLINE ACADEMY');
    $response = $sms->send();
    //logger($response);
    $student = Student::find($student->id);
    $student->number = $number;
    $student->update();
}

              //  return $receipt_number;
         
                return response(
                    [
                        "success" => true,
                        "message" => "Payment Confirmed",
                    ],
                    200
                );
                /* return redirect("/student/dashboard")->with(
                    "status",
                    __("Payment successful")
                ); */
            } catch (\Exception $e) {
                return response(
                    [
                        "success" => false,
                        "errors" => [
                            "system" =>
                                "An error occurred! " . $e->getMessage(),
                        ],
                    ],
                    422
                );
            }
    

            return response(
                [
                    "success" => false,
                    "message" => "Payment Not Confirmed",
                ],
                200
            );
    }
}
