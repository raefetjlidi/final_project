<?php

class crudBlog
{
	public $conn;
	function __construct()
	{
		include_once ('../config/connexion.php');
        $conf= new Connexion();
        $this->conn=$conf->cnx;
	}
	


function afficherblogs($con)
{
   $sql = "SELECT * FROM blogs";
$reponse = $con->query($sql);
return $reponse;
}


function recupererBlog($id ,$con)
{
   $sql = "SELECT * FROM blogs where id_blog=$id";
$reponse = $con->query($sql);
return $reponse;
}


function afficherRecent($con)
{
   $sql = "SELECT * FROM blogs ORDER BY id_blog DESC LIMIT 3"; 
$reponse = $con->query($sql);
return $reponse;
}		

function recupererCategorie($categorie,$con)
{

   $sql = "SELECT * FROM blogs where categorie_blog = '$categorie'"; // Ki nhot manuellement tekhdem 
   $reponse = $con->query($sql);
   return $reponse;
}

function resultatRecherche($nom ,$con)
{
   $sql = "SELECT * FROM blogs where nom_blog like'%$nom%' ORDER BY date_blog DESC";
$reponse = $con->query($sql);
return $reponse;
}



}

?>