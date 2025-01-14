<div class="quest quest__relation">
    <span>{{$quest}}</span>
    <div class="quest__relation--grid {{isset($answer) ? 'quest__relation--grid__solved' : ''}}">
        @php
            if(!isset($disabled)){
                // Перемешиваем массив ответов случайным образом
                shuffle($second_column);
            }
        @endphp

        @for ($i = 0; $i < count($first_column); $i++)
            <div>{{$first_column[$i]}}</div>
            @if (isset($answer))
                <img src="/img/checkbox/{{$answer[$i] ? 'true' : 'false'}}.png" alt="" />
            @endif
            <div class="interactive second-column" id="quest{{$id}}relation{{$i}}" draggable="true">{{$second_column[$i]}}</div>
        @endfor
    </div>
</div>
