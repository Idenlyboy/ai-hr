@php
    $isAuth = \Illuminate\Support\Facades\Session::has('token');
    $role = \Illuminate\Support\Facades\Session::get('role');
@endphp

@if ($isAuth)
    @include('layouts.header.' . $role)
@else
    @include('layouts.header.guest')
@endif