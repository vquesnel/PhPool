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
$index = 0;
$a_i = 0;
$n_i = 0;
$o_i = 0;
while ($tab[$index])
{
	if (ctype_alpha($tab[$index][0]))
	{
		$tab_a[$a_i] = $tab[$index];
		$a_i++;
	}
	else if (is_numeric($tab[$index][0]))
	{
		$tab_n[$n_i] = $tab[$index];
		$n_i++;
	}
	else
	{
		$tab_o[$o_i] = $tab[$index];
		$o_i++;
	}
	$index++;
}
$i =0;
if ($tab_n)
{
	sort($tab_n, SORT_STRING | SORT_FLAG_CASE);
	natcasesort($tab_n);
}
if ($tab_a)
	natcasesort($tab_a);
if ($tab_o)
	natcasesort($tab_o);
$tab = array_merge($tab_a, $tab_n, $tab_o);
while ($tab[$i])
{
	echo $tab[$i]."\n";
	$i++;
}
?>
