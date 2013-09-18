<?php

class CountryController extends AbstractController {

  function doGET(HttpRequest $request, HttpResponse $response) {
    global $APP;

    $countries = DAO::get_countries();

    $response->setParameter('countries', $countries);
    $response->setTemplate('countries');
  }

}