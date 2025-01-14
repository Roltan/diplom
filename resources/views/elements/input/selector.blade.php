<div class="input {{ $class ?? '' }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="input--field" @if(!isset($required)) required @endif>
        <option value="" disabled selected hidden>Выбрать вариант</option>
        @if (!isset($strValue))
            @foreach($options as $value => $text)
                <option value="{{ $value }}">{{ $text }}</option>
            @endforeach
        @else
            @foreach($options as $text)
                <option value="{{ $text }}">{{ $text }}</option>
            @endforeach
        @endif

    </select>
</div>
