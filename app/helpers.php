<?php
function formatDateTime($dateTime)
{

  return \Carbon\Carbon::createFromFormat('Y-md H:i:s', $dateTime)->format('d/m/y - H:i');
}

function formatMoney($moneyFormat)
{
  $clean_money = str_replace('.', '', $moneyFormat);
  return number_format($clean_money, 2, ',', '.');
}