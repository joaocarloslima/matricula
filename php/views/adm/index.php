<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETECIA Matrícula - administração</title>
    <link rel="stylesheet" href="/style.css">
    <style>
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.6);
            z-index: 100;
            align-items: center;
            justify-content: center;
        }
        .modal-overlay.open { display: flex; }
        .modal {
            background: var(--bg-300);
            border-radius: .75rem;
            padding: 2rem;
            max-width: 420px;
            width: 90%;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            border: 1px solid #ffffff18;
        }
        .modal h2 { font-size: 1.25rem; margin: 0; }
        .modal p  { color: var(--text-200); margin: 0; font-size: .95rem; }
        .modal strong { color: var(--text-error); }
        .modal-actions { display: flex; gap: 1rem; justify-content: flex-end; }
        .btn-cancel {
            background: transparent;
            border: 2px solid var(--bg-200);
            color: var(--text-100);
            padding: .6rem 1.4rem;
            border-radius: .5rem;
            cursor: pointer;
            font-family: inherit;
            font-size: .9rem;
        }
        .btn-danger {
            background: var(--bg-danger);
            border: none;
            color: #fff;
            padding: .6rem 1.4rem;
            border-radius: .5rem;
            cursor: pointer;
            font-family: inherit;
            font-size: .9rem;
        }
        .btn-cancel:hover { border-color: var(--text-100); }
        .btn-danger:hover  { opacity: .85; }
        td a svg { display: block; }
    </style>
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
            <th title="normas">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
            </th>
            <th title="autorização de imagem">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
            </th>
            <th title="ficha médica">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 14h6"/><path d="M12 17v-6"/></svg>
            </th>
            <th title="bloquear">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </th>
            <th title="apagar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E94057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="m19 6-.867 12.142A2 2 0 0 1 16.138 20H7.862a2 2 0 0 1-1.995-1.858L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
            </th>
        </tr>
        <?php foreach ($responses as $response): ?>
        <tr>
            <td><?= e($response['cpf']) ?></td>
            <td><?= e($response['nome']) ?></td>
            <td>
                <a href="/adm/normas/<?= (int)$response['id'] ?>" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                </a>
            </td>
            <td>
                <a href="/adm/imagem/<?= (int)$response['id'] ?>" target="_blank">
                    <?php if ($response['autorizacao_imagem']): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
                    <?php endif; ?>
                </a>
            </td>
            <td>
                <a href="/adm/ficha-medica/<?= (int)$response['id'] ?>" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 14h6"/><path d="M12 17v-6"/></svg>
                </a>
            </td>
            <td>
                <a href="/adm/block/<?= (int)$response['id'] ?>">
                    <?php if (!$response['bloqueado']): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#00FF66" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 9.9-1"/></svg>
                    <?php else: ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E94057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    <?php endif; ?>
                </a>
            </td>
            <td>
                <a href="#"
                   onclick="confirmarApagar(<?= (int)$response['id'] ?>, '<?= e($response['nome'] ?: $response['cpf']) ?>'); return false;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E94057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="m19 6-.867 12.142A2 2 0 0 1 16.138 20H7.862a2 2 0 0 1-1.995-1.858L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Modal de confirmação -->
    <div class="modal-overlay" id="modal">
        <div class="modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#E94057" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><path d="M12 9v4"/><path d="M12 17h.01"/></svg>
            <div>
                <h2>Apagar matrícula?</h2>
                <p>Esta ação é <strong>irreversível</strong>. Todos os dados de <strong id="modal-nome"></strong> serão permanentemente removidos.</p>
            </div>
            <div class="modal-actions">
                <button class="btn-cancel" onclick="fecharModal()">Cancelar</button>
                <a id="modal-link" href="#" class="btn-danger">Apagar</a>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('busca-cpf').addEventListener('keyup', function () {
        filterTable(0, this.value);
    });

    document.getElementById('busca-nome').addEventListener('keyup', function () {
        filterTable(1, this.value);
    });

    function filterTable(colIndex, query) {
        var filter = query.toUpperCase();
        var rows   = document.querySelectorAll('table tr');
        rows.forEach(function (tr, i) {
            if (i === 0) return;
            var td = tr.getElementsByTagName('td')[colIndex];
            if (td) {
                var txt = td.textContent || td.innerText;
                tr.style.display = txt.toUpperCase().indexOf(filter) > -1 ? '' : 'none';
            }
        });
    }

    function confirmarApagar(id, nome) {
        document.getElementById('modal-nome').textContent = nome;
        document.getElementById('modal-link').href = '/adm/delete/' + id;
        document.getElementById('modal').classList.add('open');
    }

    function fecharModal() {
        document.getElementById('modal').classList.remove('open');
    }

    // Fecha ao clicar fora do card
    document.getElementById('modal').addEventListener('click', function (e) {
        if (e.target === this) fecharModal();
    });

    // Fecha com Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') fecharModal();
    });
</script>
</html>
