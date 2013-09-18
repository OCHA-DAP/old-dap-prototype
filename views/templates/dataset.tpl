<!DOCTYPE html>

<html>
  <head>
    <title>{$dataset.name} - source dataset - DAP</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
      <li><a href="/datasets/">Source datasets</a></li>
    </ul>

    <h1>Source dataset: {$dataset.name|escape}</h1>

    <p><b>Last scraped:</b> {$dataset.last_scraped|date_format}</p>

    <p>There are {$indicators|@count|number_format} indicator(s) associated with this dataset.</p>

    <ol>
{foreach item=indicator from=$indicators}
      <li><a href="/datasets/{$dataset.dsid|escape:url}/{$indicator.indid|escape:url}/">{$indicator.indicator_name|escape}</a> ({$indicator.num|number_format} values)</li>
{/foreach}      
    </ol>

  </body>
</html>
