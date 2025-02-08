@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/test.css" />
@endsection

@php
    $timeParts = explode(':', $max_time);
    $hours = (int)$timeParts[0];
    $min = (int)$timeParts[1];

    function pluralForm(int $number,string $form1,string $form2,string $form3): string
    {
        $lastDigit = $number % 10;
        $lastTwoDigits = $number % 100;

        // Исключение для чисел от 11 до 19
        if ($lastTwoDigits >= 11 && $lastTwoDigits <= 19) {
            return $form3;
        }

        // Определение формы в зависимости от последней цифры
        if ($lastDigit === 1) {
            return $form1;
        } elseif ($lastDigit >= 2 && $lastDigit <= 4) {
            return $form2;
        } else {
            return $form3;
        }
    }
@endphp

@section('mainContent')
    @include('block.header')

    <main class="container settings">
        <h1 class="settings--left">
            На решение теста "{{ $title }}" отводится
            @if ($hours != 0)
                {{ $hours }} {{ pluralForm($hours, 'час', 'часа', 'часов') }}
            @endif
                {{ $min }} {{ pluralForm($min, 'минута', 'минуты', 'минут') }}.
            <br>
            Вы готовы начать решение?
        </h1>

        <div class="test--button">
            <a class="button button__blue button__bold" href="{!! request()->url() . '?prepared=true' !!}">Начать тест</a>
        </div>
    </main>
@endsection
