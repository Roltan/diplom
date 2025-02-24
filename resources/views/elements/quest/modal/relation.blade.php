<div class="input">
    <label for="questEdit{{$id}}Quest">Задание</label>
    <textarea name="questEdit{{$id}}Quest" id="questEdit{{$id}}Quest" class="input--field">{{$quest}}</textarea>
</div>
<div class="answer answer__relation">
    @for ($i = 0; $i < count($first_column); $i++)
        <div class="input">
            <input type="text" name="questEdit{{$id}}FirstColumn{{$i}}" id="questEdit{{$id}}FirstColumn{{$i}}" class="input--field FirstColumn" value="{{$first_column[$i]}}"/>
        </div>
        <div class="input">
            <input type="text" name="questEdit{{$id}}SecondColumn{{$i}}" id="questEdit{{$id}}SecondColumn{{$i}}" class="input--field SecondColumn" value="{{$second_column[$i]}}"/>
        </div>
    @endfor
</div>
<div class="test--button test--button__max">
    <button type="button" class="test--add test--add__light test--add__relation" onclick="addAnswerRelation(this)">
        <div>
            <img src="/img/edit/add.png" alt="" />
        </div>
        Добавить пару
    </button>
    <button type="button" class="button button__blue button__bold" onclick="saveQuest(this, 'relation')">Сохранить</button>
</div>

