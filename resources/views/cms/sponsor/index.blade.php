@extends('layouts.app')

@section('head')
        <!-- DataTables -->
    <link rel="stylesheet" href="/assets/cms/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/cms/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <!-- Site Info -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sponsors List</h3>
                        <div class="card-tools">
                            <a href="{{ route('cms.sponsors.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($sponsors->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="my-table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Logo</th>
                                        <th width="120">Status</th>
                                        <th width="180">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($sponsors as $sponsor)
                                        <tr>
                                            <td>{{ $sponsor->name ?? 'N/A' }}</td>
                                            <td>{{ $sponsor->sponsorText() }}</td>
                                            <td>
                                                <div><img src="{!! $sponsor->logo !!}" alt="" style="max-width: 120px;"></div>
                                            </td>
                                            <td>{{ $sponsor->statusText() }}</td>
                                            <td>
                                                <a href="{{ route('cms.sponsors.edit', [$sponsor]) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>

                                                <form method="POST" action="{{ route('cms.sponsors.destroy', [$sponsor]) }}" style="display: inline-block">
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

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="/assets/cms/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/cms/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/cms/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/cms/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $('#my-table').DataTable({
                searching: false,
                paging: false,
            });
        })
    </script>
@endsection