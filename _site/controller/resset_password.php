<?php
include_once ('connect.php');
include_once ('config.php');

$email = filter_input(INPUT_POST, "email");
$pass1 = md5(filter_input(INPUT_POST, "password1"));
$pass2 = md5(filter_input(INPUT_POST, "password2"));
$ranking = filter_input(INPUT_POST, "ranking");
$document = filter_input(INPUT_POST, "document");

if(($pass1 == $pass2) && ($document != "")){
	//Fazendo uma busca para ter certeza de que estes dados existem
	$sql = "SELECT * FROM user WHERE email = '$email' AND ranking = '$ranking' AND cpf = '$document'";
	$res = mysqli_query($con, $sql);
	$array = mysqli_num_rows($res);

	if($array != 0){
		$resset = "UPDATE user SET password = '$pass1' WHERE email = '$email' AND cpf = '$document'";
		$query_resset = mysqli_query($con, $resset);

		$auth = mysqli_affected_rows($con);

		if($auth != 0){
			echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=" . BASE . "_site/auth/login.php'>"
		. "<script type='text/javascript'>alert('Woow... sua senha foi alterada!');</script>";			
		}else{
			echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=" . BASE . "_site/auth/resset_password.php'>"
			. "<script type='text/javascript'>alert('Oops... algo deu errado...');</script>";			
		}

	}else{
		echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=" . BASE . "_site/auth/resset_password.php'>"
		. "<script type='text/javascript'>alert('Oops... os dados informados não existem...');</script>";			
	}
}else{
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=" . BASE . "_site/auth/resset_password.php'>"
	. "<script type='text/javascript'>alert('Oops... as senhas são diferentes ou existem campos vazios...');</script>";	
}

?>