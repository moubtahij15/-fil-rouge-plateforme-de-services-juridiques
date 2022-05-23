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
                  $register = $client->register($data);
                  if ($register) {

                        echo json_encode(
                              array('message' =>  $register)
                        );
                  } else {
                        echo json_encode(
                              array('message' => 'client Not Created')
                        );
                  }
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
               
                  $result = $client->login($data);

                  if ($result) {

                        echo json_encode(
                              array('message' => 'success',
                              $result)
                        );
                  } else  echo json_encode(
                        array('message' => 'failed')
                  );
            } else  echo json_encode(
                  array('message' => 'change method to Post')
            );
      }
}
