@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/solved.css" />
@endsection

@section('mainContent')
    @include('block/header')

    <main class="container">
        <div class="main--header__row">
            <h1 class="main--header">{{$title}}</h1>
            <h1 class="main--header">{{$topic}}</h1>
        </div>

        <div class="settings">
            <h1>Имя тестируемого: {{$student}}</h1>

            <div>
                <div>
                    <span>Оценка: {{$grade}}</span>
                    <span>Процент правильных ответов: {{$percent}}%</span>
                    <span>Дата прохождения: {{$date}}</span>
                </div>
                <div>
                    <span>Набрал баллов: {{$score}}</span>
                    <span>Потрачено времени: {{$solved_time}}</span>
                    <span>
                        <img src="/img/checkbox/{{$isLeave ? 'false' : 'true'}}.png" alt="" />
                        Не покидал страницу
                    </span>
                </div>
            </div>
        </div>

        @foreach ($answer as $item)
            @include('elements/quest/card/answer', $item)
        @endforeach

        <div class="test--button">
            <a
                @if (Auth::check() && url()->previous() !== url('/test/generate'))
                    href="{{ url()->previous() }}"
                @else
                    href="/"
                @endif
                class="button button__blue button__bold"
            >Назад</a>
        </div>

        @include('elements/up')
    </main>
@endsection

