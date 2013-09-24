Period,Value,Unit,Source,Fetched
{foreach item=value from=$values}
{$value.period|esccsv},{$value.value|esccsv},{$value.indicator_unit|esccsv},{$value.dataset_name|esccsv},{$value.dataset_last_scraped|date_format:'Y-m-d'|esccsv}
{/foreach}
