<?php require_once("index.html");?>
<?php 
    require_once 'db_function.php';
    header('Access-Control-Allow-Origin: *');

    // $id="59/154";
    // $depreciate_b="1499.25";
    // $depreciate_col="500.75";
    // $sum="55553";

    // receiving the post params
    $id=$_POST['id'];
    $type=$_POST['type']; //select from type table
    $location = $_POST['location'];
    $date = $_POST['date'];
    $item = $_POST['item'];
    $amount = $_POST['amount'];
    $price_amount = $_POST['price_amount'];
    $price = $_POST['price'];
    $lifetime = $_POST['lifetime'];
    $depreciate_pct = $_POST['depreciate_pct'];
    $depreciate_b = $_POST['depreciate_b'];
    $depreciate_col = $_POST['depreciate_col'];
    $sum = $_POST['sum'];
    $etc = $_POST['etc'];

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

?>