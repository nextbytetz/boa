<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Message;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MessageController extends AdminBaseController
{
    //
    public function messages(Request $request)
    {
        $messages = [];

        $selected_student = false;

        $student_id = $request->query("id");

        $current_time_plus_five_minutes = time() + 5 * 60;

        $users = User::all()
            ->keyBy("id")
            ->all();

        $students = Student::orderBy("last_conversion", "desc")
            ->get()
            ->keyBy("id")
            ->all();

        $last_conversion_student = Student::orderBy(
            "last_conversion",
            "desc"
        )->first();
        $last_conversion_student_id = 0;
        if ($last_conversion_student) {
            $last_conversion_student_id = $last_conversion_student->id;
        }

        if (!$student_id) {
            if ($last_conversion_student_id) {
                $student_id = $last_conversion_student_id;
            } else {
                $student_id = Student::first()->id ?? 0;
            }
        }

        if ($student_id) {
            $messages = Message::where("to_id", $student_id)
                ->orWhere("from_id", $student_id)
                ->orderBy("time", "desc")
                ->get();
            $selected_student = Student::where("id", $student_id)->first();
        }

        return \view("messages.messages", [
            "selected_navigation" => "messages",
            "selected_student" => $selected_student,
            "messages" => $messages,
            "current_time_plus_five_minutes" => $current_time_plus_five_minutes,
            "users" => $users,
            "students" => $students,
            "student_id" => $student_id,
        ]);
    }

    public function postMessages(Request $request)
    {
        $request->validate([
            "message" => "nullable",
            "student_id" => "required|integer",
        ]);

        $message = false;

        if ($request->id) {
            $message = Message::find($request->id)->first();
        }

        if (!$message) {
            $message = new Message();
        }

        $message->to_id = $request->student_id;
        $message->admin_id = $this->user->id;
        $message->student_id = $request->student_id;
        $message->from_id = $this->user->id;
        $message->type = "Admin";
        $message->message = $request->message;
        $message->save();
    }
}
