<?php
include ('../controller/crudBlog.php');
include ('../model/blogs.php');

$cr=new crudBlog();

if (isset($_POST["blog_id"]))
{
    $id = $_POST['blog_id'];
}

$nom=$_POST['name'];
$categorie=$_POST['categorie'];
$image=$_POST['image'];
$editeur=$_POST['editeur'];
$contenu=$_POST['contenu'];

$blog=new Blogs($nom,$categorie,$image,$editeur,$contenu);
$blog->setIdBlog($id);


$cr->modifierBlog($blog,$cr->conn);
header('Location: ../view/display_blog.php');

?>


