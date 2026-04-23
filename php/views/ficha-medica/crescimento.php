<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETECIA Matrícula - problemas de crescimento</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="antialiased">
    <div class="container-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-person-standing">
            <circle cx="12" cy="5" r="1"/>
            <path d="m9 20 3-6 3 6"/>
            <path d="m6 8 6 2 6-2"/>
            <path d="M12 10v4"/>
        </svg>
        <h1 class="text-xl text-gray-600 text-center">Problemas de Crescimento</h1>

        <p class="desc">Teve problemas no crescimento?</p>

        <form action="/ficha-medica/crescimento" method="post">
            <div class="switch-content">
                <input type="checkbox" id="checkbox" name="checkbox" />
                <label class="switch" for="checkbox"><span class="slider"></span></label>
                <span id="valor">não</span>
            </div>

            <div class="input-group">
                <input type="text" id="qual" name="qual" placeholder="Qual?" class="input"
                    value="<?= e($matricula['crecimento'] ?? '') ?>"
                    style="opacity: 0;" />
            </div>

            <div class="button-group">
                <button type="button" class="button default" onclick="history.back()">voltar</button>
                <button type="submit" class="button" id="button_start">próximo</button>
            </div>
        </form>

        <div class="steps">
            <div></div><div></div><div></div><div></div><div></div><div></div><div></div>
            <div class="active"></div>
            <div></div><div></div><div></div><div></div><div></div><div></div>
        </div>
    </div>
</body>
<script>
    const checkbox     = document.getElementById('checkbox');
    const qualInput    = document.getElementById('qual');
    const valor        = document.getElementById('valor');
    const button_start = document.getElementById('button_start');

    <?php if (!empty($matricula['crecimento'])): ?>
    checkbox.checked = true;
    qualInput.style.opacity = 1;
    valor.innerText = 'sim';
    <?php endif; ?>

    checkbox.addEventListener('change', function () {
        valor.innerText = this.checked ? 'sim' : 'não';
        qualInput.style.opacity = this.checked ? 1 : 0;
        if (!this.checked) {
            qualInput.value = '';
            button_start.disabled = false;
        } else {
            button_start.disabled = qualInput.value.length === 0;
        }
    });

    qualInput.addEventListener('input', function () {
        button_start.disabled = checkbox.checked && this.value.length === 0;
    });
</script>
</html>
