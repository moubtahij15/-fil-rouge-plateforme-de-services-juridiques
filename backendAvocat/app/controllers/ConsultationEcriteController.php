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
  public function read()
  {

    $data = json_decode(file_get_contents("php://input"));




    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $RDV = new RDV();

      // Blog post query
      $result = $RDV->read($data->reff);

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
            array('message' => 'Consultation Created')
          );

          // get id consultation
          $consultation = $consultationEcrite->readLastConsulation()['id'];

          echo json_encode(
            array('message' => $consultation)
          );
          // add facture
          $facture = new Facture();
          if ($facture->create($data,$consultation)) {

            echo json_encode(
              array('message' => 'facture Created')
            );
          }
        } else        echo (json_encode("cette consultation n'est pas payé"));




        // $consultationEcrite = new ConsultationEcrite();
        //get posted data


        //  print_r(json_encode($data)) ;
        // create rdv
        //   if ($consultationEcrite->create($data)) {

        //     echo json_encode(
        //       array('message' => 'Created')
        //     );
        //   } else {
        //     echo json_encode(
        //       array('message' => 'RDV Not Created')
        //     );
      }
    } else  echo json_encode(
      array('message' => 'change method to Post')
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
