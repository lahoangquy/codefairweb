@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Site Info -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4>Users Management</h4>
                        <div class="card-tools ml-auto">
                            <a href="{{ route('cms.users.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($users->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th width="120">Status</th>
                                        <th width="180">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name ?? 'N/A' }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ \App\User::ROLE[$user->role] }}</td>
                                            <td>{{ $user->status ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                @if ($user->role != 1)
                                                    <a
                                                        data-toggle="tooltip"
                                                        title="Edit user info"
                                                        data-placement="left"
                                                        href="{{ route('cms.users.edit', [$user]) }}" 
                                                        class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                @endif

                                                @if (auth()->user()->role === 1)
                                                    <form method="POST" action="{{ route('cms.users.destroy', [$user]) }}" style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                
                                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No user available</p>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@stop
