<div class="input {{ $class ?? '' }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <!-- Поле ввода с автодополнением -->
    <input
        type="text"
        id="{{ $name }}"
        name="{{ $name }}"
        list="{{ $name }}_list"
        @isset($value) value="{{ $value }}" @endisset
        class="input--field"
        placeholder="Начните вводить..."
        @if(!isset($required) or $required==true) required @endif
    />
    <!-- Список вариантов -->
    <datalist id="{{ $name }}_list">
        @foreach($options as $text)
            <option value="{{ $text }}">{{ $text }}</option>
        @endforeach
    </datalist>
</div>
