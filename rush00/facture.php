<?php
session_start();
include ('calcule_prix.php');
if (file_exists("./Facture") == FALSE)
  mkdir("./Facture", 0777);
$i = 0;
while(file_exists('./Facture/facture'.$i.'.txt') == TRUE)
{
  $i++;
}
$add = './Facture/facture'.$i.'.txt';
/*
file_put_contents($add, "", FILE_APPEND);
$serial = unserialize(file_get_contents($add));
$i = 0;
while ($serial[$i])
{
  if ($serial[$i]['login'] == $_SESSION['login'])
    unset($serial[$i]);
  $i++;
}
*/
$prix = calcule_prix($_POST['ville']) * $_POST['nbr'];
$date = date("F j, Y, g:i a");
$facture = '                  Facture n° '.$i.'

Societe : Voyageons
Adresse : 96 Boulevard bessieres
          75017 Paris
Telephone : 0147200001


Facture à '.$_SESSION['login'].'

Date : '.$date.'

Reference : '.$_POST['ville'].'

Date de depart : '.$_POST['depart'].'

Date de retour : '.$_POST['arriver'].'

Nombre de passagers : '.$_POST['nbr'].'

Prix total : '.$prix.' $

Condition de remboursement : Aucune.

';
file_put_contents($add, $facture);
header("Location:sejour.php");
exit();
 ?>
