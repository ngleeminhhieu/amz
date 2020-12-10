<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\news;
use App\Models\Product;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    var $lang = ["vi", "en"];
    public function changeLanguage($lang = 'en')
    {
        if (in_array($lang, $this->lang)) {
            session(['language' => $lang]);
            \App::setLocale(session('language'));
        }
        return redirect()->back();
    }

    public function test()
    {
        $pro = Product::where('id', 1)->first();
        //session(['language' => 'vi']);
        //dd(session('language'));
        //dd($pro->hasTranslation('vi'));
        //echo (session('language'));
        //dd($pro->product_name);
        //dd(\App::getLocale());
        //dd(\App::getLocale());
        //dd($langnew);
        $data =
            [
                'product' => $pro
            ];
        return view('frontend.system.test', $data);
    }
}