<?php 
    require_once 'db_function.php';
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');
 

    // $id="59/154";
    // $depreciate_b="1499.25";
    // $depreciate_col="500.75";
    // $sum="55553";

    // json response array
    $response = array("error" => FALSE);
    $postdata = file_get_contents("php://input");
    $postdata = json_decode($postdata,true);


    // receiving the post params
    // $id=$_POST['id'];
    // $depreciate_b=$_POST['depreciate_b'];
    // $depreciate_col = $_POST['depreciate_col'];
    // $sum = $_POST['sum'];
    
    if (isset($postdata['id']) && isset($postdata['depreciate_b']) && isset($postdata['depreciate_col']) && isset($postdata['sum'])&& isset($postdata['date'])) {
    // if (isset($_POST['id']) && isset($_POST['depreciate_b']) && isset($_POST['depreciate_col']) && isset($_POST['sum'])) {

        $id=$postdata['id'];
        $depreciate_b=$postdata['depreciate_b'];
        $depreciate_col=$postdata['depreciate_col'];
        $sum=$postdata['sum'];
        $date=$postdata['date'];
        // $id=$_POST['id'];
        // $depreciate_b=$_POST['depreciate_b'];
        // $depreciate_col = $_POST['depreciate_col'];
        // $sum = $_POST['sum'];


        $asset = insert_asset($id, $depreciate_b, $depreciate_col, $sum,$date);
            if ($asset) {
                
                $response = array();
                $response["error"] = FALSE;
                $response["asset"] = $asset;
                
                header('Content-Type: application/json');
                echo json_encode($response);

            } else {
                // user failed to store
                $response["error"] = TRUE;
                $response["error_msg"] = "Unknown error occurred!";
                echo json_encode($response);
            }
    }else{
        $response["error"] = TRUE;
        $response["error_msg"] = "Required parameters missing!";
        echo json_encode($response);
    }

?>