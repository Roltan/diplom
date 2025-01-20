<header class="header header--lk">
    <div class="container">
        <a class="header--logo" href="/">
            <img src="/img/лого.png" alt="" class="logo--full"/>
            <img src="/img/logo-m.png" alt="" class="logo--mini"/>
        </a>

        <div class="header--buttons">
            <span class="header--text">Личный кабинет</span>
        </div>

        <img src="/img/burger.png" alt="" class="openModalBtn burger" data-modal="navLK" />
    </div>
</header>
@if (!isset($notNav))
    <div class="modalka modalka--wrapper" id="navLK">
        @include('/block/navLK', [
            'active'=>$active,
            'class' =>'navLK__bar'
        ])
    </div>
@endif
