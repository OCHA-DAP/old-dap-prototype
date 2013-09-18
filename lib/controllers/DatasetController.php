<?php

class DatasetController extends AbstractController {

  function __construct($path_elements) {
    $this->path_elements = $path_elements;
  }

  function doGET(HttpRequest $request, HttpResponse $response) {
    switch(count($this->path_elements)) {
    case 1:
      $datasets = DAO::get_datasets();
      $response->setParameter('datasets', $datasets);
      $response->setTemplate('datasets');
      return;
    case 2:
      $code = $this->path_elements[1];
      $response->setParameter('dataset', DAO::get_dataset($code));
      $indicators = DAO::get_dataset_indicators($code);
      $response->setParameter('indicators', $indicators);
      $response->setTemplate('dataset');
      return;
    default:
      throw new Exception("Wrong number of parameters");
    }
  }

}