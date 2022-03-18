@extends('layouts.app')

@section('page_header')
    Settings
@stop

@section('content')
    <div class="container">
        <form action="{{ route('cms.settings.store', [$settings]) }}" method="post">
            @csrf

            <div class="row">
                <!-- Site Info -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Site Info</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Site Title:</label>
                                <input value="{{ $settings->meta_key['page_title'] }}" type="text" name="page_title" class="form-control">
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Site Description:</label>
                                <textarea name="page_description" class="form-control">{{ $settings->meta_key['page_description'] }}</textarea>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Banner - Heading Line:</label>
                                <textarea name="heading_line" class="form-control">{{ $settings->meta_key['heading_line'] ?? '' }}</textarea>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Banner - Heading Subline:</label>
                                <textarea name="heading_subline" class="form-control">{{ $settings->meta_key['heading_subline'] ?? '' }}</textarea>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <!-- Contact Support -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Contact Support</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Email Address:</label>
                                <input value="{{ $settings->meta_key['support_email'] }}" type="text" name="support_email" class="form-control">
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Phone#:</label>
                                <input value="{{ $settings->meta_key['phone_number'] }}" type="text" name="phone_number" class="form-control">
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Address:</label>
                                <input value="{{ $settings->meta_key['address'] }}" type="text" name="address" class="form-control">
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>register URL:</label>
                                <input value="{{ $settings->meta_key['register_url'] ?? '' }}" type="text" name="register_url" class="form-control">
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Social Links -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Social Links</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Facebook:</label>
                                <input value="{{ $settings->meta_key['social_fb'] }}" type="text" name="social_fb" class="form-control">
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Instagram:</label>
                                <input value="{{ $settings->meta_key['social_instagram'] }}" type="text" name="social_instagram" class="form-control">
                                <!-- /.input group -->
                            </div>

                            <div class="form-group">
                                <label>Youtube:</label>
                                <input value="{{ $settings->meta_key['social_youtube'] }}" type="text" name="social_youtube" class="form-control">
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">Save Change</button>
            </div>
        </form>
        <!-- /.row -->
    </div>
@stop
