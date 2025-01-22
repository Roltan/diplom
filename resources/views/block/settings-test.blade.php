<div class="settings">
    <h1>Настройки теста</h1>
    <div class="input">
        <label for="title">Название теста</label>
        <input type="text" name="title" id="title" class="input--field" value="@isset($title){{$title}}@endisset" required/>
    </div>

    <div class="input">
        <label for="max_time">Ограничение по времени</label>
        <input type="time" name="max_time" id="max_time" class="input--field" value="@isset($max_time){{$max_time}}@endisset" required/>
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

    @include('/elements/input/toggle', [
        'name' => 'only_user',
        'checked' => isset($only_user)? $only_user : false,
        'label' => 'Только авторизованные тестируемые'
    ])

    @include('/elements/input/toggle', [
        'name' => 'is_multi',
        'checked' => isset($is_multi)? $is_multi : false,
        'label' => 'Многократное решение'
    ])
</div>
