@extends('layouts.app')

@section('page_header')
    IT CodeFair Facts Management
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
                            <a href="{{ route('cms.facts.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($facts->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Content</th>
                                        <th width="180">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($facts as $fact)
                                        <tr>
                                            <td>{{ $fact->content }}</td>
                                            <td>
                                                <a href="{{ route('cms.facts.edit', [$fact]) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>

                                                <form method="POST" action="{{ route('cms.facts.destroy', [$fact]) }}" style="display: inline-block">
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
