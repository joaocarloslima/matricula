<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETECIA Matrícula - identificação</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="antialiased">
    <div class="container-center">
        <h1 class="text-xl text-gray-600 text-center">Documentos da Matrícula</h1>

        <p class="desc">
            Parabéns pela sua aprovação para a matrícula na <strong>ETEC Irmã Agostina</strong> 🎉
        </p>
        <p class="desc">
            Nessa etapa você deve responder algumas perguntas, para gerarmos os documentos necessários para a sua matrícula.
        </p>
        <p class="desc">
            Para iniciar, informe o CPF do candidato e clique em "vamos lá".
        </p>

        <?php if ($error): ?>
            <p style="color:#E94057"><?= e($error) ?></p>
        <?php endif; ?>

        <form action="/" method="POST">
            <div class="input-group">
                <input type="text" id="cpf" name="cpf" class="input" placeholder="000.000.000-00" required maxlength="14">
            </div>

            <button type="submit" class="button" id="button_start" disabled>
                vamos lá
            </button>
        </form>
    </div>
</body>
<script>
    const cpf = document.getElementById('cpf');
    const button_start = document.getElementById('button_start');

    function mascaraCPF(input) {
        let value = input.value;
        value = value.replace(/\D/g, "");
        value = value.replace(/(\d{3})(\d)/, "$1.$2");
        value = value.replace(/(\d{3})(\d)/, "$1.$2");
        value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
        input.value = value;
    }

    cpf.addEventListener('input', () => {
        mascaraCPF(cpf);
        button_start.disabled = cpf.value.length !== 14;
    });
</script>
</html>
