<?php
// echo "0";
session_start();
require_once ("../lib/helper.php");
require_once("../lib/library_functions.php");

$response = array();

if(isset($_FILES['location']['type']) && isset($_POST['name'])  && isset($_POST['details']) && isset($_POST['location_id']))
{
  // echo "updated";
  // exit();
 
  $location = $_FILES['location'];
  $name = $_POST['name'];
  $details = $_POST['details'];
  $location_id =$_POST['location_id'];

 
  $source_url = $location;
  $status ='1';
  $destination_url = "location/";
  $img_upload = array();
  $img_upload = compress_image($source_url,$destination_url,100);


  $upload = "UPDATE location SET image=?,place_name=?,details=?,status=? WHERE location_id=?";
  $result_img = $obj->conn->prepare($upload);
 
 

  $result_img->bind_param("ssssi",$img_upload[0],$name,$details,$status,$location_id);
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
