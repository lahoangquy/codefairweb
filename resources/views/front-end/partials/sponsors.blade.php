<section class="section">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Special thanks to sponsors</h2>
        <hr class="lines" />
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="sponsor-slider owl-carousel owl-theme">
            @foreach ($sponsors as $sponsor)
                <div class="sponsor-item">
                <img src="{{ $sponsor->logo }}" alt="" />
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>