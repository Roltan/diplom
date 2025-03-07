<div class="input">
    <label for="questEdit1Quest">Задание</label>
    <textarea name="questEdit{{$id}}Quest" id="questEdit{{$id}}Quest" class="input--field">{{$quest}}</textarea>
</div>
<div class="answer">
    @foreach ($answers as $key => $answer)
        @include('elements/input/toggle', [
            'is_multiple' => $is_multiple,
            'name' => 'questEdit'.$id.'choice'.$key,
            'checked' => $answer['checked'],
            'label' => '
                <label for="questEdit'.$id.'choice'.$key.'">
                    <div class="input">
                        <input
                            type="text"
                            name="questEdit'.$id.'choice'.$key.'value"
                            id="questEdit'.$id.'choice'.$key.'value"
                            class="input--field"
                            value="'.$answer['label'].'"
                        />
                    </div>
                </label>
            '
        ])
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
