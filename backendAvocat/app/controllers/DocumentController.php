<?php
// require_once('../../vendor/autoload.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// require_once('/path/to/stripe-php/init.php');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
// require '../init.php';
// require_once('../../stripe-php-8.6.0/init.php');

require_once('vendor/autoload.php');


class DocumentController

{
    public function readByAvocat($id)
    {
        // $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $document = new Document();

            // Blog post query
            $document = $document->readByAvocat($id);

            // Turn to JSON & output
            if ($document) {
                echo json_encode($document);
            } else {
                echo json_encode(
                    array('message' => ' aucun document pour ce avocat')
                );
            }
        } else  echo json_encode(
            array('message' => 'change method to POST')
        );
    }
    public function readByclients($id)
    {
        // $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $document = new Document();

            // Blog post query
            $document = $document->readByClients($id);

            // Turn to JSON & output
            if ($document) {
                echo json_encode($document);
            } else {
                echo json_encode(
                    array('message' => ' aucun document pour ce avocat')
                );
            }
        } else  echo json_encode(
            array('message' => 'change method to POST')
        );
    }
    public function readByClient($id)
    {
        // $data = json_decode(file_get_contents("php://input"));

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $document = new Document();

            // Blog post query
            $document = $document->readByClient($id);

            // Turn to JSON & output
            if ($document) {
                echo json_encode($document);
            } else {
                echo json_encode(
                    array('message' => ' aucun document pour ce Client')
                );
            }
        } else  echo json_encode(
            array('message' => 'change method to POST')
        );
    }
    public function create()
    {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = json_decode(file_get_contents("php://input"));

            //check if paid or not
            $stripe = new StripeController();

            if ($stripe->checkSession($data->idSession)) {

                // add consultation
                $document = new Document();
                if ($document->create($data)) {

                    echo json_encode(
                        array('message' => 'success')
                    );
                }
            } else
                echo (json_encode("cette consultation n'est pas payé"));
        } else  echo json_encode(
            array('message' => 'change method to Post')
        );
    }


    // crud document
    public function getAlldocument($id)
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $document = new Document();                  //get client data
            $data = json_decode(file_get_contents("php://input"));

            echo $document->getAlldocument($id);
        } else  echo json_encode(
            array('message' => 'change method to Post')
        );
    }

    public function createDocument()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $document = new Document();
            //get client data
            $data = json_decode(file_get_contents("php://input"));

            echo $document->createDocument($data);
        } else  echo json_encode(
            array('message' => 'change method to Post')
        );
    }
    // crud document
    public function updateDocument()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $document = new Document();                  //get client data
            $data = json_decode(file_get_contents("php://input"));

            echo $document->updateDocument($data);
        } else  echo json_encode(
            array('message' => 'change method to Post')
        );
    }
    // crud document
    public function deleteDocument($id)
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $document = new Document();                  //get client data
            $data = json_decode(file_get_contents("php://input"));

            echo $document->deleteDocument($id);
        } else  echo json_encode(
            array('message' => 'change method to Post')
        );
    }
}
