<?php

  
	require_once("../config/configC.php");

    class reclamationC
	{
        var $recla_id;
        var $motif_id;

        function afficherReclamation(){
            $sql="SELECT  r.id , r.name , r.email , r.phone , r.subject , r.explication , motif.type from reclamation as r inner join reclamation_motif as reclaMotif on r.id=reclaMotif.recla_id inner JOIN motif on motif.id=reclaMotif.motif_id";
            $db = configC::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
				
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMeesage());
            }
        }	
        function updateReclamation($reclamation,$id){
            $sql="UPDATE reclamation SET id = :id , name=:name, email=:email , phone=:phone ,  subject=:subject , explication=:explication WHERE id=:id";
            $db = configC::getConnexion();
            try{
                $query = $db->prepare($sql);
                echo"$id";
                $query->execute([
                   'id'=> $id,
                   'name' =>$reclamation->getNom() , 
                   'email' =>$reclamation->getEmail(),
                   'phone' =>$reclamation->getPhone(),
                   'subject' =>$reclamation->getSubject(),
                   'explication' =>$reclamation->getExplication(),                                 
                ]);			
                header("Location: afficherListeReclamation.php");
    
              
                
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }			
        }	   
        
        

        function supprimer_reclamation_motif($id){
            
			$sql=" DELETE FROM `reclamation_motif` WHERE recla_id=:id";
			$db = configC::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
        }

	

	function supprimer_motif($id){
		
		$sql=" DELETE FROM `motif` WHERE id=:id";
		$db = configC::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':id', $id);
		try{
			$req->execute();
		}
		catch(Exception $e){
			die('Erreur:'. $e->getMeesage());
		}
	}

    function supprimer_reclamation($id){
            
        $this->supprimer_reclamation_motif($id);
        
        $sql="DELETE FROM reclamation WHERE id=:id";
        $db = configC::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id', $id);
        try{
            $req->execute();
            
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMeesage());
        }
    }


      
}

?>