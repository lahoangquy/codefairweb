@extends('layouts.master-v2', ['pageTitle' => $pageTitle ?? 'Coming Soon'])

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
    .post-detail ol li, ul li{
        margin-bottom: 8px;
    }

    .post-detail ol ul{
        margin-left: 16px;;
    }
    .post-detail ol ul li{
        list-style: disc;
    }

    @media screen and (max-width: 768px) {
        .cta .display-4{
            font-size: 28px !important;
        }
    }
    </style>
@endsection

@section('content')
    <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-capitalize mb-4" style="font-size: 32px;">Coming Soon!</h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <p>Coming soon...</p>
                </div>
            </div>
        </div>
    </section>
@endsection