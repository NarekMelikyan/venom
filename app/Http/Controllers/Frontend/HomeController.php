<?php

namespace App\Http\Controllers\Frontend;

use App\Categories;
use App\Http\Controllers\Controller;
use App\Messages;
use App\Subcategories;
use App\User;
use App\Venom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function index()
    {
        return view('Frontend.app');
    }

    public function loginPage()
    {
        return view('Frontend.login');
    }

    public function contactUs()
    {
        return view('Frontend.contact-us');
    }

    public function venomCategories(Request $request)
    {
        $lang = $request->get('language');
        $categories = Categories::whereHas(['translations', function ($q) {
            $q->where('lang', '=', 'en');
        }])->get();
        return response()->json(['categories' => $categories], 200);
//        return view('Frontend.categories', compact('categories'));
    }

    public function subcategories($id)
    {
        $categoryImage = Categories::where('id', $id)->first()->image;
        $subcategories = Subcategories::with('translation', 'venom')->where('category_id', $id)->get();
        return response()->json(['categoryImage' => $categoryImage, 'subcategories' => $subcategories], 200);
//        return view('Frontend.subcategories', compact('categoryImage', 'subcategories'));
    }

    public function venom($id)
    {
        $venom = Venom::with('translation')->where('id', $id)->first();
        return response()->json(['venom' => $venom], 200);
    }

    public function changeLocale(Request $request)
    {
        $lang = $request->get('lang');
        if ($lang == "AM") {
            $local = 'hy';
        }
        if ($lang == "RU") {
            $local = "ru";
        }
        if ($lang == "US") {
            $local = 'en';
        }

        Session::put('locale', $local);

        return response()->json(['success' => 'locale changed'], 200);
    }

    public function sendMessage(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'company' => $request->get('company'),
            'message' => $request->get('message')
        ];

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'message' => 'required|max:191',
        ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
            return redirect()->back()->with($validator->errors());
        }

        $message = Messages::create($data);
        return response()->json(['message' => $message], 201);
    }

}
