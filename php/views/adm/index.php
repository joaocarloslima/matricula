<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETECIA Matrícula - administração</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body class="antialiased">
    <h1 class="text-xl text-gray-600 text-center">Matrícula ETECIA</h1>

    <div class="search-bar">
        <input id="busca-cpf" type="search" placeholder="buscar por cpf">
        <input id="busca-nome" type="search" placeholder="buscar por nome">
    </div>

    <table>
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>
                <svg title="normas" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scale"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
            </th>
            <th>
                <svg title="autorização de imagem" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
            </th>
            <th>
                <svg title="ficha médica" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-plus"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 14h6"/><path d="M12 17v-6"/></svg>
            </th>
            <th>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </th>
        </tr>
        <?php foreach ($responses as $response): ?>
        <tr>
            <td><?= e($response['cpf']) ?></td>
            <td><?= e($response['nome']) ?></td>
            <td>
                <a href="/adm/normas/<?= (int)$response['id'] ?>" target="_blank">
                    <svg title="normas" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-scale"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                </a>
            </td>
            <td>
                <a href="/adm/imagem/<?= (int)$response['id'] ?>" target="_blank">
                    <?php if ($response['autorizacao_imagem']): ?>
                    <svg title="autorização de imagem" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
                    <?php endif; ?>
                </a>
            </td>
            <td>
                <a href="/adm/ficha-medica/<?= (int)$response['id'] ?>" target="_blank">
                    <svg title="ficha médica" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-plus"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 14h6"/><path d="M12 17v-6"/></svg>
                </a>
            </td>
            <td>
                <a href="/adm/block/<?= (int)$response['id'] ?>">
                    <?php if (!$response['bloqueado']): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#00FF66" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock-open"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 9.9-1"/></svg>
                    <?php else: ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E94057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    <?php endif; ?>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
<script>
    document.getElementById('busca-cpf').addEventListener('keyup', function () {
        filterTable(0, this.value);
    });

    document.getElementById('busca-nome').addEventListener('keyup', function () {
        filterTable(1, this.value);
    });

    function filterTable(colIndex, query) {
        const filter = query.toUpperCase();
        const rows   = document.querySelectorAll('table tr');
        rows.forEach(function (tr, i) {
            if (i === 0) return;
            const td = tr.getElementsByTagName('td')[colIndex];
            if (td) {
                const txt = td.textContent || td.innerText;
                tr.style.display = txt.toUpperCase().includes(filter) ? '' : 'none';
            }
        });
    }
</script>
</html>
