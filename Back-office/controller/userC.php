<?php 
        require_once '../config/connexionS.php';
        require_once '../model/user.php';
        class clientC 
        {

        public function ajouterClient($client)
        {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare('INSERT INTO utilisateur (NomClient,PrenomClient,EmailDeConfirmation,MDP,NumeroDeTelephonne,Sexe,RoleUser)
                    VALUES (:Nom, :Prenom, :Email, :MDP,:Num ,:Sexe,:RoleUser)'
                );
    
                $query->execute([
            "Nom"=>$client->getNom() , 
            "Prenom"=>$client->getPrenom() , 
            "Email"=>$client->getEmail(),
            "Password"=>$client->getMDP (),
            "Numero"=>$client->getNum(),
            "Sexe"=> $client->getSexe(),
            "RoleUser"=>$client->getRoleUser(),
                ] );
        }
        catch(PDOException $e){
            $e->getmessage();
        }
        }
        
        

     public function SupprimerUt($id){
        try{
            $pdo= getConnexion();
            $query= $pdo->prepare(
                'DELETE FROM utilisateur WHERE IdUt= :id'
            );
            $query-> execute([
                'id'=>$id
            ]);
        
    } catch (PDOException $e){
        $e->getmessage();
    }
}


     public function afficherClient() //Pour L'admin: tous les clients
    {
        try {
            $pdo = getconnexion();
            $query = $pdo->prepare(
                'SELECT * FROM utilisateur WHERE RoleUser="0" '
            );

            $query->execute(
            );
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function afficherAdmin()//affichaage de tous les admins
    {
        try {
            $pdo = getconnexion();
            $query = $pdo->prepare(
                'SELECT * FROM utilisateur WHERE RoleUser ="1" '
            );

            $query->execute(
            );
            return $query->fetchAll();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function getUserById($id) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare('SELECT * FROM utilisateur WHERE IdUt = :id'
            );
            $query->execute([
                'id' => $id
            ]);
            return $query->fetch();
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


        public function getClient($Email) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare('SELECT * FROM utilisateur WHERE EmailDeConfirmation = :Email '
                );
                $query->execute([
                    'Email' => $Email,
                ]);
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }


    public function modifierClient($client, $id) 
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'UPDATE utilisateur SET NomClient = :Nom,PrenomClient = :Prenom,EmailDeConfirmation = :Email,MDP=:MDP,NumeroDeTelephonne=:Num,Sexe = :Sexe WHERE IdUt=:id'
            );
            $query->execute([
                'Nom' => $client->getNom(),
                'Prenom' => $client->getPrenom(),
                'EmailDeConfirmation' => $client->getEmail(),
                'MDP' => $client->getMDP(),
                'NumeroDeTelephonne' => $client->getNum(),
                'Sexe' => $client->getSexe(),
                'id'=>$id,
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function trierClient($trie){
        if($trie == "Nom")
        {
        $selon= "NomClient";
    }
    else if($trie == "Prenom")
        {
            $selon= "PrenomClient";
        }
        $sql='SELECT * FROM utilisateur WHERE RoleUser = "0"  order by '.$selon.' ';
        $db =getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function trierAdmin($trie){
if($trie == "Nom")
{
    $selon= "NomClient";
}
else if($trie == "Prenom")
{
    $selon= "PrenomClient";
}
        $sql='SELECT * FROM utilisateur WHERE RoleUser = "1"  order by '. $selon.' ';
        $db =getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    public function verifier($vkey) {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'UPDATE utilisateur SET verification = 1 WHERE VerifiKey = :key && verification = 0 '
            );
            $query->execute([
                'key' =>$vkey
            ]);

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    

}
?>