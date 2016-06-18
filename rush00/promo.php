<?PHP

	session_start();
	unset($_SESSION['ville']);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="bloc_page">
		<header>
			<a href="index.php" style="color: #000000; text-decoration:none;">
				<div id="titre">
					<div id="logo">
						<img src="img/logo.png" alt="Logo de Voyageons">
						<h1>Voyageons</h1>
					</div>
					<h2 id="toyo">SITE DE VOYAGE</h2>
				</div>
			</a>
			<nav>
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="derniereminute.php">Dernière minute</a></li>
					<li><a href="promo.php">Promo</a></li>
					<li><a href="panier.php">Panier</a></li>
					<?PHP
						if ($_SESSION['log'] == 'YES' || $_COOKIE["id"] !== NULL)
						{
							echo '<li><a href="compte.php">Mon compte</a></li>';
							echo '<li><a href="delog.php">Deconnection</a></li>';
						}
						else
							echo '<li><a href="connection.php">Connection / inscription</a></li>';
					?>
				</ul>
			</nav>
		</header>
	</div>
<hr color="black"/>
<img src="">
<br /><br />
<?PHP
	$add = './product.csv';
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) != FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;
		while ($r32[$i] != NULL)
		{
			if ($r32[$i]['promo'] == 1)
			{
				echo '<div class="categorie">';
			echo '<div class="product">';
			echo "<img src=".$r32[$i]['photo'].">";
			echo "<h1> ".$r32[$i]['name']."</h1>";
			echo "<p> ".$r32[$i]['descc']."</p>";
			echo'<form action="pagetest.php" method="post">';
			echo "<input type='hidden' name='Ville' value=".$r32[$i]['name'].">";
			echo'</select>';
			echo'<input type="submit" value="valider" name="OK">';
			echo'</form>';
			echo '</div>';
			echo '</div>';
			echo '<br />';
			}
			$i++;
		}
	}
?>
</body>
</html>
