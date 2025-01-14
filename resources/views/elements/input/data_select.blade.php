<div class="input input__data {{ $class ?? '' }}">
    <label for="">Дата</label>
    <div>
        <!-- День -->
        <select name="day" id="day" class="input--field">
            <option value="" disabled selected hidden>День</option>
            @for ($day = 1; $day <= 31; $day++)
                <option value="{{ $day }}">{{ $day }}</option>
            @endfor
        </select>

        <!-- Месяц -->
        <select name="month" id="month" class="input--field">
            <option value="" disabled selected hidden>Месяц</option>
            @foreach (['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'] as $index => $month)
                <option value="{{ $index + 1 }}">{{ $month }}</option>
            @endforeach
        </select>

        <!-- Год -->
        <select name="year" id="year" class="input--field">
            <option value="" disabled selected hidden>Год</option>
            @for ($year = 1900; $year <= 2050; $year++)
                <option value="{{ $year }}">{{ $year }}</option>
            @endfor
        </select>
    </div>
</div>
