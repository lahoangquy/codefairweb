@extends('layouts.master-v2', ['pageTitle' => $pageTitle])

@php
$bgBanner = $bgBanner ?? '/assets/images/bg-banner-category.jpg';
@endphp

@section('head')
    <style>
        .banner{
            background: url({{ $bgBanner }}) center center no-repeat;
            background-size: cover;
            height: {{ $bannerHeight ?? 255 }}px;
        }
        .headline{
            font-size: 45px; font-weight:500
        }

        .subline{
            font-size: 28px;
        }

        @media screen and (max-width: 768px) {
            .banner{height: auto; padding: 32px 0}
        }
    </style>
@endsection

@php 
    $route = \Route::current()->uri();
    $competitions = $posts->where('post_type', 'competition');
    $challenges = $posts->where('post_type', 'challenge');
@endphp

@section('content')
    <section class="banner d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col text-white">
                    <h1 class="headline">{{ $pageTitle }}</h1>
                    @if (isset($subline))
                        <p class="subline text-capitalize">{{ $subline }}</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            @if (isset($page) && $page === 'cdu-student')
                <div class="row">
                    <div class="col-12">
                        <h1 class="mb-4 text-primary">About CDU IT CodeFair</h1> 
                        <p>
                            The Northern Territory Government (NTG) has been preparing the community for
                            digital transformation since 2014. Supporting this direction, Information Technology
                            faculty at Charles Darwin University (CDU) initiated a forum for students to share and
                            applied their IT knowledge and skills in solving real-world problems. Held annually, the
                            ‘CDU IT Code Fair’ provides a platform to connect and showcase talented students to
                            industry.
                        </p>
                        <p>
                            The 2020 event brought together local government, ICT companies and
                            students, both within and outside the NT, through the, ‘Business Innovation Challenge’,
                            ‘Cyber Security Challenge’, ‘IT Innovation Challenge’, ‘Digital Territory Challenge’,
                            ‘Coding Competition’, ‘Poster Competition’ and ‘Employer Speed Dating’.  
                            Starting in 2019, CDU IT CodeFair has been a part of the NT Digital Excellence Award
                            (link to NT Digital Excellence) where Outstanding Entrants are nominated for the
                            Overall Outstanding Award for the CDU IT CodeFair.
                        </p>
                    </div>
                </div>
                <hr style="margin: 80px 0">
                <h3 class="text-primary" style="font-size: 24px; margin-bottom:32px">Competitions</h3>
                <div class="row row-cols-1 row-cols-md-3 mb-5">
                    @each('front-end.posts.each', $competitions, 'post', 'front-end.posts.no-data-available')
                </div>

                <h3 class="mt-5 text-primary" style="font-size: 24px; margin-bottom:32px">Challenges</h3>
                <div class="row row-cols-1 row-cols-md-3 mb-5">
                    @each('front-end.posts.each', $challenges, 'post', 'front-end.posts.no-data-available')
                </div>
                
            @else    
                <div class="row row-cols-1 row-cols-md-3 mb-5">
                    @each('front-end.posts.each', $posts, 'post', 'front-end.posts.no-data-available')
                </div>
            @endif

        </div>
    </section>
@endsection