<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETECIA Matrícula - dados pessoais</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="antialiased">
    <div class="container-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-contact">
            <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />
            <rect width="18" height="18" x="3" y="4" rx="2" />
            <circle cx="12" cy="10" r="2" />
            <line x1="8" x2="8" y1="2" y2="4" />
            <line x1="16" x2="16" y1="2" y2="4" />
        </svg>
        <h1 class="text-xl text-gray-600 text-center">Dados Pessoais</h1>

        <p class="desc">
            Agora precisamos de dados para a sua <strong>ficha médica</strong>. Comece informando os seguintes dados pessoais.
        </p>

        <form action="/ficha-medica/identificacao" method="post">
            <div class="input-group">
                <label for="nomeCandidato">Nome</label>
                <input name="nome" id="nomeCandidato" type="text" class="input" placeholder="Nome completo"
                    value="<?= e($matricula['nome'] ?? '') ?>" required>
            </div>
            <div class="input-group">
                <label for="dataNascimento">Data de Nascimento</label>
                <input name="dataNascimento" id="dataNascimento" type="date" class="input"
                    value="<?= e($matricula['data_nascimento'] ?? '') ?>" required>
            </div>
            <div class="field-group">
                <label for="curso">Curso</label>
                <select id="curso" name="curso">
                    <option value="">Selecione um curso</option>
                    <?php foreach ([
                        'Téc. em Administração',
                        'Téc. em Desenvolvimento de Sistemas',
                        'Téc. em Marketing',
                        'Téc. em Nutrição',
                        'Téc. em Química',
                        'Téc. em Recursos Humanos',
                    ] as $c): ?>
                        <option <?= ($matricula['curso'] ?? '') === $c ? 'selected' : '' ?>><?= e($c) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="button-group">
                <button type="button" class="button default" onclick="history.back()">voltar</button>
                <button type="submit" class="button" id="button_start" disabled>próximo</button>
            </div>
        </form>

        <div class="steps">
            <div></div><div></div>
            <div class="active"></div>
            <div></div><div></div><div></div><div></div><div></div><div></div>
            <div></div><div></div><div></div><div></div><div></div>
        </div>
    </div>
</body>
<script>
    const nomeCandidato = document.getElementById('nomeCandidato');
    const dataNascimento = document.getElementById('dataNascimento');
    const curso = document.getElementById('curso');
    const button_start = document.getElementById('button_start');

    function checkFields() {
        button_start.disabled = !(nomeCandidato.value.length > 0 && dataNascimento.value.length > 0 && curso.value.length > 0);
    }

    nomeCandidato.addEventListener('input', checkFields);
    dataNascimento.addEventListener('input', checkFields);
    curso.addEventListener('input', checkFields);
    checkFields();
</script>
</html>
