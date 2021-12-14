<?php
	include '../Controller/reclamationC.php';
	$reclamationC=new reclamationC();
	$reclamationC->supprimer_reclamation($_GET["id"]);
	header('Location:afficherListeReclamation.php');
?>   