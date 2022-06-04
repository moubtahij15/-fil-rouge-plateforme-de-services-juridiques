<?php
class Client extends DataBase
{


  private $conn;

  public function __construct()
  {

    $this->conn = $this->connect();
  }
  //get single client 
  public function read_single($email)
  {
    $sql = "select * from client where email = ?";
    $result = $this->conn->prepare($sql);

    if ($result->execute([$email])) {
      return $result->fetch(PDO::FETCH_ASSOC);
    } else return false;
  }
  public function read_singleById($id)
  {
    $sql = "select * from client where id = ?";
    $result = $this->conn->prepare($sql);

    if ($result->execute([$id])) {
      return $result->fetch(PDO::FETCH_ASSOC);
    } else return false;
  }

  // get ville 

  public function getVilles()
  {
    $sql = "select * from ville";
    $result = $this->conn->prepare($sql);

    if ($result->execute()) {

      return json_encode(
        array(
          'villes' => $result->fetchAll(PDO::FETCH_ASSOC)
        )
      );
    } else return false;
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
  public function register($data)
  {
    // clean data
    $data->nom = htmlspecialchars(strip_tags($data->nom));
    $data->prenom = htmlspecialchars(strip_tags($data->prenom));
    $data->email = htmlspecialchars(strip_tags($data->email));
    $data->ville_id = htmlspecialchars(strip_tags($data->ville_id));
    $data->tel = htmlspecialchars(strip_tags($data->tel));
    $data->password = htmlspecialchars(strip_tags($data->password));
    // get random string && hash idClient(ref)
    $data->password = password_hash($data->password, PASSWORD_DEFAULT);


    if (!$this->read_single($data->email)) {

      $sql = "INSERT INTO `client` (`email`, `nom`, `prenom`, `ville_id`, `tel`, `password`) VALUES (:email, :nom, :prenom, :ville_id, :tel, :password)";
      $result = $this->conn->prepare($sql);

      $result->execute([
        ':email' => $data->email,
        ':nom' => $data->nom,
        ':prenom' => $data->prenom,
        ':ville_id' => $data->ville_id,
        ':tel' => $data->tel,
        ':password' => $data->password
      ]);
      if ($result) {
        return json_encode(
          array(
            'message' => 'bien creer',

          )
        );
      }
      return false;
    } else {
    }
    return json_encode(
      array(
        'message' => 'email deja utilisé',

      )
    );
    // return false;
  }

  // login client

  public function login($data)
  {
    // clean data

    $data->email = htmlspecialchars(strip_tags($data->email));
    $data->password = htmlspecialchars(strip_tags($data->password));
    $pass_hash = "";
    $test = $this->read_single($data->email);

    if ($test) {

      if (password_verify($data->password, $test['password'])) {

        return json_encode(
          array(
            'message' => 'success',
            'client' => $test,
          )
        );
      }
      return json_encode(
        array(
          'message' => 'mot de pass incorrect',

        )
      );
    } else {
      return json_encode(
        array(
          'message' => 'email non trouvé',
        )
      );
    }



    $reff = md5($data->id_client);

    $sql = "select * from client where id_client = :id";
    $result = $this->conn->prepare($sql);
    $result->execute([':id' => $reff]);
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }


  //update profile client 
  public function updateInfo($data)
  {
    // clean data
    $data->id = htmlspecialchars(strip_tags($data->id));
    $data->nom = htmlspecialchars(strip_tags($data->nom));
    $data->prenom = htmlspecialchars(strip_tags($data->prenom));
    $data->email = htmlspecialchars(strip_tags($data->email));
    $data->ville_id = htmlspecialchars(strip_tags($data->ville_id));
    $data->tel = htmlspecialchars(strip_tags($data->tel));
    // $data->password = htmlspecialchars(strip_tags($data->password));
    // get random string && hash idClient(ref)
    // $data->password = password_hash($data->password, PASSWORD_DEFAULT);

    $sql = "UPDATE client SET  email=:email , nom=:nom ,prenom =:prenom,  ville_id=:ville_id ,tel=:tel   WHERE id = :id ";
    $result = $this->conn->prepare($sql);
    $result->execute([
      ':email' => $data->email,
      ':nom' => $data->nom,
      ':prenom' => $data->prenom,
      ':ville_id' => $data->ville_id,
      ':tel' => $data->tel,
      ':id' => $data->id


    ]);
    if ($result) {
      return  $this->read_singleById($data->id);
    }
    return false;
  }



  //update password client 
  public function updatePass($data)
  {
    // clean data
    $data->id = htmlspecialchars(strip_tags($data->id));
    // test old password
    if (password_verify($data->oldPass, $this->read_singleById($data->id)["password"])) {
      $data->newPass = htmlspecialchars(strip_tags($data->newPass));
      $data->newPass = password_hash($data->newPass, PASSWORD_DEFAULT);
      $sql = "UPDATE client SET  password=:password WHERE id = :id ";

      $result = $this->conn->prepare($sql);
      $result->execute([
        ':password' => $data->newPass,
        ':id' => $data->id,
      ]);
      if ($result) {
        echo json_encode(
          array(
            'result' => 'success', 'message' => " le mot de passe  est Bien Modifier" ,'client'=> $this->read_singleById($data->id)
          )
        );
      }
      // return false;
    } else {
      echo json_encode(
        array(
          'result' => 'erreur', 'message' => " le mot de passe actuel est incorrect"
        )
      );
    }


    // // $data->nom = htmlspecialchars(strip_tags($data->nom));

    // // $data->password = htmlspecialchars(strip_tags($data->password));
    // // get random string && hash idClient(ref)
    // // $data->password = password_hash($data->password, PASSWORD_DEFAULT);

    // $sql = "UPDATE client SET  email=:email , nom=:nom ,prenom =:prenom,  ville_id=:ville_id ,tel=:tel   WHERE id = :id ";
    // $result = $this->conn->prepare($sql);
    // $result->execute([
    //   ':email' => $data->email,
    //   ':nom' => $data->nom,
    //   ':prenom' => $data->prenom,
    //   ':ville_id' => $data->ville_id,
    //   ':tel' => $data->tel,
    //   ':id' => $data->id


    // ]);
    // if ($result) {
    //   return  $this->read_singleById($data->id);
    // }
    // return false;
  }

  // function getAge 
  public function  getAge($date_naissance)
  {

    $date = new DateTime($date_naissance);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
  }

  //getName

  function getRef($n)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }

    return $randomString;
  }
}
