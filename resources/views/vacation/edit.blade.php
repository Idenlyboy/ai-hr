@extends('layouts.app.user')

@section('title', 'Редактирование вакансии')

@section('content')
    <vacation-edit :vacation='@json($vacation)'></vacation-edit>
@endsection