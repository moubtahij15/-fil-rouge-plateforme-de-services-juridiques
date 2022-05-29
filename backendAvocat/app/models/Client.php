<?php 
class Client extends DataBase {


    private $conn;
    
    public function __construct(){

      $this->conn=$this->connect();

  }
    //get single client 
    public function read_single($id_client){
      $sql="select * from client where id_client = ?";
      $result=$this->conn->prepare($sql);

      if($result->execute([$id_client])){
        return $result->fetch(PDO::FETCH_ASSOC);
         
      }else return false;


  }
  // $data->sjt_RDV = htmlspecialchars(strip_tags( $data->sjt_RDV));
  //                     $data->date_creneau = htmlspecialchars(strip_tags( $data->date_creneau));
  //                     $sql=" INSERT INTO `rdv` (`sjt_RDV`, `date_creneau`, `id_client`, `id_creneau`) VALUES ( :sjt_RDV,:date_creneau,:id_client,:id_creneau)";
  //                     $result=$this->conn->prepare($sql);
  //                      // Bind data
  //                     return  $result->execute([':sjt_RDV'=>$data->sjt_RDV,
  //                     ':date_creneau'=>$data->date_creneau,
  //                     ':id_client'=>$data->id_client,
  //                     ':id_creneau'=>$data->id_creneau]);

  //                 }

      // register client
      public function register($data){
          // clean data
        $data->nom = htmlspecialchars(strip_tags( $data->nom));
        $data->prenom = htmlspecialchars(strip_tags( $data->prenom));
        $data->email = htmlspecialchars(strip_tags( $data->email));
        $data->date_naissance = htmlspecialchars(strip_tags( $data->date_naissance));
        // get random string && hash idClient(ref)
        $str=$this->getRef(8);
        $id_client= md5($str);
        $age=$this->getAge($data->date_naissance);



        if(!$this->read_single($id_client)){
          $sql="INSERT INTO `client` (`id_client`, `nom`, `prenom`, `age`, `date_naissance`, `email`) VALUES (:id_client,:nom ,:prenom ,:age ,:date_naissance ,:email )";
          $result=$this->conn->prepare($sql);

             $result->execute([':id_client'=>$id_client,
                              ':nom'=>$data->nom,
                              ':prenom'=>$data->prenom,
                              ':age'=>$age,
                              ':date_naissance'=>$data->date_naissance,
                              ':email'=>$data->email]);
                              return $str;

        } else return false;
      }
      // login client

      public function login($data){
        // clean data
        
        $data->id_client = htmlspecialchars(strip_tags($data->id_client));
      
        $reff = md5($data->id_client);

        $sql="select * from client where id_client = :id";
        $result=$this->conn->prepare($sql);
        $result->execute([':id'=>$reff]);
        return $result->fetchAll(PDO::FETCH_ASSOC);

      }

        



      // function getAge 
       public function  getAge($date_naissance){

        $date = new DateTime($date_naissance);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
       }

       //getName

       function getRef($n) {
              $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $randomString = '';
            
              for ($i = 0; $i < $n; $i++) {
                  $index = rand(0, strlen($characters) - 1);
                  $randomString .= $characters[$index];
              }
      
        return $randomString;
        }
      



      }








  
  




?>