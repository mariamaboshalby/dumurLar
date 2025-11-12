<nav class="navbar navbar-expand-lg rounded-pill">
    <div class="container">
        <a class="navbar-brand logo" href="{{ route('home') }}">Dumur</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#about-section">{{ __('messages.about') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#features-section">{{ __('messages.features') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="#">{{ __('messages.usage') }}</a></li>

                <li class="nav-item dropdown rounded-pill">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="{{ url('lang/ar') }}"><i class="fas fa-language"></i> العربية</a></li>
                        <li><a class="dropdown-item" href="{{ url('lang/en')}}"><i class="fas fa-globe"></i> English</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="btn login-btn rounded-pill" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>