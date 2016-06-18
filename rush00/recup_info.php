<?php


function name($name)
{
	$add = './product.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;

		while ($r32[$i] != NULL)
		{
			if ($r32[$i]['name'] == $name)
				return $r32[$i]['name'];
			$i++;
		}
		//return ($name);
	}
}

function photo($name)
{
	$add = './product.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;

		while ($r32[$i] != NULL)
		{
			if ($r32[$i]['name'] == $name)
				return $r32[$i]['photo'];
			$i++;
		}
	}
}

function prix($name)
{
	$add = './product.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;

		while ($r32[$i] != NULL)
		{
			if ($r32[$i]['name'] == $name)
				return $r32[$i]['prix'];
			$i++;
		}
	}
}

function descc($name)
{
	$add = './product.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;

		while ($r32[$i] != NULL)
		{
			if ($r32[$i]['name'] == $name)
				return $r32[$i]['descc'];
			$i++;
		}
	}
}
function descl($name)
{
	$add = './product.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;

		while ($r32[$i] != NULL)
		{
			if ($r32[$i]['name'] == $name)
				return $r32[$i]['descl'];
			$i++;
		}
	}
}
?>
