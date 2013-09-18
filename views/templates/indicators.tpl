<!DOCTYPE html>

<html>
  <head>
    <title>Indicators</title>
  </head>
  <body>
    <h1>Indicators</h1>

    <dl>
{foreach item=indicator from=$indicators}
      <dt>{$indicator.indid|escape}</dt>
      <dd><a href="/indicators/{$indicator.indid|escape:url}/">{$indicator.name|escape}</a></dd>
{/foreach}
    </dl>

  </body>
</html>
