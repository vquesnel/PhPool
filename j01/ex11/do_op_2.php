#!/usr/bin/php
<?PHP
if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit (0);
}
//$line = preg_replace("/[ \t]*/", "", $argv[1]);
$line = trim($argv[1]);
$tab1 = explode(' ', $line);
$tab1 = array_filter($tab1);
$tab1 = array_values($tab1);
if (count($tab1) != 3)
{
	echo "Syntax Error\n";
	exit(0);
}
$line = implode('', $tab1);
$sign1 = 1;
if ($line[0] == '-' || $line[0] == '+')
{
	if($line[0] == '-')
		$sign1 = -1;
	$line[0] = 0;
}
$sign2 = 1;
$i = strlen ($line) -1;
while ($i)
{
	if (($line[$i] == '-' || $line[$i] == '+') && ($line[$i-1] == '-' || $line[$i-1] == '+' || $line[$i-1] == '/' || $line[$i-1] == '*' || $line[$i-1] == '%'))
	{
		if ($line[$i] == '-')
			$sign2 = -1;
		$line[$i] = 0;
		break;
	}
	$i--;
}
if (strpos($line, '+') !== FALSE)
{
	$tab = explode('+', $line);
	if (count($tab) != 2 || !is_numeric($tab[0]) || !is_numeric($tab[1]))
	{
		echo "Syntax Error\n";
		exit (0);
	}
	else
		echo ($tab[0] * $sign1) + ($tab[1] * $sign2)."\n";
}
else if (strpos($line, '-') !== FALSE)
{
	$tab = explode('-', $line);
	if (count($tab) != 2 || !is_numeric($tab[0]) || !is_numeric($tab[1]))
	{
		echo "Syntax Error\n";
		exit (0);
	}
	else
		echo ($tab[0] * $sign1) - ($tab[1] * $sign2)."\n";
}
else if (strpos($line, '*') !== FALSE)
{
	$tab = explode('*', $line);
	if (count($tab) != 2 || !is_numeric($tab[0]) || !is_numeric($tab[1]))
	{
		echo "Syntax Error\n";
		exit (0);
	}
	else
		echo ($tab[0] * $sign1) * ($tab[1] * $sign2)."\n";
}
else if	(strpos($line, '/') !== FALSE)
{
	$tab = explode('/', $line);
	if (count($tab) != 2 || !is_numeric($tab[0]) || !is_numeric($tab[1]))
	{
		echo "Syntax Error\n";
		exit (0);
	}
	if ($tab[1] == 0)
	{
		echo "Division by zero\n";
		exit (0);
	}
	else
		echo ($tab[0] * $sign1) / ($tab[1] * $sign2)."\n";
}
else if	(strpos($line, '%') !== FALSE)
{
	$tab = explode('%', $line);
	if (count($tab) != 2 || !is_numeric($tab[0]) || !is_numeric($tab[1]))
	{
		echo "Syntax Error\n";
		exit (0);
	}
	if ($tab[1] == 0)
	{
		echo "Division by zero\n";
		exit (0);
	}
	else
		echo ($tab[0] * $sign1) % ($tab[1] * $sign2)."\n";
}
?>
