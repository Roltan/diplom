<div class="input input__datalist {{ $class ?? '' }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <!-- Поле ввода с автодополнением -->
    <input
        type="text"
        id="{{ $name }}"
        name="{{ $name }}"
        {{-- list="{{ $name }}_list" --}}
        @isset($value) value="{{ $value }}" @endisset
        class="input--field"
        placeholder="Начните вводить..."
        @if(!isset($required) or $required==true) required @endif
    />
    <!-- Список вариантов -->
    <div id="{{ $name }}_list" class="datalist"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('{{ $name }}');
        const datalist = document.getElementById('{{ $name }}_list');
        const options = @json($options); // Преобразуем массив опций в JSON

        input.addEventListener('input', function () {
            const inputValue = input.value.toLowerCase();
            datalist.innerHTML = ''; // Очищаем список подсказок

            if (inputValue.length > 0) {
                // Фильтруем варианты
                const filteredOptions = Object.entries(options).filter(([optionValue, text]) =>
                    text.toLowerCase().includes(inputValue)
                );

                if (filteredOptions.length > 0) {
                    datalist.style.display = 'block'; // Показываем список
                    filteredOptions.forEach(([optionValue, text]) => {
                        const optionElement = document.createElement('div');
                        optionElement.textContent = text;
                        optionElement.dataset.value = optionValue; // Сохраняем значение
                        optionElement.addEventListener('click', function () {
                            input.value = text; // Устанавливаем выбранное значение
                            datalist.style.display = 'none'; // Скрываем список
                        });
                        datalist.appendChild(optionElement);
                    });
                } else {
                    datalist.style.display = 'none'; // Скрываем список, если нет совпадений
                }
            } else {
                datalist.style.display = 'none'; // Скрываем список, если поле пустое
            }
        });

        // Скрываем список при клике вне поля ввода
        document.addEventListener('click', function (event) {
            if (!input.contains(event.target) && !datalist.contains(event.target)) {
                datalist.style.display = 'none';
            }
        });
    });
</script>
