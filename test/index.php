<?php
error_reporting(-1);
ini_set('display_errors', 1);

/**
 * My Little MODX
 */
class MODX {
	public function getOption($key, $array = [], $defaultValue = false) {
        if (strlen($key) <= 0 || !is_array($array) || !isset($array[$key])) {
            return $defaultValue;
        }
        return $array[$key];
    }
}

$modx = new MODX();
$snippetPath = dirname(dirname(__FILE__)).'/core/components/quasidate/elements/snippets/quasidate.snippet.php';

// [[+publishedon:quasiDate=`%weekday (%w), %j %month %Y г.`]]
$tests = [
	[
		'input' => 123121123,
		'options' => '%weekday (%w), %j %month %Y г.',
		'scriptProperties' => [
			'cultureKey' => 'ru'
		]
	],
	[
		'input' => 163123123,
		'options' => '%weekday (%w), %j %month %Y г.',
		'scriptProperties' => [
			'cultureKey' => 'en'
		]
	],
	[
		'input' => 163020123,
		'options' => '%weekday (%w), %j %month %Y г.',
		'scriptProperties' => [
			'cultureKey' => 'ua'
		]
	],
];

if (file_exists($snippetPath)) {
	foreach ($tests as $testIdx => $test) {
		$input = $test['input'];
		echo '<p>';
		echo '<b>Test #'.$testIdx.'</b><br/>';
		echo date('H:i:s d.m.Y', $input).'<br/>';
		$options = $test['options'];
		$scriptProperties = $test['scriptProperties'];
		$output = include($snippetPath);
		echo $output;
		echo '</p>';
	}
} else {
	echo '<p>Snippet does not exists: <b>"'.$snippetPath.'"</b></p>';
}


