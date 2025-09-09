@extends('layouts.app.user')

@section('title', 'Отклики')

@section('content')

    <hit-list :hits='@json($hits)'></hit-list>
    @include('layouts.paginator.full', ['items' => $hits])
@endsection