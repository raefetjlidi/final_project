<?php
class Blogs
{
	private $id_blog;
	private $nom_blog;
    private $contenu_blog;
	private $categorie_blog;
    private $date_blog;
    private $nom_editeur;
    
    //Getters
    function getIdBlog()
    {
    	return $this->id_blog;
    }
    function getNomBlog()
    {
    	return $this->nom_blog;
    }
    function getContenuBlog() {
        return $this->contenu_blog;
    }
    function getCategorieBlog()
    {
    	return $this->categorie_blog;
    }
    function getDateBlog()
    {
    	return $this->date_blog;
    }
    function getNomEditeur()
    {
    	return $this->nom_editeur;
    }
    //Setters
    function setIdBlog($id_blog)
    {
    	$this->id_blog=$id_blog;
    }
    function setNomBlog($nom_blog)
    {
    	$this->nom_blog=$nom_blog;
    }
    function setContenuBlog($contenu_blog)
    {
    	$this->contenu_blog=$contenu_blog;
    }
    function setcategorieBlog($categorie_blog)
    {
    	$this->categorie_blog=$categorie_blog;
    }
    function setDateBlog($date_blog)
    {
    	$this->date_blog=$date_blog;
    }
    function setNomEditeur($nom_editeur)
    {
    	$this->nom_editeur=$nom_editeur;
    }
    
    //Constructor
    function __construct($id_blog,$nom_blog,$categorie_blog,$date_blog,$nom_editeur)
    {
    	$this->id_blog=$id_blog;
    	$this->nom_blog=$nom_blog;
    	$this->categorie_blog=$categorie_blog;
    	$this->date_blog=$date_blog;
    	$this->nom_editeur=$nom_editeur;
    }
  
}
?>