<?php
//Adiciona aos favoritos
//id_fav	id_user	id_post	created_at	
//echo "capturar o numero da página, para poder devolver na mesma página anterior";

include ('../../controller/config.php');
include ('../../controller/connect.php');
session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
session_start();

$id_post = $_GET['id'];

$id_user = $_SESSION['user_id'];

$data = new DateTime();
$created_at = $data->format('d-m-Y H:i:s');

$sql = "INSERT INTO favorite (user_id, post_id, created) VALUES ('$id_user', '$id_post', '$created_at')";
$res = mysqli_query($con, $sql);

$auth = mysqli_affected_rows($con);

if($auth != 0){
  //Gerando o Log
	$log_desc = "Favoritou o post " . $id_post;
	$log_action = "Favorite";
	
	$id = $_SESSION['user_id'];
	$name = $_SESSION['name'];
	$document = $_SESSION['document'];
	
	$log_created = $data->format('d-m-Y H:i:s');
	
	$log = "INSERT INTO log (description, action, user_id, user_name, user_doc, created_at) VALUES ('$log_desc', '$log_action', '$id', '$name', '$document', '$log_created')";
	$exec = mysqli_query($con, $log);		

	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE . "_site/_ong/list/list_favs.php'>" .
	 "<script type='text/javascript'>alert('Post favoritado');</script>";

}else{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE . "_site/_ong/list/list_pets.php'>" .
	 "<script type='text/javascript'>alert('Oops... post não favoritado');</script>";	
}