<?php

/**
 * An HTTP response encoded as a (thin) object.
 */
class HTTPResponse {

  function setStatus ($status) {
    $this->status = $code;
  }

  function setHeader ($name, $value) {
    $this->headers[$name] = $value;
  }

  function setParameter ($name, $value) {
    $this->parameters[$name] = $value;
  }

  function setRedirect ($url, $code = 303) {
    $this->redirect = $url;
    $this->redirect_code = $code;
  }

  function setContent ($content) {
    $this->content = $content;
  }

  function setTemplate ($template) {
    $this->template = $template;
  }

  public $status;

  public $headers;

  public $parameters;

  public $redirect;

  public $redirect_code = 303;

  public $content;

  public $template;

}
