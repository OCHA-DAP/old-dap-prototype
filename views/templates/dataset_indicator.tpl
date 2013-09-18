<!DOCTYPE html>

<html>
  <head>
    <title>{$dataset.name|escape} - {$indicator.name|escape} - DAP</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
      <li><a href="/datasets/">Datasets</a></li>
      <li><a href="/datasets/{$dataset.dsid|escape:url}/">{$dataset.name|escape}</a></li>
    </ul>

    <h1>Indicator: {$indicator.name|escape}</h1>

    <p><b>Source dataset:</b> <a href="/datasets/{$dataset.dsid|escape:url}/">{$dataset.name|escape}</a></p>

    <p><b>Compare with other datasets:</b> <a href="/indicators/{$indicator.indid|escape:url}/">{$indicator.name}</a></p>

    <table border="1">
      <thead>
        <tr>
          <th>Country</th>
          <th>Period</th>
          <th>Value</th>
          <th>Unit</th>
          <th>Fetched</th>
        </tr>
      </thead>
      <tbody>
{foreach item=value from=$values}
{if $value.region != $last_region}
        <tr class="table-separator">
          <td colspan="5">&nbsp;</td>
        </tr>
{/if}
{assign var=last_region value=$value.region}
        <tr>
          <td><a href="/countries/{$value.region|escape:url}/{$value.indid|escape:url}/">{$value.region_name|escape}</a></td>
          <td>{$value.period|escape}</td>
          <td>{$value.value|escape}</td>
          <td>{$value.indicator_unit|escape}</td>
          <td>{$value.dataset_last_scraped|date_format|escape}</td>
        </tr>
{/foreach}
      </tbody>
    </table>

  </body>
</html>
