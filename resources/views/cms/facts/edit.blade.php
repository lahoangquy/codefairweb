@extends('layouts.app')

@section('page_header')
    Update Post
@stop

@section('content')
    <div class="container">
        <form action="{{ route('cms.facts.update', [$fact]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <!-- Site Info -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Content:</label>
                                <textarea name="content" style="min-height: 250px" class="form-control">{{ $fact->content }}</textarea>
                                @error('content')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">Save Change</button>
                <a href="{{ route('cms.facts.index') }}" class="btn btn-default">Back</a>
            </div>
        </form>
        <!-- /.row -->
    </div>
@stop