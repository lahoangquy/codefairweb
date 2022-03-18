@extends('layouts.app')

@section('head')
<style>
    #preview{
        max-width: 150px;
        height: auto;
        margin-top: 16px;
    }
    #preview img{
        max-width: 100%;
    }
</style>
@endsection

@section('page_header')
    Create New Post
@stop

@section('content')
    <div class="container">
        <form action="{{ route('cms.facts.store') }}" method="post">
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
                                <textarea name="content" style="min-height: 250px" class="form-control">{{ old('content') }}</textarea>
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
                <button class="btn btn-primary">Submit</button>
                <a href="{{ route('cms.facts.index') }}" class="btn btn-default">Back</a>
            </div>
        </form>
        <!-- /.row -->
    </div>
@stop