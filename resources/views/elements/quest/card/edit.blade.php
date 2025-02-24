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
                'readonly'=>'readonly',
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
    <div class="buttons">
        <button onclick="resetQuest(this)">
            <img src="/img/edit/reset.png" alt="" />
        </button>
        <button>
            <img src="/img/edit/edit.png" alt="" class="openModalBtn" data-modal="questEdit{{$id}}" />
        </button>
        <button onclick="delQuest(this)">
            <img src="/img/edit/delet.png" alt="" />
        </button>
    </div>
</div>
<div class="modalka modalka--wrapper" id="questEdit{{$id}}">
    <form class="quest--modal form">
        @switch($type)
            @case('choice')
                @include('elements/quest/modal/choice', [
                    'quest'=>$quest,
                    'id'=>$id,
                    'is_multiple'=> $is_multiple,
                    'answers'=>$answers
                ])
                @break
            @case('blank')
                @include('elements/quest/modal/blank', [
                    'quest'=>$quest,
                    'id'=>$id,
                    'answer'=>$answer
                ])
                @break
            @case('fill')
                @include('elements/quest/modal/fill', [
                    'quest'=>$quest,
                    'id'=>$id,
                ])
                @break
            @case('relation')
                @include('elements/quest/modal/relation', [
                    'quest'=>$quest,
                    'id'=>$id,
                ])
                @break
        @endswitch
    </form>
</div>
