<script defer type="module" src="/js/auth/password.js"></script>

<div class="modalka modalka--wrapper" id="{{ $name }}Modal">
    <form class="form--login form" id="{{ $name }}">
        <h1>{{ $title }}</h1>
        <div class="input">
            <label for="email_{{ $name }}">Почта</label>
            <input type="email" name="email" id="email_{{ $name }}" class="input--field" />
        </div>
        <button type="submit" class="button button__blue button__bold">Продолжить</button>
    </form>
</div>

<div class="modalka modalka--wrapper modalka-open" id="submit_{{ $name }}">
    <form class="form">
        <h1>{{ $massage }}</h1>
    </form>
</div>
