<div class="settings">
    <h1>Настройки теста</h1>
    <div class="input">
        <label for="title">Название теста</label>
        <input type="text" name="title" id="title" class="input--field" value="@isset($title){{$title}}@endisset" required/>
    </div>
    <div class="input input__radio">
        <input
            type="checkbox"
            name="only_user"
            id="only_user"
            class="input--field toggle"
            {{(isset($only_user) and $only_user==true)? 'checked' : ''}}
        />
        <label for="only_user">Только авторизованные тестируемые</label>
    </div>

    @isset($topic)
        <input type="hidden" name="topic" id="topic" value="{{$topic}}" />
    @endisset

    @include('/elements/input/selector', [
        'name'=>'access',
        'label'=>'Доступ по',
        'options'=>[
            'ссылке',
        ]
    ])

    <div class="input">
        <label for="max_time">Ограничение по времени</label>
        <input type="time" name="max_time" id="max_time" class="input--field" value="" required/>
    </div>
</div>
