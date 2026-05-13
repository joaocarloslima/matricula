<?php

define('DB_HOST', getenv('MATRICULA_DB_HOST') ?: 'localhost');
define('DB_NAME', getenv('MATRICULA_DB_NAME') ?: 'matricula');
define('DB_USER', getenv('MATRICULA_DB_USERNAME') ?: 'root');
define('DB_PASS', getenv('MATRICULA_DB_PASSWORD') ?: '');

define('ADM_USER', 'secretaria');
define('ADM_PASS', 'Secretaria@238');

// ROOT = diretório de index.php (public_html/ na Hostinger)
define('ROOT', dirname(__FILE__, 2));
define('VIEWS', ROOT . '/views');

function e($val) {
    return htmlspecialchars((string) ($val !== null ? $val : ''), ENT_QUOTES, 'UTF-8');
}
