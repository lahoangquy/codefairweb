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
        .list-disc{margin-left: 1.2rem;}
        .list-disc li{
            list-style: disc;
            margin: .5rem 0;
            font-size: 16px;
        }

        .nav-pills .nav-link {
            border-radius: 0;
            padding: 16px 24px;
            font-size: 18px;
        }

        @media screen and (max-width: 768px) {
            .banner{height: auto; padding: 32px 0}
            .nav-pills .nav-link {
                padding: 12px 14px;
            }
        }
    </style>
@endsection

@php 
    $route = \Route::current()->uri();
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
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="nav flex-md-column mb-4 flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-sponsorship" role="tab" aria-controls="v-sponsorship" aria-selected="true">Sponsorship</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-judge" role="tab" aria-controls="v-judge" aria-selected="false">Judge</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-speed-dating" role="tab" aria-controls="v-speed-dating" aria-selected="false">Speed Dating</a>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-sponsorship" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <h2 class="mb-4">Sponsorship</h2>
                            <div>
                                <p>
                                    IT Code Fair is a prestigious event held by Charles Darwin University (CDU) that aims to provide an opportunity to encourage and advocate students' talents, showcasing their dedication more broadly on an industrial level.
                                </p>
                                <p>In 2020, CDU IT Code Fair was awarded for “Outstanding Contributions to Student Learning” from Australian Awards for University Teaching.</p>
                                <p>
                                    The IT Code Fair has been a great success for over 6 years and is continuing to attract several IT students and employers, not only across NT but also interstate.
                                </p>
                                <p>Our sponsors play a crucial role in making this event a success as they enable us to conduct this event on a large scale, ensuring maximum participation while targeting a wider audience.</p>
                                <p>As a sponsor, we would be using your company logo for all our marketing promotions pertaining to the event.</p>
                                <p>
                                    To become one of our valuable sponsors for this event which will be held on December 2nd at Hilton DoubleTree in Esplanade, please express your interest by writing to us at <a href="mailto:itcodefair@cdu.edu.au">itcodefair@cdu.edu.au</a>
                                </p> 
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-judge" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <h2 class="mb-4">Judge</h2>
                            <p>
                                Share your professional expertise and impeccable knowledge to play a crucial part in assessing some of the unique and innovative IT projects from our next generation of IT researchers. 
                            </p>
                            <p>You would be able to discuss the proposed projects with the students in detail and critically analyze their work, which could be a possible requirement for your business.</p>

                            <p class="font-weight-bold">
                                This year we have many challenges and competitions to judge:
                            </p>
                            <ul class="list-disc">
                                <li>
                                    <strong>Business Innovation Challenge:</strong> Most innovative business solution, solving a real-life problem to meet local business needs with efficiency and effectiveness.
                                </li>
                                <li>
                                    <strong>Cyber Security Challenge:</strong> Capturing highest number of flags through critical problem-solving and technical skills by exploiting weaknesses in the host machines, all in a virtual simulated environment!
                                </li>
                                <li><strong>Coding Competition:</strong> Unique and creative software applications developed that target real-life issues faced by businesses and organizations, based on different coding experience levels.</li>
                                <li><strong>Poster Competition:</strong> The poster that best communicates a project through both its visuals and written representation of ideas with just a glimpse!</li>
                                <li><strong>Data Science Challenge: ?</strong></li>
                                <li><strong>IT Innovation Challenge:</strong> Innovative ideas that contribute towards a better digital future that is secure, reliable, and efficient.</li>
                                <li><strong>Digital Territory Challenge:</strong> Interstate students would compete while showcasing their projects, skills, and ideas to make the Territory more digital.</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="v-speed-dating" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <h2 class="mb-4">Speed Dating</h2>
                            <p>Every year, the Employer Speed Dating at CDU’s IT Code Fair attracts several employers across NT and interstate as provides a platform for the local industry to connect with CDU’s IT graduating students.</p>
                            <p>Studying IT at CDU exposes students to an interactive learning environment while using state-of-the-art technologies and methodologies making them industry ready. </p>
                            <p>With the Employer Speed Dating, you would receive a 5 minutes interview with 20-25 shortlisted IT graduating students.</p>
                            <p>We encourage your organization to participate in it as it would help you find a potential employee(/s) that suits your business requirements. 
                                You would also be receiving one page CV for each of them, which you can later refer to for employment purposes.</p>
                            <p>Additionally, a station will be allotted to you to showcase your organization, which could accommodate up to 2 pull-up banners</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection