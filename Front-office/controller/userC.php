<?php 
        include ('../config/connexionS.php');
        class clientC 
        {

        public function ajouterClient($client)
        {
            $sql="INSERT INTO utilisateur (NomClient,PrenomClient,EmailDeConfirmation,MDP,NumeroDeTelephonne,Sexe,RoleUser)
            VALUES (:nom, :prenom, :email, :pass,:numTel ,:sexe,:roleU) ";
            $pdo= getConnexion();
            try {
                
                $query = $pdo->prepare($sql);
    
                $query->execute([
            "nom"=>$client->getNom() , 
            "prenom"=>$client->getPrenom() , 
            "email"=>$client->getEmail(),
            "pass"=>$client->getMDP(),
            "numTel"=>$client->getNumeroDeTelephonne(),
            "sexe"=> $client->getSexe(),
            "roleU"=>$client->getRole(),
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


     public function afficherClient()
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


    public function afficherAdmin()
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


    public function modifierClient($client) 
    {
        try {
            $pdo = getConnexion();
            $query = $pdo->prepare(
                'UPDATE utilisateur SET NomClient = :Nom, PrenomClient = :Prenom,MDP=:MDP,NumeroDeTelephonne=:Num,Sexe = :Sexe WHERE EmailDeConfirmation=:Email'
            );
            $query->execute([
                'Nom' => $client->getNom(),
                'Prenom' => $client->getPrenom(),
                'EmailDeConfirmation' => $client->getEmail(),
                'MDP' => $client->getMDP(),
                'NumeroDeTelephonne' => $client->getNum(),
                'Sexe' => $client->getSexe(),
                
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