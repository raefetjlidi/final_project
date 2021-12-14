<?php

class crudBlog
{
	public $conn;
	function __construct()
	{
		include ('../config/connexion.php');
        $conf= new Connexion();
        $this->conn=$conf->cnx;
	}
	function ajouterBlog($blog,$con)
	{

	$nom_blog=$blog->getNomBlog();
	$contenu = $blog->getContenuBlog();
	$categorie_blog=$blog->getCategorieBlog();
	$image_blog=$blog->getImageBlog();
	$nom_editeur=$blog->getNomEditeur();
		$sql = "INSERT INTO blogs (nom_blog,contenu_blog,categorie_blog,image_blog,nom_editeur) 
        VALUES ('$nom_blog','$contenu','$categorie_blog','$image_blog','$nom_editeur')";
    $con->exec($sql);
	}


function afficherblogs($con)
{
   $sql = "SELECT * FROM blogs";
$reponse = $con->query($sql);
return $reponse;
}

function supprimerBlog($id,$con)
{
	$sql = "DELETE blogs 
	        FROM blogs 
			WHERE (id_blog='$id')";
	$con->exec($sql);
}

function modifierBlog($blog,$con)
	{	
		$id = $blog->getIdBlog();
		
		$nom_blog=$blog->getNomBlog();
		$contenu = $blog->getContenuBlog();
		$image_blog=$blog->getImageBlog();
		$categorie_blog=$blog->getCategorieBlog();
		$nom_editeur=$blog->getNomEditeur();

		$sql = "UPDATE blogs SET nom_blog='$nom_blog',
		contenu_blog='$contenu',image_blog='$image_blog',categorie_blog='$categorie_blog',nom_editeur='$nom_editeur' WHERE (id_blog=$id)";
		echo $sql;
		$con->exec($sql);
	}

	function recupererBlog($id ,$con)
{
   $sql = "SELECT * FROM blogs where id_blog=$id";
$reponse = $con->query($sql);
return $reponse;
}


		

}

?>