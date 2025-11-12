<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 0; }
        .header { background: #007bff; color: white; padding: 15px 20px; display: flex; justify-content: space-between; align-items: center; }
        .container { max-width: 800px; margin: 50px auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 20px; }
        .user-info { background: #e9ecef; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .logout-btn { background: #dc3545; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; }
        .logout-btn:hover { background: #c82333; }
    </style>
</head>
<body>
    <div class="header">
        <h2>لوحة التحكم</h2>
        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
            @csrf
            <button type="submit" class="logout-btn">تسجيل خروج</button>
        </form>
    </div>
    
    <div class="container">
        <h1>مرحباً {{ Auth::user()->name }}</h1>
        
        <div class="user-info">
            <h3>معلومات المستخدم:</h3>
            <p><strong>الاسم:</strong> {{ Auth::user()->name }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ Auth::user()->email }}</p>
            <p><strong>تاريخ التسجيل:</strong> {{ Auth::user()->created_at->format('Y-m-d') }}</p>
        </div>
        
        <p>تم تسجيل دخولك بنجاح! هذه هي لوحة التحكم الخاصة بك.</p>
    </div>
</body>
</html>