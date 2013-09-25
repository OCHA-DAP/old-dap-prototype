<?php

/**
 * Handle HTTP requests for the DAP home page.
 *
 * Started by David Megginson, September 2013.
 */
class HomeController extends AbstractController {

  function doGET(HttpRequest $request, HttpResponse $response) {
    // static template
    $response->setTemplate('home');
  }

}