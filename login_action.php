<?php
// echo "0";
session_start();
require_once ("../lib/helper.php");
require_once("../lib/library_functions.php");

$response = array();

if(isset($_POST['email']) && trim($_POST['email']) != '' && isset($_POST['password'])  && trim($_POST["password"]) != '' )
{

$email = $obj->data_filter($_POST['email']);
	$password = sha1($obj->data_filter($_POST['password']));
	// echo $password;

	 $login_arr = array();
              array_push($login_arr,$email,$password,'1');
              $get_login = $obj->select_prepare("*","user","email = ? AND user_password = ?  AND status=?","sss",$login_arr);
              // echo $get_login[0]['user_password'];
              // print_r($get_login);
              // exit();

              if(is_array($get_login))
              {
              	$response['n'] = '1';
              	$response['msg'] = "login";
              }
              else
              {
              	$response['n'] = '0';
              	$response['msg'] = "not login";
              }




              
}

echo json_encode($response);
?>