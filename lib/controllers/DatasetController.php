<?php

class DatasetController extends AbstractController {

  function doGET(HttpRequest $request, HttpResponse $response) {
    global $APP;

    $datasets = DAO::get_datasets();

    $response->setParameter('datasets', $datasets);
    $response->setTemplate('datasets');
  }

}