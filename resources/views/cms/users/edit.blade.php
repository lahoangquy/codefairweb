@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('cms.users.update', [$user]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <!-- Site Info -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>User Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                    required
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    class="form-control" 
                                    value="{{ $user->name }}">
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input 
                                    disabled
                                    type="email" name="email" id="email" 
                                    class="form-control" 
                                    value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input 
                                    autocomplete="new-password" 
                                    type="password" name="password"class="form-control">
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input autocomplete="new-password" type="password" name="password_confirmation"class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Status</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status" {{ $user->status ? 'checked' : '' }} id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">Active / Inactive</label>
                                  </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="">Role</label>
                                <select class="custom-select" name="role">
                                    @foreach (\App\User::ROLE as $key => $name)
                                    <option value="{{ $key }}" {{ $key == $user->role ? 'selected=selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                  </select>
                            </div> --}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary mr-2">Save Change</button>
                <a href="{{ route('cms.users.index') }}" class="btn btn-default">Back</a>
            </div>
        </form>
        <!-- /.row -->
    </div>
@stop

@section('scripts')
    <script>
    </script>
@endsection