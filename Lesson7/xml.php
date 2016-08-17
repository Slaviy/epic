<?php

$url='http://www.cbr.ru/scripts/XML_daily.asp';

$xml=file_get_contents($url);
$currency=simplexml_load_string($xml);

echo $currency->Valute[9]->Value;