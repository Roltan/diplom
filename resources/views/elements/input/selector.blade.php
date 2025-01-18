<div class="input {{ $class ?? '' }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="input--field" @if(!isset($required) or $required==true) required @endif>
        <option value="" @if(!isset($value) or !isset($required) or $required==true) disabled selected hidden @endif>Выбрать вариант</option>
        @if (!isset($strValue))
            @foreach($options as $optionValue => $text)
                <option value="{{ $optionValue }}" @if(isset($value) && $value == $optionValue) selected @endif >{{ $text }}</option>
            @endforeach
        @else
            @foreach($options as $text)
                <option value="{{ $text }}" @if(isset($value) && $value == $text) selected @endif >{{ $text }}</option>
            @endforeach
        @endif
    </select>
</div>

<!-- JavaScript для управления параметром -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('{{ $name }}');
        const formElement = selectElement.closest('form');

        if (formElement) {
            formElement.addEventListener('submit', function(event) {
                if (selectElement.value === '') {
                    // Удаляем параметр из данных формы, если выбран плейсхолдер
                    selectElement.disabled = true; // Отключаем элемент, чтобы он не отправлялся
                }
            });
        }
    });
</script>
