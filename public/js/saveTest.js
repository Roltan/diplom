import { errorModal } from "./auth/modal.js";

function saveTest() {
    const buttonIMG = document
        .querySelector("header")
        .querySelector(".button__image");

    // если авторизован
    if (buttonIMG) {
        // Собираем данные из формы
        const title = document.getElementById("title").value;
        const topic = document.getElementById("topic").value;
        const onlyUser = document.getElementById("only_user").checked;

        // Собираем вопросы
        const quests = [];
        const questElements = document.querySelectorAll(".quest__edit");
        questElements.forEach((element) => {
            const id = parseInt(element.id.replace("quest", ""), 10);
            const type = element
                .querySelector(".quest")
                .classList[1].replace("quest__", "");
            quests.push({ id, type });
        });

        // Создаем объект данных для отправки
        const data = {
            title: title,
            topic: topic,
            only_user: onlyUser,
            quest: quests,
        };

        // Отправляем PUT-запрос на сервер
        fetch("/api/test/create", {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                if (data.status) {
                    document.body.innerHTML += `
                        <div class="modalka modalka--wrapper modalka-open" id="modal200" style="display: flex">
                            <form class="form">
                                <h1>Ссылка на ваш тест: <span id="testLink">https://quizgenius/test/${data.url}</span></h1>
                                <div class="test--button test--button__max">
                                    <a class="button button__blue button__bold" href="/">
                                        На главную
                                    </a>
                                    <a class="button button__blue button__bold" href="/profile">
                                        В личный кабинет
                                    </a>
                                </div>
                            </form>
                        </div>
                    `;

                    // копирование ссылки при нажатии
                    document
                        .getElementById("testLink")
                        .addEventListener("click", function (event) {
                            event.preventDefault();
                            const link =
                                document.getElementById("testLink").innerText;
                            navigator.clipboard
                                .writeText(link)
                                .then(() => {
                                    alert("Ссылка скопирована в буфер обмена!");
                                })
                                .catch((err) => {
                                    console.error(
                                        "Не удалось скопировать ссылку: ",
                                        err
                                    );
                                });
                        });

                    // при закрытии модалки, пользователя перекинет в профиль
                    const modal = document.querySelector("#modal200");
                    modal.addEventListener("click", (event) => {
                        if (event.target === this) {
                            window.location.href = "/profile";
                        }
                    });
                } else {
                    errorModal(data.message);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    // если не авторизован
    else {
        errorModal(
            "Чтоб создать тест, зарегистрируйтесь или войдите в аккаунт"
        );
    }
}

window.saveTest = saveTest;
