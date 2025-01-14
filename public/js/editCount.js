// Получаем все поля, которые нужно отслеживать
const choiceInput = document.getElementById("choice");
const blankInput = document.getElementById("blank");
const relationInput = document.getElementById("relation");
const fillInput = document.getElementById("fill");
const overCountInput = document.getElementById("overCount");

// Сохраняем начальные значения для сравнения
let initialChoice = parseInt(choiceInput.value) || 0;
let initialBlank = parseInt(blankInput.value) || 0;
let initialRelation = parseInt(relationInput.value) || 0;
let initialFill = parseInt(fillInput.value) || 0;
let initialOverCount = parseInt(overCountInput.value) || 0;

// Функция для обновления overCount
function updateOverCount(input, initialValue) {
    // Если значение пустое, считаем его равным 0
    const newValue = input.value === "" ? 0 : parseInt(input.value) || 0;
    const difference = newValue - initialValue; // Разница между новым и старым значением
    overCountInput.value = initialOverCount + difference; // Обновляем overCount

    // Обновляем начальные значения
    initialOverCount = parseInt(overCountInput.value) || 0;
    initialValue = newValue;
}

// Функция для обновления начальных значений при изменении overCount
function updateInitialValues() {
    initialOverCount = parseInt(overCountInput.value) || 0;
    initialChoice =
        choiceInput.value === "" ? 0 : parseInt(choiceInput.value) || 0;
    initialBlank =
        blankInput.value === "" ? 0 : parseInt(blankInput.value) || 0;
    initialRelation =
        relationInput.value === "" ? 0 : parseInt(relationInput.value) || 0;
    initialFill = fillInput.value === "" ? 0 : parseInt(fillInput.value) || 0;
}

// Добавляем обработчики событий на изменение для каждого поля
choiceInput.addEventListener("input", function () {
    updateOverCount(choiceInput, initialChoice);
    initialChoice =
        choiceInput.value === "" ? 0 : parseInt(choiceInput.value) || 0; // Обновляем начальное значение
});

blankInput.addEventListener("input", function () {
    updateOverCount(blankInput, initialBlank);
    initialBlank =
        blankInput.value === "" ? 0 : parseInt(blankInput.value) || 0; // Обновляем начальное значение
});

relationInput.addEventListener("input", function () {
    updateOverCount(relationInput, initialRelation);
    initialRelation =
        relationInput.value === "" ? 0 : parseInt(relationInput.value) || 0; // Обновляем начальное значение
});

fillInput.addEventListener("input", function () {
    updateOverCount(fillInput, initialFill);
    initialFill = fillInput.value === "" ? 0 : parseInt(fillInput.value) || 0; // Обновляем начальное значение
});

// Добавляем обработчик для overCount, чтобы обновлять начальные значения
overCountInput.addEventListener("input", function () {
    updateInitialValues();
});
