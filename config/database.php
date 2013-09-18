<?php
////////////////////////////////////////////////////////////////////////
// Database configuration
////////////////////////////////////////////////////////////////////////

global $APP;

$APP->config = new stdClass();
$APP->config->database_dsn = 'mysql:host=localhost;dbname=test';
$APP->config->database_username = 'root';
$APP->config->database_password = 'dyhtt';

if (@$APP->config->database_dsn) {
  $APP->pdo = new PDO($APP->config->database_dsn, @$APP->config->database_username, @$APP->config->database_password);
}
