<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class adminController
{


      public  function index()
      {

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                  $avocat = new Avocat();


                  echo $avocat->read();
            } else  echo json_encode(
                  array('message' => 'change method to Get')
            );
      }

      // register avocat

      public function register()
      {


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                  $admin = new admin();
                  //get client data
                  $data = json_decode(file_get_contents("php://input"));
                  // create client
                  echo $admin->register($data);
            } else  echo json_encode(
                  array('message' => 'change method to POST')
            );
      }

      // update avocat
      // public function register()
      // {


      //       if ($_SERVER["REQUEST_METHOD"] == "POST") {

      //             $avocat = new Avocat();
      //             //get client data
      //             $data = json_decode(file_get_contents("php://input"));
      //             // create client
      //             echo $avocat->register($data);
      //       } else  echo json_encode(
      //             array('message' => 'change method to POST')
      //       );
      // }
      //  client
      public function updateInfo()
      {


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                  $avocat = new Avocat();
                  //get client data
                  $data = json_decode(file_get_contents("php://input"));
                  // create client
                  echo $avocat->updateInfo($data);
            } else  echo json_encode(
                  array('message' => 'change method to POST')
            );
      }
      //update user pass
      public function updatePass()
      {


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                  $avocat = new Avocat();
                  //get client data
                  $data = json_decode(file_get_contents("php://input"));
                  // create client
                  echo $avocat->updatePass($data);
            } else  echo json_encode(
                  array('message' => 'change method to PUT')
            );
      }
      //login client
      public function login()
      {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $admin = new admin();                  //get client data
                  $data = json_decode(file_get_contents("php://input"));

                  echo $admin->login($data);
            } else  echo json_encode(
                  array('message' => 'change method to Post')
            );
      }
      // change etat rdv
      public function chageEtatRdv()
      {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $avocat = new Avocat();                  //get client data
                  $data = json_decode(file_get_contents("php://input"));

                  echo $avocat->chageEtatRdv($data);
            } else  echo json_encode(
                  array('message' => 'change method to Post')
            );
      }
      //  add consultation
      public function addConsultation()
      {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $avocat = new Avocat();                  //get client data
                  $data = json_decode(file_get_contents("php://input"));

                  echo $avocat->addConsultation($data);
            } else  echo json_encode(
                  array('message' => 'change method to Post')
            );
      }

      //  add consultation
      public function addReponse()
      {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $avocat = new Avocat();                  //get client data
                  $data = json_decode(file_get_contents("php://input"));

                  echo $avocat->addReponse($data);
            } else  echo json_encode(
                  array('message' => 'change method to Post')
            );
      }

      // check type consultation
      public function getTypeConsultation($id)
      {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $avocat = new Avocat();                  //get client data
                  // $data = json_decode(file_get_contents("php://input"));

                  echo $avocat->getTypeConsultation($id);
            } else  echo json_encode(
                  array('message' => 'change method to Post')
            );
      }
      // change etat consultation
      public function changeEtatConsultation()
      {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $avocat = new Avocat();                  //get client data
                  $data = json_decode(file_get_contents("php://input"));

                  echo $avocat->chageEtatConsultation($data);
            } else  echo json_encode(
                  array('message' => 'change method to Post')
            );
      }
       // change etat consultation
       public function changeEtatDocument()
       {
 
             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                   $avocat = new Avocat();                  //get client data
                   $data = json_decode(file_get_contents("php://input"));
 
                   echo $avocat->changeEtatDocument($data);
             } else  echo json_encode(
                   array('message' => 'change method to Post')
             );
       }
      // change etat rdv
      public function rdvAvocat($id)
      {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $rdv = new RDV();                  //get client data
                  // $data = json_decode(file_get_contents("php://input"));

                  echo $rdv->readAvocat($id);
            } else  echo json_encode(
                  array('message' => 'change method to Post')
            );
      }


      //ville
      public function villes()
      {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                  $client = new Client();


                  echo $client->getVilles();
            } else  echo json_encode(
                  array('message' => 'change method to Get')
            );
      }
}
