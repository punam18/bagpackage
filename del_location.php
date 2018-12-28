<?php


require_once ("lib/helper.php");
require_once("lib/library_functions.php");

// $response = array();

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	// print_r($id);
	$status =0;
	// echo $id;
	// exit();	
	
	// $package = $_FILES['package'];
	// $name = $_POST['name'];
	// $price = $_POST['price'];
	// $day = $_POST['day'];
	// $travel_By = $_POST['travel_By'];
	$del_location = "UPDATE location SET status=? WHERE location_id=?";
	$result_del_location = $obj->conn->prepare($del_location);
	$result_del_location->bind_param("si",$status,$id);
	if($result_del_location->execute())
		{
			// $response['n'] = 1;
			// $response['msg'] = "delete Successfully";
			echo "<script>alert ('Not deleted');</script>";
		echo '<script>window.location.href = "location.php";</script>';

		}
		else{

		echo "<script>alert ('Not deleted');</script>";
		 echo '<script>window.location.href = "location.php";</script>';

		}
	}
	// echo json_encode($response);
?>