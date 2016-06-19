<?PHP
session_start();
include ('calcule_prix.php');
print_r($_SESSION['panier']);
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
					<li><a href="allproducts.php">Tout</a></li>
					<li><a href="derniereminute.php">Dernière minute</a></li>
					<li><a href="promo.php">Promo</a></li>
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

$add = './commande.csv';
$prix = 0;
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
				$prix = $prix + calcule_prix($r32[$i]['ville']) * $r32[$i]['passager'];
				echo '<div class="one">';
				echo '<p style="width:200px"> Destination : '.$r32[$i]['ville'].'</p><br />';
				echo '<p>Date de départ : '.$r32[$i]['depart'].'<br />';
				echo 'Date de retour : '.$r32[$i]['retour'].'</p>';
				echo '<p>Nombre de passager : '.$r32[$i]['passager'].'</p>';
				echo '<p style="width:150px">Prix total : '.(calcule_prix($r32[$i]['ville']) * $r32[$i]['passager']).'</p>';
				echo '<form method="post" action="valider.php">';

				echo '<input type="hidden" name="depart" value='.$r32[$i]['depart'].'>';
				echo '<input type="hidden" name="arriver" value='.$r32[$i]['retour'].'>';

				echo '<input type="hidden" name="nbr" value='.$r32[$i]['passager'].'>';
				echo '<input type="hidden" name="ville" value='.$r32[$i]['ville'].'>';
				echo '<input class="bouton" style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 50px;height: 50px "type="submit" name="submit" value="Payer">';
				echo '<input class="bouton" style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 50px;height: 50px "type="submit" name="submit" value="Annuler">';
				echo '</form>';
				echo '</div>';
				echo '<br />';
			}
			$i++;
		}
	}
}
else
{
	$i = 0;
	while ($_SESSION['panier'][$i] !== NULL)
	{
		$prix = $prix + calcule_prix($_SESSION['panier'][$i]['ville']) * $_SESSION['panier'][$i]['passager'];
		echo '<div class="one">';
		echo '<p style="width:200px"> Destination : '.$_SESSION['panier'][$i]['ville'].'</p><br />';

		echo '<p>Date de départ : '.$_SESSION['panier'][$i]['depart'].'<br />';
		echo 'Date de retour : '.$_SESSION['panier'][$i]['retour'].'</p>';

		echo '<p>Nombre de passager : '.$_SESSION['panier'][$i]['passager'].'</p>';
		echo '<p style="width:150px">Prix total : '.(calcule_prix( $_SESSION['panier'][$i]['ville']) * $_SESSION['panier'][$i]['passager']).'</p>';
		echo '<form method="post" action="valider.php">';


		echo '<input type="hidden" name="nbr" value='.$_SESSION['panier'][$i]['passager'].'>';
		echo '<input type="hidden" name="ville" value='.$_SESSION['panier'][$i]['ville'].'>';
		echo '<input class="bouton" style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 50px;height: 50px "type="submit" name="submit" value="Payer">';
		echo '<input class="bouton" style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 50px;height: 50px "type="submit" name="submit" value="Annuler">';
		echo '</form>';
		echo '</div>';
		echo '<br />';
		$i++;
	}
}

?>
<hr>
</hr>
	<form method="post" action="valider.php">
		<div id="payer" align="center">
			<div><p> Prix Total des Voyages selectionnés : <?PHP echo $prix." $" ?></p></div>
		<div><input style="border-radius: 3px; border-style: solid; background-color: rgb(239,238,238);width: 50px;height: 50px "type="submit" name="submit" value="Annulertout"></div>
		</div>
	</form>

<!--
Faire des cookie pour sauvegarder les donner utilisateur qui sont pas connecter en plus des SESSION

Faire la meme chose que pour l'index pour afficher la selection de la commande

faire un bouttom pour chaque voyage qui renvoie sur une page qui demande les info passager

Pour finir faire un boutton qui valide la commande

quand la commande est valider elle se valide sur une rubrique commande dans le panel admin et aussi dans le panel mon compte

si la commande n'est pas valider elle reste afficher dans le panier

gerer les commande avec le nom utilisateur qui permet de les retoruver pour pouvoir afficher toute les commande en cour
-->

</body>
</html>
