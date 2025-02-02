<div class="quest quest__blank">
    <span>{{$quest}}</span>
    @if(isset($isCorrect))
        <div class="input--wrap__img">
        <img src="/img/checkbox/{{ $isCorrect ? 'true' : 'false' }}.png" alt="" />
    @endif
    <div class="input">
        <label for="quest{{$id}}">Ответ</label>
        <input
            type="text"
            name="quest{{$id}}"
            id="quest{{$id}}"
            class="input--field"
            value="{{isset($disabled) ? (is_array($answer) ? implode(' или ', $answer) : $answer) : ''}}"
            {{$disabled ?? ''}}
        />
    </div>
    @if(isset($isCorrect))
        </div>
        @if (!$isCorrect)
            <div class="input">
                <label for="quest{{$id}}Correct">Правильный ответ</label>
                <input
                    type="text"
                    id="quest{{$id}}Correct"
                    class="input--field"
                    value="{{is_array($correct) ? implode(' или ', $correct) : $correct}}"
                    disabled
                />
            </div>
        @endif
    @endif
</div>
