<?php



class ConsultationEcrite extends DataBase
{
    private $conn;

    public function __construct()
    {

        $this->conn = $this->connect();
    }



    // get sing RDV

    public function readPrixConsultaion($data)
    {
        $sql = "select * from consultation where id_avocat = ? and type = ?";
        $result = $this->conn->prepare($sql);

        if ($result->execute([$data->id, $data->type])) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else return false;
    }
    // read consutation by id
    public function readConsultaion($id)
    {
        $sql = "select * from consultation where id = ? ";
        $result = $this->conn->prepare($sql);

        if ($result->execute([$id])) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else return false;
    }



    // read last consultation Ecrite
    public function  readLastConsulation()
    {


        $sql = 'SELECT * FROM `consultation_ecrite` ORDER BY `consultation_ecrite`.`id` DESC';

        $result = $this->conn->prepare($sql);
        // $id_client=md5($id_client);
        if ($result->execute()) {

            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    // read all consultations By client

    public function  readAllconultationsEcrite($id)
    {

        $result3 = [];
        $sql = 'SELECT a.nom,a.prenom ,ce.sujet,ce.id ,ce.date ,ce.heure,c.type,c.prix FROM `consultation_ecrite` ce join avocat a on a.id=ce.id_avocat LEFT join consultation c on c.id=ce.id_consultation where ce.id_client=?';
        $sql1 = "SELECT * FROM `reponse` WHERE  `reponse`.`id_consultation` = ? ";
        $result = $this->conn->prepare($sql);
        // $id_client=md5($id_client);
        if ($result->execute([$id])) {

            $result = $result->fetchALL(PDO::FETCH_ASSOC);



            foreach ($result as $response) {
                $result1 = $this->conn->prepare($sql1);

                $categorie = "";
                if ($result1->execute([$response['id']])) {
                    $result1 = $result1->fetchALL(PDO::FETCH_ASSOC);
                    // echo json_encode($result1);
                    if (count($result1) == 0) {

                        array_push($response, ["etat"=>"non repondu"]);
                    } else{
                        array_push($response, ["etat"=>" repondu"]);

                    }
                    array_push($response, $result1);
                    array_push($result3, $response);
                }
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
        date_default_timezone_set('Africa/casablanca');

        $dateToday = date("Y-m-d");
        $heureNow = date("H:i:s");

        //  clean data

        $data->sujet = htmlspecialchars(strip_tags($data->sujet));
        $data->id_avocat = htmlspecialchars(strip_tags($data->id_avocat));
        $data->id_client = htmlspecialchars(strip_tags($data->id_client));
        $data->id_consultation = htmlspecialchars(strip_tags($data->id_consultation));

        $sql = " INSERT INTO `consultation_ecrite` ( `sujet`, `id_avocat`, `id_client`, `date`, `heure`,id_consultation) VALUES (:sujet, :id_avocat, :id_client , :date,:heure,:id_consultation) ";
        $result = $this->conn->prepare($sql);
        // Bind data
        return  $result->execute([
            ':sujet' => $data->sujet,
            ':id_avocat' => $data->id_avocat,
            ':id_client' => $data->id_client,
            ':date' => $dateToday,
            ':heure' => $heureNow,
            ':id_consultation' => $data->id_consultation
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
