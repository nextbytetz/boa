<?php

namespace App\Traits;
use App\Models\Course;

use App\Models\Product;

use App\Models\Registration;
use Illuminate\Http\Request;

trait AddToCart {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function addItemsToCart($id, Request $request)
    {
        $request->validate([
            "type" => "required|in:course,ebook,registration",
        ]);

        $cart = session()->get("cart");
        if (!$cart) {
            $cart = [];
        }
        
        if ($request->query("type") == "course") {
            $course = Course::find($id);
            $cart["course"][$id] = $course;
            session()->put("cart", $cart);
        } elseif($request->query("type") == "ebook") {
            $ebook = Product::find($id);
            $cart["ebook"][$id] = $ebook;
            session()->put("cart", $cart);
        }elseif($request->query("type") == "registration"){
            $registration = Registration::find($id);
            $cart["registration"][$id] = $registration;
            session()->put("cart", $cart);
        }


   
    }

}