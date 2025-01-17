import { errorModal } from "./auth/modal.js";
import { getAlias } from "./saveTest.js";

const startTime = new Date().getTime();
let isUserAway = false;
let isClick = false;

// событие на уход пользователя со страницы
document.addEventListener("visibilitychange", function () {
    if (document.hidden) {
        isUserAway = true;
        console.log("Пользователь ушел со страницы.");
    }
});

// получить объекты с ответами на вопросы
function getAnswer(questElements) {
    let questData = []; // Массив для хранения объектов ответов

    // цикл по все вопросам
    questElements.forEach((questElement) => {
        const classes = questElement.classList;
        // для вопроса blank
        if (classes.contains("quest__blank")) {
            // Находим инпут внутри элемента
            const inputElement = questElement.querySelector(".input--field");
            if (inputElement) {
                // Извлекаем id из атрибута id инпута
                const inputId = inputElement.id;
                const id = parseInt(inputId.replace("quest", ""), 10); // Убираем "quest" и преобразуем в число

                // Получаем значение из инпута
                const text = inputElement.value;

                // Формируем объект
                const questObject = {
                    id: id,
                    type: "blank",
                    text: text,
                };

                // Добавляем объект в массив
                questData.push(questObject);
            }
        }

        // Обработка вопросов типа choice
        else if (classes.contains("quest__choice")) {
            // Находим все чекбоксы и радиокнопки
            const inputs = questElement.querySelectorAll(
                'input[type="checkbox"], input[type="radio"]'
            );
            const selectedLabels = [];

            inputs.forEach((input) => {
                if (input.checked) {
                    // Находим соответствующий label
                    const label = questElement.querySelector(
                        `label[for="${input.id}"]`
                    );
                    if (label) {
                        selectedLabels.push(label.textContent.trim());
                    }
                }
            });

            // Извлекаем id из первого инпута
            const firstInputId = inputs[0].id;
            const id = parseInt(
                firstInputId.replace("quest", "").split("choice")[0],
                10
            ); // Убираем "quest" и "choice" и преобразуем в число

            // Формируем объект для choice
            const questObject = {
                id: id,
                type: "choice",
                text: selectedLabels,
            };

            // Добавляем объект в массив
            questData.push(questObject);
        }

        // Обработка вопросов типа fill
        else if (classes.contains("quest__fill")) {
            // Находим все селекторы внутри вопроса
            const selectors = questElement.querySelectorAll(
                ".input__little select"
            );

            // Собираем значения из селекторов
            const text = Array.from(selectors).map((select) => {
                const selectedOption = select.options[select.selectedIndex];
                return selectedOption.value;
            });

            // Извлекаем id из первого селектора
            const firstSelectorId = selectors[0]?.id;
            const id = parseInt(
                firstSelectorId.replace("quest", "").split("selector")[0],
                10
            );

            // Формируем объект для fill
            const questObject = {
                id: id,
                type: "fill",
                text: text,
            };

            // Добавляем объект в массив
            questData.push(questObject);
        }

        // Обработка вопросов типа relation
        else if (classes.contains("quest__relation")) {
            // Находим все элементы второго столбца с классом interactive
            const interactiveElements = questElement.querySelectorAll(
                ".interactive.second-column"
            );

            // Сортируем элементы по grid-row
            const sortedElements = Array.from(interactiveElements).sort(
                (a, b) => {
                    const rowA = parseInt(a.style.gridRow, 10);
                    const rowB = parseInt(b.style.gridRow, 10);
                    return rowA - rowB;
                }
            );

            // Собираем текст из отсортированных элементов
            const text = sortedElements.map((element) =>
                element.textContent.trim()
            );

            // Извлекаем id из первого элемента
            const firstElementId = interactiveElements[0]?.id;
            const id = parseInt(
                firstElementId.replace("quest", "").split("relation")[0],
                10
            );

            // Формируем объект для relation
            const questObject = {
                id: id,
                type: "relation",
                text: text,
            };

            // Добавляем объект в массив
            questData.push(questObject);
        }
    });

    return questData;
}

function bindSaveAnswer() {
    document
        .getElementById("finish_test")
        .addEventListener("click", function () {
            saveAnswer();
        });
}

// обработка события завершения теста
function saveAnswer() {
    if (!isClick) {
        isClick = true;
        // получить все вопросы
        const questElements = document.querySelectorAll(".quest");

        // Собираем данные формы
        var data = {
            test_alias: getAlias(),
            time: (new Date().getTime() - startTime) / 1000,
            is_escape: isUserAway,
            answer: getAnswer(questElements),
        };

        // Отправляем запрос на сервер
        fetch("/api/test/solved/save", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                return response.json();
            })
            .then((result) => {
                if (result.status == true) {
                    // Успешная отправка
                    window.location.href = "/solved/" + result.solved_id;
                } else {
                    // Обрабатываем ошибки валидации
                    errorModal(result.message);
                    isClick = false;
                }
            });

        bindSaveAnswer();
    }
}

bindSaveAnswer();
