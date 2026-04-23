<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <title>Ficha Médica</title>
</head>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    .center { text-align: center; }
    p { font-size: 14pt; }
    .assinatura { border-top: solid 1px black; padding: 1rem 2rem; }
    .letra-de-mao { font-family: 'Dancing Script', cursive; text-align: center; color: blue; font-size: 18pt; }
    .campo-assinatura { display: flex; flex-direction: column; justify-content: center; width: fit-content; }
    ul, .item { margin: .8rem 0; display: block; }
</style>
<body>
    <img src="/logo.png" alt="logo do cps">
    <br><br>
    <h1 class="center">Ficha Médica</h1>
    <br><br>

    <h2>Identificação do Aluno</h2>
    <p>Nome: <strong><?= e($matricula['nome']) ?></strong></p>
    <p>CPF: <strong><?= e($matricula['cpf']) ?></strong></p>
    <p>Data de Nascimento: <strong><?= e($matricula['data_nascimento']) ?></strong></p>
    <p>Curso: <strong><?= e($matricula['curso']) ?></strong></p>

    <hr><br><br>

    <h2>Em caso de emergência</h2>
    <p>Nome: <strong><?= e($matricula['nome_contato']) ?></strong></p>
    <p>Telefone: <strong><?= e($matricula['telefone_contato']) ?></strong></p>
    <p>Parentesco: <strong><?= e($matricula['parentesco']) ?></strong></p>

    <hr><br><br>

    <h2>Informações sobre o aluno</h2>

    <ol>
        <li>Doenças pré existentes</li>
        <ul>
            <?php foreach (['amigdalite' => 'amigdalite', 'bronquite' => 'bronquite', 'diabetes' => 'diabetes',
                            'sinusite' => 'sinusite', 'palpitacao' => 'palpitação', 'hemorragia' => 'hemorragia',
                            'faltadear' => 'falta de ar', 'convulsao' => 'convulsão'] as $col => $label): ?>
                <?php if ($matricula[$col]): ?>
                    <li><?= e($label) ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        <li>Doenças Contagiosas</li>
        <ul>
            <?php foreach (['sarampo' => 'sarampo', 'coqueluche' => 'coqueluche', 'rubeola' => 'rubéola',
                            'catapora' => 'catapora', 'tuberculose' => 'tuberculose', 'caxumba' => 'caxumba'] as $col => $label): ?>
                <?php if ($matricula[$col]): ?>
                    <li><?= e($label) ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        <li>Deficiências</li>
        <ul>
            <?php foreach (['fisica' => 'física', 'auditiva' => 'auditiva', 'visual' => 'visual', 'intelectual' => 'intelectual'] as $col => $label): ?>
                <?php if ($matricula[$col]): ?>
                    <li><?= e($label) ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        <li>Problemas no crescimento</li>
        <span class="item"><?= $matricula['crecimento'] ? e($matricula['crecimento']) : 'N/A' ?></span>

        <li>Atraso no desenvolvimento</li>
        <span class="item"><?= $matricula['desenvolvimento'] ? e($matricula['desenvolvimento']) : 'N/A' ?></span>

        <li>Tratamento especializado</li>
        <span class="item"><?= $matricula['tratamento'] ? e($matricula['tratamento']) : 'N/A' ?></span>

        <li>Medicação controlada</li>
        <span class="item"><?= $matricula['medicacao'] ? e($matricula['medicacao']) : 'N/A' ?></span>

        <li>Tratamento cirúrgico ou ortopédico</li>
        <span class="item"><?= $matricula['cirurgia'] ? e($matricula['cirurgia']) : 'N/A' ?></span>

        <li>Alergias</li>
        <span class="item"><?= $matricula['alergia'] ? e($matricula['alergia']) : 'N/A' ?></span>
    </ol>

    <h4>Outras informações</h4>
    <p><?= e($matricula['observacao']) ?></p>

    <br><br><br>

    <p id="data-atual"></p>

    <br>

    <div class="campo-assinatura">
        <p class="letra-de-mao"><?= e($matricula['nome']) ?></p>
        <span class="assinatura"><?= e($matricula['nome']) ?></span>
    </div>
</body>
<script>
    function formatDate() {
        const months = ["janeiro","fevereiro","março","abril","maio","junho","julho","agosto","setembro","outubro","novembro","dezembro"];
        const today = new Date();
        return `São Paulo, ${today.getDate()} de ${months[today.getMonth()]} de ${today.getFullYear()}`;
    }
    window.onload = function () {
        document.getElementById("data-atual").innerText = formatDate();
    };
</script>
</html>
