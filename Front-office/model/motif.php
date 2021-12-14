    <?php
    class motif{
       
        private $type=null;
 
        function __construct($type){            
            $this->type=$type;         
        }
           
        function getType(){
            return $this->type;
        }
   
        function setType(string $type){
            $this->type=$type;
        }
      
    }


?>