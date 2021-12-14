<?php

include('../controller/userC.php');
include('../model/user.php');
$clientC= new clientC();
if (isset ($_POST["Email"])){
	$Email=$_POST["Email"];
	$pdo=getConnexion();
	try{
	$stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE EmailDeConfirmation=?");
	$stmt->execute([$Email]); 
	$user = $stmt->fetch();
	if ($user) {
        echo("You have to try with another email!!!");
        header('location:../view/register.php');
    }

    else
    {   $nom=$_POST['Nom'];
        $prenom=$_POST['Prenom'];
        $email=$_POST['Email'];
        $pass=$_POST['MDP'];
        $numTel=$_POST['Num'];
        $sexe=$_POST['Sexe'];
        $roleU= '0';

        $client= new client($nom,$prenom,$email,$pass,$numTel,$roleU,$sexe);
$clientC->ajouterClient($client);
header('Location: ../view/indexSession.php');
    }
}

catch (Exception $e){
	die('Erreur: '.$e->getMessage());
}
}

?>
