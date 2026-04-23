<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETECIA Matrícula - alergias</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="antialiased">
    <div class="container-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-flower-2">
            <path d="M12 5a3 3 0 1 1 3 3m-3-3a3 3 0 1 0-3 3m3-3v1M9 8a3 3 0 1 0 3 3M9 8h1m5 0a3 3 0 1 1-3 3m3-3h-1m-2 3v-1"/>
            <circle cx="12" cy="8" r="2"/>
            <path d="M12 10v12"/>
            <path d="M12 22c4.2 0 7-1.667 7-5-4.2 0-7 1.667-7 5Z"/>
            <path d="M12 22c-4.2 0-7-1.667-7-5 4.2 0 7 1.667 7 5Z"/>
        </svg>
        <h1 class="text-xl text-gray-600 text-center">Alergias</h1>

        <p class="desc">Tem alguma alergia?</p>

        <form action="/ficha-medica/alergia" method="post">
            <div class="switch-content">
                <input type="checkbox" id="checkbox" name="checkbox" />
                <label class="switch" for="checkbox"><span class="slider"></span></label>
                <span id="valor">não</span>
            </div>

            <div class="input-group">
                <input type="text" id="qual" name="qual" placeholder="Qual?" class="input"
                    value="<?= e($matricula['alergia'] ?? '') ?>"
                    style="opacity: 0;" />
            </div>

            <div class="button-group">
                <button type="button" class="button default" onclick="history.back()">voltar</button>
                <button type="submit" class="button" id="button_start">próximo</button>
            </div>
        </form>

        <div class="steps">
            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
            <div class="active"></div>
            <div></div>
        </div>
    </div>
</body>
<script>
    const checkbox     = document.getElementById('checkbox');
    const qualInput    = document.getElementById('qual');
    const valor        = document.getElementById('valor');
    const button_start = document.getElementById('button_start');

    <?php if (!empty($matricula['alergia'])): ?>
    checkbox.checked = true;
    qualInput.style.opacity = 1;
    valor.innerText = 'sim';
    <?php endif; ?>

    checkbox.addEventListener('change', function () {
        valor.innerText = this.checked ? 'sim' : 'não';
        qualInput.style.opacity = this.checked ? 1 : 0;
        if (!this.checked) { qualInput.value = ''; button_start.disabled = false; }
        else button_start.disabled = qualInput.value.length === 0;
    });

    qualInput.addEventListener('input', function () {
        button_start.disabled = checkbox.checked && this.value.length === 0;
    });
</script>
</html>
