<?php
////////////////////////////////////////////////////////////////////////
// Path mapping for the application.
////////////////////////////////////////////////////////////////////////

global $APP;

$APP->paths = array(
  '!^$!' => 'HomeController',
  '!^countries/(?:([A-Z]{3})/(?:([^/]+)/)?)?$!' => 'CountryController',
  '!^datasets/(?:([^/]+)/(?:([^/]+)/)?)?$!' => 'DatasetController',
  '!^indicators/(?:([^/]+)/)?$!' => 'IndicatorController',
);

// end
