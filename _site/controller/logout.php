<?php
	session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
	session_start();

	unset($_SESSION['email']);
	unset($_SESSION['pass']);
	unset($_SESSION['key']);
	
	$_SESSION = array();

	if (ini_get("session.use_cookies")) {
    	$params = session_get_cookie_params();
    	setcookie(session_name(), '', time() - 42000,
        	$params["path"], $params["domain"],
        	$params["secure"], $params["httponly"]
    	);
	}

	session_destroy();
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/tcc_ipet/'>";

?>