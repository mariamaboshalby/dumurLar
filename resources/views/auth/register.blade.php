@extends('layouts.app')

@section('title', __('messages.register'))

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<div class="auth-container">
    <div class="form-container">
        <h2 class="auth-title">{{ __('messages.register') }}</h2>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label class="auth-label">{{ __('messages.name') }}</label>
            <input type="text" name="name" class="auth-input" value="{{ old('name') }}" required>
            <label class="auth-label">{{ __('messages.email') }}</label>
            <input type="email" name="email" class="auth-input" placeholder="example@gmail.com" value="{{ old('email') }}" required>
            <label class="auth-label">{{ __('messages.password') }}</label>
            <input type="password" name="password" class="auth-input" required>
            <label class="auth-label">{{ __('messages.confirm_password') }}</label>
            <input type="password" name="password_confirmation" class="auth-input" required>
            <button class="auth-btn register-btn" type="submit">{{ __('messages.register') }}</button>
        </form>
        <div class="auth-link">
            {{ __('messages.have_account') }} <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
        </div>
    </div>
    <div class="image-container">
        <img src="{{ asset('imgs/about.png') }}" alt="Register Image">
    </div>
</div>
@endsection