let currentPage = 1;
const container = document.getElementById("list");
let lastPage = Infinity; // Инициализируем lastPage значением Infinity, чтобы изначально допускать загрузку
let isLoading = false;

function loadMore() {
    currentPage++;

    fetch("/api/test/advise" + queryParameters())
        .then((response) => response.json())
        .then((data) => {
            lastPage += data.tests.length; // Обновляем значение lastPage

            if (data.tests.length > 0) {
                data.tests.forEach((item) => {
                    const newItem = document.createElement("div");
                    newItem.innerHTML = item;
                    container.appendChild(newItem);
                });
                isLoading = false;
            } else {
                const newItem = document.createElement("div");
                newItem.className = "slogan bottom";
                newItem.innerHTML = `<div class="slogan bottom">Извините, больше нам нечего вам порекомендовать</div>`;
                container.appendChild(newItem);
                isLoading = true;
            }
        });
}

function queryParameters() {
    var parameters = "?page=" + currentPage;

    const search = document.querySelector("#filter-search").value;
    if (search != "") {
        parameters += "?filter-search=" + search;
    }

    const topic = document.querySelector("#filter-topic").value;
    if (topic != "") {
        parameters += "?filter-topic=" + topic;
    }

    const date = document.querySelector("#filter-date").value;
    if (date != "") {
        parameters += "?filter-date=" + date;
    }

    return parameters;
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
