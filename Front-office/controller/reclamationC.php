<?php

  
	require_once("../config/configC.php");

    class reclamationC
	{
        var $recla_id;
        var $motif_id;
		     

        function ajouterReclamation($reclamation){
            $sql="INSERT INTO reclamation (name, email,phone,subject,explication) VALUES (:name, :email, :phone , :subject , :explication)";
			$db = configC::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    
				   'name' =>$reclamation->getNom() , 
                   'email' =>$reclamation->getEmail(),
                   'phone' =>$reclamation->getPhone(),
                   'subject' =>$reclamation->getSubject(),
                   'explication' =>$reclamation->getExplication(),                                 
				]);			
                $this->recla_id = $db->lastInsertId();
				
              
                
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		function ajouterMotif($motif){
            $sql="INSERT INTO motif (type) VALUES (:type)";
			$db = configC::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([                 
				   'type' =>$motif->getType() ,                             
				]);			
                $this->motif_id = $db->lastInsertId();
                $this->ajouterReclamationMotif();
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}

		        



  

		
	function ajouterReclamationMotif(){
           
          

		$sql="INSERT INTO reclamation_motif (motif_id, recla_id) VALUES ( :motif_id , :recla_id)";
		$db = configC::getConnexion();

		try{
			$query = $db->prepare($sql);
			$query->execute([                 
			   'motif_id' =>$this->motif_id, 
			   'recla_id' =>$this->recla_id                        
			]);			
			
		}
		catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
		}			
	}



      
}

?>