<?php
include ('../../config.php');
include ('../../connect.php');
session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
session_start();

$pass1 = md5(filter_input(INPUT_POST, "pass1"));
$pass2 = md5(filter_input(INPUT_POST, "pass2"));

$id = $_SESSION['user_id'];

if(($pass1 == $pass2) && ($pass2 == $_SESSION['pass'])){
  $sql = "DELETE FROM user WHERE id_user = '$id'";
  $res = mysqli_query($con, $sql);
  $array = mysqli_num_rows($res);

  if($array != 0){
    //Gerando o Log
		$log_desc = "Deletou sua conta";
		$log_action = "Delete";
	
		$id = $_SESSION['user_id'];
		$name = $_SESSION['name'];
		$document = $_SESSION['document'];
	
		$data = new DateTime();
		$log_created = $data->format('d-m-Y H:i:s');
	
		$log = "INSERT INTO log (description, action, user_id, user_name, user_doc, created_at) VALUES ('$log_desc', '$log_action', '$id', '$name', '$document', '$log_created')";
    $exec = mysqli_query($con, $log);	
    
    unset($_SESSION['email']);
	unset($_SESSION['name']);
	unset($_SESSION['rank']);
	unset($_SESSION['pass']);
	unset($_SESSION['key']);
	unset($_SESSION['user_id']);
	unset($_SESSION['document']);
	
	$_SESSION = array();

	if (ini_get("session.use_cookies")) {
    	$params = session_get_cookie_params();
    	setcookie(session_name(), '', time() - 42000,
        	$params["path"], $params["domain"],
        	$params["secure"], $params["httponly"]
    	);
	}

	session_destroy();	
  }

  echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE . "'>" 
  . "<script type='text/javascript'>alert('Poxa... sua conta foi deletada!');</script>";

} else{
  echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE ."_site/_user/edit/edit_config.php'>" 
  . "<script type='text/javascript'>alert('Oops... as senhas não coincidem');</script>";
}