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
    Create New Gallery
@stop

@section('content')
    <div class="container">
        <form action="{{ route('cms.galleries.update', [$gallery]) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="row">
                <!-- Site Info -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Gallery Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" value="{{ $gallery->name }}" name="name" class="form-control">
                                @error('name')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Link source:</label>
                                <input type="text" value="{{ $gallery->linkSource }}" name="linkSource" class="form-control">
                                @error('linkSource')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Status:</label>
                                <div>
                                    @foreach ([1 => 'Show', 0 => 'Hidden'] as $statusKey => $text)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ $statusKey == $gallery->status ? 'checked=checked' : '' }}
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

                            <input type="hidden" name="thumbnail" id="logo" value="{{ $gallery->thumbnail }}">
                            <div class="form-group">
                                <label>Thumbnail:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" onchange="handleUpload()">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @error('logo')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                                <div id="preview" style="display: none"><img src=""></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">Save Change</button>
                <a href="{{ route('cms.galleries.index') }}" class="btn btn-default">Back</a>
            </div>
        </form>
        <!-- /.row -->
    </div>
@stop

@section('scripts')
    <script>
        const preview = document.getElementById('preview');
        const logoField = document.getElementById('logo');
        const imgPreview = preview.querySelector('img');
        const galleryThumbnail = @json($gallery->thumbnail);

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