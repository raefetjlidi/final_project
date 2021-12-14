    <?php
    class reclamation{
       
        private $id=null;
        private $name=null;
        private $email=null;
        private $phone=null;
        private $subject=null;
        private $explication=null;

  
        function __construct($name, $email, $phone ,$subject, $explication){
            
        
            $this->name=$name;
            $this->email=$email;
            $this->phone=$phone;
            $this->subject=$subject;
            $this->explication=$explication;
           
        }
       
     
        function getNom(){
            return $this->name;
        }
        function getEmail(){
            return $this->email;
        }
        function getPhone(){
            return $this->phone;
        }
        function getSubject(){
            return $this->subject;
        }
        function getExplication(){
            return $this->explication;
        }

        
     
        function setNom(string $name){
            $this->name=$name;
        }
        function setEmail(string $email){
            $this->email=$email;
        }
        function setPhone(string $phone){
            $this->phone=$phone;
        }
        function setSubject(string $subject){
            $this->subject=$subject;
        }
        function setExplication(string $explication){
            $this->explication=$explication;
        }    
       
    }


?>