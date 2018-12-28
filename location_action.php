<?php
// echo "0";
session_start();
require_once ("../lib/helper.php");
require_once("../lib/library_functions.php");

$response = array();

if(isset($_FILES['location']['type']) && isset($_POST['name'])  && isset($_POST['details']))
{
	
	$location = $_FILES['location'];
	$name = $_POST['name'];
	$details = $_POST['details'];
	


	$source_url = $location;
	$status ='1';
	$destination_url = "location/";
	$img_upload = array();
	$img_upload = compress_image($source_url,$destination_url,100);

 // echo $detail;
 // exit();
	$upload = "INSERT INTO location(image,place_name,details,location_added_by,status) VALUES (?,?,?,CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'),?) ";
	$result_img = $obj->conn->prepare($upload);
	$result_img->bind_param("ssss",$img_upload[0],$name,$details,$status);
	if ($result_img->execute()) {
		$response['n'] = 1;
		

	}

	

}
echo json_encode($response);
?>
