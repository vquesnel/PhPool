#!/usr/bin/php
<?PHP
if ($argc == 2)
{
	$argv[1] = trim($argv[1]);
	$tab = explode(' ', $argv[1]);
	$tab = array_filter($tab);
	$line = implode(" ", $tab);
	echo "$line\n";
}
?>
