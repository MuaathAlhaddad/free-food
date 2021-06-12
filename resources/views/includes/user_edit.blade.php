@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
<form action="{{ route('users.update', $user->id) }}" method="post" autocomplete="off" class="p-1" id="form-user-edit">
    @csrf
    @method('PATCH')
    <div class="pl-lg-4">
        <div class="row mt-3">
            {{-- Name --}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-name">{{ __('Name') }}*</label>
                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $user->name}}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            {{-- Email --}}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-email">{{ __('Email') }}*</label>
                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') ?? $user->email }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            {{-- User Role --}}
            <div class="col-md-12">
                <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                    <label for="user-role" class="form-control-label">{{__('User Role')}}*</label>
                    <select class="form-control form-control-alternative select2" name="roles[]" id="input-user-role"
                            multiple required>
                        @forelse ($allRoles as $id => $role)
                            <option value="{{ $id }}" {{ $user->roles->pluck('name', 'id')->search($role) ? 'selected' : ''  }} >{{ $role }}</option>
                        @empty
                            <option value="">No Roles</option>
                        @endforelse
                    </select>
                    @if($errors->has('roles'))
                        <em class="invalid-feedback">
                            {{ $errors->first('roles') }}
                        </em>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <button class="btn btn-success" id="save-changes">Save</button>
    </div>
</form>
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
          $(document).ready(function () {


            var multipleCancelButton = new Choices('#input-user-role', {
                removeItemButton: true,
                maxItemCount: 5,
                searchResultLimit: 5,
                renderChoiceLimit: 5
            });

            $('#save-changes').on('click', function(e) {
                e.preventDefault();
                $('#form-user-edit').submit();
            });
        });
    </script>

@endpush
