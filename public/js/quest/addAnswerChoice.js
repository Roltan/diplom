function addAnswerChoice(button) {
    // Находим форму, в которой находится кнопка
    const form = button.closest(".modalka--wrapper");
    const answerContainer = form.querySelector(".answer");

    // Находим последний элемент с классом input input__checkbox или input input__radio
    const lastAnswer = answerContainer.lastElementChild;

    if (lastAnswer) {
        // Извлекаем значения из последнего элемента
        const id = lastAnswer
            .querySelector("input")
            .id.match(/questEdit(\d+)choice(\d+)/)[1];
        const newKey =
            parseInt(
                lastAnswer
                    .querySelector("input")
                    .id.match(/questEdit\d+choice(\d+)/)[1],
                10
            ) + 1;
        const inputType = lastAnswer.classList.contains("input__checkbox")
            ? "checkbox"
            : "radio";

        // Создаем новый элемент
        const newAnswer = document.createElement("div");
        newAnswer.className = `input input__${inputType}`;
        newAnswer.innerHTML = `
            <input type="checkbox"
                name="questEdit${id}choice${newKey}"
                id="questEdit${id}choice${newKey}"
                class="input--field toggle"
            />
            <label for="questEdit${id}choice${newKey}">
                <div class="input">
                    <input
                        type="text"
                        name="questEdit${id}choice${newKey}value"
                        id="questEdit${id}choice${newKey}value"
                        class="input--field"
                    />
                </div>
            </label>
        `;

        // Добавляем новый элемент в конец контейнера
        answerContainer.appendChild(newAnswer);
    }
}
