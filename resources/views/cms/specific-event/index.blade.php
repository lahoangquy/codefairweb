@extends('layouts.app')

@section('head')
<!-- daterange picker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css" integrity="sha512-cOGz9gyEibwgs1MVDCcfmQv6mPyUkfvrV9TsRbTuOA12SQnLzBROihf6/jK57u0YxzlxosBFunSt4V75K6azMw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('page_header')
    Specific Event
@stop

@section('content')
    <div class="container">
        <form action="{{ route('cms.specific-event.update', [$event->id]) }}" method="post">
            @method('PUT')
            @csrf

            <div class="row">
                <!-- Site Info -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Event Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Event Name:</label>
                                        <input type="text" value="{{ $event->name }}" name="name" class="form-control">
                                        @error('name')
                                        <small class="form-text text-muted text-warning">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Start On:</label>
                                            <input type="date" value="{{ $event->start_on }}" name="start_on" 
                                            id="start_on" class="form-control">
                                        @error('start_on')
                                        <small class="form-text text-muted text-warning">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label>Schedule:</label>
                                <div id="schedule">
                                    @if ($event->schedule)
                                        @foreach ($event->schedule as $key => $item)
                                        <div class="form-group item">
                                            <div class="row">
                                                <div class="col-4">
                                                    <input 
                                                        type="text" 
                                                        value="{{ $item['time'] }}" 
                                                        name="schedule[{{ $key }}][time]"
                                                        class="form-control">
                                                </div>
                                                <div class="col-8">
                                                    <input 
                                                        type="text" 
                                                        value="{{ $item['job'] }}" 
                                                        name="schedule[{{ $key }}][job]"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <div class="form-group item">
                                            <div class="row">
                                                <div class="col-4">
                                                    <input 
                                                        type="text" 
                                                        value="" 
                                                        name="schedule[0][time]"
                                                        class="form-control">
                                                </div>
                                                <div class="col-8">
                                                    <input 
                                                        type="text" 
                                                        value="" 
                                                        name="schedule[0][job]"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                <button class="btn btn-sm primary" type="button" onclick="addMoreSchedule()"><i class="bi bi-plus"></i> Add more</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">Save Change</button>
            </div>
        </form>
        <!-- /.row -->
    </div>
@stop

@section('scripts')
<script>
    function addMoreSchedule() {
        const container = $('#schedule');
        let countItem = $('#schedule .item').length;
        console.log(countItem);

        let html = `<div class="form-group item">
                <div class="row">
                    <div class="col-4">
                        <input 
                            type="text" 
                            value="" 
                            name="schedule[${countItem}][time]"
                            class="form-control">
                    </div>
                    <div class="col-8">
                        <input 
                            type="text" 
                            value="" 
                            name="schedule[${countItem}][job]"
                            class="form-control">
                    </div>
                </div>
            </div>`;

            container.append(html);
    }
</script>
@endsection