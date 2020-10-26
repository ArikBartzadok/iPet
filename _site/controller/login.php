<?php
include ('config.php');
include ('connect.php');
session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
session_start();

$email = filter_input(INPUT_POST, "email");
$pass = md5(filter_input(INPUT_POST, "pass"));

$sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
$res = mysqli_query($con, $sql);
$auth = mysqli_num_rows($res);

$array = mysqli_fetch_assoc($res); 

//desmenbrando o array acima obtido, armazenando seus respectivos campos em suas respectivas variáveis
if($auth != 0 && $array['status'] != 0) {

	do{
		$id = $array['id_user'];
		$name = $array['name'];
		$rank = $array['ranking'];
		$image = $array['image'];
		$document = $array['cpf'];
	} while($array = mysqli_fetch_assoc($res));

	//definindo os valores de minhas 
		$_SESSION['user_id'] = $id;
		$_SESSION['email'] = $email;
   	$_SESSION['pass'] = $pass;
   	$_SESSION['name'] = $name;
		$_SESSION['rank'] = $rank;
		$_SESSION['document'] = $document;
		$_SESSION['profile_image'] = $image;

	//Gerando o Log
	$log_desc = "Entrou no sistema";
	$log_action = "login";

	$data = new DateTime();
	$log_created = $data->format('d-m-Y H:i:s');

	$log = "INSERT INTO log (description, action, user_id, user_name, user_doc, created_at) VALUES ('$log_desc', '$log_action', '$id', '$name', '$document', '$log_created')";
	$exec = mysqli_query($con, $log);		
		 
		//$_SESSION['key'] = 1;

		 //fazer o if de redirecionamento
		 if($rank == 3){
			//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/tcc_ipet/_site/_adm/home.php'>";
			header('location:' . BASE . '_site/_adm/home.php');
		 }

		 if($rank == 2){
			//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/tcc_ipet/_site/_ong/home.php'>";
			header('location:' . BASE . '_site/_ong/home.php');
		 }

		 if($rank == 1){
			//echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/tcc_ipet/_site/_user/home.php'>";
			header('location:' . BASE . '_site/_user/home.php');
		 }

		 if($rank < 1 || $rank > 3){
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE . "_site/auth/auth_error.php'>";
		 }
}
else {
	
	//Chave de login é falsa
	$_SESSION['key'] = 0;

	unset($_SESSION['email']);
  unset($_SESSION['pass']);
  unset($_SESSION['name']);
	unset($_SESSION['rank']);
		 
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE ."_site/auth/login.php'>" .
	"<script type='text/javascript'>alert('Oops... email ou senha incorretos. Certifique-se de que sua conta está ativada.');</script>";
}
?>