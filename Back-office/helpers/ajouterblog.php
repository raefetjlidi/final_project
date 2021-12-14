<?php
include ('../controller/crudBlog.php');
include ('../model/blogs.php');

$cr=new crudBlog();

$target_dir= "../../Front-office/assets/img/latest-news/";
$target_file= $target_dir.basename($_FILES["image"]["name"]);
$uploadOk = 1;

$nom=$_POST['name'];
$categorie=$_POST['categorie'];
$image=$target_file;
$editeur=$_POST['editeur'];
$contenu=$_POST['contenu'];

$blog=new Blogs($nom,$categorie,$image,$editeur,$contenu);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
  {
     // if (file_exists($target_file)) 
      // {
        //  echo "Sorry, file already exists. <br>";
        //  $uploadOk = 0;
     // }
     // else 
      //{
          echo "The file has been uploaded. <br>";
          $uploadOk = 1;
     // } 
  } 
else 
  {
    echo "Sorry, there was an error uploading your file. <br>";
    $uploadOk = 0;
  }

if ($uploadOk==1)
{
    $cr->ajouterBlog($blog,$cr->conn);
    ?>
    <script type="text/javascript">
                alert('ADDED SUCCESSFULLY !');
    </script>
    <?php 
    header('Location: ../view/add_blog.php');
    
}
else
{
    echo 'ERROR';
}

?>





