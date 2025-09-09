<div class="side-nav">

    @php
        $active = 'side-nav__link side-nav__link--active';
        $inactive = 'side-nav__link';
    @endphp

    <ul class="side-nav__menu">
        <li class="side-nav__item">
            <a href="{{ route('home.page') }}" class="{{ request()->routeIs('home.page') ? $active : $inactive }}">
                <svg class="side-nav__icon" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z"
                        stroke="currentColor" stroke-width="2" />
                    <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2" />
                </svg>
                <span>Главная</span>
            </a>
        </li>
    </ul>

    <div class="side-nav__divider"></div>

    <ul class="side-nav__menu">
        <li class="side-nav__item">
            <a href="{{ route('login.page') }}" class="side-nav__link">
                <svg class="side-nav__icon" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M9 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V9"
                        stroke="currentColor" stroke-width="2" />
                    <path d="M16 5H8M16 12H8M11 19H8" stroke="currentColor" stroke-width="2" />
                    <path d="M16 17H21M21 17L18 14M21 17L18 20" stroke="currentColor" stroke-width="2" />
                </svg>
                <span>Войти</span>
            </a>
        </li>
    </ul>
</div>