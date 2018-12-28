<?php
// echo "0";
session_start();
require_once ("../lib/helper.php");
require_once("../lib/library_functions.php");

$response = array();

if(isset($_FILES['package']['type']) && isset($_POST['name'])  && isset($_POST['price']) && isset($_POST['day']) && isset($_POST['travel_By']))
{
	
	$package = $_FILES['package'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$day = $_POST['day'];
	$travel_By = $_POST['travel_By'];


	$source_url = $package;
	$status ='1';
	$destination_url = "package/";
	$img_upload = array();
	$img_upload = compress_image($source_url,$destination_url,100);
	

 // echo $detail;
 // exit();
	$upload = "INSERT INTO packages(image,place_name,price,days,travel_by,uploaded_on,status) VALUES (?,?,?,?,?,CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'),?) ";
	$result_img = $obj->conn->prepare($upload);
	$result_img->bind_param("ssssss",$img_upload[0],$name,$price,$day,$travel_By,$status);
	if ($result_img->execute()) {
		$response['n'] = 1;
		

	}

	

}
echo json_encode($response);
?>
