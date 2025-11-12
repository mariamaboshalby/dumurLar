@extends('layouts.app')

@section('title', __('messages.login'))

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<div class="auth-container">
    <div class="form-container">
        <h2 class="auth-title">{{ __('messages.login') }}</h2>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label class="auth-label">{{ __('messages.email') }}</label>
            <input type="email" name="email" class="auth-input" placeholder="example@gmail.com" value="{{ old('email') }}" required>
            <label class="auth-label">{{ __('messages.password') }}</label>
            <input type="password" name="password" class="auth-input" required>
            <button class="auth-btn login-btn" type="submit">{{ __('messages.login') }}</button>
        </form>
        <div class="auth-link">
            {{ __('messages.no_account') }} <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
        </div>
    </div>
    <div class="image-container">
        <img src="{{ asset('imgs/about.png') }}" alt="Login Image">
    </div>
</div>
@endsection