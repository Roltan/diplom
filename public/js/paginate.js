let currentPage = 1;
const container = document.getElementById("list");
let lastPage = Infinity; // Инициализируем lastPage значением Infinity, чтобы изначально допускать загрузку
let isLoading = false;

function loadMore() {
    currentPage++;

    fetch("/api/test/advise?page=" + currentPage)
        .then((response) => response.json())
        .then((data) => {
            lastPage += data.tests.length; // Обновляем значение lastPage
            let duplicateFound = false;
            let existingLinks = new Set();
            // Сохраняем все существующие ссылки
            document.querySelectorAll(".list--card").forEach((card) => {
                existingLinks.add(card.getAttribute("href"));
            });

            data.tests.forEach((item) => {
                const newItem = document.createElement("div");
                newItem.innerHTML = item;
                container.appendChild(newItem);

                const link = newItem.querySelector("a")?.getAttribute("href");
                if (link && existingLinks.has(link)) {
                    duplicateFound = true;
                } else {
                    container.appendChild(newItem);
                }
            });
            console.log(duplicateFound);
            isLoading = false;
        });
}

window.addEventListener("scroll", () => {
    if (
        container &&
        container.lastElementChild &&
        !isLoading &&
        currentPage < lastPage
    ) {
        const scrollTop =
            window.pageYOffset || document.documentElement.scrollTop;
        const scrollHeight = document.documentElement.scrollHeight;
        const clientHeight = document.documentElement.clientHeight;

        if (scrollTop + clientHeight >= scrollHeight - 100) {
            isLoading = true;
            loadMore();
        }
    }
});
