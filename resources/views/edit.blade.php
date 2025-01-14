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
        <div class="settings">
            <h1>Настройки теста</h1>
            <div class="input">
                <label for="title">Название теста</label>
                <input type="text" name="title" id="title" class="input--field" value="@isset($title){{$title}}@endisset" required/>
            </div>
            <div class="input input__radio">
                <input type="checkbox" name="only_user" id="only_user" class="input--field toggle" />
                <label for="only_user">Только авторизованные тестируемые</label>
            </div>
            <input type="hidden" name="topic" id="topic" value="{{$topic}}" />
            @include('/elements/input/selector', [
                'name'=>'access',
                'label'=>'Доступ по',
                'options'=>[
                    'ссылке',
                ]
            ])
        </div>

        @foreach ($quest as $item)
            @include('/elements/quest/edit', $item)
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
    </main>
@endsection
