import { errorModal, load } from "./modal.js";

const forgot = document.getElementById("forgot");
const reset = document.getElementById("resetPassword");
const edit = document.getElementById("edit_password");

if (forgot != null) forgot.addEventListener("submit", sendMail);
if (reset != null) reset.addEventListener("submit", changePassword);
if (edit != null) edit.addEventListener("click", editPassword);

function sendMail(event) {
    event.preventDefault(); // Предотвращаем стандартное поведение формы

    // Собираем данные формы
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    // Отправляем запрос на сервер
    fetch("/api/auth/forgot", {
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
                document.getElementById("submit_forgot").style.display = "flex";
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

function editPassword(event) {
    load();
    const email = document.getElementById("email").value;

    fetch("/api/auth/forgot", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            email: email,
        }),
    })
        .then((response) => {
            return response.json();
        })
        .then(async (result) => {
            if (result.status) {
                errorModal(
                    "На вашу почту отправлено письмо с подтверждением смены пароля"
                );
            } else {
                errorModal(result.message);
            }
        })
        .finally(() => {
            load();
        });
}
