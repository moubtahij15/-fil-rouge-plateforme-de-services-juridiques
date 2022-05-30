<?php
class Categorie extends DataBase
{


  private $conn;

  public function __construct()
  {

    $this->conn = $this->connect();
  }
  //get single client 
  public function read()
  {
    $sql = "select * from categorie ";
    $result = $this->conn->prepare($sql);

    if ($result->execute()) {


      return json_encode(
        array(
          'categories' => $result->fetchAll(PDO::FETCH_ASSOC)
        )
      );
    } else return false;
  }
}
