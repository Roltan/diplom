@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/index.css" />
    <script defer src="/js/paginate.js"></script>
@endsection

@section('mainContent')
    @include('block.header')

    @if(session('email'))
        @include('elements.reset_password.reset', [
            'email'=>session('email')
        ])
    @endif

    <main class="container index">
        <div class="slogan">Создайте свой тест за считанные минуты!</div>

        <div class="index--main">
            <section class="descriptions">
                <div>
                    <img src="/img/index/1666071.png" alt="" />
                    <span>Разнообразные тематики</span>
                </div>
                <div>
                    <img src="/img/index/125375123.png" alt="" />
                    <span>Настройка генерации тестов</span>
                </div>
                <div>
                    <img src="/img/index/123671253.png" alt="" />
                    <span>Экономия времени</span>
                </div>
                <div>
                    <img src="/img/index/7036414.png" alt="" />
                    <span>Обширная база вопросов</span>
                </div>
            </section>
            <div class="line"></div>
            <form class="form" action='/test/generate' method="POST">
                <div>
                    @include('/elements/input/selector', [
                        'name'=>'topic',
                        'label'=>'Выберете тему',
                        'options'=>$topics,
                        'strValue' => true,
                        'value' => old('topic')
                    ])
                    <div class="input">
                        <label for="overCount">Количество вопросов</label>
                        <input type="number" name="overCount" id="overCount" class="input--field" required value="{{old('overCount')}}" />
                    </div>
                    @include('/elements/input/selector', [
                        'name'=>'difficulty',
                        'label'=>'Выберете сложность',
                        'options'=>$difficulties,
                        'strValue' => true,
                        'required' => false,
                        'value' => old('difficulty')
                    ])
                </div>

                <button type="submit" class="button button__blue button__bold">Сгенерировать</button>
            </form>
        </div>

        <div class="slogan">Рекомендуем вам решить эти тесты</div>

        @include('block.list_header', [
            'topic' => $topics
        ])

        @if (count($cards) > 0)
            <div class="list" id="list">
                @foreach($cards as $card)
                    @include('elements.card', $card)
                @endforeach
            </div>
            @include('elements.up', ['height'=>1000])
        @else
            @if (request()->hasAny('search', 'date', 'topic'))
                <div class="slogan bottom">Извините, по вашему запросу ничего не найдено</div>
            @else
                <div class="slogan bottom">Извините, нам нечего вам порекомендовать</div>
            @endif
        @endif
    </main>
@endsection
