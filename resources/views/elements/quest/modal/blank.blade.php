<div class="input">
    <label for="questEdit{{$id}}Quest">Задание</label>
    <textarea name="questEdit{{$id}}Quest" id="questEdit{{$id}}Quest" class="input--field">{{$quest}}</textarea>
</div>
<div class="answer answer__blank">
    @for ($i=0; $i<count($answer); $i++)
        <div class="input">
            <label for="questEdit{{$id}}Blank{{$i}}">Ответ</label>
            <input type="text" name="questEdit{{$id}}Blank{{$i}}" id="questEdit{{$id}}Blank{{$i}}" class="input--field" value="{{$answer[$i]}}"/>
        </div>
    @endfor
</div>
<div class="test--button test--button__max">
    <button type="button" class="test--add test--add__light test--add__choice" onclick="addAnswerBlank(this)">
        <div>
            <img src="/img/edit/add.png" alt="" />
        </div>
        Добавить ответ
    </button>
    <button type="button" class="button button__blue button__bold" onclick="saveQuest(this, 'blank')">Сохранить</button>
</div>
