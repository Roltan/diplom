@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/profile.css" />
@endsection

@section('mainContent')
    @include('/block/header_lk', ['active'=>1])

    <figure class="background"></figure>

    <main class="container">
        @include('/block/navLK', ['active'=>1])

        <div class="main">
            <div>
                <img src="/img/lk/humen.png" alt="" />
                <div class="input input__dark">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" class="input--field" readonly value="{{$name}}"/>
                </div>
                <div class="input input__dark">
                    <label for="email">Почта</label>
                    <input type="email" name="email" id="email" class="input--field" readonly value="{{$email}}"/>
                </div>
            </div>
        </div>
    </main>
@endsection
