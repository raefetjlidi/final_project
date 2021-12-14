<?php 
class crudComment
{
    public $conn;
    function __construct()
    {
        include_once('../config/connexion.php');
        $confC= new Connexion();
        $this->conn=$confC->cnx;
    }


    function afficherComment($id, $con)
    {
        $sql= "SELECT * FROM commentaires  where blogs='$id'";
        $reponseC= $con->query($sql);
        return $reponseC;
    }

    

    
    function supprimerComment($id,$con)
    {
	$sql = "DELETE commentaires 
	        FROM commentaires 
			WHERE (id_commentaire='$id')";
	$con->exec($sql);
    }



    /* function recupererComment($id ,$con)
    {
        $sql = "SELECT * FROM commentaires where id_commentaire=$id";
        $reponseS = $con->query($sql);
        return $reponseS;
    } 
    */

    
}
?>