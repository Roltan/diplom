<div class="statistic--header">
    <div class="input input__img">
        <label for="search"><img src="/img/lens.png" alt="" /></label>
        <input
            type="text"
            placeholder="поиск"
            name="search"
            id="search"
            class="input--field"
            value="{!! request('search') !!}"
        />
    </div>
    <img src="/img/filter.png" alt="" class="openModalBtn" data-modal="modal2" />

    <div class="modalka" id="modal2">
        <form class="filter form">
            @isset($tests)
                @include('/elements/input/selector', [
                    'name'=>'test',
                    'label'=>'Тест',
                    'options'=>$tests,
                    'strValue'=>true,
                    'required'=>false,
                    'value'=>request('test')
                ])
            @endisset

            @include('/elements/input/data_select', [
                'name' => 'date',
                'value' => request('date')
            ])

            <button type="submit" class="button button__light button__bold">Применить</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const filterForm = document.querySelector('.filter.form');

        searchInput.addEventListener('input', function() {
            const searchValue = searchInput.value.trim();
            const formData = new FormData(filterForm);
            const params = new URLSearchParams();

            // Добавляем данные из фильтров
            formData.forEach((value, key) => {
                if (value) {
                    params.append(key, value);
                }
            });

            // Добавляем значение поиска
            if (searchValue) {
                params.append('search', searchValue);
            }

            // Формируем URL с параметрами
            const url = window.location.pathname + '?' + params.toString();

            // Перенаправляем пользователя на новый URL
            window.location.href = url;
        });
    })
</script>
