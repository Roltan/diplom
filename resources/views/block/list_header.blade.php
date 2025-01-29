<div class="statistic--header">
    <div class="input input__img">
        <label for="search"><img src="/img/lens.png" alt="" /></label>
        <input
            type="text"
            placeholder="поиск"
            name="filter-search"
            id="filter-search"
            class="input--field"
            value="{!! request('filter-search') !!}"
        />
    </div>
    <img src="/img/filter.png" alt="" class="openModalBtn" data-modal="filter" />

    <div class="modalka" id="filter">
        <form class="filter form">
            @if(isset($tests))
                @include('/elements/input/selector', [
                    'name'=>'filter-test',
                    'label'=>'Тест',
                    'options'=>$tests,
                    'strValue'=>true,
                    'required'=>false,
                    'value'=>request('filter-test')
                ])
            @elseif(isset($topic))
                @include('/elements/input/selector', [
                    'name'=>'filter-topic',
                    'label'=>'Тема',
                    'options'=>$topic,
                    'strValue'=>true,
                    'required'=>false,
                    'value'=>request('filter-topic')
                ])
            @endif

            @include('/elements/input/data_select', [
                'name' => 'filter-date',
                'value' => request('filter-date')
            ])

            <button type="submit" class="button button__light button__bold">Применить</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('filter-search');
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
                params.append('filter-search', searchValue);
            }

            // Формируем URL с параметрами
            const url = window.location.pathname + '?' + params.toString();

            // Перенаправляем пользователя на новый URL
            window.location.href = url;
        });
    })
</script>
