<nav class="navLK {{ $class ?? '' }}">
    <div>
        <figure></figure>

        <a href="/profile" class="{{ $active == 1 ? 'active' : '' }}">
            <img src="/img/human.png" alt="" />
            <span>Данные аккаунта</span>
        </a>
        <a href="/profile/create" class="{{ $active == 2 ? 'active' : '' }}">
            <img src="/img/lk/create.png" alt="" />
            <span>Создать тест</span>
        </a>
        <a href="/profile/statistic" class="{{ $active == 3 ? 'active' : '' }}">
            <img src="/img/lk/statistic.png" alt="" />
            <span>Статистика</span>
        </a>
        <a href="/profile/solved" class="{{ $active == 4 ? 'active' : '' }}">
            <img src="/img/lk/solved.png" alt="" />
            <span>Мои решения</span>
        </a>
        <a href="/profile/test" class="{{ $active == 5 ? 'active' : '' }}">
            <img src="/img/lk/test.png" alt="" />
            <span>Мои тесты</span>
        </a>
    </div>
    <a href="/logout">
        <img src="/img/lk/exit.png" alt="" />
        <span>Выйти из аккаунта</span>
    </a>
</nav>
