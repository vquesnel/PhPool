<section>
<form action="pagetest.php" method="post">

<select name="Pays">
<option value=""> ----- Pays ----- </option>
<?PHP
	$add = './categorie.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;

		while ($r32[$i] != NULL)
		{
			echo "<option value=".$r32[$i]['name'].">".$r32[$i]['name']."</option>";
			$i++;
		}
	}
?>
	</select>
	<select name="Ville">
<option value=""> ----- Ville ----- </option>
<?PHP
	$add = './product.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;

		while ($r32[$i] != NULL)
		{
			echo "<option value=".$r32[$i]['name'].">".$r32[$i]['name']."</option>";
			$i++;
		}
	}
?>
	</select>
	<input type="submit" value="valider" name="OK">
	</form>
</section>
