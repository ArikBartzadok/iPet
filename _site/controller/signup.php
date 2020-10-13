<?php
include_once ('connect.php');

$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$pass = md5(filter_input(INPUT_POST, "password"));
$ranking = filter_input(INPUT_POST, "ranking"); //to int
$document = filter_input(INPUT_POST, "document");
//$use_terms = filter_input(INPUT_POST, "terms");

// 1 -> true; 0 -> false;
$use_terms = 1;
$telephone = '0';

//transformando o valor de string para int
if($ranking == "1"){
	$ranking = 1;
} else {
	$ranking = 2;
}

//Fazendo uma busca para ter certeza de que este e-mail está livre para o uso
$sql = "SELECT * FROM user WHERE email = '$email'";
$res = mysqli_query($con, $sql);
$array = mysqli_num_rows($res);

//Inserindo os dado no banco, de acordo com o resultado obtido da busca anterior
if($array == 0) {
	$sql = "INSERT INTO user (ranking, name, email, password, cpf, telephone, use_terms) VALUES ('$ranking', '$name', '$email', '$pass', '$document', '$telephone', '$use_terms')";
	$res = mysqli_query($con, $sql);
	$array = mysqli_affected_rows($con);

	if($array != 0) {
		//criando uma nova sessão
		session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
		session_start();

		//fazendo uma nova busca para setar os valores das sessions
		$sql2 = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
		$res2 = mysqli_query($con, $sql2);

		$array2 = mysqli_fetch_assoc($res2); 

		do{
			$name = $array2['name'];
			$rank = $array2['ranking'];
		} while($array2 = mysqli_fetch_assoc($res2));

		//definindo os valores de minhas sessions
		$_SESSION['email'] = $email;
   	$_SESSION['pass'] = $pass;
   	$_SESSION['name'] = $name;
		$_SESSION['rank'] = $rank;				
		
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

		 if($rank < 1 || $rank > 2){
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/tcc_ipet/_site/auth/auth_error.php'>";			
		 }
	}
	else {
		echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/tcc_ipet/_site/auth/signup.php'>"
	    . "<script type='text/javascript'>alert('Usuário não cadastrado');</script>";
	}
}
else {
	echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=http://localhost/tcc_ipet/_site/auth/signup.php'>"
	    . "<script type='text/javascript'>alert('Email já cadastrado');</script>";
}
?>