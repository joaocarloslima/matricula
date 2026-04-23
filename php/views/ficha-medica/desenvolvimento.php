<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETECIA Matrícula - atraso no desenvolvimento</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="antialiased">
    <div class="container-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-brain">
            <path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"/>
            <path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"/>
            <path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"/>
            <path d="M17.599 6.5a3 3 0 0 0 .399-1.375"/>
            <path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"/>
            <path d="M3.477 10.896a4 4 0 0 1 .585-.396"/>
            <path d="M19.938 10.5a4 4 0 0 1 .585.396"/>
            <path d="M6 18a4 4 0 0 1-1.967-.516"/>
            <path d="M19.967 17.484A4 4 0 0 1 18 18"/>
        </svg>
        <h1 class="text-xl text-gray-600 text-center">Atraso no Desenvolvimento</h1>

        <p class="desc">Teve atraso no desenvolvimento?</p>

        <form action="/ficha-medica/desenvolvimento" method="post">
            <div class="switch-content">
                <input type="checkbox" id="checkbox" name="checkbox" />
                <label class="switch" for="checkbox"><span class="slider"></span></label>
                <span id="valor">não</span>
            </div>

            <div class="input-group">
                <input type="text" id="qual" name="qual" placeholder="Qual?" class="input"
                    value="<?= e($matricula['desenvolvimento'] ?? '') ?>"
                    style="opacity: 0;" />
            </div>

            <div class="button-group">
                <button type="button" class="button default" onclick="history.back()">voltar</button>
                <button type="submit" class="button" id="button_start">próximo</button>
            </div>
        </form>

        <div class="steps">
            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
            <div class="active"></div>
            <div></div><div></div><div></div><div></div><div></div>
        </div>
    </div>
</body>
<script>
    const checkbox     = document.getElementById('checkbox');
    const qualInput    = document.getElementById('qual');
    const valor        = document.getElementById('valor');
    const button_start = document.getElementById('button_start');

    <?php if (!empty($matricula['desenvolvimento'])): ?>
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
