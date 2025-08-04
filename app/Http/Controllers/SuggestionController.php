<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//use App\Models\SuggestionLog;

class SuggestionController extends Controller
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
