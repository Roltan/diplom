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

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('{{ $name }}');

    // Проверяем, является ли устройство мобильным
    const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

    if (isMobile) {
        input.addEventListener('input', function () {
            // Если пользователь начал вводить текст, пытаемся показать список
            if (input.value.trim().length > 0) {
                input.focus(); // Фокусируем инпут
                input.click(); // Программно кликаем по инпуту
            }
        });
    }
});
</script>
