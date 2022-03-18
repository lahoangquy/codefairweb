<div class="counters section" data-stellar-background-ratio="0.5">
    <div style="position: absolute; background-color: #586763d6; width: 100%; height: 100%; z-index: 0; top: 0"></div>
    <div class="container">
      <div class="section-header position-relative">
        <h2 class="section-title text-white">Are you ready for the code fair?</h2>
        <hr class="lines" />
        <p class="section-subtitle text-white">CDU CodeFair will start in…</p>
      </div>
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="row">
            <div class="col-3 col-md-3">
              <div class="facts-item">
                <div class="fact-count">
                  <h3><span class="counter" id="counter-day">00</span></h3>
                  <h4>Days</h4>
                </div>
              </div>
            </div>
            <div class="col-3 col-md-3">
              <div class="facts-item">
                <div class="fact-count">
                  <h3><span class="counter" id="counter-hour">00</span></h3>
                  <h4>Hours</h4>
                </div>
              </div>
            </div>
            <div class="col-3 col-md-3">
              <div class="facts-item">
                <div class="fact-count">
                  <h3><span class="counter" id="counter-minute">00</span></h3>
                  <h4>Minutes</h4>
                </div>
              </div>
            </div>
            <div class="col-3 col-md-3">
              <div class="facts-item">
                <div class="fact-count">
                  <h3><span class="counter" id="counter-second">00</span></h3>
                  <h4>Seconds</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mx-auto text-center mt-5">
        <a
          href="#"
          class="btn btn-common wow fadeInUp"
          rel="nofollow"
          data-wow-duration="1000ms"
          data-wow-delay="400ms"
          >JOIN NOW</a
        >
      </div>
    </div>
  </div>

  <script>
    function makeTimer() {
      const endDate = @json($specificEvent->start_on);
      var endTime = new Date(endDate);			
        endTime = (Date.parse(endTime) / 1000);
  
        var now = new Date();
        now = (Date.parse(now) / 1000);
  
        var timeLeft = endTime - now;
  
        var days = Math.floor(timeLeft / 86400); 
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
  
        if (hours < "10") { hours = "0" + hours; }
        if (minutes < "10") { minutes = "0" + minutes; }
        if (seconds < "10") { seconds = "0" + seconds; }
  
        document.getElementById('counter-day').innerText = days;	
        document.getElementById('counter-hour').innerText = hours;	
        document.getElementById('counter-minute').innerText = minutes;	
        document.getElementById('counter-second').innerText = seconds;	
    }
  
    setInterval(function() { makeTimer(); }, 1000);
  </script>