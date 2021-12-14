    <?php
    class reclamation_motif{
       
        private $motif_id=null;
        private $recla_id=null;


  
        function __construct($motif_id, $recla_id){
            
        
            $this->motif_id=$motif_id;
            $this->recla_id=$recla_id;
    
        }
           
        function setMotifId(string $motif_id){
            $this->motif_id=$motif_id;
        }
        function setReclaId(string $recla_id){
            $this->recla_id=$recla_id;
        }

       
    }


?>