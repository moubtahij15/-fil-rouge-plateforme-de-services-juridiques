<?php
class Avocat extends DataBase
{


  private $conn;

  public function __construct()
  {

    $this->conn = $this->connect();
  }

  // read by id
  public function readById($id)
  {
    $sql = "select * from avocat where id = ?";
    $result = $this->conn->prepare($sql);

    if ($result->execute([$id])) {
      return $result->fetch(PDO::FETCH_ASSOC);
    } else return false;
  }
  // get single avocat by email
  public function read_single($email)
  {
    $sql = "select * from avocat where email = ?";
    $result = $this->conn->prepare($sql);

    if ($result->execute([$email])) {
      return $result->fetch(PDO::FETCH_ASSOC);
    } else return false;
  }

  // register avocat
  public function register($data)
  {
    $imgUrl = null;
    // clean data
    $data->nom = htmlspecialchars(strip_tags($data->nom));
    $data->prenom = htmlspecialchars(strip_tags($data->prenom));
    // $data->email = htmlspecialchars(strip_tags($data->email));
    $data->ville_id = htmlspecialchars(strip_tags($data->ville_id));
    $data->tel = htmlspecialchars(strip_tags($data->tel));
    $data->date_naissance = htmlspecialchars(strip_tags($data->date_naissance));
    $data->adresse = htmlspecialchars(strip_tags($data->adresse));
    if (isset($data->imgUrl)) {
      $imgUrl = htmlspecialchars(strip_tags($data->imgUrl));
    }
    $data->sexe = htmlspecialchars(strip_tags($data->sexe));
    $age = $this->getAge($data->date_naissance);
    $data->password = htmlspecialchars(strip_tags($data->password));
    // get random string && hash idClient(ref)
    $data->password = password_hash($data->password, PASSWORD_DEFAULT);

    json_encode(
      array(
        $data

      )
    );
    if (!$this->read_single($data->email)) {

      $sql = "INSERT INTO `avocat` ( `nom`, `prenom`, `email`, `date_naissance`, `age`, `ville`, `password`, `adresse`, `imgUrl`, `Tel`, `sexe`,statut)
       VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,'non validé') ";
      $result = $this->conn->prepare($sql);

      $result->execute([
        $data->nom,
        $data->prenom,
        $data->email,
        $data->date_naissance,
        $age,
        $data->ville_id,
        $data->password,
        $data->adresse,
        $imgUrl,
        $data->tel,
        $data->sexe

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
  // login avocat
  public function login($data)
  {
    // clean data

    $data->email = htmlspecialchars(strip_tags($data->email));
    $data->password = htmlspecialchars(strip_tags($data->password));
    $pass_hash = "";
    $test = $this->read_single($data->email);

    if ($test) {

      if (password_verify($data->password, $test['password'])) {
        if ($test["statut"] == "activé") {


          return json_encode(
            array(
              'message' => 'success',
              'avocat' => $test,
            )
          );
        }
        return json_encode(
          array(
            'message' => 'ce compte pas encore activé',

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
  public function readAvocat()
  {
    $sql = "SELECT c.id ,c.nom , c.prenom ,c.tel ,c.email, c.statut , v.nom as ville  FROM `avocat` c join ville v on c.ville=v.id";
    $result = $this->conn->prepare($sql);

    if ($result->execute()) {
      return json_encode($result->fetchAll(PDO::FETCH_ASSOC));
    } else return false;
  }

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
    // $data->idAvocat = htmlspecialchars(strip_tags($data->idAvocat));
    // $data->idVille = htmlspecialchars(strip_tags($data->idVille));
    // $data->idCategorie = htmlspecialchars(strip_tags($data->idCategorie));

    $sql = "select  a.serviceConsultation , a.serviceDocument , a.serviceRdv , a.id,a.nom,a.email,a.prenom,a.age,a.adresse,a.date_naissance,a.imgUrl,v.nom as ville from avocat a join ville v on a.ville =v.id " . $sqlav;
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
          array_push($cat, $categorie);
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


  //update profile client 
  public function updateInfo($data)
  {
    // $imgUrl = null;
    // clean data
    $data->id = htmlspecialchars(strip_tags($data->id));
    $data->nom = htmlspecialchars(strip_tags($data->nom));
    $data->prenom = htmlspecialchars(strip_tags($data->prenom));
    $data->email = htmlspecialchars(strip_tags($data->email));
    $data->ville = htmlspecialchars(strip_tags($data->ville));
    $data->Tel = htmlspecialchars(strip_tags($data->Tel));
    $data->adresse = htmlspecialchars(strip_tags($data->adresse));
    $data->sexe = htmlspecialchars(strip_tags($data->sexe));

    $data->date_naissance = htmlspecialchars(strip_tags($data->date_naissance));
    $age = $this->getAge($data->date_naissance);
    // $imgUrl = htmlspecialchars(strip_tags($data->imgUrl));
    // $data->password = htmlspecialchars(strip_tags($data->password));
    // get random string && hash idClient(ref)
    // $data->password = password_hash($data->password, PASSWORD_DEFAULT);
    // 
    // if (!$this->read_single($data->email)) {

    $sql = "UPDATE `avocat` SET `nom` = :nom, `prenom` = :prenom, `email` = :email, `date_naissance` = :date_naissance, `age` = :age, `ville` = :ville, `adresse` = :adresse, `Tel` = :tel, `sexe` = :sexe  WHERE `avocat`.`id` = :id    ";
    $result = $this->conn->prepare($sql);
    $result->execute([
      ':email' => $data->email,
      ':nom' => $data->nom,
      ':prenom' => $data->prenom,
      ':ville' => $data->ville,
      ':tel' => $data->Tel,
      ':date_naissance' => $data->date_naissance,
      ':age' => $age,
      ':adresse' => $data->adresse,
      ':sexe' => $data->sexe,
      ':id' => $data->id
    ]);
    // return json_encode(
    //   array(

    //     $result
    //   )
    // );
    if ($result) {

      return json_encode(
        array(
          'message' => 'success',
          'avocat' => $this->readById($data->id)
        )
      );
      return false;
      //   }
      // } else {
      //   return json_encode(
      //     array(
      //       'message' => 'email deja utilisé',

      //     )
      // );
    }
  }
  //update password client 
  public function updatePass($data)
  {
    // clean data

    $data->id = htmlspecialchars(strip_tags($data->id));
    // test old password
    if (password_verify($data->oldPass, $this->readById($data->id)["password"])) {
      $data->newPass = htmlspecialchars(strip_tags($data->newPass));
      $data->newPass = password_hash($data->newPass, PASSWORD_DEFAULT);
      $sql = "UPDATE avocat SET  password=:password WHERE id = :id ";

      $result = $this->conn->prepare($sql);
      $result->execute([
        ':password' => $data->newPass,
        ':id' => $data->id,
      ]);
      if ($result) {
        echo json_encode(
          array(
            'result' => 'success', 'message' => " le mot de passe  est Bien Modifier", 'client' => $this->readById($data->id)
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
  }
  public function  chageEtatRdv($data)

  {
    $sql = "UPDATE `avocat` SET `serviceRdv` = ? WHERE `avocat`.`id` = ?";
    $result = $this->conn->prepare($sql);

    if ($result->execute([$data->value, $data->id])) {
      return json_encode(
        array(
          'message' => 'success',
          'avocat' => $this->readById($data->id)
        )
      );
    }
    return json_encode(
      array(
        'message' => 'failed',
      )
    );
  }
  public function  chageEtatConsultation($data)

  {
    $sql = "UPDATE `avocat` SET `serviceConsultation` = ? WHERE `avocat`.`id` = ?";
    $result = $this->conn->prepare($sql);

    if ($result->execute([$data->value, $data->id])) {
      return json_encode(
        array(
          'message' => 'success',
          'avocat' => $this->readById($data->id)
        )
      );
    }
    return json_encode(
      array(
        'message' => 'failed',
      )
    );
  }
  public function  changeEtatDocument($data)

  {
    $sql = "UPDATE `avocat` SET `serviceDocument` = ? WHERE `avocat`.`id` = ?";
    $result = $this->conn->prepare($sql);

    if ($result->execute([$data->value, $data->id])) {
      return json_encode(
        array(
          'message' => 'success',
          'avocat' => $this->readById($data->id)
        )
      );
    }
    return json_encode(
      array(
        'message' => 'failed',
      )
    );
  }
  // get consultation type for avocat
  public function addConsultation($data)
  {

    $sql = "INSERT INTO `consultation` (`id_avocat`, `type`, `prix`) VALUES (:id_avocat, :ecrite, :prixEcrite), 
    ( :id_avocat, :telephonique, :prixTel) ";
    $result = $this->conn->prepare($sql);

    return json_encode($result->execute([
      ':id_avocat' => $data->idAvocat,
      ':prixEcrite' => $data->prixEcrite,
      ':telephonique' => "telephonique",
      ':ecrite' => "ecrite",
      ':prixTel' => $data->prixTel

    ]));
  }
  // add reponse
  public function addReponse($data)
  {
    date_default_timezone_set('Africa/casablanca');

    $dateToday = date("Y-m-d");
    $heureNow = date("H:i:s");

    $sql = "INSERT INTO `reponse` (`reponse`, `id_consultation`, `date_reponse`, `heure_reponse`) VALUES ( :reponse, :id_consultation, :date_reponse, :heure_reponse)";
    $result = $this->conn->prepare($sql);

    return json_encode($result->execute([
      ':reponse' => $data->reponse,
      ':id_consultation' => $data->id_consultation,
      ':date_reponse' => $dateToday,
      ':heure_reponse' => $heureNow,

    ]));
  }
  // add consultation for avocat
  public function getTypeConsultation($id)
  {

    $sql = "SELECT * FROM `consultation` WHERE `id_avocat` = ?  ";
    $result = $this->conn->prepare($sql);

    if ($result->execute([$id])) {
      return json_encode(
        array(
          'message' => 'success',
          'avocat' => $result->fetchALL(PDO::FETCH_ASSOC)
        )
      );
    }
    return json_encode(
      array(
        'message' => 'failed',
      )
    );
  }
  public function delete($id)
  {
    //  clean data

    // $data->id_client = htmlspecialchars(strip_tags($data->id_client));

    $sql = "DELETE FROM `avocat` WHERE `avocat`.`id` =  ?";
    $result = $this->conn->prepare($sql);
    // Bind data
    return json_encode($result->execute([
      $id
    ]));
  }
  public function changeStatut($id)
  {
    //  clean data

    // $data->id_client = htmlspecialchars(strip_tags($data->id_client));
    $test = $this->readById($id)["statut"];
    // echo json_encode($test);

    if ($test=='activé') {
      $test = "non activé";
    } else {
      $test = "activé";
    }
      // echo json_encode($test);
    $sql = "UPDATE `avocat` SET `statut` = ? WHERE `avocat`.`id` = ?    ";
    $result = $this->conn->prepare($sql);
    // Bind data
    return json_encode($result->execute([
      $test,
      $id
    ]));
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
