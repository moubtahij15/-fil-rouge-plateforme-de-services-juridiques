<?php
class admin extends DataBase
{


  private $conn;

  public function __construct()
  {

    $this->conn = $this->connect();
  }

  public function read_single($username)
  {
    $sql = "select * from admin where username = ?";
    $result = $this->conn->prepare($sql);

    if ($result->execute([$username])) {
      return $result->fetch(PDO::FETCH_ASSOC);
    } else return false;
  }


  // register avocat
  public function register($data)
  {

    $data->username = htmlspecialchars(strip_tags($data->username));
    $data->password = htmlspecialchars(strip_tags($data->password));
    // get random string && hash idClient(ref)
    $data->password = password_hash($data->password, PASSWORD_DEFAULT);



    $sql = "INSERT INTO `admin` ( `username`, `password`) VALUES (?, ?)  ";
    $result = $this->conn->prepare($sql);

    $result->execute([

      $data->username,
      $data->password

    ]);
    if ($result) {
      return json_encode(
        array(
          'message' => 'bien creer',

        )
      );
    }
    return false;


    // return false;
  }
  // login avocat
  public function login($data)
  {
    // clean data

    $data->username = htmlspecialchars(strip_tags($data->username));
    $data->password = htmlspecialchars(strip_tags($data->password));
    $pass_hash = "";
    $test = $this->read_single($data->username);
    if ($test) {

      if (password_verify($data->password, $test['password'])) {
   


          return json_encode(
            array(
              'message' => 'success',
              'admin' => $test,
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
  }



  // function getAge 
  public function  getAge($date_naissance)
  {

    $date = new DateTime($date_naissance);
    $now = new DateTime();
    $interval = $now->diff($date);
    return $interval->y;
  }
}
