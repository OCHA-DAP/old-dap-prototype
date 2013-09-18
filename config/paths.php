<?php
////////////////////////////////////////////////////////////////////////
// Path mapping for the application.
////////////////////////////////////////////////////////////////////////

global $APP;

$APP->paths = array(
  '!^$!' => 'HomeController',
  '!^countries/$!' => 'CountryController',
  '!^datasets/$!' => 'DatasetController',
  '!^indicators/$!' => 'IndicatorController',
);

// end
