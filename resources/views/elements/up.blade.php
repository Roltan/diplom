<button onclick="ScrollToTop()" class="button button__blue button__top">
    <img src="/img/up.png" alt="">
</button>

<script defer>
    function ScrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    }

    window.addEventListener("scroll", function () {
        const btn = document.querySelector(".button__top");

        if (window.scrollY > 300) {
            btn.style.display = 'flex';
        } else {
            btn.style.display = 'none';
        }
    });
</script>
