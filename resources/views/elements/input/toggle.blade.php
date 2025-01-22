<div class="input input__{{ (isset($is_multiple) and $is_multiple==true) ? 'checkbox' : 'radio' }}">
    <input
        type="checkbox"
        name="{{ $name }}"
        id="{{ $name }}"
        class="input--field toggle"
        {{(isset($checked) and $checked==true)? 'checked' : ''}}
    />
    <label for="{{ $name }}">{!! $label !!}</label>
</div>
