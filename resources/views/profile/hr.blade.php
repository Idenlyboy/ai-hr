@extends('layouts.app.user')

@section('title', 'Профиль')

@section('content')
    <div class="hr">
        <div class="hr-container">
            <div class="hr-card">
                <div class="hr-header">
                    <svg class="hr-avatar" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#4f46e5" />
                                <stop offset="100%" stop-color="#667eea" />
                            </linearGradient>
                        </defs>
                        <circle cx="50" cy="50" r="48" fill="url(#gradient)" />
                        <circle cx="50" cy="40" r="15" fill="white" />
                        <ellipse cx="50" cy="75" rx="25" ry="20" fill="white" />
                    </svg>
                    <h1 class="hr-name">Екатерина Смирнова</h1>
                    <div class="hr-position">HR-менеджер ВТБ</div>
                </div>

                <div class="hr-info">
                    <div class="info-group">
                        <div class="info-title">Служебный ID</div>
                        <div class="info-value tg-id">HR-851769104</div>
                    </div>

                    <div class="info-group">
                        <div class="info-title">Корпоративная почта</div>
                        <div class="info-value">e.smirnova@vtb.ru</div>
                    </div>

                    <div class="info-group">
                        <div class="info-title">Дата назначения</div>
                        <div class="info-value">15 марта 2024</div>
                    </div>

                    <div class="info-group">
                        <div class="info-title">Статус доступа</div>
                        <div class="info-value">Активный ✓</div>
                    </div>
                </div>

                <div class="hr-stats">
                    <div class="stat-card">
                        <div class="stat-number">47</div>
                        <div class="stat-label">Активных вакансий</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">156</div>
                        <div class="stat-label">Всего откликов</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">89</div>
                        <div class="stat-label">ИИ-собеседований</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">23</div>
                        <div class="stat-label">Принятых кандидатов</div>
                    </div>
                </div>

                <div class="hr-quick-actions">
                    <h3 class="section-title">Быстрые действия</h3>
                    <div class="actions-grid">
                        <a href="{{ route('vacation.edit') }}" class="action-item">
                            <div class="action-icon">➕</div>
                            <div class="action-text">Создать вакансию</div>
                        </a>
                        <a href="" class="action-item">
                            <div class="action-icon">👥</div>
                            <div class="action-text">Кандидаты</div>
                        </a>
                        <a href="{{ route('vacation.page') }}" class="action-item">
                            <div class="action-icon">📋</div>
                            <div class="action-text">Мои вакансии</div>
                        </a>
                        <a href="" class="action-item">
                            <div class="action-icon">📊</div>
                            <div class="action-text">Аналитика</div>
                        </a>
                    </div>
                </div>

                <div class="hr-recent">
                    <h3 class="section-title">Последняя активность</h3>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon">✅</div>
                            <div class="activity-content">
                                <div class="activity-text">Принят кандидат Дамир Сапиев на позицию "Frontend-разработчик"
                                </div>
                                <div class="activity-time">2 часа назад</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">🤖</div>
                            <div class="activity-content">
                                <div class="activity-text">Завершено ИИ-собеседование с Марией Ивановой</div>
                                <div class="activity-time">5 часов назад</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection