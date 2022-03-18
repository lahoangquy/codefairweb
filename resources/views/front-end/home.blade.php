@extends('layouts.master-v2')

@section('head')
    <style>
      .banner{
        background: url('/assets/images/bg-banner-home.jpg') center center no-repeat;
        background-size: cover;
        height: 491px;
      }

      .charles-logo{
        position: absolute;
        bottom: 0;
        right: 130px;
      }
        .charles-logo img{
          width: 375px
        }

        .gallery-item{
            display: flex;
            width: 250px;
            height:170px;
            align-items: center;
            margin: 0 1rem;
            position: relative;
        }
        .gallery-item img{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 0;
        }

        @media screen and (max-width: 768px) {
            .banner{height: auto; padding: 32px 0}

            .charles-logo{display: none}

            .gallery-item {
                width: auto;
                height: 192px;
            }
        }
    </style>
@endsection

@section('content')
    <section class="banner d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white" style="font-size: 32px; font-weight:500">Innovate with fun!</p>
                    <h1  class="text-white">IT CODE FAIR 2021</h1>
                    <p  class="text-white">DEMONSTRATE YOUR IT POTENTIALS</p>

                    <a href="{{ $settings->meta_key['register_url'] ?? '#' }}" class="mt-5 btn btn-warning btn-lg rounded-pill text-secondary font-weight-bold">
                    Register Now</a>
                </div>
            </div>
        </div>
    </section>

    <section class="introduction bg-white position-relative" style="padding: 80px 0">
        <div class="charles-logo"><img src="/assets/images/charles-darwin-logo.png" loading="lazy" alt=""></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <img src="/assets/images/1.png" loading="lazy" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-md-7">
                    <h2 class="text-primary mb-4">What is the IT Code Fair?</h2>
                    <p>
                        The CDU IT Code Fair is an annual event that was founded by the Department of Information Technology of the Charles Darwin University, Northern Territory and is sponsored by the Northern Territory Government and the local IT companies. The event was founded in 2017 to provide opportunities, to encourage and to advocate students’ talents showcasing their work more broadly to the University and industry communities. 
                        The Code Fair organises various competitions and real-time challenges for students to showcase their passion and skills to develop practical solutions. The event also includes a series of workshops for middle school and high school students, and university students as well as conducting speed dating for current and future graduates with the local IT industry.
                    </p>
                    <p class="mt-4"><a href="{{ route('about') }}" class="btn btn-primary rounded-pill btn-read-more">Read More</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="catelogs" style="padding: 80px 0;">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    <h2 class="text-primary">Our Highlights</h2>
                </div>
                <div class="col col-md-7">                   
                    @if ($highlightPosts->count())
                        @foreach ($highlightPosts as $post)
                            <a href="{{ route('event.detail', $post->slug) }}" class="categlogs-item d-flex">
                                <div class="icon flex-shrink-0 text-secondary rounded-circle">
                                    <i class="bi bi-chevron-right"></i>
                                </div>
                                <div class="catelogs-item__content flex-grow-1">
                                    <p class="item-title text-capitalize font-weight-bold">{{ $post->title }}</p>
                                    <p class="text-muted">{{ \Str::limit($post->short_intro, 100) }}</p>
                                </div>
                            </a>
                        @endforeach
                    @endif
                    <div class="categlogs-item d-flex">
                        <div class="icon flex-shrink-0 text-secondary rounded-circle">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                        <div class="catelogs-item__content flex-grow-1">
                            <p class="item-title text-capitalize font-weight-bold">And many more..</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hightlights" style="padding: 80px 0;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center text-primary mb-5">News & Events</h2>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="news-and-events owl-carousel owl-theme absolute-nav">
                      @if ($latestNews->count())
                        @each('front-end.posts.post-slide', $latestNews, 'post')
                      @endif  
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hightlights" style="padding: 80px 0;  background: rgb(212, 243, 255);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center text-primary mb-5">Photos / Videos</h2>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="popup-gallery photo-videos owl-carousel owl-theme absolute-nav">
                        @if ($photos->count())
                            @foreach ($photos as $photo)
                                <div class="gallery-item">
                                    @if ($photo->video)
                                        <a href="{{ $photo->video }}" class="image-popup mfp-iframe">
                                            <img src="{{ $photo->thumb }}" loading="lazy" class="card-img-top" alt="...">
                                        </a>
                                    @else
                                        <a href="{{ $photo->thumb }}" class="image-popup mfp-image">
                                            <img src="{{ $photo->thumb }}" loading="lazy" class="card-img-top" alt="...">
                                        </a>
                                    @endif  
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection