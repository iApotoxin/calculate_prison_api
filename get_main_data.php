
<?php

require_once 'db_function.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

    $main_data = get_main_data();
 
    if ($main_data != false) {

        $response = array();
        $response["error"] = FALSE;
        $response["main_data"] = $main_data;
        
        header('Content-Type: application/json');
        //$ar =array("gg"=>"bb");
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "error";
        echo json_encode($response);
    }


?>