@extends('layouts.app')
@section('content')
    @include('profile.partials.header', [
    'class' => 'col-lg-7',
    'website' => true,
    'rowClass' => 'm-auto'
])
                        {{--        Products       --}}
                    <router-view />

@endsection
