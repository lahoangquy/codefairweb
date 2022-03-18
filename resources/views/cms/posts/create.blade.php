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
    Create New Post in {{ \App\Post::postType[$postType] }}
@stop

@section('content')
    <div class="container">
        <form action="{{ route('cms.post.store', [$postType]) }}" method="post">
            @csrf
            <input type="hidden" name="post_type" value="{{ $postType }}">
            <div class="row">
                <!-- Site Info -->
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ \App\Post::postType[$postType] }} Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control">
                                @error('title')
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

                            @if ($postType === 'event')
                                <div class="form-group">
                                    <label>Is a highlight post?:</label>
                                    <div>
                                        @foreach ([1 => 'Yes', 0 => 'No'] as $statusKey => $text)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input 
                                                    {{ $statusKey == 1 ? 'checked=checked' : '' }}
                                                    value="{{$statusKey}}" 
                                                    type="radio" 
                                                    name="highlight" 
                                                    id="highlight_{{$statusKey}}" 
                                                    class="custom-control-input">
                                                <label for="highlight_{{$statusKey}}" class="custom-control-label form-check-label">{{ $text }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if (!in_array($postType, ['event', 'industry', 'for-school']))
                                <div class="form-group">
                                    <label>Offer to:</label>
                                    <div>
                                        @foreach ([1 => 'CDU Student', 2 => 'Non-CDU Student'] as $statusKey => $text)
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input 
                                                    {{ $statusKey == 1 ? 'checked=checked' : '' }}
                                                    value="{{$statusKey}}" 
                                                    type="radio" 
                                                    name="apply_to_object" 
                                                    id="status_{{$statusKey}}" 
                                                    class="custom-control-input">
                                                <label for="apply_to_object_{{$statusKey}}" class="custom-control-label form-check-label">{{ $text }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Award:</label>
                                    <input type="text" value="{{ old('award') }}" name="award" class="form-control">
                                    @error('award')
                                    <small class="form-text text-muted text-warning">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Deadline:</label>
                                    <input type="text" value="{{ old('deadline') }}" name="deadline" class="form-control">
                                    @error('deadline')
                                    <small class="form-text text-muted text-warning">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Preparing:</label>
                                    <input type="text" value="{{ old('preparing') }}" name="preparing" class="form-control">
                                    @error('preparing')
                                    <small class="form-text text-muted text-warning">{{ $message }}</small>
                                    @enderror
                                </div> --}}
                            @endif

                            <div class="form-group">
                                <label>Short Introduction:</label>
                                <textarea name="short_intro" class="form-control" style="min-height: 200px">{{ old('short_intro') }}</textarea>
                                @error('short_intro')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Descritption:</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                @error('description')
                                <small class="form-text text-muted text-warning">{{ $message }}</small>
                                @enderror
                            </div>

                            <input type="hidden" name="thumbnail" id="logo">
                            <div class="form-group">
                                <label>Thumbnail:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" onchange="handleUpload()">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @error('thumbnail')
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
                <button class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('cms.post.category', [$postType]) }}" class="btn btn-default">Back</a>
            </div>
        </form>
        <!-- /.row -->
    </div>
@stop

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(function() {
            $('#description').summernote({
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

        function handleUpload() {
            const file = document.getElementById('customFile').files[0];
            const reader = new FileReader();
            
            reader.addEventListener('load', () => {
                const fileName = reader.result.split(',')[1];
                imgPreview.src = reader.result;
                preview.style.display = 'block';

                logoField.value = reader.result;
            });
            
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection