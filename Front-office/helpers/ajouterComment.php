<?php 
include ('../controller/crudComment.php');
include ('../model/comments.php');


$cr = new crudComment();

$id_blog=$_POST['idblog'];

$contenu_comment=$_POST['contenu'];

//$id_blog=$_POST['']; 3ayet l id blog lenna w baad ajoutih fl comment 
$comment= new Comments($contenu_comment,$id_blog); // zid $id_blog filekher
$cr->ajouterComment($comment,$cr->conn);
header('Location: ../view/single-news.php?id='.$id_blog);

?>
