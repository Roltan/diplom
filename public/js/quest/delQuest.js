function delQuest(button) {
    // Найти родительский элемент .quest__edit
    var questElement = button.closest(".quest__edit");
    var modalElement = document.getElementById(
        questElement.querySelector(".openModalBtn").dataset.modal
    );

    questElement.remove();
    modalElement.remove();
}
