<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    //
}
=======
use App\Models\SuggestionLog; // استيراد موديل تسجيل الاقتراحات
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    public function create()
    {
        return view('suggest.form');
    }

    public function store(Request $request)
    {
        // افترضي نطبع البيانات فقط مؤقتًا
        $data = $request->all();
        return view('suggest.result', compact('data'));
    }

    public function result()
    {
        return view('suggest.result');
    }
}


>>>>>>> e80a85e91ffad3608c15fdcb1ee44c0e4ce02437
