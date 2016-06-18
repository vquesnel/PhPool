<?PHP 
/*
  Ce fichier supprime les cookies
  et detruit las varible de SESSION
  == Delogue TOTAL !! :)
*/
  session_start();
  setcookie("id", NULL, -1);
	setcookie("pass", NULL, -1);
  $_SESSION = array();
  session_destroy();
  unset($_SESSION);
  header('Location:index.php');
  exit();
?>
