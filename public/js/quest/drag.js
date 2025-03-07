class GridDraggable {
    constructor(gridElement) {
        this.grid = gridElement;
        this.interactiveElements = this.grid.querySelectorAll(".interactive");
        this.draggedElement = null;
        this.order = [];

        this.initDragAndDrop();
        this.initGridRows();
    }

    initDragAndDrop() {
        this.interactiveElements.forEach((element) => {
            element.addEventListener("dragstart", (event) =>
                this.handleStart(event)
            );
            element.addEventListener("dragend", (event) =>
                this.handleEnd(event)
            );
            element.addEventListener("dragover", (event) =>
                event.preventDefault()
            );
            element.addEventListener("dragenter", (event) =>
                this.handleEnter(event)
            );

            element.addEventListener("touchstart", (event) =>
                this.handleStart(event)
            );
            element.addEventListener("touchmove", (event) =>
                this.handleEnter(event)
            );
            element.addEventListener("touchend", (event) =>
                this.handleEnd(event)
            );

            element.addEventListener("mousedown", () =>
                this.preventTextSelection(true)
            );
            element.addEventListener("mouseup", () =>
                this.preventTextSelection(false)
            );
        });
    }

    initGridRows() {
        // Устанавливаем grid-row для всех элементов
        this.interactiveElements.forEach((element, index) => {
            element.style.gridRow = index + 1; // grid-row начинается с 1
        });

        // Устанавливаем grid-row для всех элементов первого столбца
        const firstColumnElements =
            this.grid.querySelectorAll(":not(.interactive)");
        firstColumnElements.forEach((element, index) => {
            element.style.gridRow = index + 1; // grid-row начинается с 1
        });
    }

    getHoveredElement(event) {
        // Для touch-событий
        if (event.touches && event.touches.length > 0) {
            const touch = event.touches[0];
            return document.elementFromPoint(touch.clientX, touch.clientY);
        }
        // Для drag-событий
        return event.target;
    }

    handleStart(event) {
        this.draggedElement = this.getHoveredElement(event);
        this.draggedElement.classList.add("dragging");
        // event.preventDefault();
    }

    handleEnd(event) {
        const targetElement = this.getHoveredElement(event);
        targetElement.classList.remove("dragging");
        this.updateOrder();
    }

    handleEnter(event) {
        event.preventDefault();
        const targetElement = this.getHoveredElement(event);
        if (
            targetElement !== this.draggedElement &&
            targetElement.classList.contains("interactive")
        ) {
            const draggedRow = parseInt(
                window.getComputedStyle(this.draggedElement).gridRow
            );
            const targetRow = parseInt(
                window.getComputedStyle(targetElement).gridRow
            );

            if (draggedRow !== targetRow) {
                // Меняем grid-row у перетаскиваемого элемента
                this.draggedElement.style.gridRow = targetRow;

                // Меняем grid-row у целевого элемента
                targetElement.style.gridRow = draggedRow;

                this.updateOrder();
            }
        }
    }

    updateOrder() {
        this.order = Array.from(this.interactiveElements).map((element) => {
            return {
                id: element.id,
                row: parseInt(window.getComputedStyle(element).gridRow),
            };
        });
    }

    getOrder() {
        return this.order;
    }

    preventTextSelection(prevent) {
        // Запрещаем или разрешаем выделение текста
        if (prevent) {
            document.body.style.userSelect = "none";
            document.body.style.webkitUserSelect = "none";
            document.body.style.MozUserSelect = "none";
            document.body.style.msUserSelect = "none";
        } else {
            document.body.style.userSelect = "";
            document.body.style.webkitUserSelect = "";
            document.body.style.MozUserSelect = "";
            document.body.style.msUserSelect = "";
        }
    }
}

// Создаем экземпляры класса для всех элементов с классом quest__relation--grid
const gridDraggables = [];
document.querySelectorAll(".quest__relation--grid").forEach((grid) => {
    const gridDraggable = new GridDraggable(grid);
    gridDraggables.push(gridDraggable);
});
