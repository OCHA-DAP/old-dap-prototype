<!DOCTYPE html>

<html>
  <head>
{if $values|count > 1 and $values[0].period and $values[0].is_number}
  {assign var=chart_active value=1}
{/if}
    <title>{$country.name|escape} - {$indicator.name|escape} - DAP</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
{if $chart_active}
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="/scripts/line-chart.js"></script>
    <script type="text/javascript">
      var chart_title = '{$indicator.name|addslashes}';
      var chart_unit = '{$indicator.unit|addslashes}';
      var chart_data = [
  {foreach item=value from=$values}
      ['{$value.period|addslashes}', {$value.value}]{if !$value@last},{/if}
  {/foreach}
      ];
    </script>
{/if}
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
      <li><a href="/countries/">Countries</a></li>
      <li><a href="/countries/{$country.regionid|escape:url}/">{$country.name|escape}</a></li>
    </ul>

    <h1>Indicator: {$indicator.name|escape}</h1>

{if $chart_active}
    <section id="chart">
      <h2>Chart</h2>

      <div id="chart_container"></div>
    </section>
{/if}

    <section id="data">
      <h2>Data</h2>

{assign var=filename value="`$country.regionid`_`$indicator.indid`.csv"|escfile}
      <p><b>Download as spreadsheet:</b> <a href="{$filename}">{$filename}</a></p>

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
            <td><a href="/datasets/{$value.dsid|escape:url}/{$value.indid|escape:url}/">{$value.dataset_name|escape}</a></td>
            <td>{$value.dataset_last_scraped|date_format|escape}</td>
          </tr>
          {/foreach}
        </tbody>
      </table>

    </section>

    <section id="see-also">
      <h2>See also</h2>

      <p><b>Country:</b> <a href="/countries/{$country.regionid|escape:url}/">{$country.name|escape}</a></p>

      <p><b>Compare with other countries:</b> <a href="/indicators/{$indicator.indid|escape:url}/">{$indicator.name}</a></p>

    </section>

  </body>
</html>
