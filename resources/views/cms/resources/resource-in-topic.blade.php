@extends('layouts.app')

@section('page_header')
    {{ $topic->name }} > Resources
@stop

@section('content')
    <div class="container">
        <div class="row">
            <!-- Site Info -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Resources List</h3>
                    </div>
                    <div class="card-body">
                        @if ($topic->resources->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($topic->resources as $post)
                                        <tr>
                                            <td>{{ $post->title ?? 'N/A' }}</td>
                                            <td>{{ $post->link }}</td>
                                            <td>
                                                <a href="{{ route('cms.resources.deleteItem', [$topic, $post->id]) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No sponsor available</p>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add New Resource</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cms.resources.storeResourceItem') }}" method="POST">
                            @csrf

                            <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control">
                                @error('title')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Link:</label>
                                <input type="text" value="{{ old('link') }}" name="link" class="form-control">
                                @error('link')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>

                            <div>
                                <button class="btn btn-primary"><i class="fas fa-plus"></i> Submit</button>
                                <a href="{{ route('cms.resources.index') }}" class="btn btn-default">Back to Topic List</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@stop
