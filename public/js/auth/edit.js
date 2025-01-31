import { errorModal } from "./modal.js";

document.getElementById("editProfile").addEventListener("click", function () {
    // Разрешаем редактирование инпутов
    document.getElementById("name").readOnly = false;
    document.getElementById("email").readOnly = false;

    // Показываем кнопку отправки формы
    document.querySelector(
        '#profile_data button[type="submit"]'
    ).style.display = "block";

    // Скрываем кнопку редактирования
    this.style.display = "none";
});

document
    .getElementById("profile_data")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        fetch("/api/auth/edit", {
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
                    window.location.reload();
                } else {
                    // Обрабатываем ошибки валидации
                    console.log(result);
                    errorModal(result.message);
                }
            });
    });
