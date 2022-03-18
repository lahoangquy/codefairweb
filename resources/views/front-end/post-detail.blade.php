@extends('layouts.master-v2', ['pageTitle' => $pageTitle])

@section('head')
    <style>
      .post-detail img{
          margin: 16px 0;
          width: 100% !important;
          max-width: 100% !important;
      }
      .post-detail iframe{
          max-width: 100%;
      }

      .post-detail blockquote{
        margin: 0 0 1rem;
        font-style: italic;
        color: #555555;
        padding: 1.2em 30px 1.2em 22px;
        border-left: 5px solid red;
        line-height: 1.6;
        position: relative;
        background: #EDEDED
      }

      .post-detail h1,
      .post-detail h2,
      .post-detail h3,
      .post-detail blockquote h1, .post-detail blockquote h2, .post-detail blockquote h3{
        font-size: 18px !important;
        font-weight: 500;
        letter-spacing: normal;
      }
    .post-detail h1 {
        font-size: 28px !important;
    }
    .post-detail ol li{
        margin-bottom: 8px;
    }

    .post-detail ol ul{
        margin-left: 16px;
    }
    .post-detail ul{margin-left: 2.5rem;}
    .post-detail ul li{
        margin: 8px 0;
        list-style: disc;
        font-size: 16px;
    }

    @media screen and (max-width: 768px) {
        .cta .display-4{
            font-size: 28px !important;
        }
    }
    </style>
@endsection

@section('content')
    <section id="events" class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-capitalize mb-4" style="font-size: 32px;">{{ $post->title }}</h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 col-md-8">
                    <div class="post-detail">
                        {!! $post->description !!}
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="position-sticky" style="top: 16px;">
                        <div class="card text-center" style="background-color: #D3F5FF">
                            <div class="card-body">
                            <h4 class="card-title text-primary font-weight-bold mb-0">Be a part of this event</h4>
                            <p class="card-text">Register now for this great event</p>
                            <a href="{{ $settings->meta_key['register_url'] ?? '#' }}" class="btn btn-primary rounded-pill">Register Now</a>
                            </div>
                        </div>

                        @if ($relatedPosts->count())
                            <div class="card mt-4" style="background: #D3F5FF">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">Related Articles</h5>
                                    <hr>
                                    <ul class="mt-4">
                                        @foreach ($relatedPosts as $post)
                                            <li class="{{ !$loop->last ? 'mb-4' : '' }}">
                                                <a 
                                                    class="text-primary" 
                                                    href="{{ $post->buildRoute() }}">
                                                    <h6 class="font-weight-normal">{{ ucwords($post->title) }}</h6>
                                                    <span class="text-muted" style="font-size: 14px">{{ \Str::limit($post->short_intro, 50) }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection