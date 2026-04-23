<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETECIA Matrícula - deficiências</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="antialiased">
    <div class="container-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-accessibility">
            <circle cx="16" cy="4" r="1"/>
            <path d="m18 19 1-7-6 1"/>
            <path d="m5 8 3-3 5.5 3-2.36 3.5"/>
            <path d="M4.24 14.5a5 5 0 0 0 6.88 6"/>
            <path d="M13.76 17.5a5 5 0 0 0-6.88-6"/>
        </svg>
        <h1 class="text-xl text-gray-600 text-center">Deficiências</h1>

        <p class="desc">Possui alguma das deficiências abaixo? Selecione todas que se aplicam.</p>

        <form action="/ficha-medica/deficiencias" method="post">
            <div class="grid-auto">
                <?php foreach ([
                    'auditiva'    => 'auditiva',
                    'fisica'      => 'física',
                    'intelectual' => 'intelectual',
                    'visual'      => 'visual',
                ] as $name => $label): ?>
                    <div class="switch-content">
                        <input type="checkbox" id="<?= $name ?>" name="<?= $name ?>"
                            <?= !empty($matricula[$name]) ? 'checked' : '' ?> />
                        <label class="switch" for="<?= $name ?>"><span class="slider"></span></label>
                        <span><?= e($label) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="button-group">
                <button type="button" class="button default" onclick="history.back()">voltar</button>
                <button type="submit" class="button">próximo</button>
            </div>
        </form>

        <div class="steps">
            <div></div><div></div><div></div><div></div><div></div><div></div>
            <div class="active"></div>
            <div></div><div></div><div></div><div></div><div></div><div></div><div></div>
        </div>
    </div>
</body>
</html>
