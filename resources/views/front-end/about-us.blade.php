@extends('layouts.master-v2')

@section('head')
    <style>
        .fb-content h3, .fb-content h2{
            font-size: 24px;
        }
        #facts .item-boxes .icon{
            background-color: #fff;
        }
        #facts .item-boxes:hover .icon{
            background-color: #fff;
        }
        #facts .item-boxes:hover .icon i{
            color: #61d2b4;
        }
        #facts .item-boxes:hover .icon i{
            font-size: 22px !important;
        }
    </style>
@endsection

@section('content')
<section id="aboutus" class="section introduction">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="desc text-left">
                {!! $introduction->description ?? '' !!}
                </div>
            </div>
        </div>
    </div>
</section>

<div id="testimonials" class="section" data-stellar-background-ratio="0.1">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-white">
                CDU IT CodeFair on Social Media
            </h2>
            <hr class="lines"/>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators" style="bottom:-50px;">
                        <li data-target="#carouselExampleInterval" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleInterval" data-slide-to="1"></li>
                        <li data-target="#carouselExampleInterval" data-slide-to="2"></li>
                      </ol>
                    <div class="carousel-inner">
                        @if ($feedbacks->count() > 0)
                            @foreach ($feedbacks as $feedback)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-interval="10000">
                                <div class="row no-gutters">
                                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center bg-white" style="color: #333">
                                        <div class="p-4">
                                            <div class="fb-content">
                                                {!! $feedback->comment !!}
                                            </div>
                                            <div class="mt-5">
                                                <p class="mb-0 font-weight-bold">{{ ucwords(strtolower($feedback->name)) }}</p>
                                                <p class="text-muted">{{ $feedback->position }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <img src="{{ $feedback->avatar }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev" style="left:-105px; font-size:76px">
                        <i class="bi bi-chevron-compact-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next" style="right:-55px; font-size:76px">
                      <i class="bi bi-chevron-compact-right"></i> 
                      <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="team" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Our Team</h2>
            <hr class="lines" />
        </div>
        <div class="row">
            <div class="col-md-12">
                @if ($teams->count() > 0)
                    <div class="team-slider owl-carousel owl-theme">
                        @foreach ($teams as $team)                        
                                <div class="single-team">
                                    <img src="{{ $team->avatar }}" alt="{{ $team->name }}" />
                                    <div class="team-details">
                                        <div class="team-inner">
                                            <h4 class="team-title">{{ $team->name }}</h4>
                                            <p style="font-size: 14px;">{{ $team->position }}</p>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section id="facts" class="section" style="background: rgb(212, 243, 255);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">IT Code Fair Facts</h2>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s">
        </div>
        <div class="row">
            <div class="col-12 col-md-3 col-sm-6">
                <div class="card h-100">
                    <div class="card-img text-center"><img src="/assets/images/220.jpg" alt=""></div>
                    <div class="card-body">
                        <p>
                            Two hundreds and twenty entrants were <span class="text-secondary font-weight-bold">registered for all competition and challenges in 2020 CDU IT CodeFair</span>.
                            The profile of entrants is comprising of 52% Postgraduates and 48% of Undergraduates and VET
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 col-sm-6">
                <div class="card h-100">
                    <div class="card-img text-center"><img src="/assets/images/unknow.jpg" alt=""></div>
                    <div class="card-body">
                        <p>
                            CDU IT CodeFair is now linked to <span class="text-secondary font-weight-bold">NT Digital Excellence Awards.</span>
                            The Four Most Outstanding Entrants of the CDU IT CodeFair will join 2021 NT Digital Excellence Awards for
                            <span class="text-secondary font-weight-bold">The Overall Awards for Most Outstanding Entrant</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 col-sm-6">
                <div class="card h-100">
                    <div class="card-img text-center"><img src="/assets/images/10x.jpg" alt=""></div>
                    <div class="card-body">
                        <p>
                            The year <span class="text-secondary font-weight-bold">2020 entrants outgrew the number six years ago by 10 times.</span>
                            We are moving forward in IT Education and training in response to NT's Digital Territory Stragegy
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 col-sm-6">
                <div class="card h-100">
                    <div class="card-img text-center"><img src="/assets/images/200.jpg" alt=""></div>
                    <div class="card-body">
                        <p>
                            At least <span class="text-secondary font-weight-bold">two hundreds participants from both universities, government and IT industry</span>
                            are expected to be present at the event
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop