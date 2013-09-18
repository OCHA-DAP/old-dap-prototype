<?php

require_once(__DIR__ . '/../config/init.php');

$request = new HttpRequest();
$response = new HttpResponse();

// set the character encoding to UTF-8 by default
header('Content-Type: text/html; charset=utf-8');

try {
  $path = $request->get('p');
  $controller_name = @$APP->paths[$path];
  if (!$controller_name) {
    throw new Exception("Not found");
  }
  $controller = new $controller_name();

  //
  // Call the controller
  //
  switch($request->method()) {
  case 'GET':
    $controller->doGET($request, $response);
    break;
  case 'POST':
    $controller->doGET($request, $response);
    break;
  case 'DELETE':
    $controller->doGET($request, $response);
    break;
  default:
    throw new Exception("Unsupported method: " . $request->method);
  }

  //
  // Check for a redirect
  //
  if ($response->redirect) {
    http_redirect($response->redirect, $response->redirect_code);
    exit;
  }

  // set HTTP headers
  if ($response->headers) {
    foreach ($response->headers as $name => $value) {
      header("$name: $value");
    }
  }

  // set HTTP status
  if ($response->status) {
    header("HTTP/1.1 $status");
  }

  // is the content already generated?
  if ($response->content) {
    print($response->content);
    exit;
  }

  // assign template parameters
  if ($response->parameters) {
    foreach ($response->parameters as $name => $value) {
      $APP->smarty->assign($name, $value);
    }
  }

  // render the response
  if ($response->template) {
    $APP->smarty->display($response->template . '.tpl');
  }

} catch (Exception $e) {
  print($e->getMessage());
}

exit;
