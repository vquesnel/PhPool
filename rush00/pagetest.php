<?PHP
	session_start();
	include ('recup_info.php');
	if (empty($_SESSION['ville']))
		$_SESSION['ville'] = $_POST['Ville'];
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
		<h1 style="text-align: center"><?PHP  echo name($_SESSION['ville']) ?></h1>
		<p><?PHP  echo prix($_SESSION['ville']) ?> $ ttc/pers</p>
		<img  src='<?PHP echo photo($_SESSION['ville'])?>' >
		<p><?PHP  echo descc($_SESSION['ville']) ?></p>
		<table style="margin: auto">
			<caption><p class="conne">Choississez vos dates</p></caption>
			<form method="post" action="back_panier.php">
			<tr><td>&nbsp</td></tr>
			<tr>
				<td><label for="passager">Nombre de passager :</label></td>
				<td><input type="text" name="passager" /></td>
			</tr>
			<tr><td>&nbsp</td></tr>
			<tr>
				<td><label for="date">Date de depart :</label></td>
				<td><input type="date" name="depart"></code></td>
			</tr>
			<tr>
				<td><label for="date">Date de retour :</label></td>
				<td><input type="date" name="retour"></code></td>
			</tr>
		</table>
		<br />
			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px " type="submit" name="submit" value="Reserver" />
			</form>
		<?PHP
			if ($_SESSION['index'] == 1)
				echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Nombre de passager invalide</p></div>';
			if ($_SESSION['index'] == 2)
				echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Date de depart invalide</p></div>';
			if ($_SESSION['index'] == 3)
				echo '<div class="ntm"><p><img src="img/attention.png" alt="Logo attention">Date de retour invalide</p></div>';
			unset($_SESSION['index']);
		?>
		<br />
		<p><?PHP  echo descl($_SESSION['ville']) ?></p>
	</div>
</div>
</body>
</html>
