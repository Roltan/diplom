<div class="statistic--header">
    <div class="input input__img">
        <label for="search"><img src="/img/lens.png" alt="" /></label>
        <input type="text" placeholder="поиск" name="search" id="search" class="input--field" />
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
                    'required'=>false
                ])
            @endisset

            @include('/elements/input/data_select')

            <button type="submit" class="button button__light button__bold">Применить</button>
        </form>
    </div>
</div>
