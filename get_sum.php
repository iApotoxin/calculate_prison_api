
<?php

require_once 'db_function.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $sum = get_id($id);
 
    if ($sum != false) {

        $response = array();
        $response["error"] = FALSE;
        $response["sum"] = $sum;
        
        header('Content-Type: application/json');
        //$ar =array("gg"=>"bb");
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "error";
        echo json_encode($response);
    }
}
else{
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters missing!";
    echo json_encode($response);
}
   


?>