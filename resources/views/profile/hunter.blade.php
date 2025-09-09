@extends('layouts.app.user')

@section('title', 'Профиль')

@section('content')
    <div class="hunter">
        <div class="profile-container">
            <div class="profile-card">
                <div class="profile-header">
                    <svg class="profile-avatar" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
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
                    <h1 class="profile-name">Александр Петров</h1>
                    <div class="profile-status">Активный поиск</div>
                </div>

                <div class="profile-info">
                    <div class="info-group">
                        <div class="info-title">Telegram ID</div>
                        <div class="info-value tg-id">851769104</div>
                    </div>

                    <div class="info-group">
                        <div class="info-title">Email</div>
                        <div class="info-value">a.petrov2025@mail.ru</div>
                    </div>

                    <div class="info-group">
                        <div class="info-title">Дата регистрации</div>
                        <div class="info-value">5 сентября 2025</div>
                    </div>

                    <div class="info-group">
                        <div class="info-title">Статус аккаунта</div>
                        <div class="info-value">Подтвержден ✓</div>
                    </div>
                </div>

                <div class="profile-stats">
                    <div class="stat-card">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Откликов</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Собеседований</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Приглашения</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">75%</div>
                        <div class="stat-label">Успешность</div>
                    </div>
                </div>

                <div class="profile-actions">
                    <button class="action-btn btn-primary">Редактировать профиль</button>
                    <button class="action-btn btn-secondary">Мои отклики</button>
                </div>
            </div>
        </div>
    </div>
@endsection