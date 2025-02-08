@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/test.css" />
    <script defer type="module" src="/js/quest/createQuest.js"></script>
    <script defer type="module" src="/js/test/saveTest.js"></script>
@endsection

@section('mainContent')
    @include('block.header')

    <main class="container">
        @include('block/settings-test', [
            'title' => isset($title)? $title : '',
            'only_user' => $only_user,
            'max_time' => isset($max_time)? $max_time : ''
        ])

        <div class="test--button test--button__max" id="edit--footer">
            <a href="{{ url()->previous() }}" class="button button__blue button__bold">Назад</a>
            <button type="button" class="button button__blue button__bold" id="saveTest" onclick="editSettingsTest()">Сохранить тест</button>
        </div>

        @foreach ($quest as $item)
            @include('elements/quest/card/correctQuest', $item)
        @endforeach

        @include('elements.up')
    </main>
@endsection





























