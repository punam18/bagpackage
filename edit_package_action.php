<?php
session_start();
// echo "0";
require_once ("../lib/helper.php");
require_once("../lib/library_functions.php");

$response = array();

if(isset($_FILES['package']['type']) && isset($_POST['name'])  && isset($_POST['price']) && isset($_POST['day']) && isset($_POST['travel_By']) && isset($_POST['package_id']))
{
  // echo "updated";
  // exit();
 
  $package = $_FILES['package'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $day = $_POST['day'];
  $travel_By = $_POST['travel_By'];
  $package_id =$_POST['package_id'];
  
  // echo($package_id);
  // exit();

 
  $source_url = $package;
  $status ='1';
  $destination_url = "package/";
  $img_upload = array();
  $img_upload = compress_image($source_url,$destination_url,100);


  $upload = "UPDATE packages SET image=?,place_name=?,price=?,days=?,travel_by=?,status=? WHERE package_id=?";
  $result_img = $obj->conn->prepare($upload);
 
 

  $result_img->bind_param("ssssssi",$img_upload[0],$name,$price,$day,$travel_By,$status,$package_id);
  if ($result_img->execute()) {
    // echo 1;
       $response['n'] = 1;
        $response['msg'] = "update";
     }
else
{
  // echo 0;
  $response['n'] = 0;
  $response['msg'] = " not update";
}

  

}
echo json_encode($response);
?>
