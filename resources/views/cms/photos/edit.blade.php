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

@section('content')
    <div class="container">
        <form action="{{ route('cms.photos.update', [$photo]) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="row">
                <!-- Site Info -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Item</h3>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="thumb" id="logo" value="{{ $photo->thumb }}">
                            <div class="form-group">
                                <label>Photo:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" onchange="handleUpload()">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @error('thumb')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                                <div id="preview" style="display: none"><img src=""></div>
                            </div>

                            <div class="form-group">
                                <label>Video URL (optional):</label>
                                <input type="text" value="{{ $photo->video }}" name="video" class="form-control">
                                <span class="text-muted">Use a Youtube's video, i.e https://www.youtube.com/watch?v=videoid</span>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">Save Change</button>
                <a href="{{ route('cms.photos.index') }}" class="btn btn-default">Back</a>
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
        const galleryThumbnail = @json($photo->thumb);

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