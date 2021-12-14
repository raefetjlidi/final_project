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
      
}

?>