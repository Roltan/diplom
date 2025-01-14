<header class="header header--lk">
    <div class="container">
        <div class="header--logo">
            <a href="/">
                <img src="/img/лого.png" alt="" />
            </a>
            <img src="/img/burger.png" alt="" class="openModalBtn" data-modal="modal1" />
        </div>

        <div class="header--buttons">
            <span class="header--text">Личный кабинет</span>
        </div>
    </div>
</header>
@if (!isset($notNav))
    <div class="modalka modalka--wrapper" id="modal1">
        @include('/block/navLK', [
            'active'=>$active,
            'class' =>'navLK__bar'
        ])
    </div>
@endif
