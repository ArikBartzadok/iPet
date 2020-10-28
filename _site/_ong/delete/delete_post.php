<?php
include ('../../controller/config.php');
include ('../../controller/connect.php');
session_name(md5('seg'.$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']));
session_start();

$id = $_GET['id'];

$sql = "DELETE FROM post WHERE id_post = '$id'";
$res = mysqli_query($con, $sql);

$auth = mysqli_affected_rows($con);

if($auth != 0){
  //Gerando o Log
	$log_desc = "Excluiu o post " . $id;
	$log_action = "Delete";
	
	$id = $_SESSION['user_id'];
	$name = $_SESSION['name'];
	$document = $_SESSION['document'];
	
	$data = new DateTime();
	$log_created = $data->format('d-m-Y H:i:s');
	
	$log = "INSERT INTO log (description, action, user_id, user_name, user_doc, created_at) VALUES ('$log_desc', '$log_action', '$id', '$name', '$document', '$log_created')";
	$exec = mysqli_query($con, $log);		

	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE . "_site/_ong/list/list_posts.php'>" .
	 "<script type='text/javascript'>alert('Post deletado com sucesso!');</script>";

}else{
	echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=" . BASE . "_site/_ong/list/list_posts.php'>" .
	 "<script type='text/javascript'>alert('Oops... não foi possível deletar este post');</script>";	
}