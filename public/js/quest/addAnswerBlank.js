function addAnswerBlank(button) {
    // Находим форму, в которой находится кнопка
    const form = button.closest(".modalka--wrapper");
    const answerContainer = form.querySelector(".answer");

    // Находим последний элемент ответа
    const lastAnswer = answerContainer.lastElementChild;

    if (lastAnswer) {
        // Извлекаем значения из последнего элемента
        const id = lastAnswer
            .querySelector("input")
            .id.match(/questEdit(\d+)Blank(\d+)/)[1];
        const newKey =
            parseInt(
                lastAnswer
                    .querySelector("input")
                    .id.match(/questEdit\d+Blank(\d+)/)[1],
                10
            ) + 1;

        // Создаем новый элемент
        const newAnswer = document.createElement("div");
        newAnswer.className = `input input__blank`;
        newAnswer.innerHTML = `
            <label for="questEdit${id}Blank${newKey}">Ответ</label>
            <input type="text" name="questEdit${id}Blank${newKey}" id="questEdit${id}Blank${newKey}" class="input--field" value=""/>
        `;

        // Добавляем новый элемент в конец контейнера
        answerContainer.appendChild(newAnswer);
    }
}
