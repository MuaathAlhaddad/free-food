@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent">
                        <div class="btn-wrapper text-center">
                            <span class="btn-inner--icon">
                                <img src="{{ asset('argon') }}/img/icons/common/logo.png" width="100" height="100">
                            </span>
                        </div>
                    </div>

                    <div class="card-body  px-lg-5 py-lg-2">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            {{--   Name --}}
                            <div class="form-group @error('name')  has-danger @enderror mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input class="form-control  @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" type="name" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            {{--   Email --}}
                            <div class="form-group @error('email')  has-danger @enderror mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend @error('email') border border-danger @enderror">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control @error('email') border border-danger @enderror" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            {{--   Password --}}
                            <div class="form-group @error('password')  has-danger @enderror mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend @error('password') border border-danger @enderror">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control  @error('password') border border-danger @enderror" placeholder="{{ __('Password') }}" type="password" name="password" value="{{ old('password') }}" required autofocus>
                                </div>
                                @error('password')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            {{--    Roles --}}
                            <div class="form-group mb-3">
                                <ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist">
                                    @foreach($roles as $id => $role)

                                        <li class="nav-item mb-3">
                                            <div class="btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-secondary">
                                                    <input type="checkbox" name="roles[]" id="{{ $id }}" value="{{ $id }}"  autocomplete="off"> {{ $role }}
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="form-group mt-4">
                                <small class="text-muted">
                                    You have an account?
                                    <a href="{{ route('login') }}">Sign in</a>
                                </small>
                            </div>
                            <div class="form-group mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
