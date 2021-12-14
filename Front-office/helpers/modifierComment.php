<?php 
include ('../controller/crudComment.php');
include ('../model/comments.php');

$Cr= new crudComment();

$id=$_POST['comment_id'];
$contenu=$_POST['contenu'];
$id_blog=$_POST['blog_id'];

$comment= new Comments($contenu,$id_blog);
$comment->setIdComment($id);

$Cr->modifierComment($comment,$Cr->conn);
header('Location: ../view/single-news.php?id='.$id_blog);
?>