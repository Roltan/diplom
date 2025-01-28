let currentPage = 1;
const container = document.getElementById("list");
const loading = document.getElementById("loading");
let lastPage = Infinity; // Инициализируем lastPage значением Infinity, чтобы изначально допускать загрузку
let isLoading = false;

function loadMoreNews() {
    currentPage++;
    loading.style.display = "block";

    fetch("/api/news?page=" + currentPage)
        .then((response) => response.json())
        .then((data) => {
            loading.style.display = "none";
            lastPage = data.news.last_page; // Обновляем значение lastPage
            data.news.data.forEach((item) => {
                const newItem = document.createElement("div");
                newItem.className = "news-item";
                newItem.innerHTML = `
                    <img src="${item.photo}" alt="фото">
                    <h1>${item.title}</h1>
                    <p>${item.description}</p>
                    <h2>${item.publication}</h2>
                `;
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
