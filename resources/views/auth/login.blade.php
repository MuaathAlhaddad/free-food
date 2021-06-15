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
                    <div class="card-body px-lg-5 py-lg-2">
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group @error('email') has-danger @enderror mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend @error('email') border border-danger @enderror">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control  @error('email') border border-danger @enderror" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') ??  'user@example.com'}}" required autofocus>
                                </div>
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group @error('password') has-danger @enderror">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend @error('password') border border-danger @enderror">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control @error('password') border border-danger @enderror" name="password" placeholder="{{ __('Password') }}" type="password" value="password" required>
                                </div>
                                @error('password')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheckLogin">
                                    <span class="text-muted">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div class="form-group mt-2">
                                <small class="text-muted">
                                    You don't have an account?
                                    <a href="{{ route('register') }}">Sign up</a>
                                </small>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('Sign in') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
