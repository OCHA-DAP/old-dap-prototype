<?php

/**
 * An HTTP request encoded as a (thin) object.
 *
 * This method allows us to centralize information related to an HTTP
 * request, and to create mock requests for testing.
 *
 * @author David Megginson
 */
class HttpRequest {

  /**
   * Constructor.
   *
   * @param $fill - if false, do not prepopulate the object from the
   * standard PHP superglobals like $_SERVER and $_GET (default true).
   * This parameter is useful mainly for testing.
   */
  function __construct ($fill = true) {
    if ($fill) {
      $this->assign($_SERVER, $_GET, $_POST, file_get_contents('php://input'));
    }
  }

  /**
   * Assign request data.
   *
   * This method is useful mainly for testing.  When the constructor
   * is invoked with the optional $fill parameter set to false, this
   * object will not be prepopulated from the standard PHP variables,
   * and a test script can set its own values.
   *
   * @param $server - array of server variables (normally $_SERVER)
   * @param $get - array of GET request parameters (normally $_GET)
   * @param $post - array of URL-encoded POST parameters (normally $_POST)
   * @param $data - string of data delivered with the request
   */
  function assign ($server, $get, $post, $data) {
    $this->_server = $server;
    $this->_get = $get;
    $this->_post = $post;
    $this->_data = $data;
  }

  /**
   * Get the HTTP request method (e.g. GET, POST, DELETE).
   *
   * Shorthand for $this->server('REQUEST_METHOD')
   *
   * @return A string describing the HTTP request method, such as
   * "GET".
   */
  function method () {
    return $this->server('REQUEST_METHOD');
  }

  /**
   * Look up a standard PHP server variable.
   *
   * This method returns a standard field from the PHP $_SERVER array
   * (or a substitute set through the assign method).  If $name is not
   * set, return the whole array of server variables.
   *
   * @param $name (optional) the name of the server variable, or null to return an
   * array of all server variables.
   * @return the variable value, or null if the variable does not exist.
   */
  function server ($name = null) {
    if ($name) {
      return @$this->_server[$name];
    } else {
      return $this->_server;
    }
  }
 
  /**
   * Look up a GET request parameter.
   *
   * This method returns a GET request parameter from the PHP $_GET
   * array (or a substitute set through the assign method).  If $name
   * is not set, return the whole array of GET parameters.
   *
   * @param $name (optional) the name of the GET request parameter, or null to
   * return an array of all GET parameters.
   * @param $default_value (optional) value to return if parameter is not defined.
   * @return the variable value, or null if the parameter does not exist.
   */
  function get ($name = null, $default_value = null) {
   if ($name) {
     if (isset($this->_get[$name])) {
       return $this->_get[$name];
     } else {
       return $default_value;
     }
   } else {
     return $this->_get;
   }
  }


  /**
   * (Re)set a GET parameter.
   *
   * @param $name The parameter name.
   * @param $value The parameter value.
   */
  function setGet($name, $value) {
    $this->_get[$name] = $value;
  }

  /**
   * Look up a POST request parameter.
   *
   * This method returns a POST request parameter from the PHP $_POST
   * array (or a substitute set through the assign method).  If $name
   * is not set, return the whole array of POST parameters.
   *
   * @param $name the name of the POST request parameter, or null to
   * return an array of all POST parameters.
   * @param $default_value (optional) value to return if parameter is not defined.
   * @return the variable value, or null if the parameter does not exist.
   */
  function post ($name = null, $default_value = null) {
    if ($name) {
     if (isset($this->_post[$name])) {
       return $this->_post[$name];
     } else {
       return $default_value;
     }
    } else {
      return $this->_post;
    }
  }

  /**
   * (Re)set a POST parameter.
   *
   * @param $name The parameter name.
   * @param $value The parameter value.
   */
  function setPost($name, $value) {
    $this->_post[$name] = $value;
  }

  /**
   * Look up raw request data.
   *
   * This method returns raw request data for a POST request (e.g. an XML file).
   *
   * @return data as a string.
   */
  function data () {
    return @$this->_data;
  }

  private $_server;

  private $_get;

  private $_post;

  private $_data;

}
