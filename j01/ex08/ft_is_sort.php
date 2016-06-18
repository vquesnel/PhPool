#!/usr/bin/php
<?PHP
function ft_is_sort($tab)
{
	$tmp = $tab;
	sort($tmp);
	$i = 0;
	while ($tab[$i])
	{
		if ($tab[$i] != $tmp[$i])
			return (0);
		$i++;
	}
	return (1);
}
?>
