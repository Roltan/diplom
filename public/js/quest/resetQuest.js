import { bindModalEvents, errorModal } from "../auth/modal.js";

function resetQuest(button) {
    // Найти родительский элемент .quest__edit
    var questElement = button.closest(".quest__edit");
    var modalElement = document.getElementById(
        questElement.querySelector(".openModalBtn").dataset.modal
    );

    // Определить тип
    var type = questElement
        .querySelector(".quest")
        .className.split(" ")[1]
        .split("__")[1];

    // Получить значение топика
    var topic = document.getElementById("topic").value;

    // Найти все элементы с классом quest__edit
    var questElements = document.querySelectorAll(".quest__edit");

    // Сформировать массив из номеров id
    var ids = Array.from(questElements).map((element) => {
        // Извлечь число из id (например, из "quest123" извлечь "123")
        return parseInt(element.id.replace("quest", ""), 10);
    });

    // Отправить AJAX-запрос
    fetch("/api/quest/generate", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            type: type,
            topic: topic,
            ids: ids,
        }),
    })
        .then(async (response) => {
            if (response.status == 200) {
                const data = await response.text();
                // Создать DOM-элемент из строки
                var tempDiv = document.createElement("div");
                tempDiv.innerHTML = data;

                // Найти новые элементы
                var newQuestElement = tempDiv.querySelector(".quest__edit");
                var newModalElement = tempDiv.querySelector(".modalka");

                // Заменить старые элементы новыми
                questElement.replaceWith(newQuestElement);
                modalElement.replaceWith(newModalElement);

                bindModalEvents();
            } else {
                response = await response.json();
                errorModal(response.message);
            }
        })
        .catch((error) => errorModal(error));
}

window.resetQuest = resetQuest;
