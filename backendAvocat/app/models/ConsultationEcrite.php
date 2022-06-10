<?php



class ConsultationEcrite extends DataBase
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
            //  clean data

            $data->sujet = htmlspecialchars(strip_tags($data->sujet));
            $data->id_avocat = htmlspecialchars(strip_tags($data->id_avocat));
            $data->id_client = htmlspecialchars(strip_tags($data->id_client));
            $data->prix = htmlspecialchars(strip_tags($data->prix));
            $data->date = htmlspecialchars(strip_tags($data->date));
            $data->heure = htmlspecialchars(strip_tags($data->heure));
            $sql = " INSERT INTO `consultation_ecrite` ( `sujet`, `id_avocat`, `id_client`, `prix`, `date`, `heure`) VALUES (:sujet, :id_avocat, :id_client, :prix, :date,:heure) ";
            $result = $this->conn->prepare($sql);
            // Bind data
            return  $result->execute([
                ':sujet' => $data->sujet,
                ':id_avocat' => $data->id_avocat,
                ':id_client' => $data->id_client,
                ':prix' => $data->prix,
                ':date' => $data->date,
                ':heure' => $data->heure
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
