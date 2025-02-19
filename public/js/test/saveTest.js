import { errorModal } from "../auth/modal.js";

// получить alias теста
function getAlias() {
    const path = window.location.pathname; // Получаем путь
    const parts = path.split("/"); // Разделяем путь на части
    return parts[parts.length - 1]; // Возвращаем последний элемент массив
}

function createModal(testUrl) {
    document.body.innerHTML += `
        <div class="modalka modalka--wrapper modalka-open" id="modal200" style="display: flex">
            <div class="form">
                <h1>Ссылка на ваш тест: <span id="testLink">https://quizgenius/test/${testUrl}</span></h1>
                <div class="test--button test--button__max">
                    <a class="button button__blue button__bold" href="/">
                        На главную
                    </a>
                    <a class="button button__blue button__bold" href="/profile">
                        В личный кабинет
                    </a>
                </div>
            </div>
        </div>
    `;

    // копирование ссылки при нажатии
    document
        .getElementById("testLink")
        .addEventListener("click", function (event) {
            event.preventDefault();
            const link = document.getElementById("testLink").innerText;
            navigator.clipboard
                .writeText(link)
                .then(() => {
                    alert("Ссылка скопирована в буфер обмена!");
                })
                .catch((err) => {
                    console.error("Не удалось скопировать ссылку: ", err);
                });
        });

    // при закрытии модалки, пользователя перекинет в профиль
    const modal = document.querySelector("#modal200");
    modal.addEventListener("click", (event) => {
        if (event.target === modal) {
            window.location.href = "/profile";
        }
    });
}

function fetchData(url, method, data) {
    fetch(url, {
        method: method,
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => response.json())
        .then((response) => {
            if (response.status) {
                createModal(response.url);
            } else {
                errorModal(response.message);
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function saveTest() {
    const buttonIMG = document
        .querySelector("header")
        .querySelector(".button__image");

    if (buttonIMG) {
        const title = document.getElementById("title").value;
        const topic = document.getElementById("topic").value;
        const onlyUser = document.getElementById("only_user").checked;
        const max_time = document.getElementById("max_time").value;
        const is_multi = document.getElementById("is_multi").checked;
        const is_public = document.getElementById("is_public").checked;
        const difficulty = document.getElementById("difficulty")
            ? document.getElementById("difficulty").value
            : null;

        const quests = [];
        const questElements = document.querySelectorAll(".quest__edit");
        questElements.forEach((element) => {
            const id = parseInt(element.id.replace("quest", ""), 10);
            const type = element
                .querySelector(".quest")
                .classList[1].replace("quest__", "");
            quests.push({ id, type });
        });

        const data = {
            title: title,
            topic: topic,
            only_user: onlyUser,
            max_time: max_time,
            is_multi: is_multi,
            difficulty: difficulty,
            is_public: is_public,
            quest: quests,
        };

        fetchData("/api/test/create", "PUT", data);
    } else {
        errorModal(
            "Чтоб создать тест, зарегистрируйтесь или войдите в аккаунт"
        );
    }
}

function editSettingsTest() {
    const title = document.getElementById("title").value;
    const onlyUser = document.getElementById("only_user").checked;
    const alias = getAlias();
    const max_time = document.getElementById("max_time").value;
    const is_multi = document.getElementById("is_multi").checked;
    const is_public = document.getElementById("is_public").checked;

    const data = {
        title: title,
        only_user: onlyUser,
        alias: alias,
        max_time: max_time,
        is_multi: is_multi,
        is_public: is_public,
    };

    fetchData("/api/test/edit", "PUT", data);
}

window.saveTest = saveTest;
window.editSettingsTest = editSettingsTest;

export { getAlias };
