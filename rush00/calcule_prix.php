<?php


function calcule_prix($ville)
{
	$add = './product.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;

		while ($r32[$i] != NULL)
		{
			if ($r32[$i]['name'] == $ville)
			{
				return($r32[$i]['prix']);
			}
			$i++;
		}
	}
}


?>
