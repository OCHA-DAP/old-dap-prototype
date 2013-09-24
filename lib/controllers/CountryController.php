<?php

class CountryController extends AbstractController {

  function __construct($path_elements) {
    $this->path_elements = $path_elements;
  }

  function doGET(HttpRequest $request, HttpResponse $response) {
    switch (count($this->path_elements)) {
    case 1:
      $response->setParameter('countries', DAO::get_countries());
      $response->setTemplate('countries');
      return;
    case 2:
      $code = $this->path_elements[1];
      $response->setParameter('country', DAO::get_country($code));
      $response->setParameter('indicators', DAO::get_country_indicators($code));
      $response->setTemplate('country');
      return;
    case 3:
      list($dummy, $code, $indicator_code) = $this->path_elements;
      $response->setParameter('country', DAO::get_country($code));
      $response->setParameter('indicator', DAO::get_indicator($indicator_code));
      $response->setParameter('values', DAO::get_country_indicator($code, $indicator_code));
      $response->setTemplate('country_indicator');
      return;
    case 4:
      list($dummy, $code, $indicator_code, $filename) = $this->path_elements;
      $response->setHeader('Content-type', 'text/csv; charset=utf8');
      $response->setParameter('values', DAO::get_country_indicator($code, $indicator_code));
      $response->setTemplate('country_indicator_csv');
      return;
    default:
      throw new Exception("Wrong number of parameters");
    }
  }

}