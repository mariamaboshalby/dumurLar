<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // أولاً جرب قراءة اللغة من الجلسة، ثم من الكوكيز، وأخيراً اللغة الافتراضية
        $locale = Session::get('locale') 
                 ?? $request->cookie('locale') 
                 ?? config('app.locale');
        
        // تأكد أن اللغة مدعومة
        if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        }
        
        return $next($request);
    }
}