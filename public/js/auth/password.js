import { errorModal } from "./modal.js";

document.getElementById("forgot").addEventListener("submit", sendMail);
document.getElementById("reset").addEventListener("submit", sendMail);

function sendMail(event) {
    event.preventDefault(); // Предотвращаем стандартное поведение формы

    // Собираем данные формы
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    // Отправляем запрос на сервер
    fetch("/api/auth/" + this.id, {
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
            if (result.status) {
                this.closest(".modalka").style.display = "none";
                document.getElementById("submit_" + this.id).style.display =
                    "flex";
            } else {
                errorModal(result.message);
            }
        });
}
