<!DOCTYPE html>

<html>
  <head>
    <title>Countries</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
    </ul>

    <h1>Countries</h1>

    <dl>
{foreach item=country from=$countries}
      <dt>{$country.regionid|escape}</dt>
      <dd><a href="/countries/{$country.regionid|escape:url}/">{$country.name|escape}</a></dd>
{/foreach}
    </dl>

  </body>
</html>
