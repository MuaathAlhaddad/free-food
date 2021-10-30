@extends('layouts.app')
@section('content')


@push('css')
    <style>
        th, td{
            vertical-align: middle !important;
        }
        .row-permissions{
            white-space: normal !important; word-wrap: break-word;
        }
    </style>
@endpush

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                {{-- alert Display --}}
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card shadow">
                    {{-- Grid Header --}}
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Roles</h3>
                            </div>
                            @can('role_create')
                            <div class="col-4 text-right">
                                <a  href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#role-modal"  id="create-btn">Add Role</a>
                            @include('includes.role_modal_form')
                            </div>
                            @endcan
                        </div>
                    </div>

                    <div class="col-12">
                    </div>
                    {{-- Grid --}}
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table-striped table-hover roles-dataTable">
                            <thead>
                                <tr>
                                    <th rowspan="2">
                                        {{ trans('cruds.role.fields.id') }}
                                    </th>
                                    <th rowspan="2">
                                        {{ trans('cruds.role.fields.title') }}
                                    </th>
                                    <th >
                                        {{ trans('cruds.role.fields.permissions') }}
                                    </th>
                                    <th rowspan="2">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $key => $role)
                                    <tr data-entry-id="{{ $role->id }}">
                                        <td>
                                            {{ $role->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $role->name ?? '' }}
                                        </td>

                                        <td class="row-permissions">
                                        @forelse ($role->permissions as $permission )
                                            <span class="badge badge-info">{{ $permission->name }}</span>
                                        @empty
                                            <span class="badge badge-warning"> No Permissions </span>
                                        @endforelse
                                        </td>

                                        <td>
                                            @can('role_edit')
                                                <a href="{{ route('roles.edit', $role->id) }}">
                                                    <i class="far fa-edit text-primary"></i>
                                                </a>
                                            @endcan

                                            @can('role_delete')
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"  style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-link">
                                                        <i class="far fa-trash-alt text-danger delete-btn" style=" cursor: pointer;"></i>
                                                    </button>
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('.roles-dataTable').DataTable();
            $('.dataTables_filter').append('<i class=" fa fa-search dataTable-search"></i>');
        });
        $('.delete-btn').on('click', function() {
                swal({
                        title: "Are you sure?",
                        text: "you want to delete this Role!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest('form').submit();
                        swal("Poof! Role has been deleted!", {
                        icon: "success",
                        buttons: false,
                        });
                    } else {
                        swal("Role is safe!", {
                            buttons: false,
                        });
                    }
                });
        });
    </script>
@endpush
@endsection
