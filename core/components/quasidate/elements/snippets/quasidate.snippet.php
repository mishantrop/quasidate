<?php
/**
 * https://quasi-art.ru/
 * 2015-2017
 */

// Сначала язык берётся из системных настроек
$cultureKey = $modx->getOption('cultureKey');
// Переопределение из параметров сниппета
$cultureKey = $modx->getOption('cultureKey', $scriptProperties, $cultureKey);

// Массив названий месяцев
switch ($cultureKey) {
	case 'en':
		$monthes = 'january, february, march, april, may, june, july, august, september, october, november, december';
		break;
	case 'ua':
		$monthes = 'січня, лютого, березня, квітня, травня, червня, липня, серпня, вересня, жовтня, листопада, грудня';
		break;
	case 'ru':
	default:
		$monthes = 'января, февраля, марта, апреля, мая, июня, июля, августа, сентября, октября, ноября, декабря';
		break;
}

$monthes = explode(',', $monthes);
array_unshift($monthes, '');

// Название месяца
$monthName = trim($modx->getOption(date('n', $input), $monthes, ''));

// Будущий результат
$output = $options;

// Название месяца
$output = str_replace('%month', $monthName, $output);
// Замена стандартных значений
$chars = 'HisdjmY';
$charsLength = strlen($chars);
for ($i = 0; $i < $charsLength; $i++) {
	$output = str_replace('%'.$chars[$i], date($chars[$i], $input), $output);
}

return $output;