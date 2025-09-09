@extends('layouts.app.user')

@section('title', 'Отклики')

@section('content')

    <div class="wrapper-paginate">
        <hit-list :hits='@json($hits)'></hit-list>
        @include('layouts.paginator.full', ['items' => $hits])
    </div>
@endsection