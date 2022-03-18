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
    Update Testimonial
@stop

@section('content')
    <div class="container">
        <form action="{{ route('cms.testimonials.update', [$testimonial]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <!-- Site Info -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Testimonial Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" value="{{ $testimonial->name }}" name="name" class="form-control">
                                @error('name')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Position:</label>
                                <input type="text" value="{{ $testimonial->position }}" name="position" class="form-control">
                                @error('position')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Comment:</label>
                                <textarea name="comment" id="comment" class="form-control">{{ $testimonial->comment }}</textarea>
                                @error('comment')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>

                            <input type="hidden" name="avatar" id="logo" value="{{ $testimonial->avatar }}">
                            <div class="form-group">
                                <label>Photo:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" onchange="handleUpload()">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div id="preview" style="display: none"><img src=""></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">Save Change</button>
                <a href="{{ route('cms.testimonials.index') }}" class="btn btn-default">Back</a>
            </div>
        </form>
        <!-- /.row -->
    </div>
@stop

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(function() {
            $('#comment').summernote({
                tabsize: 2,
                height: 250,
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
        const preview = document.getElementById('preview');
        const logoField = document.getElementById('logo');
        const imgPreview = preview.querySelector('img');
        const galleryThumbnail = @json($testimonial->avatar);

        showPreviewImage(galleryThumbnail);
        
        function handleUpload() {
            const file = document.getElementById('customFile').files[0];
            const reader = new FileReader();
            
            reader.addEventListener('load', () => {
                const fileName = reader.result.split(',')[1];
                logoField.value = reader.result;
                showPreviewImage(reader.result);
            });
            
            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function showPreviewImage(imgSrc) {
            imgPreview.src = imgSrc;
            preview.style.display = 'block';
        }
    </script>
@endsection