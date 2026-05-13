<?php

session_start();

// ROOT é o diretório onde index.php está (public_html/ na Hostinger)
require_once __DIR__ . '/app/config.php';
require_once ROOT . '/app/Database.php';
require_once ROOT . '/app/Repository.php';

$method = strtoupper($_SERVER['REQUEST_METHOD']);
$uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri    = rtrim($uri, '/') ?: '/';

function redirect($path) {
    header("Location: $path");
    exit;
}

function render($view, $vars = []) {
    extract($vars, EXTR_SKIP);
    include VIEWS . '/' . $view . '.php';
    exit;
}

function getRepo() {
    static $repo = null;
    if ($repo === null) {
        $repo = new Repository();
    }
    return $repo;
}

function requireSession() {
    if (!isset($_SESSION['matricula_id'])) redirect('/');
    $m = getRepo()->findById((int) $_SESSION['matricula_id']);
    if (!$m) redirect('/');
    return $m;
}

function requireAdmAuth() {
    $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
    $pass = isset($_SERVER['PHP_AUTH_PW'])   ? $_SERVER['PHP_AUTH_PW']   : '';
    if ($user === ADM_USER && $pass === ADM_PASS) return;
    header('WWW-Authenticate: Basic realm="Administracao"');
    http_response_code(401);
    echo '<p style="font-family:sans-serif;padding:2rem">Acesso nao autorizado.</p>';
    exit;
}

// ── Home ────────────────────────────────────────────────────────────────────

if ($method === 'GET' && $uri === '/') {
    render('index', ['error' => null]);
}

if ($method === 'POST' && $uri === '/') {
    $raw    = trim(isset($_POST['cpf']) ? $_POST['cpf'] : '');
    $digits = preg_replace('/\D/', '', $raw);
    if (strlen($digits) !== 11) {
        render('index', ['error' => 'CPF invalido. Informe os 11 digitos.']);
    }
    $cpf = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $digits);

    $repo      = getRepo();
    $matricula = $repo->findByCpf($cpf);
    if ($matricula && $matricula['bloqueado']) redirect('/block');

    if (!$matricula) {
        $id       = $repo->insert($cpf);
        $matricula = $repo->findById($id);
    }

    $_SESSION['matricula_id'] = $matricula['id'];
    redirect('/normas');
}

if ($method === 'GET' && $uri === '/block') render('block');
if ($method === 'GET' && $uri === '/normas') render('normas');
if ($method === 'GET' && $uri === '/fim')    render('fim');

// ── Autorizacao de Imagem ───────────────────────────────────────────────────

if ($method === 'GET' && $uri === '/autorizacao-imagem') render('autorizacao-imagem');

if ($method === 'POST' && $uri === '/autorizacao-imagem') {
    $m = requireSession();
    getRepo()->update($m['id'], ['autorizacao_imagem' => isset($_POST['qual']) ? 1 : 0]);
    redirect('/ficha-medica/identificacao');
}

// ── Ficha Medica GET ────────────────────────────────────────────────────────

$steps = [
    'identificacao', 'contato', 'doencas', 'contagiosas', 'deficiencias',
    'crescimento', 'desenvolvimento', 'tratamento', 'medicacao', 'cirurgia',
    'alergia', 'observacoes',
];

foreach ($steps as $step) {
    if ($method === 'GET' && $uri === "/ficha-medica/$step") {
        $m = requireSession();
        render("ficha-medica/$step", ['matricula' => $m]);
    }
}

// ── Ficha Medica POST ───────────────────────────────────────────────────────

if ($method === 'POST' && $uri === '/ficha-medica/identificacao') {
    $m = requireSession();
    getRepo()->update($m['id'], [
        'nome'            => trim(isset($_POST['nome']) ? $_POST['nome'] : ''),
        'data_nascimento' => isset($_POST['dataNascimento']) ? $_POST['dataNascimento'] : null,
        'curso'           => isset($_POST['curso']) ? $_POST['curso'] : '',
    ]);
    redirect('/ficha-medica/contato');
}

if ($method === 'POST' && $uri === '/ficha-medica/contato') {
    $m = requireSession();
    getRepo()->update($m['id'], [
        'nome_contato'     => trim(isset($_POST['nomeContato']) ? $_POST['nomeContato'] : ''),
        'telefone_contato' => trim(isset($_POST['telefoneContato']) ? $_POST['telefoneContato'] : ''),
        'parentesco'       => isset($_POST['parentesco']) ? $_POST['parentesco'] : '',
    ]);
    redirect('/ficha-medica/doencas');
}

