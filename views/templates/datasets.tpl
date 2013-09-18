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
{/foreach}
    </dl>

  </body>
</html>
