<?php

session_start();

$rec = './commande.csv';
$add = './payer.csv';
file_put_contents($add, "", FILE_APPEND);
file_put_contents($rec, "", FILE_APPEND);
$r32 = unserialize(file_get_contents($rec));
$i = 0;

while($r32[$i]!= null)// && $r32[$i][$passager] != $_POST['nbr'])
{
  if ($r32[$i]['ville'] == $_POST['ville'])
    break;
  $i++;
}

$payer = unserialize(file_get_contents($add));

$tab  = array('login' => $_SESSION['login'], 'ville' => $_POST['ville'], 'nbr' => $_POST['nbr'], 'prix' => $_POST['prix'], 'depart' => $_POST['depart'], 'arriver' => $_POST['arriver']);

$payer[] = $tab;
$titi = serialize($payer);
file_put_contents($add, $titi);






unset($r32[$i]);
$r32 = array_values($r32);

$tat = serialize($r32);
file_put_contents($rec, $tat);

header('Location:panier.php');
exit();


 ?>
