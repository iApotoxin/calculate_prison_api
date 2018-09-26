
<?php

require_once 'db_function.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
if(isset($_GET['username'])&&isset($_GET['password'])){

    $username = $_GET['username'];
    $password = $_GET['password'];
    $login = login_ckeck($username,$password);
 
    if ($login != false) {

        $response = array();
        $response["error"] = FALSE;
        $response["login"] = $login;
        
        header('Content-Type: application/json');
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