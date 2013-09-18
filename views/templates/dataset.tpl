<!DOCTYPE html>

<html>
  <head>
    <title>Datasets</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
      <li><a href="/datasets/">Datasets</a></li>
    </ul>

    <h1>Dataset: {$dataset.name|escape}</h1>

    <dl>
      <dt>Last scraped</dt>
      <dd>{$dataset.last_scraped|date_format}</dd>
    </dl>

    <p>There are {$indicators|@count|number_format} indicator(s) associated with this dataset.</p>

    <ul>
{foreach item=indicator from=$indicators}
      <li><a href="/indicators/{$dataset.dsid|escape:url}/{$indicator.indid|escape:url}/">{$indicator.indicator_name|escape}</a> ({$indicator.num|number_format} values)</li>
{/foreach}      
    </ul>

  </body>
</html>
