@extends('admin.layouts.app')

@section('title', 'User')

@push('style')
    <link rel="stylesheet" href="{{ asset ("assets/admin/extensions/sweetalert2/sweetalert2.min.css") }}">
    <link rel="stylesheet" href="{{ asset ('assets/admin/compiled/css/extra-component-sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable-jquery.css') }}">

@endpush

@section('main')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>All Users</h3>
                    <p class="text-subtitle text-muted">A page where users can change profile information</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible show fade">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible show fade">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <section class="section">
            <div class="card">
                {{-- <div class="card-header">
                    <h5 class="card-title">
                        jQuery Datatable
                    </h5>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (isset($users) && $users != [])
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ ucwords(str_replace('_',' ', $user->role)) }}</td>
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    {{-- <a href="#" class="btn icon btn-light"><i class="bi bi-eye"></i></a> --}}
                                                    <a href="{{ route('user.edit-user', $user) }}" class="btn icon btn-primary">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <button class="btn icon btn-danger confirm-delete"
                                                        data-id="{{ $user->id }}" >
                                                            <i class="bi bi-trash"></i>
                                                    </button>
                                                    <form id="delete-user-form" action="" method="POST" style="display: none;">
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <input type="hidden" name="_token"
                                                            value="{{ csrf_token() }}" />
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection

@push('script')
    <script src="{{ asset ('assets/admin/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset ('assets/admin/extensions/sweetalert2/sweetalert2.min.js') }}"></script>>
    <script src="{{ asset ('assets/admin/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('assets/admin/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset ('assets/admin/static/js/pages/datatables.js') }}"></script>
    <script src="{{ asset ('assets/admin/custom/js/list-user.js') }}"></script>
@endpush
