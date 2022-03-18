<footer>
  <div class="container">
      <div class="row">
          <div class="col-12 col-md-3">
              <div class="d-flex align-items-center justify-content-center justify-content-md-start" style="gap:16px">
                  <img src="/assets/images/charles-darwin-logo.png"width="95" alt="">
                  <img src="/assets/images/logo.png" alt="">
              </div>
          </div>
            <div class="col-12 col-md-9">
                <div class="position-relative border-top mt-5 mt-md-4">
                    <div class="social-icons">
                        <ul class="d-flex">
                            @if ($settings->meta_key['social_fb'])
                                <li class="facebook">
                                    <a href="{!! $settings->meta_key['social_fb'] !!}" target="_blank"><i
                                            class="bi bi-facebook"></i></a>
                                </li>
                            @endif
                            @if ($settings->meta_key['social_instagram'])
                                <li class="instagram">
                                    <a href="{!! $settings->meta_key['social_instagram'] !!}" target="_blank"><i
                                            class="bi bi-instagram"></i></a>
                                </li>
                            @endif
                            @if ($settings->meta_key['social_youtube'])
                                <li class="yt">
                                    <a href="{!! $settings->meta_key['social_youtube'] !!}" target="_blank"><i
                                            class="bi bi-youtube"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <ul class="d-flex flex-column justify-content-between flex-md-row mt-5 footer-links" style="gap: 16px;">
                    <li><a href="{{ route('industry') }}">Industry</a></li>
                    <li>
                        <a href="{{ route('secondary-school') }}">Secondary Schools</a>
                        @php
                            $cdus = $posts->whereIn('post_type', ['for-school']);
                        @endphp
                        <ul>
                            @foreach ($cdus as $p)
                                <li><a href="{{ $p->buildRoute() }}">{{ $p->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('higher-education') }}">Higher Education Institutes</a>
                        @php
                            $cdus = $posts->whereIn('post_type', ['competition', 'challenge'])->where('apply_to_object', 2);
                        @endphp
                        <ul>
                            @foreach ($cdus as $p)
                                <li><a href="{{ $p->buildRoute() }}">{{ $p->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('cdu.student') }}">CDU Students</a>
                        @php
                            $cdus = $posts->whereIn('post_type', ['competition', 'challenge'])->where('apply_to_object', 1);
                        @endphp
                        <ul>
                            @foreach ($cdus as $p)
                                <li><a href="{{ $p->buildRoute() }}">{{ $p->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                  </ul>
            </div>

      </div>
  </div>

  <hr style="border-color: white; margin: 42px 0">
  <p class="text-center" style="font-size: 14px">Copyright © CDU IT Code Fair {{ date('Y') }}. All Rights Reserved.</p>
</footer>