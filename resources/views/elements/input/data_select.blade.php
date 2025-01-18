<div class="input input__data {{ $class ?? '' }}">
    <label for="{{ $name }}">Дата</label>
    <input
        type="date"
        name="{{ $name }}"
        id="{{ $name }}"
        class="input--field"
        value="{{ $value ?? '' }}"
    >
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('{{ $name }}');
        const formElement = input.closest('form');

        if (formElement) {
            formElement.addEventListener('submit', function(event) {
                if (input.value === '') {
                    input.disabled = true;
                }
            });
        }
    });
</script>
