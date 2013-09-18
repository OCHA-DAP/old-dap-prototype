<?php
////////////////////////////////////////////////////////////////////////
// Database configuration
////////////////////////////////////////////////////////////////////////

global $APP;

$APP->config = new stdClass();
$APP->config->database_dsn = 'pgsql:host=localhost;dbname=scraperwiki';
$APP->config->database_username = 'dap';
$APP->config->database_password = 'test123';

if (@$APP->config->database_dsn) {
  $APP->pdo = new PDO($APP->config->database_dsn, @$APP->config->database_username, @$APP->config->database_password);
  $APP->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
