<?php
session_start();
function check_cat($categorie)
{
	$add = './categorie.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) !== FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		foreach ($r32 as $elem)
		{
			if ($elem['name'] == $categorie)
				$i = 1;
		}
		if ($i == 0)
			return 0;
		else
			return $i;
	}
	else
		return 0;
}

?>
