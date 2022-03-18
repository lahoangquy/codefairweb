@php
    $sponsors = \App\Sponsor::query()->active()->get();
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="keywords" content="It Code Fair - Innovate, Creative, Have Fun!" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{!! $pageTitle ?? $settings->meta_key['page_title'] !!}</title>
        <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="{{ mix('assets/css/app.css') }}?_h={{ time() }}" />
        <style>
            p{
                font-size: 16px;
            }
            .sponsors{
                margin-bottom: 45px;
            }
            .sponsors ul li{
                width: 90px;
                margin: 16px 24px;
            }
            .sponsors ul li img{max-width: 100%;}

            @media screen and (min-width: 992px) {
                .card-image{
                    height: 223px;
                    overflow: hidden;
                }

                .sponsors ul li {width: 120px;}
            }
        </style>
        @yield('head')
    </head>
    <body class="d-flex flex-column">
        {!! view('front-end.v2.nav') !!}

        <div class="flex-grow-1">
            @yield('content')

            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <hr class="mb-5">
                            <h2 class="text-center mb-5 text-primary">Thanks to Our Sponsors</h2>    
                        </div>
        
                        <div class="col-12">
                            @if ($sponsors->where('type', 'platinum')->count())
                                <div class="sponsors d-flex flex-column align-items-center">
                                    <h4>Platinum</h4>
                                    <ul class="d-flex flex-row flex-wrap justify-content-center align-items-center">
                                        @foreach ($sponsors->where('type', 'platinum') as $sponsor)
                                            <li><img src="{!! $sponsor->logo !!}" alt=""></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
        
                            @if ($sponsors->where('type', 'gold')->count())
                                <div class="sponsors d-flex flex-column  align-items-center">
                                    <h4>Gold</h4>
                                    <ul class="d-flex flex-row flex-wrap justify-content-center align-items-center">
                                        @foreach ($sponsors->where('type', 'silver') as $sponsor)
                                            <li><img src="{!! $sponsor->logo !!}" alt=""></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
        
                            @if ($sponsors->where('type', 'silver')->count())
                                <div class="sponsors d-flex flex-column  align-items-center">
                                    <h4>Silver</h4>
                                    <ul class="d-flex flex-row flex-wrap justify-content-center align-items-center">
                                        @foreach ($sponsors->where('type', 'silver') as $sponsor)
                                            <li><img src="{!! $sponsor->logo !!}" alt=""></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
        
                            @if ($sponsors->where('type', 'bronze')->count())
                                <div class="sponsors d-flex flex-column justify-content-center  align-items-center">
                                    <h4>Bronze</h4>
                                    <ul class="d-flex flex-row flex-wrap align-items-center">
                                        @foreach ($sponsors->where('type', 'bronze') as $sponsor)
                                            <li><img src="{!! $sponsor->logo !!}" alt=""></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>

        {!! view('front-end.partials.footer') !!}

        <script src="{{ mix('assets/js/app.js') }}?_h={{ time() }}"></script>
        <script src="{{ mix('assets/js/front-end.js') }}?_h={{ time() }}"></script>

        {!! view('front-end.partials.fb-chat-plugin')->render() !!}

        @yield('scripts')
    </body>
</html>
