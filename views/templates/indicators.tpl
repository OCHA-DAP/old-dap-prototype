<!DOCTYPE html>

<html>
  <head>
    <title>All indicators - DAP</title>
    <link rel="stylesheet" type="text/css" href="/style/style.css" />
  </head>
  <body>
    <ul class="breadcrumbs">
      <li><a href="/">Home</a></li>
    </ul>

    <h1>All indicators</h1>

    <ol>
{foreach item=indicator from=$indicators}
      <li>
        <a href="/indicators/{$indicator.indid|escape:url}/">{if $indicator.name}{$indicator.name|escape}{else}{$indicator.indid|escape}{/if}</a>
        {if $indicator.unit}({$indicator.unit|escape}){/if}
      </li>
{/foreach}
    </ol>

  </body>
</html>
