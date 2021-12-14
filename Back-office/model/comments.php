<?php 
class Comments
{
    private $id_commentaire;
    private $date_commentaire;  
    private $contenu_commentaire;
    private $blogs;
    

    //Getters
    function getIdComment()
    {
        return $this->id_commentaire;
    }
    function getDateComment()
    {
        return $this->date_commentaire;
    }
    function getContenuComment()
    {
        return $this->contenu_commentaire;
    }
    function getBlog()
    {
        return $this->blogs;
    }
    
    

    //Setters
    function setIdComment($id_commentaire)
    {
        $this->id_commentaire=$id_commentaire;
    }
    function setDateComment($date_commentaire)
    {
        $this->date_commentaire=$date_commentaire;
    }
    function setContenuComment($contenu_commentaire)
    {
        $this->contenu_commentaire=$contenu_commentaire;
    }
    

    //Constructor
    function __construct($contenu_commentaire,$blogs)
    {
        $this->contenu_commentaire=$contenu_commentaire;
        $this->blogs=$blogs;
    }
}
?>