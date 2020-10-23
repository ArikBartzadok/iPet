<?php
include ('config.php');
include ('connect.php');

	session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
	session_start();

		//Gerando o Log
		$log_desc = "Saiu do sistema";
		$log_action = "logout";
	
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

	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=" . BASE . "'>";

?>