@extends('layouts.master', ['pageTitle' => 'Resources | IT Code Fair'])

@section('head')
<style>
    .resource{}
    .resource h5{
        font-size: 22px;
        position: relative;
        font-weight: 400 !important;
    }
    .resource hr{
        margin: 0 0 2rem 0;
        width: 150px;
        border: 1px solid var(--primary-color);
    }

    .resource li{
        margin-top: 8px;
    }
</style>
@endsection

@section('content')
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Resources</h2>
            <hr class="lines wow zoomIn" data-wow-delay="0.3s" />
            <p class="section-subtitle">
                Not sure how to start? Here are some kickstarter tutorials that will be helpful...
            </p>
        </div>

        <div class="row">
            @foreach ($topics as $topic)
                @if ($topic->resources_count > 0)
                    <div class="col-sm-6">
                        <div class="resource mb-5">
                            <h5>{{ $topic->name }}</h5>
                            <hr>
                            <ul>
                                @foreach ($topic->resources as $resource)
                                <li>
                                    <a href="{{ $resource->link }}" target="_blank">
                                        <i class="bi bi-arrow-right"></i> {{ $resource->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
@stop