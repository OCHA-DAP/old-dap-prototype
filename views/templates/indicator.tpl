<!DOCTYPE html>

<html>
  <head>
    <title>{$indicator.name|escape} - indicator - DAP</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
      <li><a href="/indicators/">Indicators</a></li>
    </ul>

    <h1>Indicator: {$indicator.name|escape}</h1>

    <p><i>All countries and datasets.</i></p>

    <table border="1">
      <thead>
        <tr>
          <th>Country</th>
          <th>Period</th>
          <th>Value</th>
          <th>Unit</th>
          <th>Source</th>
          <th>Fetched</th>
        </tr>
      </thead>
      <tbody>
{foreach item=value from=$values}
{if $value.region != $last_region}
        <tr class="table-separator">
          <td colspan="6">&nbsp;</td>
        </tr>
{/if}
{assign var=last_region value=$value.region}
        <tr>
          <td><a href="/countries/{$value.region|escape:url}/{$value.indid|escape:url}/">{$value.region_name|escape}</a></td>
          <td>{$value.period|escape}</td>
          <td>{$value.value|escape}</td>
          <td>{$value.indicator_unit|escape}</td>
          <td><a href="/datasets/{$value.dsid|escape:url}/{$value.indid|escape:url}/">{$value.dataset_name|escape}</a></td>
          <td>{$value.dataset_last_scraped|date_format|escape}</td>
        </tr>
{/foreach}
      </tbody>
    </table>

  </body>
</html>
