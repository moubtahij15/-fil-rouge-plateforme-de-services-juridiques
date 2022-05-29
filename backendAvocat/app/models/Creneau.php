<?php 

class Creneau extends DataBase {


    private $conn;
    
    public function __construct(){

      $this->conn=$this->connect();

  }



    //get single creneau 
    public function read_single($id_creneau){
        $sql="select * from creneau where id_creneau = ?";
        $result=$this->conn->prepare($sql);

        if($result->execute([$id_creneau])){
          return $result->fetch(PDO::FETCH_ASSOC);
           
        }else return false;


    }

    // get all creneau dispo
    public function read($date){
      if(isset($date)){

        $sql="SELECT * FROM `creneau` WHERE creneau.id_creneau not in( SELECT id_creneau FROM `rdv` WHERE date_creneau= :date ) ";
        
        $result=$this->conn->prepare($sql);

        if($result->execute([':date'=>$date])){
        
          return $result->fetchAll(PDO::FETCH_ASSOC);
        
        }else return false;
      }else return false  ;
        
       

    }
  



}

?>