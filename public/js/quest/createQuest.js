import { bindModalEvents } from "../auth/modal.js";

function saveQuest(button, questType) {
    // Находим форму, связанную с этой кнопкой
    const form = button.closest("form");
    let modalElement = form.closest(".modalka");
    const questId = modalElement.id.replace("questEdit", "");
    let questElement = document.querySelector(`#quest${questId}`);

    // сбор данных из формы
    let requestBody = {
        topic: document.querySelector("#topic").value,
        type: questType,
        quest: form.querySelector(`#questEdit${questId}Quest`).value,
    };

    // Определяем тип вопроса и формируем тело запроса
    switch (questType) {
        case "choice":
            requestBody = {
                ...requestBody,
                ...getChoiceRequestBody(form, questId),
            };
            break;
        case "blank":
            requestBody = {
                ...requestBody,
                ...getBlankRequestBody(form, questId),
            };
            break;
        case "fill":
            break;
        case "relation":
            requestBody = {
                ...requestBody,
                ...getRelationRequestBody(form, questId),
            };
            break;
        default:
            console.error("Неизвестный тип вопроса:", questType);
            return;
    }

    // Отправляем запрос на сервер
    fetch(`/quest/create`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(requestBody),
    })
        .then((response) => response.text())
        .then((data) => {
            // Создать DOM-элемент из строки
            var tempDiv = document.createElement("div");
            tempDiv.innerHTML = data;

            // Найти новые элементы
            var newQuestElement = tempDiv.querySelector(".quest__edit");
            var newModalElement = tempDiv.querySelector(".modalka");

            if (!newQuestElement || !newModalElement) {
                throw new Error("Сервер вернул некорректную вёрстку");
            }

            // Заменить старые элементы новыми
            questElement.replaceWith(newQuestElement);
            modalElement.replaceWith(newModalElement);

            bindModalEvents();
            document.body.classList.remove("modalka-open");
        })
        .catch((error) => {
            console.error("Ошибка:", error);
            alert("Произошла ошибка при отправке запроса");
        });
}

// Функция для формирования тела запроса для типа вопроса "choice"
function getChoiceRequestBody(form, questId) {
    const choices = form.querySelectorAll(".input__radio, .input__checkbox");
    const correct = [];
    const uncorrect = [];

    choices.forEach((choice) => {
        const toggle = choice.querySelector(".toggle");
        const value = choice.querySelector(
            `#questEdit${questId}choice${toggle.id.replace(
                "questEdit" + questId + "choice",
                ""
            )}value`
        ).value;

        if (value != "")
            if (toggle.checked) {
                correct.push(value);
            } else {
                uncorrect.push(value);
            }
    });

    return {
        correct: correct,
        uncorrect: uncorrect,
    };
}

// Функция для формирования тела запроса для типа вопроса "blank"
function getBlankRequestBody(form, questId) {
    const answerInput = form.querySelector(`#questEdit${questId}answer`);
    const correct = [answerInput.value]; // Массив из одного элемента

    return {
        correct: correct,
    };
}

// Функция для формирования тела запроса для типа вопроса "relation"
function getRelationRequestBody(form) {
    const firstColumnInputs = form.querySelectorAll(
        ".input--field.FirstColumn"
    );
    const secondColumnInputs = form.querySelectorAll(
        ".input--field.SecondColumn"
    );

    // собираем значения строк
    const firstColumn = Array.from(firstColumnInputs).map(
        (input) => input.value
    );
    const secondColumn = Array.from(secondColumnInputs).map(
        (input) => input.value
    );

    // Удаляем строки с пустыми элементами
    const filteredData = firstColumn.reduce(
        (acc, value, index) => {
            if (value.trim() === "" || secondColumn[index].trim() === "") {
                return acc; // Пропускаем элементы, если хотя бы одно из значений пустое
            }
            acc.firstColumn.push(value);
            acc.secondColumn.push(secondColumn[index]);
            return acc;
        },
        { firstColumn: [], secondColumn: [] }
    );

    return {
        first_column: filteredData.firstColumn,
        second_column: filteredData.secondColumn,
    };
}

window.saveQuest = saveQuest;
