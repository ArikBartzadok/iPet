<?php
/*
id_post	id_author	cpf_author	
ranking_author	author	city_author	uf
title	text	telephone	email	instagram
type	created_at	image	image_author
*/

include_once ('../../controller/connect.php');
include_once ('../../controller/config.php');

$id = filter_input(INPUT_POST, "user_id");
$document = filter_input(INPUT_POST, "document");
$ranking = filter_input(INPUT_POST, "ranking");
$name = filter_input(INPUT_POST, "name");
$city = filter_input(INPUT_POST, "city");
$uf = filter_input(INPUT_POST, "uf");
$title = filter_input(INPUT_POST, "title");
$text = filter_input(INPUT_POST, "text");
$telephone = filter_input(INPUT_POST, "tel");
$email = filter_input(INPUT_POST, "email");
$instagram = filter_input(INPUT_POST, "insta");
$type = filter_input(INPUT_POST, "type");
//created_at
$data = new DateTime();
$created_at = $data->format('d-m-Y H:i:s');
$pic = filter_input(INPUT_POST, "pic");
$perfil = filter_input(INPUT_POST, "perfil");


$pic = "dog.jpg";

//Fazendo a inserção dos dados no banco de dados
$sql = "INSERT INTO post (id_author, cpf_author, ranking_author, author, city_author, uf, title, text, telephone, email, instagram, type, created_at, image,	image_author) VALUES ('$id', '$document', $ranking, '$name', '$city', '$uf', '$title', '$text', '$telephone', '$email', '$instagram', $type, '$created_at', '$pic', '$perfil')";
$res = mysqli_query($con, $sql);
$rows = mysqli_affected_rows($con);

//Verificando se as alterações foram feitas com base na quantidade de linhas afetadas
if($rows > 0) {
  //Gerando o Log
  $log_desc = "Realizou uma postagem";
  $log_action = "post";    

  $log_created = $data->format('d-m-Y H:i:s');
          
  $log = "INSERT INTO log (description, action, user_id, user_name, user_doc, created_at) VALUES ('$log_desc', '$log_action', '$id', '$name', '$document', '$log_created')";
  $exec = mysqli_query($con, $log);   

  header('location:' . BASE . '_site/_user/list/list_posts.php');
} else {
  echo "<script type='text/javascript'>alert('Oops, não foi possível realizar a postagem!');</script>";   
  header('location:' . BASE . '_site/_user/upload/upload_post.php');
}
?>