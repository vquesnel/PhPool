#!/usr/bin/php
<?PHP
if ($argc > 2)
{
	$to_find = $argv[1];
	foreach ($argv as $key => $value)
	{
		if ($key > 1)
		{
			$tab = explode(":", $value);
			if (count($tab) != 2)
				break ;
			if ($tab[0] === $to_find)
			{
				$result = $tab[1];
			}
		}
	}
}
if ($result !== NULL)
	echo $result."\n";
?>
