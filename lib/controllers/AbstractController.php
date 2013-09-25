<?php

/**
 * Abstract base class for all HTTP controllers.
 *
 * Controllers are classes that handle incoming HTTP requests and
 * prepare a response that can be rendered in a view.  Each of the
 * main HTTP request types (GET, POST, etc.)  has its own method,
 * which takes the $request parameters as input and uses the $response
 * object to produce output.
 *
 * Controllers are part of the well-established Model-View-Controller
 * architecture for web applications:
 *
 * http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller
 *
 * @author David Megginson
 */
abstract class AbstractController {

  /**
   * Save parameters from the URL path.
   *
   * @param $path_elements URL path elements to store for subclasses.
   */
  function __construct($path_elements) {
    $this->path_elements = $path_elements;
  }

  /**
   * Handle an HTTP GET request.
   *
   * A GET request retrieves an existing resource.
   *
   * This default method simply throws an exception.  Subclasses can
   * handle a GET request by overriding the method.
   *
   * @param $request The information in the incoming HTTP request.
   * @param $response The information in the outgoing HTTP response.
   */
  function doGET (HttpRequest $request, HttpResponse $response) {
    throw new Exception("GET method not supported");
  }


  /**
   * Handle an HTTP POST request.
   *
   * A POST request creates or updates a resource.  While HTTP does
   * not guarantee that a POST request is idempotent, POST requests
   * are idempotent in PDS, since the body of every POST request is an
   * XML document that contains a unique identifier (hence, repeating
   * a request would never create two separate resources).
   *
   * This default method simply throws an exception.  Subclasses can
   * handle a POST request by overriding the method.
   *
   * @param $request The information in the incoming HTTP request.
   * @param $response The information in the outgoing HTTP response.
   */
  function doPOST (HttpRequest $request, HttpResponse $response) {
    throw new Exception("POST method not supported");
  }


  /**
   * Handle an HTTP PUT request.
   *
   * A PUT request creates or updates a resource AT A SPECIFIED
   * LOCATION, and is idempotent (repeating the same request won't
   * corrupt the data).  PDS does not currently use PUT requests,
   * since PDS determines locations on its own based on data types and
   * identifiers in the XML body.
   *
   * This default method simply throws an exception.  Subclasses can
   * handle a PUT request by overriding the method.
   *
   * @param $request The information in the incoming HTTP request.
   * @param $response The information in the outgoing HTTP response.
   */
  function doPUT (HttpRequest $request, HttpResponse $response) {
    throw new Exception("PUT method not supported");
  }


  /**
   * Handle an HTTP DELETE request.
   *
   * A DELETE request removes the resource at the address specified.
   *
   * This default method simply throws an exception.  Subclasses can
   * handle a DELETE request by overriding the method.
   *
   * @param $request The information in the incoming HTTP request.
   * @param $response The information in the outgoing HTTP response.
   */
  function doDELETE (HttpRequest $request, HttpResponse $response) {
    throw new Exception("DELETE method not supported");
  }


}