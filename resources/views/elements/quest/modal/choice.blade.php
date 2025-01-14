<div class="input">
    <label for="questEdit1Quest">Задание</label>
    <input type="text" name="questEdit{{$id}}Quest" id="questEdit{{$id}}Quest" class="input--field" value="{{$quest}}"/>
</div>
<div class="answer">
    @foreach ($answers as $key => $answer)
        <div class="input input__{{ $is_multiple ? 'checkbox' : 'radio' }}">
            <input type="checkbox"
                name="questEdit{{$id}}choice{{$key}}"
                id="questEdit{{$id}}choice{{$key}}"
                class="input--field toggle"
                {{$answer['checked'] ? 'checked' : ''}}
            />
            <label for="questEdit{{$id}}choice{{$key}}">
                <div class="input">
                    <input
                        type="text"
                        name="questEdit{{$id}}choice{{$key}}value"
                        id="questEdit{{$id}}choice{{$key}}value"
                        class="input--field"
                        value="{{$answer['label']}}"
                    />
                </div>
            </label>
        </div>
    @endforeach
</div>
<div class="test--button test--button__max">
    <button type="button" class="test--add test--add__light test--add__choice" onclick="addAnswerChoice(this)">
        <div>
            <img src="/img/edit/add.png" alt="" />
        </div>
        Добавить ответ
    </button>
    <button type="button" class="button button__blue button__bold" onclick="saveQuest(this, 'choice')">Сохранить</button>
</div>
