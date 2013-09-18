<!DOCTYPE html>

<html>
  <head>
    <title>Indicators</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
    </ul>

    <h1>Indicators</h1>

    <dl>
{foreach item=indicator from=$indicators}
      <dt>{$indicator.indid|escape}</dt>
      <dd><a href="/indicators/{$indicator.indid|escape:url}/">{$indicator.name|escape}</a></dd>
      <dd>Unit: {$indicator.unit|escape}</dd>
{/foreach}
    </dl>

  </body>
</html>
