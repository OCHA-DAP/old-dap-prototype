<?php

/**
 * Handle HTTP requests for dataset-centric information.
 *
 * Started by David Megginson, September 2013
 */
class DatasetController extends AbstractController {

  function doGET(HttpRequest $request, HttpResponse $response) {
    switch(count($this->path_elements)) {

    case 1:
      // /datasets/
      // List datasets.
      $datasets = DAO::get_datasets();
      $response->setParameter('datasets', $datasets);
      $response->setTemplate('datasets');
      return;

    case 2:
      // /datasets/<code>/
      // Show information about a specific dataset.
      $code = $this->path_elements[1];
      $response->setParameter('dataset', DAO::get_dataset($code));
      $response->setParameter('indicators', DAO::get_dataset_indicators($code));
      $response->setTemplate('dataset');
      return;

    case 3:
      // /datasets/<code>/<indicator>/
      // Show a specific indicator for all countries.
      list($dummy, $code, $indicator_code) = $this->path_elements;
      $response->setParameter('dataset', DAO::get_dataset($code));
      $response->setParameter('indicator', DAO::get_indicator($indicator_code));
      $response->setParameter('values', DAO::get_dataset_indicator($code, $indicator_code));
      $response->setTemplate('dataset_indicator');
      return;

    default:
      throw new Exception("Wrong number of parameters");
    }
  }

}