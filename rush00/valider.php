<?PHP
session_start();
include ('recup_info.php');
// $_POST['ville'] ontient la ville que lon chercher

/*

METTRE DU CODE POUR LES PERSONNES QUI NE SONT PAS CONNECTER

IL NE PEUVENT PAS VENIR SUR CETTE PAGE SI IL NE SONT PAS CONNECTER

ON LES RENVOIE SUR LA PAGE DE CONNECTION QUI LLE LES RENVERRA ICI GRACE AU VARIABLE DE _POST

*/
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
<div class="fiche">
	<div class="produit">
	<h1 style="text-align: center"><?PHP  echo name($_POST['ville']) ?></h1>
	<img  src='<?PHP echo photo($_POST['ville'])?>' >
		<p><?PHP  echo descc($_POST['ville']) ?></p>
	</div>
</div>

















</body>
</html>
