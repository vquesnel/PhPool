#!/usr/bin/php
<?PHP
date_default_timezone_set("Europe/Paris");
function monthtoint($x)
{
	$array = array("Janvier" => 1,
		"Fevrier" => 2,
		"Mars" => 3,
		"Avril" => 4,
		"Mai" => 5,
		"Juin" => 6,
		"Juillet" => 7,
		"Aout" => 8,
		"Septembre" => 9,
		"Octobre" => 10,
		"Novembre" => 11,
		"Decembre" => 12,
		"janvier" => 1,
		"fevrier" => 2,
		"mars" => 3,
		"avril" => 4,
		"mai" => 5,
		"juin" => 6,
		"juillet" => 7,
		"aout" => 8,
		"septembre" => 9,
		"octobre" => 10,
		"novembre" => 11,
		"decembre" => 12);
	return $array[$x];
}
if ($argc == 2)
{
	$argv[1] = trim($argv[1]);
	$tab = explode(' ', $argv[1]);
	$i = 0;
	while ($tab[$i])
		$i++;
	if ($i !== 5)
	{
		echo "Wrong Format\n";
		exit(0);
	}
	if (preg_match("/^[Ll]undi$/", $tab[0]) ||
		preg_match("/^[Mm]ardi$/", $tab[0]) ||
		preg_match("/^[Mm]ercredi$/", $tab[0]) ||
		preg_match("/^[jJ]eudi$/", $tab[0]) ||
		preg_match("/^[Vv]endredi$/", $tab[0]) ||
		preg_match("/^[Ss]amedi$/", $tab[0]) ||
		preg_match("/^[Dd]imanche$/", $tab[0]))
		echo "";
	else
	{
		echo "Wrong Format\n";
		exit(0);
	}
	if (preg_match("/^[0-9]{2}$/", $tab[1]) && is_numeric($tab[1]))
	{
		if ($tab[1] > 31 || (preg_match("/^[Ff]evrier$/", $tab[2]) && $tab[1] > 29))
		{
			echo "Wrong Format\n";
			exit(0);
		}
	}
	if (preg_match("/^[Jj]anvier$/", $tab[2]) ||
		preg_match("/^[Ff]evrier$/", $tab[2]) ||
		preg_match("/^[Mm]ars$/", $tab[2]) ||
		preg_match("/^[Mm]ai$/", $tab[2]) ||
		preg_match("/^[Jj]uillet$/", $tab[2]) ||
		preg_match("/^[Aa]out$/", $tab[2]) ||
		preg_match("/^[Oo]ctobre$/", $tab[2]) ||
		preg_match("/^[Dd]ecembre$/", $tab[2]) ||
		(preg_match("/^[Aa]vril$/", $tab[2]) ||
		preg_match("/^[Jj]uin$/", $tab[2]) ||
		preg_match("/^[Ss]eptembre$/", $tab[2]) ||
		preg_match("/^[Nn]ovembre$/", $tab[2])) && $tab[1] < 31)
		echo "";
	else
	{
		echo "Wrong Format\n";
		exit(0);
	}
	if (preg_match("/^[0-9]{4}$/", $tab[3]))
	{
		if (preg_match("/^[Ff]evrier$/", $tab[2]) && ($tab[3] % 4) != 0 && $tab[1] > 28)
		{
			echo "Wrong Format\n";
			exit(0);
		}
	}
	else
	{
		echo "Wrong Format\n";
		exit(0);
	}
	$date = explode(':', $tab[4]);
	$i = 0;
	while ($date[$i])
		$i++;
	if ($i !== 3)
	{
		echo "Wrong Format\n";
		exit(0);
	}
	if (preg_match("/^[0-9]{2}$/", $date[0]) && preg_match("/^[0-9]{2}$/", $date[1])
		&& preg_match("/^[0-9]{2}$/", $date[2]))
	{
		if ($date[0] > 23 || $date[1] > 59 || $date[2] > 59)
		{
			echo "Wrong Format\n";
			exit(0);
		}
	}
	else
	{
		echo "Wrong Format\n";
		exit(0);
	}
	$res = mktime($date[0], $date[1], $date[2],
		monthtoint($tab[2]), $tab[1], $tab[3]);
	echo"$res\n";
}
?>
