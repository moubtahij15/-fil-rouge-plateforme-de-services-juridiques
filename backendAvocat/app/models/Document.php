<?php



class Document extends DataBase
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

    public function  read($id)
    {


        $sql = 'SELECT * FROM `document` d join avocat a on a.id =d.id_avocat  where  d.id = ? ';

        $result = $this->conn->prepare($sql);
        // $id_client=md5($id_client);
        if ($result->execute([$id])) {

            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }



    // reads rdv for single client
    public function  readByAvocat($id)
    {


        $sql = 'SELECT * FROM `document` d join avocat a on a.id =d.id_avocat  where  id_avocat = ? ';

        $result = $this->conn->prepare($sql);
        // $id_client=md5($id_client);
        if ($result->execute([$id])) {

            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }


    public function  readByClient($id)
    {


        $sql = 'SELECT a.nom , pd.date,a.prenom,a.id,d.lien_document, d.prix ,d.nom_document FROM `prendre_document` pd join document d on pd.id_document=d.id join avocat a on a.id=d.id_avocat where pd.id_client= ? ';

        $result = $this->conn->prepare($sql);
        // $id_client=md5($id_client);
        if ($result->execute([$id])) {

            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    // Get Single Post
    // public function read_single($id_produit) {

    //    $sql	="SELECT * FROM `produit` WHERE id = ? ";
    //    $result=$this->conn->prepare($sql);
    //   if($result->execute([$id_produit])){

    //     return $result->fetch(PDO::FETCH_ASSOC);

    //   } else{ return false;}


    // }
    // create document
    public function create($data)
    {
        //  clean data
        date_default_timezone_set('Africa/casablanca');

        $dateToday = date("Y-m-d");
        $heureNow = date("H:i:s");

        // $id_document = htmlspecialchars(strip_tags($data->id_document));
        // $data->id_client = htmlspecialchars(strip_tags($data->id_client));

        $sql = "INSERT INTO `prendre_document` (`id_client`, `id_document`,date) VALUES ( :id_client ,  :id_document,:date )  ";
        $result = $this->conn->prepare($sql);
        // Bind data
        return  $result->execute([
            ':id_client' => $data->id_client,
            ':id_document' => $data->id_document,
            ':id_document' => $dateToday

        ]);
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
                            'message' =>  " Bien supprimé",
                            'def' =>  $sec,
                        )
                    );
                }
            } else {
                echo json_encode(
                    array(
                        'status' => "echec",
                        'message' =>  " impossible d'annuler car tu as dépassé limite 1 h avant le rendez-vous",
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
                        'message' =>  " Bien supprimé",
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
