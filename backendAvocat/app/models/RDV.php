<?php



class RDV extends DataBase
{
  private $conn;

  public function __construct()
  {

    $this->conn = $this->connect();
  }



  // get sing RDV

  public function read_single($id_RDV)
  {
    $sql = "select * from rdv where id_RDV = ?";
    $result = $this->conn->prepare($sql);

    if ($result->execute([$id_RDV])) {
      return $result->fetch(PDO::FETCH_ASSOC);
    } else return false;
  }



  // reads rdv for single client
  public function  read($id_client)
  {


    $sql = 'SELECT  r.id, r.sjt_RDV ,r.date_creneau,  c.heure_debut , a.nom , a.prenom , a.id as id_avocat ,c.id as id_creneau FROM rdv r join creneau c on r.id_creneau =c.id  join avocat a on  a.id=r.id_avocat 
        where  id_client = ? ';

    $result = $this->conn->prepare($sql);
    // $id_client=md5($id_client);
    if ($result->execute([$id_client])) {

      return $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }
  }
  // reads rdv for single avocat
  public function  readAvocat($id_avocat)
  {


    $sql = 'SELECT r.id, r.sjt_RDV ,r.date_creneau, c.heure_debut , cl.nom , cl.prenom ,cl.email,cl.tel, a.id as id_avocat ,c.id as id_creneau FROM rdv r join creneau c on r.id_creneau =c.id join avocat a on a.id=r.id_avocat JOIN client cl on cl.id=r.id_client where a.id = ?
    ORDER BY r.date_creneau DESC';

    $result = $this->conn->prepare($sql);
    // $id_client=md5($id_client);
    if ($result->execute([$id_avocat])) {
      return json_encode(
        array(
          'message' => 'success',
          'rdv' => $result->fetchAll(PDO::FETCH_ASSOC)
        )
      );
    }

    return json_encode(
      array(
        'message' => 'failed'

      )
    );
  }

  // Get Single Post
  // public function read_single($id_produit) {

  //    $sql	="SELECT * FROM `produit` WHERE id = ? ";
  //    $result=$this->conn->prepare($sql);
  //   if($result->execute([$id_produit])){

  //     return $result->fetch(PDO::FETCH_ASSOC);

  //   } else{ return false;}


  // }
  // create RDV
  public function create($data)
  {
    //create instance client and creneau
    $client = new Client();
    $creneau = new Creneau();
    // check existance foreign key
    if (($client->read_singleById($data->id_client)) && ($creneau->read_single($data->id_creneau))) {
      //  clean data
      $data->sjt_RDV = htmlspecialchars(strip_tags($data->sjt_RDV));
      $data->date_creneau = htmlspecialchars(strip_tags($data->date_creneau));
      $sql = " INSERT INTO `rdv` (`sjt_RDV`, `date_creneau`, `id_client`, `id_creneau`, `id_avocat`) VALUES ( :sjt_RDV,:date_creneau,:id_client,:id_creneau,:id_avocat)";
      $result = $this->conn->prepare($sql);
      // Bind data
      return  $result->execute([
        ':sjt_RDV' => $data->sjt_RDV,
        ':date_creneau' => $data->date_creneau,
        ':id_client' => $data->id_client,
        ':id_creneau' => $data->id_creneau,
        ':id_avocat' => $data->id_avocat
      ]);
    } else {
      echo "echec";
    }
  }

  // update RDV
  public function update($data)
  {
    //create instance client and creneau
    $client = new Client();
    $creneau = new Creneau();
    // check existance foreign keys && primaryKey 

    $sql = "update rdv set sjt_RDV = :sjt_RDV , date_creneau= :date_creneau ,id_client = :id_client, id_creneau = :id_creneau , id_avocat=:id_avocat where id=:id";
    $result = $this->conn->prepare($sql);
    //  clean data
    $data->sjt_RDV = htmlspecialchars(strip_tags($data->sjt_RDV));
    $data->date_creneau = htmlspecialchars(strip_tags($data->date_creneau));
    // Bind data 
    return  $result->execute([
      ':sjt_RDV' => $data->sjt_RDV,
      ':date_creneau' => $data->date_creneau,
      ':id_client' => $data->id_client,
      ':id_creneau' => $data->id_creneau,
      ':id_avocat' => $data->id_avocat,
      ':id' => $data->id_RDV
    ]);
  }
  // change eatat rdv


  // delete RDV
  public function delete($data)
  {

    // check heure

    date_default_timezone_set('Africa/casablanca');


    $dateToday = date("Y-m-d");
    $heureNow = date("H:i:s");
    $dateTimeObject1 = date_create($data->heure_debut);
    $dateTimeObject2 = date_create($heureNow);
    $difference = date_diff($dateTimeObject2, $dateTimeObject1);
    $sec = $difference->h * 3600;
    $sec += $difference->i * 60;
    $sec += $difference->s;


    if ($data->date_creneau == $dateToday) {

      if ($sec > 3600) {
        $sql = "delete from rdv where id = :id_RDV";
        $result = $this->conn->prepare($sql);
        //  clean data
        $id_RDV = htmlspecialchars(strip_tags($data->id_rdv));
        if ($result->execute([':id_RDV' => $id_RDV])) {
          echo json_encode(
            array(
              'status' => "success",
              'message' =>  " Bien supprim??",
              'def' =>  $sec,
            )
          );
        }
      } else {
        echo json_encode(
          array(
            'status' => "echec",
            'message' =>  " impossible d'annuler car tu as d??pass?? limite 1 h avant le rendez-vous",
            'def' =>  $sec,
          )
        );
      }
    } elseif ($data->date_creneau > $dateToday) {
      $sql = "delete from rdv where id = :id_RDV";
      $result = $this->conn->prepare($sql);
      //  clean data
      $id_RDV = htmlspecialchars(strip_tags($data->id_rdv));
      if ($result->execute([':id_RDV' => $id_RDV])) {
        echo json_encode(
          array(
            'status' => "success",
            'message' =>  " Bien supprim??",
            // 'def' =>  $sec,
          )
        );
      }
    } else {
      echo json_encode(
        array(
          'status' => "echec",
          'message' =>  " impossible d'annuler car ce rendez-vous est ancien",
          'def' =>  $sec,
        )
      );
    }
  }
}
