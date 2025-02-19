import { errorModal } from "./modal.js";

document.getElementById("login").addEventListener("submit", function (event) {
    event.preventDefault(); // Предотвращаем стандартное поведение формы

    // Собираем данные формы
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    // Отправляем запрос на сервер
    fetch("/api/auth/login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    })
        .then((response) => {
            return response.json();
        })
        .then(async (result) => {
            if (result.status == true) {
                // Успешная отправка
                await login();
            } else {
                // Обрабатываем ошибки валидации
                console.log(result);
                errorModal(result.message);
            }
        });
});

function login() {
    let headerBtn = document
        .querySelector("header")
        .querySelector(".header--buttons");

    document.querySelector("#modal1").style.display = "none";
    document.querySelector("#modal2").style.display = "none";
    document.body.classList.remove("modalka-open");

    headerBtn.innerHTML = `
        <a class="button button__blue button__image" href="/profile">
            <span>Личный кабинет</span>
            <img src="/img/human.png" alt="" />
        </a>
    `;
}

export { login };
