function addAnswerRelation(button) {
    // Находим форму, в которой находится кнопка
    const form = button.closest(".modalka--wrapper");
    const answerContainer = form.querySelector(".answer");

    // Находим последнюю пару инпутов
    const lastPair = answerContainer.lastElementChild;

    if (lastPair) {
        // Извлекаем значения из последней пары
        const id = lastPair
            .querySelector("input")
            .id.match(/questEdit(\d+)SecondColumn(\d+)/)[1];
        const newIndex =
            parseInt(
                lastPair
                    .querySelector("input")
                    .id.match(/questEdit\d+SecondColumn(\d+)/)[1],
                10
            ) + 1;

        // Добавляем новую пару в конец контейнера
        answerContainer.innerHTML += `
            <div class="input">
                <input type="text" name="questEdit${id}FirstColumn${newIndex}" id="questEdit${id}FirstColumn${newIndex}" class="input--field FirstColumn" />
            </div>
        `;
        answerContainer.innerHTML += `
            <div class="input">
                <input type="text" name="questEdit${id}SecondColumn${newIndex}" id="questEdit${id}SecondColumn${newIndex}" class="input--field SecondColumn" />
            </div>
        `;
    }
}
