<?php require_once("db_connection.php");?>
<?php require_once("index.html");?>
<?php

// $id="59/154";
// $depreciate_b="1499.25";
// $depreciate_col="500.75";
// $sum="3000";

//insert_asset($id, $depreciate_b, $depreciate_col, $sum);

    function insert_asset($id, $depreciate_b, $depreciate_col,$sum,$date){
        global $connection;

        $query = "INSERT INTO asset(";
		$query .= "id, depreciate_b, depreciate_col, sum, date) ";
        $query .= "VALUES('{$id}', '{$depreciate_b}','{$depreciate_col}', '{$sum}', '{$date}')";
        
        $result = mysqli_query($connection, $query);
        $data = array();
		
		if($result){
			$query2 = "SELECT * FROM asset WHERE date = '{$date}'";
			$asset = mysqli_query($connection, $query2);
			if($asset){
				while ($res = mysqli_fetch_assoc($asset)){
					array_push($data,$res);
				}
				return $data;
			}else{
					return false;
				}
			}
			else{
				return false;
			}
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

        $data = array();
		
		if($result){
			$query2 = "SELECT * FROM asset_main WHERE id = '{$id}'";
			$asset = mysqli_query($connection, $query2);
			if($asset){
				while ($res = mysqli_fetch_assoc($asset)){
					array_push($data,$res);
				}
				return $data;
			}else{
					return false;
				}
			}
			else{
				return false;
			}

	}
	function get_id($id){
        global $connection;

        $query = "SELECT sum from asset_main where id = $id";
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
	function get_main_data(){
		global $connection;

        $query = "SELECT * from asset_main ";
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
	function  login_ckeck($username,$password){
		global $connection;

        $query = "SELECT * from user where username = $username AND password = $password ";
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

?>