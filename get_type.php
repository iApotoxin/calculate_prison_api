
<?php

require_once 'db_function.php';

    $type = get_type();
 
    if ($type != false) {

        $response = array();
        $response["error"] = FALSE;
        $response["types"] = $type;
        
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