<!DOCTYPE html>

<html>
  <head>
    <title>{$country.name|escape} - {$indicator.name|escape} - DAP</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
      <li><a href="/countries/">Countries</a></li>
      <li><a href="/countries/{$country.regionid|escape:url}/">{$country.name|escape}</a></li>
    </ul>

    <h1>Indicator ({$country.name}): {$indicator.name|escape}</h1>

    <table border="1">
      <thead>
        <tr>
          <th>Period</th>
          <th>Value</th>
          <th>Unit</th>
          <th>Source</th>
          <th>Fetched</th>
        </tr>
      </thead>
      <tbody>
{foreach item=value from=$values}
        <tr>
          <td>{$value.period|escape}</td>
          <td>{$value.value|escape}</td>
          <td>{$value.indicator_unit|escape}</td>
          <td><a href="/datasets/{$value.dsid|escape:url}/">{$value.dataset_name|escape}</a></td>
          <td>{$value.dataset_last_scraped|date_format|escape}</td>
        </tr>
{/foreach}
      </tbody>
    </table>

  </body>
</html>
