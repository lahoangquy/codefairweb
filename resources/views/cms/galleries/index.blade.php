@extends('layouts.app')

@section('page_header')
    Galleries Management
@stop

@section('content')
    <div class="container">
        <div class="row">
            <!-- Site Info -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gallery List</h3>
                        <div class="card-tools">
                            <a href="{{ route('cms.galleries.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($galleries->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Thumbnail</th>
                                        <th width="300">Link Source</th>
                                        <th width="120">Status</th>
                                        <th width="180">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($galleries as $gallery)
                                        <tr>
                                            <td>{{ $gallery->name ?? 'N/A' }}</td>
                                            <td>
                                                <div><img src="{!! $gallery->thumbnail !!}" alt="" style="max-width: 250px;"></div>
                                            </td>
                                            <td>
                                                <a style="word-break: break-all" href="{{ $gallery->linkSource }}" target="_blank">{{ $gallery->linkSource }}</a>
                                            </td>
                                            <td>{{ $gallery->statusText() }}</td>
                                            <td>
                                                <a href="{{ route('cms.galleries.edit', [$gallery]) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>

                                                <form method="POST" action="{{ route('cms.galleries.destroy', [$gallery]) }}" style="display: inline-block">
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
                            <p>No sponsor available</p>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@stop
