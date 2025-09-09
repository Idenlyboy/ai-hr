@extends('layouts.app.user')

@section('title', 'Главная')

@section('content')
    <div class="main-container">
        <section class="hero-section">
            <h1 class="hero-title">ВТБ AI: Работа будущего уже здесь</h1>
            <p class="hero-subtitle">Пройдите ИИ-собеседование и получите работу мечты без предвзятости HR</p>
            <a href="/vacations" class="cta-button">Найти вакансии</a>
        </section>

        <section class="features-section">
            <div class="feature-card">
                <div class="feature-icon">🤖</div>
                <h3 class="feature-title">ИИ-интервью</h3>
                <p class="feature-description">Объективная оценка ваших навыков без человеческих предубеждений</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3 class="feature-title">Мгновенный отклик</h3>
                <p class="feature-description">Результаты собеседования сразу после завершения</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3 class="feature-title">Повышенные шансы</h3>
                <p class="feature-description">На 40% больше приглашений на вторые этапы</p>
            </div>
        </section>

        <section class="stats-section">
            <h2 class="stats-title">В цифрах</h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Точность оценки</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Доступность</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">40%</div>
                    <div class="stat-label">Выше шансы</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">5мин</div>
                    <div class="stat-label">Среднее время</div>
                </div>
            </div>
        </section>

        <section class="how-it-works">
            <h2 class="section-title">Как это работает</h2>
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Выберите вакансию</h3>
                    <p class="step-description">Найдите подходящую позицию в нашем каталоге</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Пройти ИИ-собеседование</h3>
                    <p class="step-description">Ответьте на вопросы нашего интеллектуального ассистента</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Получите результат</h3>
                    <p class="step-description">Мгновенная обратная связь и рекомендации</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3 class="step-title">Второй этап</h3>
                    <p class="step-description">Прямое общение с работодателем</p>
                </div>
            </div>
        </section>
    </div>
@endsection