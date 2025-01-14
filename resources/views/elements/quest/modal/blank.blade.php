<div class="input">
    <label for="questEdit{{$id}}Quest">Задание</label>
    <input type="text" name="questEdit{{$id}}Quest" id="questEdit{{$id}}Quest" class="input--field" value="{{$quest}}"/>
</div>
<div class="answer answer__blank">
    <div class="input">
        <label for="questEdit{{$id}}answer">Ответ</label>
        <input type="text" name="questEdit{{$id}}answer" id="questEdit{{$id}}answer" class="input--field" value="{{$answer}}"/>
    </div>
</div>
<div class="test--button">
    <button type="button" class="button button__blue button__bold" onclick="saveQuest(this, 'blank')">Сохранить</button>
</div>