if ($method === 'POST' && $uri === '/ficha-medica/doencas') {
    $m      = requireSession();
    $fields = ['amigdalite', 'bronquite', 'diabetes', 'sinusite', 'palpitacao', 'hemorragia', 'faltadear', 'convulsao'];
    $data   = [];
    foreach ($fields as $f) $data[$f] = isset($_POST[$f]) ? 1 : 0;
    getRepo()->update($m['id'], $data);
    redirect('/ficha-medica/contagiosas');
}

if ($method === 'POST' && $uri === '/ficha-medica/contagiosas') {
    $m      = requireSession();
    $fields = ['sarampo', 'coqueluche', 'rubeola', 'catapora', 'caxumba', 'tuberculose'];
    $data   = [];
    foreach ($fields as $f) $data[$f] = isset($_POST[$f]) ? 1 : 0;
    getRepo()->update($m['id'], $data);
    redirect('/ficha-medica/deficiencias');
}

if ($method === 'POST' && $uri === '/ficha-medica/deficiencias') {
    $m      = requireSession();
    $fields = ['auditiva', 'fisica', 'intelectual', 'visual'];
    $data   = [];
    foreach ($fields as $f) $data[$f] = isset($_POST[$f]) ? 1 : 0;
    getRepo()->update($m['id'], $data);
    redirect('/ficha-medica/crescimento');
}

$textStepMap = [
    'crescimento'    => ['col' => 'crecimento',    'next' => 'desenvolvimento'],
    'desenvolvimento'=> ['col' => 'desenvolvimento','next' => 'tratamento'],
    'tratamento'     => ['col' => 'tratamento',     'next' => 'medicacao'],
    'medicacao'      => ['col' => 'medicacao',      'next' => 'cirurgia'],
    'cirurgia'       => ['col' => 'cirurgia',       'next' => 'alergia'],
    'alergia'        => ['col' => 'alergia',        'next' => 'observacoes'],
];

foreach ($textStepMap as $step => $cfg) {
    if ($method === 'POST' && $uri === "/ficha-medica/$step") {
        $m    = requireSession();
        $qual = trim(isset($_POST['qual']) ? $_POST['qual'] : '');
        getRepo()->update($m['id'], [$cfg['col'] => ($qual !== '' ? $qual : null)]);
        redirect('/ficha-medica/' . $cfg['next']);
    }
}

if ($method === 'POST' && $uri === '/ficha-medica/observacoes') {
    $m = requireSession();
    getRepo()->update($m['id'], ['observacao' => trim(isset($_POST['qual']) ? $_POST['qual'] : '')]);
    redirect('/fim');
}

// ── Admin ─────────────────────────────────────────────────────────────────────

if (strpos($uri, '/adm') === 0) requireAdmAuth();

if ($method === 'GET' && $uri === '/adm') {
    render('adm/index', ['responses' => getRepo()->findAll()]);
}

if ($method === 'GET' && preg_match('#^/adm/(normas|imagem|ficha-medica)/(\d+)$#', $uri, $matches)) {
    $section   = $matches[1];
    $id        = (int) $matches[2];
    $matricula = getRepo()->findById($id);
    if (!$matricula) { http_response_code(404); echo 'Nao encontrado.'; exit; }
    getRepo()->update($id, ['bloqueado' => 1]);
    $matricula = getRepo()->findById($id);
    $viewMap   = ['normas' => 'adm/normas', 'imagem' => 'adm/imagem', 'ficha-medica' => 'adm/ficha-medica'];
    render($viewMap[$section], ['matricula' => $matricula]);
}

if ($method === 'GET' && preg_match('#^/adm/block/(\d+)$#', $uri, $matches)) {
    $id        = (int) $matches[1];
    $matricula = getRepo()->findById($id);
    if (!$matricula) { http_response_code(404); echo 'Nao encontrado.'; exit; }
    getRepo()->update($id, ['bloqueado' => $matricula['bloqueado'] ? 0 : 1]);
    redirect('/adm');
}

http_response_code(404);
echo '<p style="font-family:sans-serif;padding:2rem">Pagina nao encontrada.</p>';
