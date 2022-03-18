@extends('layouts.master-v2', ['pageTitle' => 'Gallery | IT Code Fair'])

@section('head')
    <style>
        .absolute-center{
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .gallery-name{
            position: absolute;
            background-color: #8a2be2b3;
            color: #fff;
            padding: 8px 25px;
            transform: rotate(-45deg);
            top: 22px;
            width: 180px;
            left: -51px;
            text-align: center;
        }

        .shot-item{
            height: 215px;
            overflow: hidden;
        }
        .shot-item .btn {
            font-size: 12px;
            padding: 5px 16px;
        }
    </style>
@endsection

@section('content')
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Gallery</h2>
            <hr class="lines"/>
            <p class="section-subtitle">Code Fair Awesome Moments</p>
        </div>
      
        <div class="row justify-content-md-center" id="porfolio">
            @foreach ($galleries as $gallery)
            <div class="mix col-12 col-md-4 col-sm-2">
                <div class="portfolio-item mt-5" style="overflow: hidden">
                    <div class="shot-item position-relative">
                        <div class="gallery-name">{{ $gallery->name }}</div>
                        <img src="{{ $gallery->thumbnail }}" class="img-fluid" loading="lazy" alt="" />
                        <a class="position-absolute absolute-center btn btn-success btn-sm rounded-pill" href="{{ $gallery->linkSource }}" target="_blank">
                            View All <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop