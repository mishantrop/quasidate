<?php
/**
 * https://quasi-art.ru/
 * 2015-2017
 */
// Сначала язык берётся из системных настроек
$cultureKey = $modx->getOption('cultureKey');
// Переопределение из параметров сниппета
$cultureKey = $modx->getOption('cultureKey', $scriptProperties, $cultureKey);
$input = (int)$input;

// Language data
switch ($cultureKey) {
	case 'en':
		$monthes = 'january, february, march, april, may, june, july, august, september, october, november, december';
		$weekdays = 'Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday';
		break;
	case 'ua':
		$monthes = 'січня, лютого, березня, квітня, травня, червня, липня, серпня, вересня, жовтня, листопада, грудня';
		$weekdays = 'Понеділок, Вівторок, Середа, Четвер, П\'ятниця, Субота, Неділя';
		break;
	case 'ru':
	default:
		$monthes = 'января, февраля, марта, апреля, мая, июня, июля, августа, сентября, октября, ноября, декабря';
		$weekdays = 'Понедельник, Вторник, Среда, Четверг, Пятница, Суббота, Воскресенье';
		break;
}

$monthes = explode(',', $monthes);
array_unshift($monthes, '');
$weekdays = explode(',', $weekdays);

$monthName = trim($modx->getOption(date('n', $input), $monthes, ''));
$weekdayName = trim($modx->getOption((date('w', $input)+6)%7, $weekdays, ''));

// Будущий результат
$output = $options;

// Название месяца
$output = str_replace('%month', $monthName, $output);
$output = str_replace('%weekday', $weekdayName,	$output);
// Замена стандартных значений
$chars = 'HisdjmwY';
$charsLength = strlen($chars);
for ($i = 0; $i < $charsLength; $i++) {
	$output = str_replace('%'.$chars[$i], date($chars[$i], $input), $output);
}

return $output;