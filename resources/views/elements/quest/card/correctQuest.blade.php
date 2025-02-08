<div class="quest__edit" id="quest{{$id}}">
    @switch($type)
        @case('choice')
            @include('elements/quest/type/choice', [
                'quest'=>$quest,
                'id'=>$id,
                'is_multiple'=> $is_multiple,
                'disabled'=>'disabled',
                'answers'=>$answers
            ])
            @break
        @case('blank')
            @include('elements/quest/type/blank', [
                'id'=>$id,
                'quest'=>$quest,
                'disabled'=>'disabled',
                'answer'=>$answer
            ])
            @break
        @case('fill')
            @include('elements/quest/type/fill', [
                'id'=>$id,
                'quest'=>$quest,
                'disabled'=>'disabled',
                'options'=>$options
            ])
            @break
        @case('relation')
            @include('elements/quest/type/relation', [
                'quest' => $quest,
                'id'=>$id,
                'disabled'=>'disabled',
                'first_column'=>$first_column,
                "second_column"=> $second_column
            ])
            @break
    @endswitch
</div>
