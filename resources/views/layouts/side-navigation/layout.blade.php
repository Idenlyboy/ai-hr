@php
    $isAuth = \Illuminate\Support\Facades\Session::has('token');
    $role = \Illuminate\Support\Facades\Session::get('role');
@endphp
@if ($isAuth)
    @include('layouts.side-navigation.' . $role)
@else
    @include('layouts.side-navigation.guest')
@endif