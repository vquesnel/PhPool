<?php

include ('calcule_prix.php');
function total_vente()
{
	$add = './payer.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;
		$total  = 0;
		while ($r32[$i] != NULL)
		{
			$z = calcule_prix($r32[$i]['ville']) * $r32[$i]['nbr'];
			$total += $z;
			$i++;
		}
	}
  return $total;
}
function total_commande()
{
	$add = './payer.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;
$total  = 0;
		while ($r32[$i] != NULL)
		{
			$i++;
		}
	}
	return $i;
}


?>
