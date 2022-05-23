<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


header('Access-Control-Allow-Methods: POST');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class RdvController {


  public  function index(){



        echo "heelooo";
    }
   
      // reads rdv for single client
      public function read(){              
        
        $data= json_decode(file_get_contents("php://input"));

        
  

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $RDV = new RDV();

            // Blog post query
            $result = $RDV->read($data->reff);
           
            // Turn to JSON & output
            if($result){
              echo json_encode($result);

            } else {echo json_encode(
              array('message' => ' aucun Rdv pour ce client')
                    ); }
            
        }  else  echo json_encode(
          array('message' => 'change method to GET')
                );

       
    
      }


      
    

        // create RDV
            public function create(){
            

              if($_SERVER["REQUEST_METHOD"] == "POST"){

                      $RDV = new RDV();
                    //get posted data
                    $data= json_decode(file_get_contents("php://input"));
                   
                   
                  //  print_r(json_encode($data)) ;
                    // create rdv
                    if($RDV->create($data)){

                    echo json_encode(
                            array('message' => 'RDV Created')
                            );
                }else { 
                        echo json_encode(
                        array('message' => 'RDV Not Created')
                        );
                }

              } else  echo json_encode(
                      array('message' => 'change method to Post')
                            );
               

            }


            public function update(){

              if($_SERVER["REQUEST_METHOD"] == "POST"){

                    $RDV = new RDV();

                      //get RDV data
                      $data= json_decode(file_get_contents("php://input"));
                      // create RDV
                      if($RDV->update($data)){

                          echo json_encode(
                              array('message' => 'updated')
                            );
                      }else { 
                          echo json_encode(
                            array('message' => 'RDV Not updated check your id')
                          );
                        }

                    }else echo json_encode(
                      array('message' => 'change method to PUT')
                    );

              } 

              // delete RDV
              
              public function delete($id_RDV){
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                  $RDV = new RDV();

                  
                      if($RDV->delete($id_RDV)){

                      echo json_encode(
                        array('message' => 'deleted')
                      );
                      }else { 
                      echo json_encode(
                      array('message' => 'deleted')
                      );
                      }
                    
                      }else echo json_encode(
                        array('message' => 'change method to DELETE')
                      );
  
                }
               



  





}


?>