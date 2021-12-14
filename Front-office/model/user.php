<?php
class client {

    private ?int $Id=NULL;
    private string $Nom ;
    private string $Prenom;
    private string $Email;
    private string $MDP;
    private ?int $Num;
    private string $RoleUser;
    private string $Sexe;



public function __construct($Nom,$Prenom,$Email,$MDP,$Num,$RoleUser,$Sexe)
{
    $this->Nom = $Nom;
    $this->Prenom = $Prenom;
    $this->Email = $Email;
    $this->MDP = $MDP;
    $this->Num = $Num;
    $this->RoleUser=$RoleUser;
    $this->Sexe=$Sexe;
}
public function getId(){
    return $this->Id;
}
public function getNom()
{
    return $this->Nom;
}

public function setNom($Nom)
{
    $this->Nom = $Nom;

    return $this;}

public function getPrenom()
    {
        return $this->Prenom;
    }
    
public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;
    
        return $this;}
    
public function getEmail()
    {
        return $this->Email;
    }
    
public function setEmail($Email)
    {
        $this->Email = $Email;
    
        return $this;
    }
public function getMDP()
       {
           return $this->MDP;
       }
   
public function setpassword($MDP)
       {
           $this->MDP = $MDP;
   
           return $this;
       }
public function getNumeroDeTelephonne()
       {
           return $this->Num;
       }
   
public function setNumeroDeTelephonne($Num)
       {
           $this->Num = $Num;
   
           return $this;
       }
   
              
public function getRole(){
    $this->RoleUser;
}

public function setRole($RoleUser)
{
    $this->$RoleUser;
}

public function getSexe()
       {
           return $this->Sexe;
       }
   
public function setSexe($Sexe)
       {
           $this->Sexe = $Sexe;
   
           return $this;
        }

}
?>
