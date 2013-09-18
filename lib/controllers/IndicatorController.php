<?php

class IndicatorController extends AbstractController {

  function doGET(HttpRequest $request, HttpResponse $response) {
    global $APP;

    $indicators = DAO::get_indicators();

    $response->setParameter('indicators', $indicators);
    $response->setTemplate('indicators');
  }

}