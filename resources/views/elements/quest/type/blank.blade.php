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
            value="{{isset($disabled) ? (is_array($answer) ? implode(' или  ', $answer) : $answer) : ''}}"
            {{$disabled ?? ''}}
        />
    </div>
    @if(isset($isCorrect))
        </div>
    @endif
</div>
