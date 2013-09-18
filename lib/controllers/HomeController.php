<?php

class HomeController extends AbstractController {

  function doGET(HttpRequest $request, HttpResponse $response) {
    $response->setTemplate('home');
  }

}