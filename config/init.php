<?php
require_once(__DIR__ . '/../lib/smarty/Smarty.class.php');

//
// Global application state
//
global $APP;
$APP = new StdClass();

$APP->root = __DIR__ . '/..';

set_include_path(get_include_path() . PATH_SEPARATOR .
                 $APP->root . "/lib/controllers" . PATH_SEPARATOR .
                 $APP->root . "/lib/model" . PATH_SEPARATOR .
                 $APP->root . "/lib");

//
// Load web controller path mappings.
//
require_once(__DIR__ . '/paths.php');

//
// Set up the database
//
require_once(__DIR__ . '/database.php');

//
// Fire up the Smarty template engine.
//
// load and configure Smarty
$APP->smarty = new Smarty();
$APP->smarty->error_reporting = 0;
$APP->smarty->template_dir = $APP->root . "/views/templates/";
$APP->smarty->compile_dir = $APP->root . "/views/templates_c/";
$APP->smarty->config_dir = $APP->root . "/views/config/";
$APP->smarty->cache_dir = $APP->root . "/views/cache/";
array_push($APP->smarty->plugins_dir, $APP->root . "/views/plugins");

// autoload classes from <classname>.php
spl_autoload_register(function ($class_name) {
  require_once $class_name . '.php';
});

// end
