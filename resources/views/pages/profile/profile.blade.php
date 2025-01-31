@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/profile.css" />
    <script type="module" defer src="/js/auth/edit.js"></script>
@endsection

@section('mainContent')
    @include('/block/header_lk', ['active'=>1])

    <figure class="background"></figure>

    <main class="container">
        @include('/block/navLK', ['active'=>1])

        <div class="main">
            <form id="profile_data">
                <div class="avatar">
                    <img src="/img/lk/humen.png" alt="" />
                    <button type="button" id="editProfile">
                        <img src="/img/lk/edit.png" alt="">
                    </button>
                </div>
                <input type="hidden" name="id" readonly value="{{$id}}"/>
                <div class="input input__dark">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" class="input--field" readonly value="{{$name}}"/>
                </div>
                <div class="input input__dark">
                    <label for="email">Почта</label>
                    <input type="email" name="email" id="email" class="input--field" readonly value="{{$email}}"/>
                </div>

                <button type="submit" class="button button__blue button__bold">Сохранить</button>
            </form>
        </div>
    </main>
@endsection
