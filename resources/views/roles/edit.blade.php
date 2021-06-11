@extends('layouts.app')
@section('content')
@push('css')
<link rel="stylesheet" type="text/css" href=" {{ asset('argon/css/multi-select.css') }} ">
@endpush
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        {{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route("roles.update", [$role->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- Title --}}
                            <div class="form-group">
                                <label for="name">{{ trans('cruds.role.fields.title') }}*</label>
                                <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                                @if($errors->has('name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                            </div>
                            {{-- Permissions --}}
                            <div class="form-group {{ $errors->has('permissions') ? 'has-danger' : '' }}">
                                <label for="permissions">{{ trans('cruds.role.fields.permissions') }}*
                                    <a href='#' id='deselect-all' class="btn btn-sm btn-danger">Deselect All</a>
                                    <a href='#' id='select-all' class="btn btn-sm btn-primary">Select All</a>
                                </label>
                                <select  name="permissions[]"  id="input-permissions" class="form-control {{ $errors->has('permissions') ? 'is-invalid' : '' }}" multiple>
                                    @forelse ($permissions as $id =>  $permission)
                                        <option value=' {{ $permission->id }} ' {{ (in_array($permission->id, old('permissions', [])) || isset($role) && $role->permissions->contains($permission->id)) ? 'selected' : '' }}>{{ $permission->name }}</option>
                                    @empty
                                        <span class="badge badge-warning"> No Permissions </span>
                                    @endforelse
                                </select>
                                @if($errors->has('permissions'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('permissions') }}
                                    </span>
                                @endif
                            </div>


                            <div class="text-center">
                                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </form>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ route('roles.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
  <script src="  {{ asset('argon/js/jquery.multi-select.js') }}"></script>
    <script>
        // multiSelect
       $('#input-permissions').multiSelect({
           selectableOptgroup: true
       });
       $('#select-all').click(function () {
           $('#input-permissions').multiSelect('select_all');
           return false;
       });
       $('#deselect-all').click(function () {
           $('#input-permissions').multiSelect('deselect_all');
           return false;
       });
    </script>
@endpush
@endsection
