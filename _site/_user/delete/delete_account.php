<?php
include ('../../controller/config.php');
include ('../../controller/connect.php');
session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
session_start();

$pass1 = md5(filter_input(INPUT_POST, "pass1"));
$pass2 = md5(filter_input(INPUT_POST, "pass2"));

$id = $_SESSION['user_id'];

if(($pass1 == $pass2) && ($pass2 == $_SESSION['pass'])){
  $sql = "UPDATE user SET status = 0 WHERE id_user = '$id'";
  $res = mysqli_query($con, $sql);

  //Gerando o Log
	$log_desc = "Desativou sua conta";
	$log_action = "Delete";
	
	$id = $_SESSION['user_id'];
	$name = $_SESSION['name'];
	$document = $_SESSION['document'];
	
	$data = new DateTime();
	$log_created = $data->format('d-m-Y H:i:s');
	
	$log = "INSERT INTO log (description, action, user_id, user_name, user_doc, created_at) VALUES ('$log_desc', '$log_action', '$id', '$name', '$document', '$log_created')";
	$exec = mysqli_query($con, $log);		

	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE . "_site/controller/logout.php'>" .
	 "<script type='text/javascript'>alert('Poxa... sua conta foi desativada.');</script>";

}else{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE . "_site/_user/edit/edit_config.php'>" .
	 "<script type='text/javascript'>alert('Oops... as senhas não coincidem');</script>";	
}