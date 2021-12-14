<?php

include ('../controller/crudBlog.php');
$cr=new crudBlog();

$id=$_POST["id"];
$cr->supprimerBlog($id,$cr->conn);
header('Location: ../view/display_blog.php');
?>