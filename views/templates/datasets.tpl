<!DOCTYPE html>

<html>
  <head>
    <title>All source datasets - DAP</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
    </ul>

    <h1>All source datasets</h1>

    <ol>
{foreach item=dataset from=$datasets}
      <li>
        <a href="/datasets/{$dataset.dsid|escape:url}/">{if $dataset.name}{$dataset.name|escape}{else}{$dataset.dsid|escape}{/if}</a>
        (last updated {$dataset.last_scraped|date_format})
      </li>
{/foreach}
    </ol>

  </body>
</html>
