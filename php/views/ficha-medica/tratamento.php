<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETECIA Matrícula - tratamento especializado</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="antialiased">
    <div class="container-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stethoscope">
            <path d="M11 2a2 2 0 0 0-2 2v5H4a2 2 0 0 0-2 2v3a6 6 0 0 0 12 0v-3a2 2 0 0 0-2-2h-5V4a2 2 0 0 0-2-2Z"/>
            <path d="M16 14a4 4 0 0 1 4 4"/>
            <circle cx="20" cy="20" r="2"/>
        </svg>
        <h1 class="text-xl text-gray-600 text-center">Tratamento Especializado</h1>

        <p class="desc">Faz ou fez algum tratamento especializado?</p>

        <form action="/ficha-medica/tratamento" method="post">
            <div class="switch-content">
                <input type="checkbox" id="checkbox" name="checkbox" />
                <label class="switch" for="checkbox"><span class="slider"></span></label>
                <span id="valor">não</span>
            </div>

            <div class="input-group">
                <input type="text" id="qual" name="qual" placeholder="Qual?" class="input"
                    value="<?= e($matricula['tratamento'] ?? '') ?>"
                    style="opacity: 0;" />
            </div>

            <div class="button-group">
                <button type="button" class="button default" onclick="history.back()">voltar</button>
                <button type="submit" class="button" id="button_start">próximo</button>
            </div>
        </form>

        <div class="steps">
            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
            <div class="active"></div>
            <div></div><div></div><div></div><div></div>
        </div>
    </div>
</body>
<script>
    const checkbox     = document.getElementById('checkbox');
    const qualInput    = document.getElementById('qual');
    const valor        = document.getElementById('valor');
    const button_start = document.getElementById('button_start');

    <?php if (!empty($matricula['tratamento'])): ?>
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
