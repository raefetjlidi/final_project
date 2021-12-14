<?php
include ('../controller/crudComment.php');
$Cr= new crudComment();

$id=$_POST['idc'];
$id_blog=$_POST['idblog'];

$Cr->supprimerComment($id,$Cr->conn);
//header('Location: ../view/single-news.php'); (Moshkla ml $_GET... Fl $_POST tekhdem mrigla .... ken naaml form tekhdem mrigla)
header('Location: ../view/single-news.php?id='.$id_blog);

?>
