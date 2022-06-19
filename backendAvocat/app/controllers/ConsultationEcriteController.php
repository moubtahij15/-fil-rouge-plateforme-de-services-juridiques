<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class ConsultationEcriteController
{


  public  function index()
  {



    echo "heelooo";
  }

  // reads rdv for single client
  public function readPrixConsultaion()
  {

    $data = json_decode(file_get_contents("php://input"));




    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $Consultation = new ConsultationEcrite();

      // Blog post query
      $result = $Consultation->readPrixConsultaion($data);

      // Turn to JSON & output
      if ($result) {
        echo json_encode($result);
      } else {
        echo json_encode(
          array('message' => ' aucun Rdv pour ce client')
        );
      }
    } else  echo json_encode(
      array('message' => 'change method to POST')
    );
  }





  // create RDV
  public function create()
  {


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = json_decode(file_get_contents("php://input"));

      //check if paid or not
      $stripe = new StripeController();

      if ($stripe->checkSession($data->idSession)) {

        // add consultation
        $consultationEcrite = new ConsultationEcrite();
        if ($consultationEcrite->create($data)) {

          echo json_encode(
            array('message1' => 'Consultation Created')
          );

          // get id consultation
          $consultation = $consultationEcrite->readLastConsulation()['id_consultation'];

          // echo json_encode(
          //   array('message' => $consultation)
          // );
          // add facture
          $facture = new Facture();
          if ($facture->create($data, $consultation)) {

            // echo json_encode(
            //   array('message' => 'facture Created')
            // );
          }
        }
      } else
        echo (json_encode("cette consultation n'est pas payé"));
    } else  echo json_encode(
      array('message' => 'change method to Post')
    );
  }
  // readAllconultationsEcrite for clients

  public function readAllconultationsEcrite($id)
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $Consultation = new ConsultationEcrite();

      // Blog post query
      $result = $Consultation->readAllconultationsEcrite($id);

      // Turn to JSON & output
      if ($result) {
        echo json_encode($result);
      } else {
        echo json_encode(
          array('message' => ' aucun Rdv pour ce client')
        );
      }
    } else  echo json_encode(
      array('message' => 'change method to POST')
    );
  }
  // readAllconultationsEcrite for avocat

  public function readAllconultationsEcriteAvocat($id)
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $Consultation = new ConsultationEcrite();

      // Blog post query
      $result = $Consultation->readAllconultationsEcriteAvocat($id);

      // Turn to JSON & output
      if ($result) {
        echo json_encode($result);
      } else {
        echo json_encode(
          array('message' => ' aucun consulatation pour ce Avocat')
        );
      }
    } else  echo json_encode(
      array('message' => 'change method to POST')
    );
  }

  public function update()
  {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $RDV = new RDV();

      //get RDV data
      $data = json_decode(file_get_contents("php://input"));
      // create RDV
      if ($RDV->update($data)) {

        echo json_encode(
          array('message' => 'updated')
        );
      } else {
        echo json_encode(
          array('message' => 'RDV Not updated check your id')
        );
      }
    } else echo json_encode(
      array('message' => 'change method to PUT')
    );
  }

  // delete RDV

  public function delete()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $RDV = new RDV();

      $data = json_decode(file_get_contents("php://input"));
      return $RDV->delete($data);
    } else echo json_encode(
      array('message' => 'change method to DELETE')
    );
  }
}
