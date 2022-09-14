<?php
namespace App\Supports;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class UpdateSupport
{
    public static function updateSchema()
    {
        try {
            if (!Schema::hasColumn("lessons", "duration")) {
                Schema::table("lessons", function (Blueprint $table) {
                    $table->string("duration")->nullable();
                    $table->string("file")->nullable();
                    $table->string("slug");
                });
                $lessons = Lesson::all();

                foreach ($lessons as $lesson) {
                    $lesson->slug = Str::slug($lesson->name);
                    $lesson->save();
                }
            }
            if (!Schema::hasColumn("courses", "slug")) {
                Schema::table("courses", function (Blueprint $table) {
                    $table->string("slug");
                });

                $courses = Course::all();

                foreach ($courses as $course) {
                    $course->slug = Str::slug($course->name);
                    $course->save();
                }
            }
            if (!Schema::hasColumn("blogs", "slug")) {
                Schema::table("blogs", function (Blueprint $table) {
                    $table->string("slug");
                });

                $blogs = Blog::all();

                foreach ($blogs as $blog) {
                    $blog->slug = Str::slug($blog->name);
                    $blog->save();
                }
            }
        } catch (\Exception $e) {
            ray($e->getMessage());
            return false;
        }
    }
}
