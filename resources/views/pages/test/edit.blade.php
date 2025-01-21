@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/test.css" />
    <script defer type="module" src="/js/quest/resetQuest.js"></script>
    <script defer type="module" src="/js/quest/addQuest.js"></script>
    <script defer type="module" src="/js/quest/createQuest.js"></script>
    <script defer type="module" src="/js/saveTest.js"></script>
    <script defer src="/js/quest/delQuest.js"></script>
    <script defer src="/js/quest/addAnswerChoice.js"></script>
    <script defer src="/js/quest/addAnswerRelation.js"></script>
@endsection

@section('mainContent')
    @include('block.header')

    <figure class="background"></figure>

    <main class="container">
        @include('block/settings-test', [
            'title' => isset($title)? $title : '',
            'only_user' => $only_user,
            'max_time' => isset($max_time)? $max_time : ''
        ])

        <div class="test--button" id="edit--footer">
            <button type="button" class="button button__blue button__bold" id="saveTest" onclick="editSettingsTest()">Сохранить тест</button>
        </div>

        @foreach ($quest as $item)
            @include('/elements/quest/correctQuest', $item)
        @endforeach
    </main>
@endsection
