@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/test.css" />
    <script defer type="module" src="/js/quest/resetQuest.js"></script>
    <script defer type="module" src="/js/quest/addQuest.js"></script>
    <script defer type="module" src="/js/quest/createQuest.js"></script>
    <script defer type="module" src="/js/test/saveTest.js"></script>
    <script defer src="/js/quest/delQuest.js"></script>
    <script defer src="/js/quest/addAnswerChoice.js"></script>
    <script defer src="/js/quest/addAnswerRelation.js"></script>
    <script defer src="/js/quest/addAnswerBlank.js"></script>
@endsection

@section('mainContent')
    @include('block.header')

    <main class="container">
        @include('block/settings-test', [
            'title' => isset($title)? $title : '',
            'topic' => $topic
        ])

        @foreach ($quest as $item)
            @include('elements/quest/card/edit', $item)
        @endforeach

        <div class="test--button test--button__max" id="edit--footer">
            <button class="test--add" id="add_quest">
                <div>
                    <img src="/img/edit/add.png" alt="" />
                </div>
                Добавить вопрос
            </button>
            <button type="button" class="button button__blue button__bold" id="saveTest" onclick="saveTest()">Сохранить тест</button>
        </div>

        @include('elements.up')
    </main>
@endsection
