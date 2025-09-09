@extends('layouts.app.user')

@section('title', 'Страница не найдена!')

@section('content')
    <div class="error-container">
        <div class="error-content">
            <h1 class="error-number">404</h1>
            <h2 class="error-title">Страница не найдена</h2>
            <p class="error-message">Извините, но страница, которую вы ищете, не существует. Возможно, она была перемещена
                или удалена.</p>
            <div class="error-actions">
                <a href="/" class="btn btn-primary">Вернуться на главную</a>
                <a href="javascript:history.back()" class="btn btn-primary">Назад</a>
            </div>
        </div>
    </div>
@endsection