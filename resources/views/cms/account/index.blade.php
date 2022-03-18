@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-6 offset-md-3">
                <form action="{{ route('cms.account.update', [$user->id]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Account Info</h5>
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
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input 
                                            disabled
                                            type="email" name="email" id="email" class="form-control" 
                                            value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" name="type" value="change_info" class="btn btn-primary">Save Change</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Change Password</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="password">New Password</label>
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
                                        <label for="password-confirm">Confirm New Password</label>
                                        <input autocomplete="new-password" type="password" name="password_confirmation"class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" name="type" value="change_password" class="btn btn-primary">Save Change</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="position-fixed top-0 right-0 p-3" style="z-index: 99999; right: 0; top: 0;">
        <div id="notificationToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
            <div class="toast-header bg-success">
                <span class="mr-1"><i class="bi bi-check-circle-fill"></i></span>
                <strong class="mr-auto">Done!</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Your account was updated successful.
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        const showToast = @json(session('showToast') ?? false);
        const toast = $('#notificationToast');
        if (showToast) {
            toast.toast('show');
        }
    </script>
@endsection
