<?php 
    require_once 'db_function.php';
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');

    $response = array("error" => FALSE);
    $postdata = file_get_contents("php://input");
    $postdata = json_decode($postdata,true);


    if (isset($postdata['id']) && isset($postdata['depreciate_b']) && isset($postdata['depreciate_col']) && isset($postdata['sum'])) {

    // receiving the post params
    $id=$postdata['id'];
    $type=$postdata['type']; //select from type table
    $location = $postdata['location'];
    $date = $postdata['date'];
    $item = $postdata['item'];
    $amount = $postdata['amount'];
    $price_amount = $postdata['price_amount'];
    $price = $postdata['price'];
    $lifetime = $postdata['lifetime'];
    $depreciate_pct = $postdata['depreciate_pct'];
    $depreciate_b = $postdata['depreciate_b'];
    $depreciate_col = $postdata['depreciate_col'];
    $sum = $postdata['sum'];
    $etc = $postdata['etc'];


    $asset_main = insert_asset_main($id, $type, $location, $date, $item, $amount, $price_amount, $price, 
                                    $lifetime, $depreciate_pct, $depreciate_b, $depreciate_col, $sum, $etc);
        if ($asset_main) {
            
            $response = array();
            $response["error"] = FALSE;
            $response["asset_main"] = $asset_main;
            
            header('Content-Type: application/json');
            echo json_encode($response);

        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred!";
            echo json_encode($response);
        }
    }
    else{
        $response["error"] = TRUE;
        $response["error_msg"] = "Required parameters missing!";
        echo json_encode($response);
    }

?>