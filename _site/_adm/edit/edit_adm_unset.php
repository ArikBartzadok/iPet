<?php
include ('../../controller/config.php');
include ('../../controller/connect.php');
session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
session_start();

$id = $_GET['id'];


$sql = "UPDATE user SET ranking = 1 WHERE id_user = '$id'";
$res = mysqli_query($con, $sql);

$auth = mysqli_affected_rows($con);

if($auth != 0){
  //Gerando o Log
	$log_desc = $_SESSION['name'] . " Removeu ADM: " . $id;
	$log_action = "Promoção";
	
	$id = $_SESSION['user_id'];
	$name = $_SESSION['name'];
	$document = $_SESSION['document'];
	
	$data = new DateTime();
	$log_created = $data->format('d-m-Y H:i:s');
	
	$log = "INSERT INTO log (description, action, user_id, user_name, user_doc, created_at) VALUES ('$log_desc', '$log_action', '$id', '$name', '$document', '$log_created')";
	$exec = mysqli_query($con, $log);		

  echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE . "_site/_adm/edit/edit_users.php'>" . 
  "<script type='text/javascript'>alert('Usuário despromovido.');</script>";	

}else{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE . "_site/_adm/edit/edit_users.php'>" .
	  "<script type='text/javascript'>alert('Oops... não foi possível des-promover usuário.');</script>";	
}