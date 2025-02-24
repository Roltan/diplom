<div class="input input__datalist {{ $class ?? '' }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <!-- Поле ввода с автодополнением -->
    <input
        type="text"
        id="{{ $name }}"
        name="{{ $name }}"
        @isset($value) value="{{ $value }}" @endisset
        class="input--field"
        placeholder="Начните вводить..."
        @if(!isset($required) or $required==true) required @endif
    />
    <!-- Список вариантов -->
    <ul id="{{ $name }}-options" class="options-list" style="display: none;"></ul>
</div>

<style>
    .input__datalist {
        position: relative;
    }
    .options-list {
        position: absolute;
        top: 100%;
        width: 100%;
        max-height: 150px;
        overflow-y: auto;
        background-color: #c9ddff;
        color: #2b76bc;
        list-style: scroll;
        margin: 0;
        padding: 0;
        z-index: 1000;
    }
    .options-list li {
        cursor: pointer;
        padding: 8px;
    }
    .options-list li:hover {
        background: #bdd5fd;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('{{$name}}');
    const optionsList = document.getElementById('{{$name}}-options');
    const options = @json($options);

    // Функция для отображения списка вариантов
    function showOptions(filteredOptions) {
        optionsList.innerHTML = ''; // Очищаем список
        if (filteredOptions.length > 0) {
            filteredOptions.forEach(option => {
                const listItem = document.createElement('li');
                listItem.textContent = option;
                listItem.addEventListener('click', function () {
                    input.value = option; // Устанавливаем выбранное значение
                    hideOptions(); // Скрываем список
                });
                optionsList.appendChild(listItem);
            });
            optionsList.style.display = 'block'; // Показываем список
        } else {
            optionsList.style.display = 'none'; // Скрываем список, если нет совпадений
        }
    }

    // Функция для скрытия списка
    function hideOptions() {
        optionsList.style.display = 'none';
    }

    // Обработчик события input
    input.addEventListener('input', function () {
        const inputValue = input.value.trim().toLowerCase();
        if (inputValue.length > 0) {
            const filteredOptions = options.filter(option =>
                option.toLowerCase().includes(inputValue)
            );
            showOptions(filteredOptions); // Отображаем отфильтрованные варианты
        } else {
            hideOptions(); // Скрываем список, если поле пустое
        }
    });

    // Скрываем список при клике вне компонента
    document.addEventListener('click', function (event) {
        if (!input.contains(event.target) && !optionsList.contains(event.target)) {
            hideOptions();
        }
    });
});
</script>
