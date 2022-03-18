@extends('layouts.app')

@section('page_header')
    Resource Topic Management
@stop

@section('content')
    <div class="container">
        <div class="row">
            <!-- Site Info -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Topic List</h3>
                    </div>
                    <div class="card-body">
                        @if ($topics->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th># of Resources</th>
                                        <th width="120">Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($topics as $topic)
                                        <tr>
                                            <td>{{ $topic->name ?? 'N/A' }}</td>
                                            <td>{{  $topic->resources_count }}</td>
                                            <td>{{ $topic->statusText() }}</td>
                                            <td>
                                                <a href="{{ route('cms.resources.edit', [$topic]) }}" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="{{ route('cms.resources.show', [$topic]) }}" class="btn btn-success btn-sm"><i class="bi bi-list-ul"></i></a>

                                                <form method="POST" action="{{ route('cms.resources.destroy', [$topic]) }}" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                            
                                                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No topic available</p>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add New Topic</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cms.resources.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                                @error('name')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Status:</label>
                                <div>
                                    @foreach ([1 => 'Show', 0 => 'Hidden'] as $statusKey => $text)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ $statusKey == 1 ? 'checked=checked' : '' }}
                                                value="{{$statusKey}}" 
                                                type="radio" 
                                                name="status" 
                                                id="status_{{$statusKey}}" 
                                                class="custom-control-input">
                                            <label for="status_{{$statusKey}}" class="custom-control-label form-check-label">{{ $text }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button class="btn btn-primary"><i class="fas fa-plus"></i> Add New</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@stop
