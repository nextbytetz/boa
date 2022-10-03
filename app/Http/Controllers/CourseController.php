<?php

namespace App\Http\Controllers;

use App\Models\Course;

use App\Models\CourseCategory;
use App\Models\Lesson;
use App\Models\Product;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CourseController extends BaseController
{
   
    public function courses()
    {
        $courses = Course::all();
        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        return \view("admin.courses", [
            "selected_navigation" => "courses",
            "courses" => $courses,
            "categories" => $categories,
        ]);
    }
    public function lessons(Request $request)
    {
        $course = false;
        if ($request->id) {
            $course = Course::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }
        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
        $lessons = Lesson::where("course_id", $request->id)->get();

        return \view("lessons.lessons", [
            "selected_navigation" => "courses",
            "course" => $course,
            "categories" => $categories,
            "lessons" => $lessons,
        ]);
    }

    public function createCourse(Request $request)
    {
        $course = false;
        $outcomes = [];

        if ($request->id) {
            $course = Course::find($request->id);

            if ($course->outcomes) {
                $outcomes = json_decode($course->outcomes);
            }
        }

        $categories = CourseCategory::all();
        $lessons = Lesson::all();

        return \view("admin.create-course", [
            "selected_navigation" => "courses",
            "course" => $course,
            "categories" => $categories,
            "lesson" => $lessons,
            "outcomes" => $outcomes,
        ]);
    }

    public function coursePost(Request $request)
    {
        $request->validate([
            "name" => "required|max:150",
            "id" => "nullable|integer",
            "slug" => ["required", "max:150"],
            "image" => "nullable|file",
            "outcomes" => "nullable|array",
        ]);

        $course = false;

        if ($request->id) {
            $course = Course::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }

        if (!$course) {
            $request->validate([
                "slug" => ["unique:courses,slug"],
            ]);

            $course = new Course();
            $course->uuid = Str::uuid();
            $course->workspace_id = $this->user->workspace_id;
        }
        $cover_path = null;

        if ($request->image) {
            $cover_path = $request->file("image")->store("media", "uploads");
        }

        if (!empty($cover_path)) {
            $course->image = $cover_path;
        }
        $outcomes = [];

        foreach ($request->outcomes as $outcome) {
            if (!empty($outcome)) {
                $outcomes[] = $outcome;
            }
        }

        if (!empty($outcomes)) {
            $course->outcomes = json_encode($outcomes);
        }
        $course->name = $request->name;
        $course->price = $request->price;
        $course->slug = $request->slug;
        $course->level = 'Beginner';
        $course->status = $request->status;
        $course->certificate = 'Yes';
        $course->deadline = $request->deadline;
        $course->duration = $request->duration;
        $course->admin_id = $this->user->id;
        $course->category_id = $request->category_id;
        $course->summary = clean($request->summary);
        $course->description = clean($request->description);
        $course->save();

        return redirect("/create-course?id=" . $course->id);
    }

    public function viewCourse(Request $request)
    {
        $course = false;
        $users = User::all()
            ->keyBy("id")
            ->all();
        $lessons = Lesson::where("course_id", $request->id)->get();

        if ($request->id) {
            $course = Course::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }
        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();
        $total_lessons = Lesson::where("course_id", $request->id)->count();

        return \view("admin.view-course", [
            "selected_navigation" => "courses",
            "course" => $course,
            "users" => $users,
            "categories" => $categories,
            "lessons" => $lessons,
            "total_lessons" => $total_lessons,
        ]);
    }

    public function categories()
    {
        $users = User::all();
        $categories = CourseCategory::all();

        $workspaces = Workspace::all()
            ->keyBy("id")
            ->all();

        return \view("admin.course-categories", [
            "selected_navigation" => "course-categories",
            "users" => $users,
            "categories" => $categories,
            "workspaces" => $workspaces,
        ]);
    }

    public function categoryPost(Request $request)
    {
        $request->validate([
            "name" => "required|max:150",
            "category_id" => "nullable|integer",
        ]);

        $category = false;

        if ($request->category_id) {
            $category = CourseCategory::find($request->category_id);
        }

        if (!$category) {
            $category = new CourseCategory();
        }

        $category->name = $request->name;

        $category->save();

        return redirect()->back();
    }
    public function categoryEdit(Request $request)
    {
        $request->validate([
            "id" => "required|integer",
        ]);

        $category = CourseCategory::find($request->id);

        if ($category) {
            return response($category);
        }
    }

    public function createLesson(Request $request)
    {
        $request->validate([
            "id" => "nullable|integer",
            "course_id" => "required|integer",
        ]);

        $course = false;
        $lesson = false;

        if ($request->course_id) {
            $course = Course::find($request->course_id);
        }
        if ($request->id) {
            $lesson = Lesson::find($request->id);
        }
        $categories = CourseCategory::all();

        return \view("lessons.create-lesson", [
            "selected_navigation" => "courses",
            "course" => $course,
            "categories" => $categories,
            "lesson" => $lesson,
        ]);
    }

    public function lessonPost(Request $request)
    {
        $request->validate([
            "title" => "required|max:150",
            "id" => "nullable|integer",
            "course_id" => "required|integer",
            "slug" => ["required", "max:150", "unique:courses,slug"],
            "file" => "nullable|file",
            "video" =>
                "nullable|mimes:mp4,mov,ogg,qt,mp3,wav,flac,aac,wma,wmv,webm",
        ]);

        $course_id = $request->course_id;

        $lesson = false;

        if ($request->id) {
            $lesson = Lesson::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }

        if (!$lesson) {
            $lesson = new Lesson();

            $lesson->workspace_id = $this->user->workspace_id;
        }
        $cover_path = null;

        if ($request->video) {
            $cover_path = $request->file("video")->store("media", "uploads");
        }

        if (!empty($cover_path)) {
            $lesson->video = $cover_path;
        }
        $path = null;
        if ($request->file) {
            $path = $request->file("file")->store("media", "uploads");
        }
        if (!empty($path)) {
            $lesson->file = $path;
        }

        $lesson->title = $request->title;
        $lesson->duration = $request->duration;
        $lesson->slug = $request->slug;
        $lesson->course_id = $request->course_id;
        $lesson->description = clean($request->description);
        $lesson->save();

        $lesson_id = $lesson->id;

        return redirect("/create-lesson?course_id=$course_id&id=$lesson_id");
    }

    public function viewLesson(Request $request)
    {
        $users = User::all()
            ->keyBy("id")
            ->all();

        $lesson = false;

        if ($request->id) {
            $lesson = Lesson::find($request->id);
        }

        $lessons = Lesson::where("course_id", $lesson->course_id)->get();

        $categories = CourseCategory::all()
            ->keyBy("id")
            ->all();

        return \view("lessons.view-lesson", [
            "selected_navigation" => "courses",

            "users" => $users,
            "categories" => $categories,
            "lessons" => $lessons,
            "lesson" => $lesson,
        ]);
    }
}
