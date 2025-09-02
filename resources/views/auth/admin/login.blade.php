@extends('layouts.app.guest')

@section('title', 'Авторизация')

@section('content')

    <login-form :role="admin"></login-form>

@endsection