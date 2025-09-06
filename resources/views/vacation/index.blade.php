@extends('layouts.app.user')

@section('title', 'Главная')

@section('content')
    <vacation-list :vacations='@json($vacations)'></vacation-list>
    @include('layouts.paginator.full', ['items' => $vacations])
@endsection