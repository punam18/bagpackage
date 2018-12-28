<?php
// echo "0";
session_start();
require_once ("../lib/helper.php");
require_once("../lib/library_functions.php");

$response = array();

if(isset($_POST['package_id']) && isset($_POST['firstname']) && isset($_POST['lastname'])  && isset($_POST['email_process']) && isset($_POST['Address']) && isset($_POST['phone']) && isset($_POST['persons']))
{
// echo '1';
	$package_id =$_POST['package_id'];
	$firstname = $_POST['firstname'];
	$lastname =$_POST['lastname'];
	$email = $_POST['email_process'];
	$Address = $_POST['Address'];
	$phone =$_POST['phone'];
	$persons =$_POST['persons'];

	$status ='1';

	 

	$get_package = array();
	array_push($get_package,$package_id);
	$get_pack =$obj->select("*","packages","package_id = $package_id");
$result=$get_pack[0];
// while($row=mysql_fetch_array($result))
// {
// echo $row;
// }
$price = $result['price'];
$cost = $persons * $price;


	// echo $phone;


	  $insert = "INSERT INTO booking(firstname,lastname,phone,email,address,persons,added_date,status,cost) VALUES (?,?,?,?,?,?,CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'),?,?) ";
	$result_img = $obj->conn->prepare($insert);
	$result_img->bind_param("sssssisi",$firstname,$lastname,$phone,$email,$Address,$persons,$status,$cost);
$result_img->execute();


if($result_img)
{
	// header("Location: 	/PayUMoney/PayUMoney_form.php");
	$response['n'] = 1 ;
	$response['msg'] = 'done';
}
else
{
	$response['n'] = 1 ;
	$response['msg'] = ' not done';

	// /header("Location: /PayUMoney/PayUMoney_form.php");
}
	


		
		

	
}
echo json_encode($response);

?>