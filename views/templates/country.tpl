<!DOCTYPE html>

<html>
  <head>
    <title>{$country.name|escape} - country data - DAP</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
      <li><a href="/countries/">Countries</a></li>
    </ul>

    <h1>Country data: {$country.name|escape}</h1>

    <p>There are {$indicators|@count|number_format} indicator(s) available for {$country.name|escape}:</p>

    <ul>
{foreach item=indicator from=$indicators}
      <li><a href="/countries/{$country.regionid|escape:url}/{$indicator.indid|escape:'url'}/">{$indicator.indicator_name|escape}</a> ({$indicator.num|number_format})</li>
{/foreach}
    </ul>

  </body>
</html>
