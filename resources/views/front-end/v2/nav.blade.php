@php $route = \Route::current()->uri(); @endphp
<nav class="navbar navbar-expand-lg scrolling-navbar nav-light bg-white shadow-sm">
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="navbar-brand"><img class="img-fulid" src="/assets/images/logo.png" alt="" /></a>
            <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#main-navbar"
            aria-controls="main-navbar"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <i class="lnr lnr-menu"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
                <li class="nav-item">
                    <a class="nav-link {{ $route === '/' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $route === 'industry' ? 'active' : '' }}" href="{{ route('industry') }}">Industry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ \Str::contains($route, 'secondary-school') ? 'active' : '' }}" href="{{ route('secondary-school') }}">Secondary Schools</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $route === 'higher-education-institues' ? 'active' : '' }}" href="{{ route('higher-education') }}">Higher Education Institutes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ \Str::contains($route, 'cdu-student') ? 'active' : '' }}" href="{{ route('cdu.student') }}">CDU Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $route === 'about-us' ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $route === 'gallery' ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a>
                </li>
            </ul>
       </div>
    </div>

    <ul class="mobile-menu">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="{{ route('industry') }}">Industry</a>
        </li>
        <li>
            <a href="{{ route('secondary-school') }}">Secondary Schools</a>
        </li>
        <li>
            <a href="{{ route('higher-education') }}">Higher Education Institues</a>
        </li>
        <li>
            <a href="{{ route('cdu.student') }}">CDU Students</a>
        </li>
        <li>
            <a href="{{ route('about') }}">About Us</a>
        </li>
        <li>
            <a href="{{ route('gallery') }}">Gallery</a>
        </li>
    </ul>
</nav>