<?php
	//Define nome da sessão
	session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));

	//Inicia sessão
    session_start();

    //Verifica se a sessão é verdaira 
    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['pass']) == true))
    {
        $_SESSION['key'] = 0;

        unset($_SESSION['email']);        
        unset($_SESSION['pass']);
        unset($_SESSION['name']);
        unset($_SESSION['rank']);
        header('location:http://localhost/tcc_ipet/');
    }
?>