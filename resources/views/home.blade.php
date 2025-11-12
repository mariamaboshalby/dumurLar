@extends('layouts.app')

@section('title', 'Dumur - ' . __('messages.home'))

@section('content')
<div class="row justify-content-center">
    <x-navbar />
</div>



<!-- Hero Section -->
<section class="hero text-center">
    <div class="container">
        <h1 class="title">Du<span>m</span>ur</h1>
        <p class="subtitle">{{ __('messages.title') }}</p>
    </div>
</section>

<!-- About Section -->
<section class="about-section text-center m-3" id="about-section">
    <h2 style="font-size:45px; color:#03697E; font-weight:bolder;">{{ __('messages.about_us') }}</h2>
    <div class="row justify-content-evenly align-items-center">
        <p class="col-md-5">
            {{ __('messages.about_us_p') }}
        </p>
        <img src="{{ asset('imgs/about.png') }}" class="col-md-3" alt="About Dumur">
    </div>
</section>

<!-- Features Section -->
<section class="features-section text-center" id="features-section">
    <h2 style="font-size:45px; color:#03697E; font-weight:bolder;">{{ __('messages.features_title') }}</h2>
    <div class="container">
        <div class="row justify-content-evenly align-items-center m-5">
            <div class="col-md-3 feature-box feature1">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <h4>{{ __('messages.donate') }}</h4>
                <p>{{ __('messages.donate_p') }}</p>
            </div>
            <div class="col-md-3 feature-box feature2">
                <i class="fas fa-book"></i>
                <h4>{{ __('messages.awareness') }}</h4>
                <p>{{ __('messages.awareness_p') }}</p>
            </div>
            <div class="col-md-3 feature-box feature3">
                <i class="fa-solid fa-award"></i>
                <h4>{{ __('messages.trust') }}</h4>
                <p>{{ __('messages.trust_p') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Tips Section -->
<section class="tips-section container-fluid">
    <h2 class="text-center text-light" style="font-size:45px; color:#03697E; font-weight:bolder;">
        {{ __('messages.tips') }}
    </h2>
    <p class="text-center text-secondary" style="font-size:20px;">
        {{ __('messages.tips_p') }}
    </p>

    <ul class="accordion">
        @foreach([
        'cal' => 'cal_body',
        'D' => 'D_body',
        'sport' => 'sport_body',
        'smoke' => 'smoke_body',
        'weight' => 'weight_body',
        'protain' => 'protain_body',
        'caffien' => 'caffien_body'
        ] as $key => $body)
        <li class="accordion-item">
            <button class="accor-btn" data-target="#tip_{{ $key }}">
                <span>{{ __('messages.' . $key) }}</span>
                <i class="fa-solid fa-caret-down"></i>
            </button>
            <div id="tip_{{ $key }}" class="accordion-collapse {{ $loop->first ? 'show' : '' }}">
                <div class="accordion-body">
                    {{ __('messages.' . $body) }}
                </div>
            </div>
        </li>
        @endforeach
    </ul>

    <script src="{{ asset('js/accordion.js') }}"></script>
</section>

<!-- Comments Section -->
<section class="comments-section m-5 text-center">
    <h2 style="font-size:45px; color:#03697E; font-weight:bolder;">{{ __('messages.comments') }}</h2>

    <div class="row justify-content-around align-items-center mt-5">
        <!-- Comment Form -->
        <form method="POST" action="{{ route('comments.store') }}" class="col-md-6 bg-light p-4 rounded shadow">
            @csrf
            <div class="mb-3">
                <textarea name="msg" id="comment" class="form-control" placeholder="{{ __('messages.comments') }}"
                    cols="30" rows="6" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">{{ __('messages.send') }}</button>
        </form>

        <img src="{{ asset('imgs/comment.png') }}" alt="support" class="col-md-4 rounded shadow-sm">
    </div>

    @if(session('success'))
    <div class="alert alert-success mt-4">{{ session('success') }}</div>
    @endif
</section>

@endsection