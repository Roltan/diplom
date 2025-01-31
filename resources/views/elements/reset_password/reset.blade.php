<script defer type="module" src="/js/auth/password.js"></script>

<div class="modalka modalka--wrapper" id="resetPasswordModal" style="display: flex">
    <form class="form--login form" id="resetPassword">
        <h1>Введите новый пароль</h1>
        <div class="input">
            <label for="email_reset">Почта</label>
            <input type="email" name="email" id="email_reset" class="input--field" readonly value="{{ $email }}"/>
        </div>
        <div class="input">
            <label for="password_reg_reset">Пароль</label>
            <input type="password" name="password" id="password_reset" class="input--field" required/>
        </div>
        <div class="input">
            <label for="password_confirmation_reset">Повторите пароль</label>
            <input type="password" name="password_confirmation" id="password_confirmation_reset" class="input--field" required/>
        </div>
        <button type="submit" class="button button__blue button__bold">Продолжить</button>
    </form>
</div>
