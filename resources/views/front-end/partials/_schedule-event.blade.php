<div
    class="section"
    style="background-color: #ff7675; border-radius: 0"
    >
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 text-white d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div>
                    <h5 class="display-4" style="font-size: 22px">{{ $event->name }}</h5>
                    <h3 class="display-5" style="font-size: 26px">on {{ date('M j, Y', strtotime($event->start_on)) }}</h3>
                </div>
                <button
                    class="btn btn-common btn-primary btn-lg mt-4"
                    style="background: var(--secondary-color)"
                    data-toggle="modal"
                    data-target="#event-timeline"
                >
                    Click to View Timeline
                </button>
            </div>
        </div>
    </div>
</div>

 <!-- Modal -->
 <div
 class="modal fade"
 id="event-timeline"
 tabindex="-1"
 role="dialog"
 aria-labelledby="modelTitleId"
 aria-hidden="true"
 style="z-index: 999999"
>
 <div class="modal-dialog modal-lg" role="document">
   <div class="modal-content modal-center">
     <div class="modal-header">
       <h5 class="modal-title" style="font-size: 24px">{{ $event->name }}</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
    <div class="modal-body">
        <div class="container-fluid">
            @if ($event->schedule)
            @foreach ($event->schedule as $key => $item)
                <div class="row" style="{{ !$loop->last ? 'border-bottom: 1px solid #f2f2f2;
                    margin-bottom: 16px;' : '' }}">
                    <div class="col-md-4">
                        <div class="timeline-item">
                        <i class="bi bi-clock"></i>
                        <span class="hour">{{ $item['time'] }}</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <p>{{ $item['job'] }}</p>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
   </div>
 </div>
</div>