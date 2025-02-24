<div class="quest quest__fill">
    @php
        // Разбиваем текст на части по шаблону "s?:{индекс}"
        $parts = preg_split('/(s\?:[0-9]+)/', $quest, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
    @endphp

    @foreach ($parts as $part)
        @if (preg_match('/^s\?:([0-9]+)$/', $part, $matches))
            <!-- Это селектор -->
            @php
                $index = (int)$matches[1]; // Индекс селектора
                $optionsForSelector = $options[$index] ?? []; // Получаем массив опций по индексу
                $selectedOption = null;

                // Если передан параметр 'disabled', выбираем вариант с "correct" => true
                if (isset($disabled)) {
                    foreach ($optionsForSelector as $option) {
                        if ($option['correct']) {
                            $selectedOption = $option['str'];
                            break;
                        }
                    }
                } else {
                    // Если 'disabled' не передан, перемешиваем варианты
                    shuffle($optionsForSelector);
                }
            @endphp
            <span class="input input__little">
                <select
                    name="quest{{ $id }}selector{{ $index }}"
                    id="quest{{ $id }}selector{{ $index }}"
                    class="input--field {{isset($answer) ? ($answer[$index] ? 'true' : '') : ''}}"
                    {{ $disabled ?? '' }}
                    @if(isset($readonly) and ($readonly == true or $readonly == 'readonly')) onchange="handleReadOnly(this)" @endif
                >
                    @if (!isset($answer))
                        <option value="" disabled selected hidden>-</option>
                        @foreach ($optionsForSelector as $option)
                            <option
                                value="{{ $option['str'] }}"
                                {{ $option['str'] === $selectedOption ? 'selected' : (($option['correct'] and (isset($disabled) or isset($readonly))) ? 'selected' : '') }}
                            >
                                {{ $option['str'] }}
                            </option>
                        @endforeach
                    @else
                        <option value="" disabled selected hidden>{{$selectedOption}}</option>
                    @endif
                </select>
            </span>
        @else
            <!-- Это обычный текст -->
            {{ $part }}
        @endif
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Сохраняем начальные значения всех селекторов
        const selects = document.querySelectorAll('select[onchange*="handleReadOnly"]');
        selects.forEach((select) => {
            select.dataset.initialValue = select.value; // Сохраняем начальное значение
        });
    });

    function handleReadOnly(selectElement) {
        // Возвращаем сохраненное начальное значение
        selectElement.value = selectElement.dataset.initialValue;
    }
</script>
