<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentMark;
use App\Models\AssignmentSubmission;
use App\Models\CertificateReceive;
use App\Models\CertificateTemplate;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseComment;
use App\Models\CoursePurchase;
use App\Models\CourseReview;
use App\Models\CourseStudentRelation;
use App\Models\EbookPurchase;
use App\Models\EbookReview;
use App\Models\Lesson;
use App\Models\Message;
use App\Models\Product;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StudentPortalController extends StudentBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard(Request $request)
    {
        $this->auth();

        $student = false;
        if ($this->student) {
            $student = $this->student;
        }

        $course_ids = CoursePurchase::where("student_id", $this->student->id)
            ->pluck("course_id")
            ->toArray();

        $courses = Course::whereIn("id", $course_ids)->get();
        $total_lessons = Lesson::whereIn("id", $course_ids)->count();

        $ebook_ids = EbookPurchase::where("student_id", $this->student->id)
            ->pluck("product_id")
            ->toArray();

        $ebooks = Product::whereIn("id", $ebook_ids)->get();

        return \view("student-portal.dashboard", [
            "selected_navigation" => "dashboard",
            "selected_sub_navigation" => "dashboard",
            "courses" => $courses,
            "ebooks" => $ebooks,
            "student" => $student,
            "total_lessons" => $total_lessons,
        ]);
    }

    public function login()
    {
        if ($this->student) {
            return redirect()->route("student.dashboard");
        }
        return \view("auth.student-login");
    }

    public function studentProfile(Request $request)
    {
        $available_languages = Student::$available_languages;

        return \view("student-portal.profile", [
            "selected_navigation" => "my-profile",
            "available_languages" => $available_languages,
        ]);
    }

    public function studentEditProfile(Request $request)
    {
        $student = false;
        if ($this->student) {
            $student = $this->student;
        }

        //
        $available_languages = Student::$available_languages;

        return \view("student-portal.edit-profile", [
            "selected_navigation" => "my-profile",
            "student" => $student,
            "available_languages" => $available_languages,
        ]);
    }

    public function studentEditPost(Request $request)
    {
        $request->validate([
            "first_name" => "required|string|max:100",
            "last_name" => "required|string|max:100",
            "email" => "nullable|email",
            "phone" => "nullable|string|max:50",
            "password" => "nullable|string|max:50",
            "id" => "nullable|integer",
            "photo" => "nullable|file|mimes:jpg,png",
        ]);

        $student = false;

        if ($request->id) {
            $student = $this->student;
        }

        $path = null;
        if ($request->photo) {
            $path = $request->file("photo")->store("media", "uploads");
        }
        if (!empty($path)) {
            $student->photo = $path;
        }

        if ($request->cover_photo) {
            $cover_path = $request
                ->file("cover_photo")
                ->store("media", "uploads");
        }

        if (!empty($cover_path)) {
            $student->cover_photo = $cover_path;
        }
        if ($request->input("password")) {
            $student->password = Hash::make($request->input("password"));
        }

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;

        $student->email = $request->email;
        $student->phone_number = $request->phone_number;
        $student->bio = $request->bio;
        $student->language = $request->language;

        $student->twitter = $request->twitter;
        $student->facebook = $request->facebook;
        $student->website = $request->website;
        $student->linkedin = $request->linkedin;
        $student->address = $request->address;

        $student->city = $request->city;

        $student->state = $request->state;
        $student->country = $request->country;

        $student->zip = $request->zip;

        if ($request->timezone) {
            $student->timezone = $request->timezone;
            $student->save();
        }
        $student->save();
        return redirect()
            ->route("student.profile")
            ->with("success", "Profile updated successfully");
    }

    public function assignments(Request $request)
    {
        $this->auth();

        $student = false;

        if ($this->student) {
            $student = $this->student;
        }
        $assignments = Assignment::where(
            "members",
            "like",
            '%"' . $student->id . '"%'
        )->get();

        $courses = Course::all()
            ->keyBy("id")
            ->all();

        return \view("student-portal.assignments", [
            "selected_navigation" => "assignments",
            "courses" => $courses,
            "assignments" => $assignments,
        ]);
    }

    public function ebooks(Request $request)
    {
        $this->auth();

        $student = false;

        if ($this->student) {
            $student = $this->student;
        }

        $product_ids = EbookPurchase::where("student_id", $student->id)
            ->pluck("product_id")
            ->toArray();
        $products = Product::whereIn("id", $product_ids)->get();

        $courses = Course::all()
            ->keyBy("id")
            ->all();

        return \view("student-portal.ebooks", [
            "selected_navigation" => "ebooks",
            "courses" => $courses,
            "products" => $products,
        ]);
    }

    public function myCourses(Request $request)
    {
        $student = false;

        if ($this->student) {
            $student = $this->student;
        }

        $course_ids = CoursePurchase::where("student_id", $student->id)
            ->pluck("course_id")
            ->toArray();
        $courses = Course::whereIn("id", $course_ids)->get();

        $total_lessons = Lesson::whereIn("id", $course_ids)->count();

        $total_ratings = CourseReview::whereIn("id", $course_ids)->count();

        $total_star_count = CourseReview::where("course_id", $request->id)->sum(
            "star_count"
        );

        if ($total_ratings > 0) {
            $rating_out_of_five = round($total_star_count / $total_ratings);
        } else {
            $rating_out_of_five = 0;
        }

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        return \view("student-portal.courses", [
            "selected_navigation" => "student-course",
            "courses" => $courses,
            "categories" => $categories,
            "total_lessons" => $total_lessons,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }

    public function myCertificates()
    {
        $this->auth();

        $student = false;

        if ($this->student) {
            $student = $this->student;
        }

        $courses = Course::all()
            ->keyBy("id")
            ->all();

        $certificates_ids = CertificateReceive::where(
            "student_id",
            $student->id
        )
            ->pluck("certificate_id")
            ->toArray();
        $certificates = CertificateTemplate::whereIn(
            "id",
            $certificates_ids
        )->get();

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        return \view("student-portal.certificates", [
            "selected_navigation" => "student-certificates",
            "courses" => $courses,
            "categories" => $categories,
            "certificates" => $certificates,
        ]);
    }
    public function myCourseDetails(Request $request)
    {
        $this->auth();

        $course = false;
        $users = User::all()
            ->keyBy("id")
            ->all();
        $total_lessons = Lesson::where("course_id", $request->id)->count();
        $lessons = Lesson::where("course_id", $request->id)->get();

        if ($request->id) {
            $course = Course::where("id", $request->id)->first();
        }
        $review = CourseReview::where("course_id", $request->id)
            ->where("student_id", $this->student->id)
            ->first();
        $reviews = CourseReview::where("id", $request->id)->count();

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
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
        return \view("student-portal.view-course", [
            "selected_navigation" => "student-course",
            "selected_nav" => "student-course-description",
            "course" => $course,
            "users" => $users,
            "categories" => $categories,
            "lessons" => $lessons,
            "total_lessons" => $total_lessons,
            "review" => $review,
            "reviews" => $reviews,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }
    public function myCourseLessons(Request $request)
    {
        $this->auth();
        $course = false;
        $users = User::all()
            ->keyBy("id")
            ->all();
        $lessons = Lesson::where("course_id", $request->id)->get();

        if ($request->id) {
            $course = Course::where("id", $request->id)->first();
        }
        if ($request->id) {
            $review = CourseReview::where("id", $request->id)->first();
        }
        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
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

        return \view("student-portal.lessons-view-course", [
            "selected_navigation" => "student-course",
            "selected_nav" => "student-course-lessons",
            "course" => $course,
            "users" => $users,
            "categories" => $categories,
            "lessons" => $lessons,
            "review" => $review,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }

    public function viewMyLesson(Request $request)
    {
        $this->auth();
        $request->validate([
            "id" => "required|integer",
        ]);

        $lesson = Lesson::find($request->id);

        $users = User::all()
            ->keyBy("id")
            ->all();

        //
        $lessons = Lesson::where("course_id", $lesson->course_id)->get();

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        return \view("student-portal.student_view_lesson", [
            "selected_navigation" => "student-course",
            //            "course" => $course,
            "users" => $users,
            "categories" => $categories,
            "lessons" => $lessons,
            "lesson" => $lesson,
        ]);
    }

    public function myCourseDiscussion(Request $request)
    {
        $this->auth();
        $course = false;
        $users = User::all()
            ->keyBy("id")
            ->all();

        $lessons = Lesson::where("course_id", $request->id)->get();

        if ($request->id) {
            $course = Course::where("id", $request->id)->first();
        }
        if ($request->id) {
            $review = CourseReview::where("id", $request->id)->first();
        }
        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        $total_ratings = CourseReview::where(
            "course_id",
            $request->id
        )->count();
        $total_star_count = CourseReview::where("course_id", $request->id)->sum(
            "star_count"
        );

        $rating_out_of_five = round($total_star_count / $total_ratings);

        return \view("student-portal.discussion-view-course", [
            "selected_navigation" => "student-course",
            "selected_nav" => "student-course-discussion",
            "course" => $course,
            "users" => $users,
            "categories" => $categories,
            "lessons" => $lessons,
            "review" => $review,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }

    public function viewAssignment(Request $request)
    {
        $this->auth();

        $request->validate([
            "id" => "required|integer",
        ]);

        $assignment = Assignment::find($request->id);

        if ($assignment) {
            //Check if the assignment is assigned to the student
            $members = $assignment->members ?? [];
            $members = json_decode($members, true);

            if (!in_array($this->student->id, $members)) {
                abort(401);
            }

            $assignment_submission = AssignmentSubmission::where(
                "assignment_id",
                $assignment->id
            )
                ->where("student_id", $this->student->id)
                ->first();

            $assignment_mark = AssignmentMark::where(
                "assignment_id",
                $assignment_submission->id
            )
                ->where("student_id", $this->student->id)
                ->first();

            $users = User::all()
                ->keyBy("id")
                ->all();
            $courses = Course::all()
                ->keyBy("id")
                ->all();

            return \view("student-portal.view-assignment", [
                "selected_navigation" => "assignments",
                "assignment" => $assignment,
                "assignment_submission" => $assignment_submission,
                "courses" => $courses,
                "users" => $users,
                "assignment_mark" => $assignment_mark,
            ]);
        }
    }

    public function submitAssignmentPost(Request $request)
    {
        $this->auth();
        $request->validate([
            "id" => "nullable|integer",
            "file" => "nullable|file",
        ]);

        $assignment_submission = false;

        if ($request->id) {
            $assignment_submission = AssignmentSubmission::find($request->id);
        }

        if (!$assignment_submission) {
            $assignment_submission = new AssignmentSubmission();
            $assignment_submission->uuid = Str::uuid();
        }
        $path = null;
        if ($request->file) {
            $path = $request->file("file")->store("media", "uploads");
        }
        if (!empty($path)) {
            $assignment_submission->file = $path;
        }

        $assignment_submission->description = clean($request->description);
        $assignment_submission->assignment_id = $request->assignment_id;
        $assignment_submission->student_id = $this->student->id;

        $assignment_submission->save();

        return redirect()
            ->back()
            ->with("success", "Assignment submitted successfully");
    }

    public function studentMessages(Request $request)
    {
        $request->validate([
            "id" => "nullable|integer",
        ]);

        $this->auth();

        if ($request->id) {
            $selected_admin = User::find($request->id);
        } else {
            $selected_admin = User::first();
        }

        $student_id = $this->student->id;

        $current_time_plus_five_minutes = time() + 5 * 60;

        $messages = Message::where("student_id", $student_id)
            ->where("admin_id", $selected_admin->id)
            ->get();

        $admins = User::all()
            ->keyBy("id")
            ->all();

        return \view("student-portal.messages", [
            "selected_navigation" => "messages",
            "messages" => $messages,
            "current_time_plus_five_minutes" => $current_time_plus_five_minutes,
            "admins" => $admins,
            "selected_admin" => $selected_admin,
            "student_id" => $student_id,
        ]);
    }

    public function postStudentMessages(Request $request)
    {
        $this->auth();

        $request->validate([
            "message" => "required|string",
            "admin_id" => "required|integer",
        ]);

        $message = new Message();
        $message->to_id = $request->admin_id;
        $message->admin_id = $request->admin_id;
        $message->from_id = $this->student->id;
        $message->student_id = $this->student->id;
        $message->message = $request->message;
        $message->type = "Student";
        $message->save();
    }

    public function reviewPost(Request $request)
    {
        $this->auth();

        $request->validate([
            "course_id" => "required|integer",
            "star_count" => "required|integer",
        ]);

        //check if the user purchased the course

        $has_purchased = CoursePurchase::where("course_id", $request->course_id)
            ->where("student_id", $this->student->id)
            ->first();

        if (!$has_purchased) {
            abort(401);
        }

        $review = CourseReview::where("course_id", $request->course_id)
            ->where("student_id", $this->student->id)
            ->first();

        if (!$review) {
            $review = new CourseReview();
            $review->course_id = $request->course_id;
            $review->student_id = $this->student->id;
        }

        $review->review = $request->review;
        $review->star_count = $request->star_count;

        $review->save();

        return redirect(
            config("app.url") .
                "/student/my-course-details?id=" .
                $request->course_id
        );
    }

    public function viewEbook(Request $request)
    {
        $this->auth();
        $product = false;
        $users = User::all()
            ->keyBy("id")
            ->all();
        $lessons = Lesson::where("course_id", $request->id)->get();

        if ($request->id) {
            $product = Product::where("id", $request->id)->first();
        }

        $review = EbookReview::where("product_id", $request->id)
            ->where("student_id", $this->student->id)
            ->first();
        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
        $total_ratings = EbookReview::where(
            "product_id",
            $request->id
        )->count();

        $total_star_count = EbookReview::where("id", $request->id)->sum(
            "star_count"
        );

        if ($total_ratings > 0) {
            $rating_out_of_five = round($total_star_count / $total_ratings);
        } else {
            $rating_out_of_five = 0;
        }

        return \view("student-portal.view-ebook", [
            "selected_navigation" => "ebooks",
            "selected_nav" => "student-course-description",
            "product" => $product,
            "users" => $users,
            "categories" => $categories,
            "lessons" => $lessons,
            "review" => $review,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }

    public function ebookReviewPost(Request $request)
    {
        $this->auth();
        $request->validate([
            "product_id" => "required|integer",
            "star_count" => "required|integer",
        ]);

        $has_purchased = eBookPurchase::where(
            "product_id",
            $request->product_id
        )
            ->where("student_id", $this->student->id)
            ->first();

        if (!$has_purchased) {
            abort(401);
        }

        $review = EbookReview::where("product_id", $request->product_id)
            ->where("student_id", $this->student->id)
            ->first();

        if ($request->id) {
            $review = EbookReview::where("id", $request->id)->first();
        }

        if (!$review) {
            $review = new EbookReview();
            $review->product_id = $request->product_id;
            $review->student_id = $this->student->id;
        }

        $review->review = $request->review;
        $review->star_count = $request->star_count;
        $review->save();

        return redirect(
            config("app.url") . "/student/view-ebook?id=" . $request->product_id
        );
    }

    public function viewCertificate(Request $request)
    {
        $certificate = false;
        $users = User::all()
            ->keyBy("id")
            ->all();
        $courses = Course::all()
            ->keyBy("id")
            ->all();
        $students = Student::all()
            ->keyBy("id")
            ->all();

        if ($request->id) {
            $certificate = CertificateTemplate::where(
                "id",
                $request->id
            )->first();
        }
        $certificate_received = false;
        if ($request->id) {
            $certificate_received = CertificateReceive::where(
                "id",
                $request->id
            )->first();
        }

        return \view("student-portal.view-certificate", [
            "selected_navigation" => "student-certificate",
            "certificate" => $certificate,
            "users" => $users,
            "students" => $students,
            "courses" => $courses,
            "certificate_received" => $certificate_received,
        ]);
    }

    public function courseCommentPost(Request $request)
    {
        $request->validate([
            "message" => "required|string",
            "id" => "nullable|integer",
        ]);

        $comment = false;

        if ($request->id) {
            $comment = CourseComment::where("id", $request->id)->first();
        }

        if (!$comment) {
            $comment = new CourseComment();
            $comment->uuid = Str::uuid();
        }

        $comment->course_id = $request->course_id;
        //        $comment->admin_id = $request->admin_id;
        $comment->student_id = $this->student->id;
        $comment->message = $request->message;

        $comment->save();

        return redirect()->back();
    }
}
