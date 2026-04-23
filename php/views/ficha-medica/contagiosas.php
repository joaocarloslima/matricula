<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETECIA Matrícula - doenças contagiosas</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="antialiased">
    <div class="container-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-biohazard">
            <circle cx="12" cy="11.9" r="2"/>
            <path d="M6.7 3.4c-.9 2.5 0 5.2 2.2 6.7C6.5 9 3.7 9.6 2 11.6"/>
            <path d="m8.9 10.1 1.4.8"/>
            <path d="M17.3 3.4c.9 2.5 0 5.2-2.2 6.7 2.4-1.1 5.2-.5 6.9 1.5"/>
            <path d="m15.1 10.1-1.4.8"/>
            <path d="M16.7 20.8c-2.6-.4-4.6-2.6-4.7-5.3-.2 2.6-2.1 4.8-4.7 5.3"/>
            <path d="M12 19v-2.3"/>
            <path d="M6.7 3.4C5 5.8 5 9 7 11"/>
            <path d="M17.3 3.4C19 5.8 19 9 17 11"/>
        </svg>
        <h1 class="text-xl text-gray-600 text-center">Doenças Contagiosas</h1>

        <p class="desc">Teve ou tem alguma das doenças contagiosas abaixo? Selecione todas que se aplicam.</p>

        <form action="/ficha-medica/contagiosas" method="post">
            <div class="grid-auto">
                <?php foreach ([
                    'sarampo'    => 'sarampo',
                    'coqueluche' => 'coqueluche',
                    'rubeola'    => 'rubéola',
                    'catapora'   => 'catapora',
                    'caxumba'    => 'caxumba',
                    'tuberculose'=> 'tuberculose',
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
            <div></div><div></div><div></div><div></div><div></div>
            <div class="active"></div>
            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
        </div>
    </div>
</body>
</html>
