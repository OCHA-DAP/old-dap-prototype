<?php

class CountryController extends AbstractController {

  function __construct($path_elements) {
    $this->path_elements = $path_elements;
  }

  function doGET(HttpRequest $request, HttpResponse $response) {
    if (count($this->path_elements) == 1) {
      $response->setParameter('countries', DAO::get_countries());
      $response->setTemplate('countries');
    } else {
      $code = $this->path_elements[1];
      $response->setParameter('country', DAO::get_country($code));
      $response->setParameter('indicators', DAO::get_country_indicators($code));
      $response->setTemplate('country');
    }
  }

}