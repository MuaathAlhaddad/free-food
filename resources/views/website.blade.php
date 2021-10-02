@extends('layouts.app')
@section('content')
    @include('profile.partials.header', [
    'class' => 'col-lg-7',
    'website' => true,
    'rowClass' => 'm-auto'
])

    <div class="header pb-8 pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">

                    {{--         alert Display --}}
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                        {{--        Products       --}}
                    <router-view />

                </div>
            </div>
        </div>
    </div>
@endsection
