<?php
class Avocat extends DataBase
{


  private $conn;

  public function __construct()
  {

    $this->conn = $this->connect();
  }
  //get single client 
  public function read()
  {
    // get all avocats
    $sql = "select a.id,a.nom,a.email,a.prenom,a.age,a.adresse,a.date_naissance,a.imgUrl,v.nom as ville from avocat a join ville v on a.ville =v.id";
    $result = $this->conn->prepare($sql);
    $result->execute();
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    // set categories
    $sql1 = "SELECT c.id, c.nom_categorie FROM avocat_categorie ac join categorie c on c.id=ac.categorie_id WHERE ac.avocat_id=?";
    $result1 = $this->conn->prepare($sql1);
    $result3 = [];
    foreach ($result as $cat) {
      $result1->execute([$cat['id']]);
      array_push($cat, $result1->fetchAll(PDO::FETCH_ASSOC));
      array_push($result3, $cat);
    }
    return json_encode(
      array(
        'Avocat' => $result3
      )
    );
    return false;
  }

  public function readSearch($data)

  {
    $dataa = "";
    $sqlav = "";
    $sqlC = "";
    $test = "";
    if ($data->idAvocat && $data->idVille) {


      $sqlav = " where v.id= ? and a.id= ?";
      $dataa = [];
      $dataa = [$data->idVille, $data->idAvocat];
    } else
    if ($data->idVille) {


      $sqlav = " where v.id= ? ";
      $dataa = [];
      $dataa = [$data->idVille];
    } else
    if ($data->idAvocat) {


      $sqlav = " where  a.id= ?";
      $dataa = [];
      $dataa = [$data->idAvocat];
    }
    if ($data->idCategorie) {


      $sqlC = "AND ac.categorie_id= ?";
    }

    if ($data->idCategorie && !$data->idAvocat && !$data->idVille) {

      $result33 = $this->conn->prepare("SELECT count(*) FROM avocat_categorie ac join categorie c on c.id=ac.categorie_id WHERE ac.categorie_id=?");
      $result33->execute([$data->idCategorie]);

      if (!$result33->fetchColumn()) {
        return json_encode(
          array(
            'Avocat' => []
          )
        );
      }
    }



    // if ($data->idAvocat && $data->idVille && $data->idCategorie) {
    $data->idAvocat = htmlspecialchars(strip_tags($data->idAvocat));
    $data->idVille = htmlspecialchars(strip_tags($data->idVille));
    $data->idCategorie = htmlspecialchars(strip_tags($data->idCategorie));

    $sql = "select a.id,a.nom,a.email,a.prenom,a.age,a.adresse,a.date_naissance,a.imgUrl,v.nom as ville from avocat a join ville v on a.ville =v.id " . $sqlav;
    $result = $this->conn->prepare($sql);
    if (!$data->idAvocat && !$data->idVille) {
      $result->execute();
    } else {
      $result->execute($dataa);
    }
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    // set categories
    $sql1 = "SELECT c.id, c.nom_categorie FROM avocat_categorie ac join categorie c on c.id=ac.categorie_id WHERE ac.avocat_id=? " . $sqlC;
    $result1 = $this->conn->prepare($sql1);
    $result3 = [];



    foreach ($result as $cat) {
      $categorie = "";
      if ($data->idCategorie) {
        $result1->execute([$cat['id'], $data->idCategorie]);
        $categorie = $result1->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($categorie) != 0) {
          array_push($cat,$categorie);
          array_push($result3, $cat);
        };
      } else {
        $result1->execute([$cat['id']]);
        $categorie = $result1->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($categorie) != 0) {
          array_push($cat, $categorie);
          array_push($result3, $cat);
        };
      }
    }



    return json_encode(
      array(
        'Avocat' => $result3
      )
    );
    return false;
  }
}
