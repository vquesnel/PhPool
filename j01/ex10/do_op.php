#!/usr/bin/php
<?PHP
if ($argc == 4)
{
	$i = 1;
	while ($argv[$i])
	{
		$argv[$i] = trim($argv[$i]);
		$i++;
	}
	if ($argv[2] == "-")
		$res = $argv[1] - $argv[3];
	else if ($argv[2] == "+")
		$res = $argv[1] + $argv[3];
	else if ($argv[2] == "/" && $argv[3] != 0)
		$res = $argv[1] / $argv[3];
	else if ($argv[2] == "*")
		$res = $argv[1] * $argv[3];
	else if ($argv[2] == "%" && $argv[3] != 0)
		$res = $argv[1] % $argv[3];
	echo "$res\n";
}
else
	echo "Incorrect Parameters\n";
?>
