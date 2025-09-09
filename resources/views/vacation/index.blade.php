@extends('layouts.app.user')

@section('title', 'Вакансии')

@section('content')
    <div class="wrapper-paginate">
        <vacation-list :vacations='@json($vacations)'></vacation-list>
        @include('layouts.paginator.full', ['items' => $vacations])
    </div>
@endsection