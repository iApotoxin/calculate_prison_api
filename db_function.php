<?php require_once("db_connection.php");?>
<?php require_once("index.html");?>
<?php

// $id="59/154";
// $depreciate_b="1499.25";
// $depreciate_col="500.75";
// $sum="3000";

//insert_asset($id, $depreciate_b, $depreciate_col, $sum);

    function insert_asset($id, $depreciate_b, $depreciate_col, $sum){
        global $connection;

        $query = "INSERT INTO asset(";
		$query .= "id, depreciate_b, depreciate_col, sum) ";
        $query .= "VALUES('{$id}', '{$depreciate_b}','{$depreciate_col}', '{$sum}')";
        
        $result = mysqli_query($connection, $query);
    }

    function get_type(){
        global $connection;

        $query = "SELECT * from type";
        $result = mysqli_query($connection, $query);
        $data = array();
		if($result){
			while ($res = mysqli_fetch_assoc($result)){
				array_push($data,$res);
			}
			return $data;
		}
		else{
			return false;
		}
    }

    function insert_asset_main($id, $type, $location, $date, $item, $amount, $price_amount, $price, $lifetime, $depreciate_pct, $depreciate_b, $depreciate_col, $sum, $etc){
        global $connection;

        $query = "INSERT INTO asset_main(";
		$query .= "id, type, location, date, item, amount, price_amount, price, lifetime, depreciate_pct, depreciate_b, depreciate_col, sum, etc) ";
        $query .= "VALUES('{$id}', '{$type}','{$location}', '{$date}', '{$item}', '{$amount}', '{$price_amount}', '{$price}', '{$lifetime}', '{$depreciate_pct}', '{$depreciate_b}', '{$depreciate_col}', '{$sum}', '{$etc}')";
        
        $result = mysqli_query($connection, $query);

    }

?>