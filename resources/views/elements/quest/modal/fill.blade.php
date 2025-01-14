<span>
    В поле ввода напишите текст задания. В местах где хотите сделать выбор ответа, напишите варианты разделяя их “;” и заключив в <>. Пример <вариант 1;вариант 2;вариант 3>
</span>
<div class="input">
    <label for="questEdit{{ $id }}Quest">Задание</label>
    <textarea type="text" name="questEdit{{ $id }}Quest" id="questEdit{{ $id }}Quest" class="input--field">
@php
    // Разбиваем текст на части по шаблону "s?:{индекс}"
    $parts = preg_split('/(s\?:[0-9]+)/', $quest, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
    $resultText = '';

    foreach ($parts as $part) {
        if (preg_match('/^s\?:([0-9]+)$/', $part, $matches)) {
            // Это селектор
            $index = (int)$matches[1]; // Индекс селектора
            $optionsForSelector = $options[$index] ?? []; // Получаем массив опций по индексу

            // Формируем строку вариантов
            $optionStrings = [];
            foreach ($optionsForSelector as $option) {
                $optionStrings[] = $option['str'];
            }

            // Перемещаем правильный вариант в начало
            foreach ($optionsForSelector as $key => $option) {
                if ($option['correct']) {
                    $correctOption = $optionStrings[$key];
                    unset($optionStrings[$key]);
                    array_unshift($optionStrings, $correctOption);
                    break;
                }
            }

            // Добавляем строку вариантов в текст
            $resultText .= '<' . implode(';', $optionStrings) . '>';
        } else {
            // Это обычный текст
            $resultText .= $part;
        }
    }
@endphp
{{ $resultText }}
    </textarea>
</div>
<div class="test--button">
    <button type="button" class="button button__blue button__bold" onclick="saveQuest(this, 'fill')">Сохранить</button>
</div>
