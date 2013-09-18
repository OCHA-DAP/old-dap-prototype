<?php

class IndicatorController extends AbstractController {

  function __construct($path_elements) {
    $this->path_elements = $path_elements;
  }

  function doGET(HttpRequest $request, HttpResponse $response) {
    switch(count($this->path_elements)) {
    case 1:
      $response->setParameter('indicators', DAO::get_indicators());
      $response->setTemplate('indicators');
      return;
    case 2:
      $code = $this->path_elements[1];
      $response->setParameter('indicator', DAO::get_indicator($code));
      $response->setParameter('values', DAO::get_indicator_values($code));
      $response->setTemplate('indicator');
      return;
    default:
      throw new Exception("Wrong number of parameters");
    }
  }

}