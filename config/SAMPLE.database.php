<?php
////////////////////////////////////////////////////////////////////////
// Database configuration
////////////////////////////////////////////////////////////////////////

global $APP;

$APP->config = new stdClass();
// $APP->config->database_dsn = 'mysql:host=localhost;dbname=template';
// $APP->config->database_username = 'username';
// $APP->config->database_password = 'password';

if (@$APP->config->database_dsn) {
  $APP->pdo = new PDO($APP->config->database_dsn, @$APP->config->database_username, @$APP->config->database_password);
}
