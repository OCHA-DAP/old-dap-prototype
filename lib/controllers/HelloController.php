<?php

class HelloController extends AbstractController {

  function doGET(HttpRequest $request, HttpResponse $response) {
    $response->setParameter('message', 'Hello, template!');
    $response->setTemplate('hello');
  }

}