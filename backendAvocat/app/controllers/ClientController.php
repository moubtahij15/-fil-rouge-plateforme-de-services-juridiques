<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class ClientController
{


      public  function index()
      {



            echo "heelooo";
      }
      // register client
      public function register()
      {


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                  $client = new Client();
                  //get client data
                  $data = json_decode(file_get_contents("php://input"));
                  // create client
                  echo $client->register($data);
            } else  echo json_encode(
                  array('message' => 'change method to Post')
            );
      }

      //login client
      public function login()
      {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $client = new Client();
                  //get client data
                  $data = json_decode(file_get_contents("php://input"));

                  echo $client->login($data);
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

      //update user info
      public function updateInfo()
      {


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                  $client = new Client();
                  //get client data
                  $data = json_decode(file_get_contents("php://input"));
                  // create client
                  echo json_encode(
                        array(
                              'message' => 'bien modifié', 'client' => $client->updateInfo($data)
                        )
                  );
            } else  echo json_encode(
                  array('message' => 'change method to PUT')
            );
      }
      public function read()
      {


            if ($_SERVER["REQUEST_METHOD"] == "GET") {

                  $client = new Client();
                  //get client data
                  $data = (file_get_contents("php://input"));
                  // create client
                  echo $client->read();
            } else  echo json_encode(
                  array('message' => 'change method to GET')
            );
      }
      //update user pass
      public function updatePass()
      {


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                  $client = new Client();
                  //get client data
                  $data = json_decode(file_get_contents("php://input"));
                  // create client
                  return $client->updatePass($data);
            } else  echo json_encode(
                  array('message' => 'change method to PUT')
            );
      }
      
      public function delete($id)
      {


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                  $client = new Client();
                  //get client data
                  // create client
                  return $client->delete($id);
            } else  echo json_encode(
                  array('message' => 'change method to PUT')
            );
      }
}
