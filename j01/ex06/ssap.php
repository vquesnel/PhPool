#!/usr/bin/php
<?PHP

function epur_str($str)
{
	$str = trim($str);
	$tab = explode(' ', $str);
	$tab = array_filter($tab);
	$line = implode(" ", $tab);
	return ($line);
}

function ft_split($str)
{
	$str = trim($str, " ");
	$tab = explode(' ', $str);
	$tab = array_filter($tab);
	sort($tab);
	return ($tab);
}

$index = 1;
while ($index < $argc)
{
	$str = epur_str($argv[$index]);
	$str2 = $str2." ".$str;
	$str2 = epur_str($str2);
	$index++;
}
$tab = ft_split($str2);
foreach ($tab as $elem)
	echo "$elem\n";
?>
