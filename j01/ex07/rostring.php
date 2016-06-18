#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	$argv[1] = trim($argv[1], " ");
	$tab = explode (' ', $argv[1]);
	$tab = array_filter($tab);
	$tab = array_values($tab);
	$str = $tab[0];
	$i = 1;
	while ($tab[$i])
	{
		$str2 = $str2." ".$tab[$i];
		$i++;
	}
	$str2 = $str2." ".$str;
	$str2 = trim($str2);
	echo "$str2\n";
}
?>
