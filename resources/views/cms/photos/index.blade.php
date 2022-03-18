@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Site Info -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Photos & Videos</h3>
                        <div class="card-tools">
                            <a href="{{ route('cms.photos.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($photos->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Thumbnail</th>
                                        <th width="180">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($photos as $photo)
                                        <tr>
                                            <td>
                                                <div>
                                                    <img src="{!! $photo->thumb !!}" alt="" style="max-width: 120px;">
                                                </div>
                                            <td>
                                                <a href="{{ route('cms.photos.edit', [$photo]) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>

                                                <form method="POST" action="{{ route('cms.photos.destroy', [$photo]) }}" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                            
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No item available</p>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@stop
