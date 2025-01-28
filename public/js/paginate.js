let currentPage = 1;
const container = document.getElementById("list");
let lastPage = Infinity; // Инициализируем lastPage значением Infinity, чтобы изначально допускать загрузку
let isLoading = false;

function loadMoreNews() {
    currentPage++;

    fetch("/api/test/advise")
        .then((response) => response.json())
        .then((data) => {
            lastPage += data.tests.length; // Обновляем значение lastPage
            data.tests.forEach((item) => {
                const newItem = document.createElement("div");
                newItem.innerHTML = item;
                console.log(item);
                container.appendChild(newItem);
            });
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
            loadMoreNews();
        }
    }
});
