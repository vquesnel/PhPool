#!/usr/bin/php
<?PHP
while (1)
{
	echo "Entrez un nombre: ";
	$str = fgets(STDIN);
	if (!$str)
	{
		echo "^D\n";
		exit (0);
	}
	$str = trim($str);
	if (is_numeric($str) == TRUE)
	{
		if ($str % 2 == 0)
			echo "Le chiffre $str est Pair\n";
		else
			echo "Le chiffre $str est Impair\n";
	}
	else
		echo "'$str' n'est pas un chiffre\n";
}
?>
