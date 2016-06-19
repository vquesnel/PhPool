<?PHP
session_start();
include ('nbr_login.php');
include ('nbr_categorie.php');
include ('total_vente.php');
$add = './private/passwd';
$tab = unserialize(file_get_contents($add));
foreach ($tab as $elem)
{
	if ($elem['login'] == $_SESSION['login'])
	{
		if ($elem['admin'] == 0)
		{
			header('Location:index.php');
			exit();
		}
	}
}
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
					<li><a href="sejour.php">Séjour</a></li>
					<li><a href="74161.php">Produits</a></li>
					<li><a href="74162.php">Catégories</a></li>
					<li><a href="74163.php">Utilisateurs</a></li>
					<li><a href="delog.php">Deconnection</a></li>
				</ul>
			</nav>

		</header>
	</div>
	<hr color="black"/>

	<div style="position: relative;margin: auto; height: 500px; width: 300px; margin-top: 100px;">
		<p>Nombre de catégories : <?PHP echo nbr_categorie() ?></p>
		<br />
		<p>Nombre de produits : <?PHP echo nbr_product() ?></p>
		<br />
		<p>Nombre d'utilisateurs : <?PHP echo nbr_login() ?></p>
		<br />
		<p>Chiffre d'affaire total :  <?PHP if(!total_vente()) echo "0"; else echo total_vente() ?> $</p>
		<br />
		<p>Panier moyen : <?PHP if (!total_commande()) echo "0"; else $var = total_vente() / total_commande(); echo $var ?> $</p>
		<br />
		<p>Nombre de commande total: <?PHP if (!total_commande()) echo "0"; else echo total_commande() ?></p>
		<br />
	</div>



</body>
</html>
