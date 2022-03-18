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
    Create New Sponsor
@stop

@section('content')
    <div class="container">
        <form action="{{ route('cms.sponsors.update', [$sponsor]) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="row">
                <!-- Site Info -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sponsor Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" value="{{ $sponsor->name }}" name="name" class="form-control">
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Sponsor Type:</label>
                                <div>
                                    @foreach (\App\Sponsor::SPONSOR_TYPES as $level => $text)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ $level == $sponsor->type ? 'checked=checked' : '' }}
                                                value="{{$level}}" 
                                                type="radio" 
                                                name="type" 
                                                id="type_{{$level}}" 
                                                class="custom-control-input">
                                            <label for="type_{{$level}}" class="custom-control-label form-check-label">{{ $text }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status:</label>
                                <div>
                                    @foreach ([1 => 'Show', 0 => 'Hidden'] as $statusKey => $text)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input 
                                                {{ $statusKey == $sponsor->status ? 'checked=checked' : '' }}
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

                            <input type="hidden" name="logo" id="logo" value="{{ $sponsor->logo }}">
                            <div class="form-group">
                                <label>Logo:</label>
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
                <a href="{{ route('cms.sponsors.index') }}" class="btn btn-default">Back</a>
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
        const thumbnail = @json($sponsor->logo);

        showPreviewImage(thumbnail);

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
            if (imgSrc) {
                imgPreview.src = imgSrc;
                preview.style.display = 'block';
            }
        }
    </script>
@endsection