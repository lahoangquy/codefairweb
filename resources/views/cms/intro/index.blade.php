@extends('layouts.app')

@section('head')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
    Introduction
@stop

@section('content')
    <div class="container">
        <form action="{{ route('cms.introduction.store') }}" method="post">
            @csrf

            <input type="hidden" name="intro_id" value="{{ $intro->id ?? 0 }}">
            <div class="row">
                <!-- Site Info -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Introduction Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea name="description" class="form-control">{{ $intro->description ?? '' }}</textarea>
                                @error('comment')
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
            </div>
        </form>
        <!-- /.row -->
    </div>
@stop

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(function() {
        $('textarea').summernote({
            tabsize: 2,
            height: 280,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    })
</script>
@endsection