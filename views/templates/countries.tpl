<!DOCTYPE html>

<html>
  <head>
    <title>All countries - DAP</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
    </ul>

    <h1>Countries</h1>

    <ol>
{foreach item=country from=$countries}
      <li><a href="/countries/{$country.regionid|escape:url}/">{$country.name|escape}</a></li>
{/foreach}
    </ol>

  </body>
</html>
