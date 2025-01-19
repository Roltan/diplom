@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/test.css" />
    <script defer src="/js/drag.js"></script>
    <script defer type="module" src="/js/saveAnswer.js"></script>
    <script defer type="module" src="/js/timer.js"></script>
@endsection

@section('mainContent')
    @include('block.header')

    <figure class="background"></figure>

    <main class="container">
        <h1 class="main--header">{{$title}}</h1>

        @foreach ($quest as $item)
            @include('/elements/quest/solve', $item)
        @endforeach

        <div class="test--button">
            <button class="button button__blue button__bold" id="finish_test">Завершить тест</button>
        </div>
    </main>

    @isset($max_time)
        <div class="timer" id="timer">
            {{ $max_time }}
        </div>
    @endisset
@endsection
