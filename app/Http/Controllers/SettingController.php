<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;

use App\Models\Student;
use App\Models\Workspace;
use Doctrine\Inflector\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends BaseController
{
    public function settings()
    {
        $workspace = Workspace::find($this->user->workspace_id);

        return \view("settings.settings", [
            "selected_navigation" => "settings",
            "workspace" => $workspace,
            "landingpage" => "nullable",
        ]);
    }

    public function settingsPost(Request $request)
    {
        $request->validate([
            "logo" => "nullable|file|mimes:jpg,png",
            "currency" => "nullable|string|size:3",
        ]);

        $workspace = Workspace::find($this->user->workspace_id);

        //        $workspace->name = $request->workspace_name;
        $workspace->save();

        Setting::updateSettings(
            $this->workspace->id,
            "currency",
            $request->currency
        );
        Setting::updateSettings(
            $this->workspace->id,
            "landingpage",
            $request->landingpage
        );

        if ($request->logo) {
            $path = $request->file("logo")->store("media", "uploads");
            Setting::updateSettings($this->workspace->id, "logo", $path);
        }

        if ($this->user->super_admin) {
            $free_trial_days = $request->free_trial_days ?? 0;
            Setting::updateSettings(
                $this->workspace->id,
                "free_trial_days",
                $free_trial_days
            );
            return redirect("/admin-setting");
        }

        return redirect("/settings");
    }
}
