<?php



class ConsultationTel extends DataBase
{
    private $conn;

    public function __construct()
    {

        $this->conn = $this->connect();
    }




    // read last consultation Ecrite
    public function  readLastConsulation()
    {


        $sql = 'SELECT * FROM `consultation_tele` ORDER BY `consultation_tele`.`id` DESC';

        $result = $this->conn->prepare($sql);
        // $id_client=md5($id_client);
        if ($result->execute()) {

            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }


    public function  readAllconultationsTele($id)
    {
        date_default_timezone_set('Africa/casablanca');


        $dateToday = date("Y-m-d");
        $heureNow = date("H:i:s");
        $result3 = [];
        $sql = 'SELECT ct.id,ct.sujet,ct.date_creneau,c.heure_debut ,a.nom ,a.prenom  , co.prix , co.type FROM `consultation_tele` ct join creneau c on c.id=ct.id_creneau join avocat a on a.id=ct.id_avocat JOIN consultation co on co.id=ct.id_consultation WHERE ct.id_client=?';
        $result = $this->conn->prepare($sql);
        // $id_client=md5($id_client);
        if ($result->execute([$id])) {

            $result = $result->fetchALL(PDO::FETCH_ASSOC);



            foreach ($result as $response) {

                $categorie = "";
                if ($response['date_creneau'] > $dateToday) {
                    array_push($response, ["etat" => "en attente"]);
                } elseif ($response['date_creneau'] < $dateToday) {

                    array_push($response, ["etat" => "terminé"]);
                } elseif ($response['date_creneau'] == $dateToday) {
                    if ($response['heure_debut'] > $heureNow) {
                        array_push($response, ["etat" => "en attente"]);
                    } else {
                        array_push($response, ["etat" => "terminé"]);
                    }
                }

                array_push($result3, $response);
            }
            return ($result3);
        } else {
            return false;
        }
    }

    // read all consultation tele
    public function  readAllconultationsTeleAvocat($id)
    {
        date_default_timezone_set('Africa/casablanca');


        $dateToday = date("Y-m-d");
        $heureNow = date("H:i:s");
        $result3 = [];
        $sql = 'SELECT ct.id,ct.sujet,ct.date_creneau,c.heure_debut ,a.nom ,a.prenom  , co.prix , co.type FROM `consultation_tele` ct join creneau c on c.id=ct.id_creneau join avocat a on a.id=ct.id_avocat JOIN consultation co on co.id=ct.id_consultation  join client cl on cl.id=ct.id_client   WHERE a.id = ?';
        $result = $this->conn->prepare($sql);
        // $id_client=md5($id_client);
        if ($result->execute([$id])) {

            $result = $result->fetchALL(PDO::FETCH_ASSOC);



            foreach ($result as $response) {

                $categorie = "";
                if ($response['date_creneau'] > $dateToday) {
                    array_push($response, ["etat" => "en attente"]);
                } elseif ($response['date_creneau'] < $dateToday) {

                    array_push($response, ["etat" => "terminé"]);
                } elseif ($response['date_creneau'] == $dateToday) {
                    if ($response['heure_debut'] > $heureNow) {
                        array_push($response, ["etat" => "en attente"]);
                    } else {
                        array_push($response, ["etat" => "terminé"]);
                    }
                }

                array_push($result3, $response);
            }
            return ($result3);
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
    // create RDV
    public function create($data)
    {
        //create instance client and creneau
        $client = new Client();
        $creneau = new Creneau();
        // check existance foreign key
        if (($client->read_singleById($data->id_client)) && ($creneau->read_single($data->id_creneau))) {
            //  clean data

            $data->sujet = htmlspecialchars(strip_tags($data->sujet));
            $data->date_creneau = htmlspecialchars(strip_tags($data->date_creneau));
            $data->id_consultation = htmlspecialchars(strip_tags($data->id_consultation));

            $sql = " INSERT INTO `consultation_tele` (`sujet`, `date_creneau`, `id_client`, `id_creneau`, `id_avocat`, `id_consultation`) VALUES ( :sujet,:date_creneau,:id_client,:id_creneau,:id_avocat,:id_consultation)";
            $result = $this->conn->prepare($sql);
            // Bind data
            return  $result->execute([
                ':sujet' => $data->sujet,
                ':date_creneau' => $data->date_creneau,
                ':id_client' => $data->id_client,
                ':id_creneau' => $data->id_creneau,
                ':id_avocat' => $data->id_avocat,
                ':id_consultation' => $data->id_consultation
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
