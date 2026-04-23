<?php

define('DB_HOST', getenv('MATRICULA_DB_HOST') ?: 'localhost');
define('DB_NAME', getenv('MATRICULA_DB_NAME') ?: 'matricula');
define('DB_USER', getenv('MATRICULA_DB_USERNAME') ?: 'root');
define('DB_PASS', getenv('MATRICULA_DB_PASSWORD') ?: '');

define('ADM_USER', 'secretaria');
define('ADM_PASS', 'Secretaria@238');

define('ROOT', dirname(__DIR__));
define('VIEWS', ROOT . '/views');

function e(mixed $val): string {
    return htmlspecialchars((string) ($val ?? ''), ENT_QUOTES, 'UTF-8');
}
