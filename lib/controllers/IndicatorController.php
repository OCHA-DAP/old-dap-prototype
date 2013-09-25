<?php

/**
 * Handle HTTP requests for indicator-centric information.
 *
 * Started by David Megginson, September 2013
 */
class IndicatorController extends AbstractController {

  function doGET(HttpRequest $request, HttpResponse $response) {

    switch(count($this->path_elements)) {

    case 1:
      // /indicators/
      // List indicators.
      $response->setParameter('indicators', DAO::get_indicators());
      $response->setTemplate('indicators');
      return;

    case 2:
      // /indicators/<code>/
      // Show information about a specific indicator for all countries.
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