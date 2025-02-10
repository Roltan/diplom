import { bindModalEvents, errorModal, load } from "../auth/modal.js";

function addQuestion() {
    load();
    const topic = document.getElementById("topic").value;
    const difficulty = document.getElementById("difficulty")?.value;

    // Найти все элементы с классом quest__edit
    var questElements = document.querySelectorAll(".quest__edit");

    // Сформировать массив из номеров id
    var ids = Array.from(questElements).map((element) => {
        // Извлечь число из id
        return parseInt(element.id.replace("quest", ""), 10);
    });

    // Отправляем POST-запрос на /quest/generate
    fetch("/api/quest/generate", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            topic: topic,
            difficulty: difficulty,
            ids: ids,
        }),
    }).then(async (response) => {
        if (response.status == 200) {
            const data = await response.text();
            // Создаем временный элемент для парсинга HTML
            const tempDiv = document.createElement("div");
            tempDiv.innerHTML = data;

            // Находим новые элементы (карточка вопроса и модалка)
            const newQuestElement = tempDiv.querySelector(".quest__edit");
            const newModalElement = tempDiv.querySelector(".modalka");

            // Находим элемент main и .test--button
            const main = document.querySelector("main");
            const testButton = document.querySelector("#edit--footer");

            // Вставляем новые элементы перед .test--button
            if (newQuestElement) {
                main.insertBefore(newQuestElement, testButton);
            }
            if (newModalElement) {
                main.insertBefore(newModalElement, testButton);
            }

            // Перепривязываем обработчики событий для модалок
            load();
            bindModalEvents();
        } else {
            load();
            response = await response.json();
            errorModal(response.message);
        }
    });
}

window.addQuestion = addQuestion;
