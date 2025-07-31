<?php

namespace App\Http\Controllers;

use App\Models\SuggestionLog; // استيراد موديل تسجيل الاقتراحات
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    // دالة لتخزين الاقتراح
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'suggestion' => 'required|string',
        ]);

        // إنشاء سجل جديد للاقتراح في قاعدة البيانات
        SuggestionLog::create([
            'user_id' => auth()->id(), // يمكن استخدام auth()->id() لربط الاقتراح بالمستخدم إذا كان مسجل دخول
            'data' => json_encode($validated), // تخزين البيانات على شكل JSON
            'result' => json_encode([]), // يمكن تركه فارغًا أو تخزين بعض النتيجة هنا لاحقًا
        ]);

        // إرجاع المستخدم إلى صفحة النتيجة مع رسالة نجاح
        return redirect()->route('suggest.result')->with('message', 'تم إرسال اقتراحك بنجاح!');
    }
}

