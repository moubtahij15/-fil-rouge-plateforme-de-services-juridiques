<?php

class Creneau extends DataBase
{


  private $conn;

  public function __construct()
  {

    $this->conn = $this->connect();
  }



  //get single creneau 
  public function read_single($id_creneau)
  {
    $sql = "select * from creneau where id = ?";
    $result = $this->conn->prepare($sql);

    if ($result->execute([$id_creneau])) {
      return $result->fetch(PDO::FETCH_ASSOC);
    } else return false;
  }

  // get all creneau dispo
  public function read($data)
  {
    // print_r($data);
    if (!empty($data->date)) {

      $sql = "SELECT * FROM `creneau` WHERE creneau.id not in( SELECT id_creneau FROM `rdv` WHERE date_creneau= :date AND id_avocat= :id_avocat) and creneau.id not in( SELECT id_creneau FROM `consultation_tele` WHERE date_creneau= :date AND id_avocat= :id_avocat) ";


      $result = $this->conn->prepare($sql);

      if ($result->execute([
        ':date' => $data->date,
        ':id_avocat' => $data->id_avocat
      ])) {

        return $result->fetchAll(PDO::FETCH_ASSOC);
      } else return false;
    } else return false;
  }
}
