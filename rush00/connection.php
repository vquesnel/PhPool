<?PHP
session_start();
include ("login.php");

require('captcha.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Connection</title>
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
					<li><a href="sejour.php">Séjour</a></li>
					<li><a href="promo.php">Promo</a></li>
				</ul>
			</nav>

		</header>
	</div>
<hr color="black"/>
	<section>
		<div id="connection">
			<table style="margin: auto">
				<caption><p class="conne">Connection</p></caption>
				<form method="post" action="login.php">
				<tr><td>&nbsp</td></tr>
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="pseudo">Votre pseudo :</label></td>
					<td><input type="text" name="conection_login"/></td>
				</tr>
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="pass">Votre mot de passe :</label></td>
					<td><input type="password" name="conection_passwd"/></td>
				</tr>
				<tr><td>&nbsp</td></tr>
			</table>
			<br />
			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px " type="submit" name="submit" value="Enter" />
			</form>
		</div>
		<div id="inscription">
			<table style="margin: auto">
				<caption><p class="conne">Inscription</p></caption>
				<form method="post" action="create_account.php">
				<tr><td>&nbsp</td></tr>
				<tr>
					<td><label for="pseudo">Votre pseudo :</label></td>
					<td><input type="text" name="new_login" /></td>
				</tr>
				<tr>
					<td><label for="pass">Mot de passe :</label></td>
					<td><input type="password" name="new_passwd" /></td>
				</tr>
				<tr>
					<td><label for="pass">Confimer mot de passe :</label></td>
					<td><input type="password" name="new_confirm_passwd" /></td>
				</tr>
				<tr>
					<td><label for="mail">Adresse mail :</label></td>
					<td><input type="text" name="mail" /></td>
				</tr>
				<tr>
					<td><label for="mail">Date de naissance :</label></td>
					<td><input type="date" name="date"></code></td>
				</tr>
				<tr>
					<td><label for="captcha">Recopiez le mot : "<?PHP echo captcha(); ?>"</label></td>
					<input type="hidden" name="base_captcha" value=<?PHP echo '"'.$_SESSION['captcha'].'"' ?> />
					<td><input type="text" name="captcha" id="captcha" /></td>
				</tr>
			</table>
			<br />
			<input style="border-radius: 3px; border-style: solid; background-color: rgb(238,238,238);width: 100px;height: 25px "type="submit" name="submite" value="Inscription" />
			</form>
		</div>
	</section>
</body>
</html>
