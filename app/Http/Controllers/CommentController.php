<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // حفظ تعليق جديد
    public function store(Request $request)
    {
        // ✅ التحقق من صحة البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        // ✅ حفظ التعليق في قاعدة البيانات
        Comment::create($validated);

        // ✅ بعد الحفظ، رجّعي المستخدم برسالة نجاح
        return redirect()->back()->with('success', 'تم إرسال تعليقك بنجاح 🎉');
    }
}
