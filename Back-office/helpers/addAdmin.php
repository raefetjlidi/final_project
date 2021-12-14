<?php 
require_once ('../controller/userC.php');
require_once ('../model/user.php');

$cr= new clientC();

$prenom= $_POST['prenom'];
$nom= $_POST['nom'];
$email= $_POST['email'];
$mdp= $_POST['mdp'];
$sexe= $_POST['sexe'];
$num= $_POST['numTel'];
$role= '1';

$admin= new client($nom,$prenom,$email,$mdp,$num,$role,$sexe);
$cr->ajouterClient($admin);

header('Location: ../view/indexP.php');
?>