@extends('layouts.app')
@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    @include('includes.alert')

                    <div class="card shadow">
                        {{-- Grid Header --}}
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Users</h3>
                                </div>
                                @can('user_create')
                                    <div class="col-4 text-right">
                                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary"
                                           data-toggle="modal" data-target="#user-modal" id="create-btn">Add user</a>
                                        @include('includes.user_modal_form')
                                    </div>
                                @endcan
                            </div>
                        </div>

                        <div class="col-12">
                        </div>

                        {{-- Grid --}}
                        <div class="table-responsive">
                            <table class="table text-center table-hover users-dataTable">
                                <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Roles
                                    </th>
                                    <th>
                                        Created at
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $key => $user)
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td>
                                            {{ $user->id ?? '' }}
                                        </td>
                                        <td class="text-capitalize">
                                            {{ $user->name ?? ''}}
                                        </td>
                                        <td class="text-lowercase">
                                            {{ $user->email ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($user->roles as $key => $role)
                                                <span class="badge badge-info">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-lowercase">
                                            {{ $user->created_at->format('Y-m-d') }}
                                        </td>
                                        <td class="text-capitalize">
                                            @can('user_show')
                                                <a href="{{ route('users.show', $user->id) }}">
                                                    <i class="far fa-edit text-primary"></i>
                                                </a>
                                            @endcan

                                            @can('user_delete')
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                      style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-link">
                                                        <i class="far fa-trash-alt text-danger delete-btn" id="delete-btn"
                                                           style=" cursor: pointer;"></i>
                                                    </button>

                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td>No users</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="card-footer py-4">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            // (function () {
            //     var table = document.querySelector('.users-dataTable').DataTable();
            //     document.querySelector('.dataTables_filter').insertAdjacentHTML("beforeend", '<i class=" fa fa-search dataTable-search"></i>');
            // });


            document.querySelector('#delete-btn').addEventListener('click', function () {
                alert('hi');
                swal({
                    title: "Are you sure?",
                    text: "you want to delete this user!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            document.querySelector(this).closest('form').submit();
                            swal("Poof! User has been deleted!", {
                                icon: "success",
                                buttons: false,
                            });
                        } else {
                            swal("User is safe!", {
                                buttons: false,
                            });
                        }
                    });
            });
            // $(document).ready(function () {
            //     var table = $('.users-dataTable').DataTable();
            //     $('.dataTables_filter').append('<i class=" fa fa-search dataTable-search"></i>');
            // });
            //
            //
            // $('.delete-btn').on('click', function () {
            //     swal({
            //             title: "Are you sure?",
            //             text: "you want to delete this user!",
            //             icon: "warning",
            //             buttons: true,
            //             dangerMode: true,
            //         })
            //         .then((willDelete) => {
            //             if (willDelete) {
            //                 $(this).closest('form').submit();
            //                 swal("Poof! User has been deleted!", {
            //                     icon: "success",
            //                     buttons: false,
            //                 });
            //             } else {
            //                 swal("User is safe!", {
            //                     buttons: false,
            //                 });
            //             }
            //         });
            // });
        </script>
    @endpush
@endsection
