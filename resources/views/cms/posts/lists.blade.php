@extends('layouts.app')

@section('page_header')
    {{ \App\Post::postType[$postType] }} Post Management
@stop

@section('content')
    <div class="container">
        <div class="row">
            <!-- Site Info -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post List</h3>
                        <div class="card-tools">
                            <a href="{{ route('cms.post.create', [$postType]) }}" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($posts->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Highlight?</th>
                                        <th>Status</th>
                                        <th width="180">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->highlight ? 'Yes' : 'No' }}</td>
                                            <td>{{ $post->statusText() }}</td>
                                            <td>
                                                <a href="{{ route('cms.post.edit', [$postType, $post->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>

                                                <form method="POST" action="{{ route('cms.post.destroy', [$postType, $post->id]) }}" style="display: inline-block">
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
                            <p>No post available</p>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@stop
