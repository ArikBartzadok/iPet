<?php
include ('connect.php');
session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
session_start();

$email = filter_input(INPUT_POST, "email");
$pass = md5(filter_input(INPUT_POST, "pass"));

$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
$res = mysqli_query($con, $sql);
$array = mysqli_num_rows($res);

//desmenbrando o array acima obtido, armazenando seus respectivos campos em suas respectivas variáveis
if($array != 0) {

	$array = mysqli_fetch_assoc($res); 

	do{
		$name = $array['name'];
		$rank = $array['ranking'];
	} while($array = mysqli_fetch_assoc($res));

	//definindo os valores de minhas sessions
		$_SESSION['email'] = $email;
   	$_SESSION['pass'] = $pass;
   	$_SESSION['name'] = $name;
		$_SESSION['rank'] = $rank;
		 
		//$_SESSION['key'] = 1;

		 //fazer o if de redirecionamento
		 if($rank == 3){
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/tcc_ipet/_site/_adm/home.php'>";
		 }

		 if($rank == 2){
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/tcc_ipet/_site/_ong/home.php'>";
		 }

		 if($rank == 1){
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/tcc_ipet/_site/_user/home.php'>";
		 }

		 if($rank < 1 || $rank > 3){
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/tcc_ipet/_site/auth/auth_error.php'>";
		 }
}
else {
	
	//Chave de login é falsa
	$_SESSION['key'] = 0;

	unset($_SESSION['email']);
  unset($_SESSION['pass']);
  unset($_SESSION['name']);
	unset($_SESSION['rank']);
		 
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/tcc_ipet/_site/auth/login.php'>";
}
?>