import { errorModal } from "./modal.js";

const forgot = document.getElementById("forgot");
const resetRequest = document.getElementById("reset");
const reset = document.getElementById("resetPassword");

if (forgot != null) forgot.addEventListener("submit", sendMail);
if (resetRequest != null) resetRequest.addEventListener("submit", sendMail);
if (reset != null) reset.addEventListener("submit", changePassword);

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

function changePassword(event) {
    event.preventDefault();
    console.log(this);

    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    // Отправляем запрос на сервер
    fetch("/api/auth/changePassword", {
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
                document.getElementById("modal1").style.display = "flex";
            } else {
                errorModal(result.message);
            }
        });
}
