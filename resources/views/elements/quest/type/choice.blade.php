<div class="quest quest__choice">
    <span>{{$quest}}</span>
    <div>
        @php
            // Перемешиваем массив ответов случайным образом
            shuffle($answers);
        @endphp

        @foreach ($answers as $key => $answer)
            <div class="input input__{{ $is_multiple ? 'checkbox' : 'radio' }}">
                <input
                    type="{{ ($is_multiple or isset($disabled)) ? 'checkbox' : 'radio' }}"
                    name="quest{{$id}}" id="quest{{$id}}choice{{$key}}"
                    class="input--field {{isset($answer['isCorrect']) ? ($answer['isCorrect'] ? 'true' : 'false') : ''}}"
                    {{$disabled ?? ''}}
                    {{($answer['checked'] and isset($disabled))? 'checked' : ''}}
                />
                <label for="quest{{$id}}choice{{$key}}">{{$answer['label']}}</label>
            </div>
        @endforeach
    </div>
</div>
