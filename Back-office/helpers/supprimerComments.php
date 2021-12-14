<?php 
include ('../controller/crudComment.php');

$cr= new crudComment();
$id= $_POST["idC"];
//$idB= $_POST["idblog"];
$cr->supprimerComment($id,$cr->conn);

header('Location: ../view/display_blog.php');


?>