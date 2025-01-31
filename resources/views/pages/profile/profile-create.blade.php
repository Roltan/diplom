@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/create.css" />
    <script defer src="/js/test/editCount.js"></script>
@endsection

@section('mainContent')
    @include('/block/header_lk', ['active'=>2])

    <figure class="background"></figure>

    <main class="container">
        @include('/block/navLK', ['active'=>2])

        <div class="main">
            <form action='/test/generate' method="POST">
                <div class="input input__dark">
                    <label for="title">Название</label>
                    <input type="text" name="title" id="title" class="input--field" required/>
                </div>

                <section>
                    <div>
                        <h1>Количество вопросов</h1>
                        <div class="input--wrap__img">
                            <img src="/img/create/choice.png" alt="" />
                            <div class="input input__dark">
                                <label for="choiceCount">С выбором</label>
                                <input type="number" placeholder="число" name="choiceCount" id="choiceCount" class="input--field" />
                            </div>
                        </div>
                        <div class="input--wrap__img">
                            <img src="/img/create/blank.png" alt="" />
                            <div class="input input__dark">
                                <label for="blankCount">С бланком</label>
                                <input type="number" placeholder="число" name="blankCount" id="blankCount" class="input--field" />
                            </div>
                        </div>
                        <div class="input--wrap__img">
                            <img src="/img/create/relation.png" alt="" />
                            <div class="input input__dark">
                                <label for="relationCount">На соотношение</label>
                                <input type="number" placeholder="число" name="relationCount" id="relationCount" class="input--field" />
                            </div>
                        </div>
                        <div class="input--wrap__img">
                            <img src="/img/create/fill.png" alt="" />
                            <div class="input input__dark">
                                <label for="fillCount">На заполнение</label>
                                <input type="number" placeholder="число" name="fillCount" id="fillCount" class="input--field" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1>Общее</h1>
                        @include('/elements/input/selector', [
                            'name'=>'topic',
                            'label'=>'Выберете тему',
                            'class' => 'input__dark',
                            'options'=>$topics,
                            'strValue' => true
                        ])
                        <div class="input input__dark">
                            <label for="overCount">Количество вопросов</label>
                            <input type="number" placeholder="число" name="overCount" id="overCount" class="input--field" required/>
                        </div>
                        @include('/elements/input/selector', [
                            'name'=>'difficulty',
                            'label'=>'Выберете сложность',
                            'options'=>$difficulties,
                            'strValue' => true,
                            'required' => false
                        ])
                    </div>
                </section>

                <button type="submit" class="button button__blue button__bold">Сгенерировать</button>
            </form>
        </div>
    </main>
@endsection
