<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo">
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
                <a class="nav-link page-scroll" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="{{ route('event') }}">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="{{ route('challenge') }}">Challenges</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="{{ route('competition') }}">Competitions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="{{ route('gallery') }}">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="{{ route('resource') }}">Resources</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="{{ route('about') }}">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="https://theterritory.com.au/study" target="_blank">About NT</a>
            </li>
            </ul>
       </div>
    </div>

    <ul class="mobile-menu">
        <li>
            <a class="page-scroll" href="/">Home</a>
        </li>
        <li>
            <a class="page-scroll" href="{{ route('event') }}">Events</a>
        </li>
        <li>
            <a class="page-scroll" href="{{ route('challenge') }}">Challenges</a>
        </li>
        <li>
            <a class="page-scroll" href="{{ route('competition') }}">Competitions</a>
        </li>
        <li>
            <a class="page-scroll" href="{{ route('about') }}">About Us</a>
        </li>
        <li>
            <a class="page-scroll" href="{{ route('gallery') }}">Gallery</a>
        </li>
        <li>
            <a class="page-scroll" href="{{ route('resource') }}">Gallery</a>
        </li>
    </ul>
</nav>