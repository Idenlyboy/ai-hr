<div class="side-nav">

    <div class="side-nav__header">
        <div class="side-nav__user">
            <div class="side-nav__avatar">ИИ</div>
            <div class="side-nav__user-info">
                <div class="side-nav__username">Иван Иванов</div>
                <div class="side-nav__email">ivan@example.com</div>
            </div>
        </div>
    </div>
    <ul class="side-nav__menu">
        <li class="side-nav__item">
            <a href="#" class="side-nav__link side-nav__link--active">
                <svg class="side-nav__icon" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z"
                        stroke="currentColor" stroke-width="2" />
                    <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" />
                </svg>
                <span>Главная</span>
            </a>
        </li>

        <li class="side-nav__item">
            <a href="#" class="side-nav__link">
                <svg class="side-nav__icon" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M12 12C14.2091 12 16 10.2091 16 8C16 5.79086 14.2091 4 12 4C9.79086 4 8 5.79086 8 8C8 10.2091 9.79086 12 12 12Z"
                        stroke="currentColor" stroke-width="2" />
                    <path d="M6 20C6 17.7909 7.79086 16 10 16H14C16.2091 16 18 17.7909 18 20" stroke="currentColor"
                        stroke-width="2" />
                </svg>
                <span>Профиль</span>
            </a>
        </li>

        <li class="side-nav__item">
            <a href="{{ route('vacation.page') }}" class="side-nav__link">
                <svg class="side-nav__icon" viewBox="0 0 24 24" fill="none">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5">
                        <rect width="15" height="18.5" x="4.5" y="2.75" rx="3.5" />
                        <path d="M8.5 6.755h7m-7 4h7m-7 4H12" />
                    </g>
                </svg>
                <span>Вакансии</span>
            </a>
        </li>
    </ul>

    <div class="side-nav__divider"></div>

    <ul class="side-nav__menu">
        <li class="side-nav__item">
            <a href="{{ route('auth.logout') }}" class="side-nav__link">
                <svg class="side-nav__icon" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M9 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V9"
                        stroke="currentColor" stroke-width="2" />
                    <path d="M16 5H8M16 12H8M11 19H8" stroke="currentColor" stroke-width="2" />
                    <path d="M16 17H21M21 17L18 14M21 17L18 20" stroke="currentColor" stroke-width="2" />
                </svg>
                <span>Выйти</span>
            </a>
        </li>
    </ul>
</div>