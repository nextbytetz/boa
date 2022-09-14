<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ContactSection;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseReview;
use App\Models\EbookReview;
use App\Models\LandingPage;
use App\Models\Lesson;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Student;

use App\Models\Terms;
use App\Models\User;

use App\Supports\UpdateSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends WebsiteBaseController
{
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

    public function home()
    {
        $landingpage = LandingPage::first();

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        $courses = Course::orderBy("id", "desc")
            ->limit(4)
            ->get();
        $blogs = Blog::orderBy("id", "desc")
            ->limit(3)
            ->get();
        $ebooks = Product::orderBy("id", "desc")
            ->limit(4)
            ->get();
        $users = User::all()
            ->keyBy("id")
            ->all();
        $students = Student::orderBy("id", "desc")
            ->limit(6)
            ->get();
        $contact = ContactSection::first();

        if (($this->super_settings["landingpage"] ?? null) === "Default") {
            return \view("frontend.home", [
                "landingpage" => $landingpage,
                "categories" => $categories,
                "courses" => $courses,
                "users" => $users,
                "blogs" => $blogs,
                "ebooks" => $ebooks,
                "students" => $students,
                "contact" => $contact,
            ]);
        }

        return \view("auth.login", [
            "landingpage" => $landingpage,
        ]);
    }

    public function privacy()
    {
        $privacy = PrivacyPolicy::first();
        $contact = ContactSection::first();

        return \view("frontend.privacy", [
            "privacy" => $privacy,
            "contact" => $contact,
        ]);
    }

    public function shop()
    {
        $privacy = PrivacyPolicy::first();
        $contact = ContactSection::first();
        $products = Product::all();
        $recent_products = Product::orderBy("id", "desc")
            ->limit(4)
            ->get();

        return \view("frontend.shop", [
            "privacy" => $privacy,
            "contact" => $contact,
            "products" => $products,
            "recent_products" => $recent_products,
        ]);
    }

    public function viewEbook($slug)
    {
        $product = Product::where("slug", $slug)->first();

        abort_unless($product, 404);

        $product_id = $product->id;

        //        $product = false;
        //
        //        if ($request->id) {
        //            $product = Product::where("id", $request->id)->first();
        //        }

        $privacy = PrivacyPolicy::first();
        $contact = ContactSection::first();
        $products = Product::all();
        $total_reviews = EbookReview::where("product_id", $product_id)->count();
        $reviews = EbookReview::where("product_id", $product_id)->get();
        $students = Student::all()
            ->keyBy("id")
            ->all();

        $total_ratings = EbookReview::where("product_id", $product_id)->count();

        $total_star_count = EbookReview::where("id", $product_id)->sum(
            "star_count"
        );

        if ($total_ratings > 0) {
            $rating_out_of_five = round($total_star_count / $total_ratings);
        } else {
            $rating_out_of_five = 0;
        }

        return \view("frontend.view-product", [
            "privacy" => $privacy,
            "contact" => $contact,
            "products" => $products,
            "product" => $product,
            "total_reviews" => $total_reviews,
            "reviews" => $reviews,
            "students" => $students,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }

    public function termsCondition()
    {
        $term = Terms::first();
        $contact = ContactSection::first();

        return \view("frontend.terms", [
            "term" => $term,
            "contact" => $contact,
        ]);
    }

    public function blogs()
    {
        $blogs = Blog::all();
        $users = User::all()
            ->keyBy("id")
            ->all();
        $contact = ContactSection::first();

        return \view("frontend.blog", [
            "blogs" => $blogs,
            "users" => $users,
            "contact" => $contact,
        ]);
    }

    public function viewArticle($slug)
    {
        $blog = Blog::where("slug", $slug)->first();

        abort_unless($blog, 404);
        //        $blog = false;
        //
        //        if ($request->id) {
        //            $blog = Blog::where("id", $request->id)->first();
        //        }
        $users = User::all()
            ->keyBy("id")
            ->all();
        $contact = ContactSection::first();

        return \view("frontend.view-blog", [
            "blog" => $blog,
            "users" => $users,
            "contact" => $contact,
        ]);
    }

    public function courses(Request $request)
    {
        $request->validate([
            "category_id" => "nullable|integer",
        ]);

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        $courses = new Course();

        if ($request->category_id) {
            $courses = $courses->where("category_id", $request->category_id);
        }

        $courses = $courses->get();

        $contact = ContactSection::first();

        $total_lessons = Lesson::where("course_id", $request->id)->count();

        return \view("frontend.courses", [
            "categories" => $categories,
            "courses" => $courses,
            "contact" => $contact,
            "total_lessons" => $total_lessons,
        ]);
    }

    public function contact()
    {
        return \view("frontend.contact");
    }

    public function pricing()
    {
        $contact = ContactSection::first();

        return \view("frontend.pricing", [
            "contact" => $contact,
        ]);
    }

    public function courseDetails(Request $request)
    {
        $course = false;

        if ($request->id) {
            $course = Course::where("id", $request->id)->first();
        }

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
        $students = Student::all()
            ->keyBy("id")
            ->all();
        $users = User::all()
            ->keyBy("id")
            ->all();

        $reviews = CourseReview::where("course_id", $request->id)->get();

        $total_reviews = CourseReview::where(
            "course_id",
            $request->id
        )->count();

        $lessons = Lesson::where("course_id", $request->id)->get();
        $total_lessons = Lesson::where("course_id", $request->id)->count();
        $contact = ContactSection::first();

        $total_ratings = CourseReview::where(
            "course_id",
            $request->id
        )->count();
        $total_star_count = CourseReview::where("course_id", $request->id)->sum(
            "star_count"
        );

        if ($total_ratings > 0) {
            $rating_out_of_five = round($total_star_count / $total_ratings);
        } else {
            $rating_out_of_five = 0;
        }

        return \view("frontend.course-details", [
            "selected_navigation" => "courses",
            "course" => $course,
            "categories" => $categories,
            "lessons" => $lessons,
            "contact" => $contact,
            "reviews" => $reviews,
            "students" => $students,
            "users" => $users,
            "total_reviews" => $total_reviews,
            "total_lessons" => $total_lessons,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }

    public function viewCourse($slug)
    {
        $course = Course::where("slug", $slug)->first();

        abort_unless($course, 404);

        $course_id = $course->id;

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
        $students = Student::all()
            ->keyBy("id")
            ->all();
        $users = User::all()
            ->keyBy("id")
            ->all();

        $reviews = CourseReview::where("course_id", $course_id)->get();

        $total_reviews = CourseReview::where("course_id", $course_id)->count();

        $lessons = Lesson::where("course_id", $course_id)->get();
        $total_lessons = Lesson::where("course_id", $course_id)->count();
        $contact = ContactSection::first();

        $total_ratings = CourseReview::where("course_id", $course_id)->count();
        $total_star_count = CourseReview::where("course_id", $course_id)->sum(
            "star_count"
        );

        if ($total_ratings > 0) {
            $rating_out_of_five = round($total_star_count / $total_ratings);
        } else {
            $rating_out_of_five = 0;
        }

        return \view("frontend.course-details", [
            "selected_navigation" => "courses",
            "course" => $course,
            "categories" => $categories,
            "lessons" => $lessons,
            "contact" => $contact,
            "reviews" => $reviews,
            "students" => $students,
            "users" => $users,
            "total_reviews" => $total_reviews,
            "total_lessons" => $total_lessons,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }

    public function update()
    {
        UpdateSupport::updateSchema();
    }
}
