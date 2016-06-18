<div class="head">
		
			<h1 id="logo">Voyageons</h1>
	
	</div>
	<div class="center">
	<?PHP
	if($_POST['submit'] == 'OK' && $_SESSION['log'] == NULL)
	{
		/*
			Pas sur que sa marche a 100% mais permet de dire si le login ou le mots de passe sont faux
		*/
		echo "<p>Mauvais login ou mots de passe</p>";
	}
	if ($_SESSION['log'] == 'YES' || $_COOKIE["id"] !== NULL)
	{
		/*
			Si l'utilisateur c'est connecter on remplace le champs "se conecter a son compte"
			par un boutton qui lui permet d'acceder a son compte
		*/
		echo '<p >Acceder a mon compte</p>
		<input type="button" name="lien1" value="mon compte" onclick="self.location.href=\'compte.php\'" 
		style="background-color:#3cb371" style="color:white; font-weight:bold"onclick>';
			
	}
	else
	{
		/*
			Si l'utilisateur c'est pas connecter on laisse le formulaire de conection
		*/
		echo '<p >Se connecter a son compte</p>
		<form method="post" action="index.php">
		Identifiant : <input type="text" name="conection_login"/>
		Mot de passe :<input type="password" name="conection_passwd"/>
		<input type="submit" name="submit" value="OK" />
		</form>';
	}
	if ($_SESSION['log'] == 'YES' || $_COOKIE["id"] !== NULL)
	{
		/*
			Si l'utilisateur c'est  connecter on lui permet de ce deconecter
		*/	
		echo '<p >deconection</p>
		<input type="button" name="lien1" value="deconection" onclick="self.location.href=\'delog.php\'" 
		style="background-color:#3cb371" style="color:white; font-weight:bold"onclick>';
	}
	else
	{
		/*
			Si l'utilisateur c'est pas connecter on lui permet de creer un compte
		*/	
		echo '<p >Creer un compte</p>
		<input type="button" name="lien1" value="create_account" onclick="self.location.href=\'create_account.php\'" 
		style="background-color:#3cb371" style="color:white; font-weight:bold"onclick>';
	}
	?>
	</div>
	<div class="footer">
	<!-- 
		Fin du site
	-->	
	</div>

















	---------------------------------------
	<hr color="black"/>

	<div id="bloc_centre">

		<div id="connection">
			<p id="conne">Connection</p>
			<form method="post" action="index.php">
				Nom d'utilisateur: <input type="text" name="conection_login"/>
				Mot de passe:<input type="password" name="conection_passwd"/>
				<input type="submit" name="submit" value="OK" />
			</form>	
		</di>
		<div>
			
		</div>

		<div id="inscription">
			<p id="inscri">Inscription</p>
			<form method="post" action="create_account.php">
				Nom d'utilisateur: <input type="text" name="new_login" />
				Mot de passe:<input type="password" name="new_passwd" />
				Confirmez votre mot de passe:<input type="password" name="new_confirm_passwd" />
				<input type="submit" name="submit" value="OK" />
			</form>
		</div>
		
	</div>
























































	?>
<!DOCTYPE html>
<html>
<head>
	<title>Gerer son compte</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<div class="head">
	<!-- 
		Menu du site
	-->
	</div>
	<div class="center">
		<p >changer de mots de pass</p>
		<form method="post" action="compte.php">
			Identifiant : <input type="text" name="login" />
			Mot de passe actuelle:<input type="password" name="oldpw" />
			nouveau mot de passe :<input type="password" name="newpw" />
			<input type="submit" name="submit" value="OK" />
		</form>
		<p >deconection</p>
			<input type="button" name="lien1" value="deconection" onclick="self.location.href='delog.php'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick>
		<p >Supprimer son compte</p>
		<form method="post" action="delete.php">
			Mot de passe:<input type="password" name="mdp" />
			Confirme mots de passe :<input type="password" name="mdp2" />
			<input type="submit" name="submite" value="OK" />
		</form>
	</div>
	<div class="footer">
	<!-- 
		Fin du site
	-->			
	</div>
</body>
</html>