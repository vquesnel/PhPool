<?PHP
session_start();
include ('calcule_prix.php');

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
<br />
<div class="panier">
<?PHP

$add = './payer.csv';
if (!empty($_SESSION['login']))
{
	file_put_contents($add, "", FILE_APPEND);
	if (file_get_contents($add) !== FALSE)
	{
		$r32 = unserialize(file_get_contents($add));
		$i = 0;
		while ($r32[$i] !== NULL)
		{
			if ($r32[$i]['login'] == $_SESSION['login'])
			{
				echo '<div class="one">';
				echo '<p style="width:200px"> Destination : '.$r32[$i]['ville'].'</p><br />';
				echo '<p>Date de départ : '.$r32[$i]['depart'].'<br />';
				echo 'Date de retour : '.$r32[$i]['arriver'].'</p>';
				echo '<p>Nombre de passager : '.$r32[$i]['nbr'].'</p>';
				echo '<p style="width:150px">Prix total : '.(calcule_prix($r32[$i]['ville']) * $r32[$i]['nbr']).'</p>';
				echo '<form method="post" action="facture.php">';

				echo '<input type="hidden" name="ville" value='.$r32[$i]['ville'].'>';
				echo '<input type="hidden" name="nbr" value='.$r32[$i]['nbr'].'>';
				echo '<input type="hidden" name="depart" value='.$r32[$i]['depart'].'>';
				echo '<input type="hidden" name="arriver" value='.$r32[$i]['arriver'].'>';

				echo '<input class="bouton" style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 50px;height: 50px "type="submit" name="submit" value="Facture">';
				echo '</form>';
				echo '</div>';
				echo '<br />';

			}
			$i++;
		}
	}
}

?>
</div>

</body>
</html>
