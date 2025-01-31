import { saveAnswer } from "./saveAnswer.js";

const timer = document.getElementById("timer");

// Функция для обновления таймера
function updateTimer() {
    // Получаем текущее значение таймера
    let time = timer.textContent;
    let [hours, minutes] = time.split(":").map(Number);

    // Уменьшаем время на 1 минуту
    if (minutes === 0) {
        if (hours === 0) {
            // Если время истекло, останавливаем таймер
            clearInterval(timerInterval);
            timer.textContent = "00:00";
            saveAnswer();
            return;
        } else {
            hours--;
            minutes = 59;
        }
    } else {
        minutes--;
    }

    // Форматируем часы и минуты с ведущими нулями
    const formattedHours = String(hours).padStart(2, "0");
    const formattedMinutes = String(minutes).padStart(2, "0");

    // Обновляем текст таймера
    timer.textContent = `${formattedHours}:${formattedMinutes}`;

    // Проверяем, осталось ли 10 минут или меньше
    if (formattedMinutes <= 10 && formattedHours == 0) {
        timer.classList.add("blink-red");
    } else {
        timer.classList.remove("blink-red");
    }
}

// Запускаем таймер с интервалом 1 минута (60000 мс)
const timerInterval = setInterval(updateTimer, 60000);
