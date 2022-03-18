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
    Update Team Member
@stop

@section('content')
    <div class="container">
        <form action="{{ route('cms.teams.update', [$team]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <!-- Site Info -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Member Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" value="{{ $team->name }}" name="name" class="form-control">
                                @error('name')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Position:</label>
                                <input type="text" value="{{ $team->position }}" name="position" class="form-control">
                                @error('position')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>

                            <input type="hidden" name="avatar" id="logo" value="{{ $team->avatar }}">
                            <div class="form-group">
                                <label>Avatar:</label>
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
                <a href="{{ route('cms.teams.index') }}" class="btn btn-default">Back</a>
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
        const galleryThumbnail = @json($team->avatar);

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