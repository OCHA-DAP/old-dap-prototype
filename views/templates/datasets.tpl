<!DOCTYPE html>

<html>
  <head>
    <title>Datasets</title>
  </head>
  <body>
    <h1>Datasets</h1>

    <dl>
{foreach item=dataset from=$datasets}
      <dt>{$dataset.dsid|escape}</dt>
      <dd><a href="/datasets/{$dataset.dsid|escape:url}/">{$dataset.name|escape}</a></dd>
      <dd>Last updated {$dataset.last_scraped|escape}</dd>
{/foreach}
    </dl>

  </body>
</html>
