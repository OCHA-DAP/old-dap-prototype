<?php

/**
 * Handle HTTP requests for country-centric information.
 *
 * Started by David Megginson, September 2013
 */
class CountryController extends AbstractController {

  /**
   * Handle HTTP GET requests.
   */
  function doGET(HttpRequest $request, HttpResponse $response) {

    switch (count($this->path_elements)) {

    case 1:
      // /countries/
      // List countries.
      $response->setParameter('countries', DAO::get_countries());
      $response->setTemplate('countries');
      return;

    case 2:
      // /countries/<code>/
      // Show information about a specific country.
      $code = $this->path_elements[1];
      $response->setParameter('country', DAO::get_country($code));
      $response->setParameter('indicators', DAO::get_country_indicators($code));
      $response->setTemplate('country');
      return;

    case 3:
      // /countries/<code>/<indicator>/
      // Show a specific indicator for a specific country
      list($dummy, $code, $indicator_code) = $this->path_elements;
      $response->setParameter('country', DAO::get_country($code));
      $response->setParameter('indicator', DAO::get_indicator($indicator_code));
      $response->setParameter('values', DAO::get_country_indicator($code, $indicator_code));
      $response->setTemplate('country_indicator');
      return;

    case 4:
      // /countries/<code>/<indicator>/<filename>.csv
      // Return a country-specific indicator as CSV.
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