<header class="header">
    <div class="container">
        <a class="header--logo" href="/">
            <img src="/img/лого.png" alt="" class="logo--full"/>
            <img src="/img/logo-m.png" alt="" class="logo--mini"/>
        </a>
        <div class="header--buttons">
            @if (Auth::check())
                <a class="button button__blue button__image" href="/profile">
                    <span>Личный кабинет</span>
                    <img src="/img/human.png" alt="" />
                </a>
            @else
                <button class="button button__blue openModalBtn" data-modal="modal1">Вход</button>
                <button class="button button__blue openModalBtn" data-modal="modal2">Регистрация</button>
            @endif
        </div>
    </div>
</header>

@if (!Auth::check())
    <script defer type="module" src="/js/auth/login.js"></script>
    <div class="modalka modalka--wrapper" id="modal1">
        <form class="form--login form" id="login">
            <h1>Вход</h1>
            <div class="input">
                <label for="email_login">Почта</label>
                <input type="email" name="email" id="email_login" class="input--field" />
            </div>
            <div class="input">
                <label for="password_login">Пароль</label>
                <input type="password" name="password" id="password_login" class="input--field" />
            </div>
            <button type="submit" class="button button__blue button__bold">Войти</button>
        </form>
    </div>

    <script defer type="module" src="/js/auth/register.js"></script>
    <div class="modalka modalka--wrapper" id="modal2">
        <form class="form--login form" id="register">
            <h1>Регистрация</h1>
            <div class="input">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" class="input--field" />
            </div>
            <div class="input">
                <label for="email_reg">Почта</label>
                <input type="email" name="email" id="email_reg" class="input--field" />
            </div>
            <div class="input">
                <label for="password_reg">Пароль</label>
                <input type="password" name="password" id="password_reg" class="input--field" />
            </div>
            <div class="input">
                <label for="password_confirmation">Повторите пароль</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input--field" />
            </div>
            <div class="input input__checkbox">
                <input type="checkbox" name="rule" id="rule" />
                <label for="rule">
                    <span>
                        Я соглашаюсь на обработку
                        <a href="#">персональных данных</a>
                    </span>
                </label>
            </div>
            <button type="submit" class="button button__blue button__bold">Зарегистрироваться</button>
        </form>
    </div>
@endif
