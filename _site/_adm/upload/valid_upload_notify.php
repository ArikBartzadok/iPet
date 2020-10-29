<?php

include_once ('../../controller/connect.php');
include_once ('../../controller/config.php');

$id = filter_input(INPUT_POST, "user_id");
$ranking = filter_input(INPUT_POST, "ranking");
$name = filter_input(INPUT_POST, "name");
$title = filter_input(INPUT_POST, "title");
$text = filter_input(INPUT_POST, "text");
$telephone = filter_input(INPUT_POST, "tel");
$type = filter_input(INPUT_POST, "type");
$origin = 1;
$document = filter_input(INPUT_POST, "cpf");
//created_at
$data = new DateTime();
$created_at = $data->format('H:i');
$perfil = filter_input(INPUT_POST, "perfil");

//Fazendo a inserção dos dados no banco de dados
$sql = "INSERT INTO notify (id_user, name_user, image_user, telephone_user, type, title, text, created_at, origin) VALUES ('$id', '$name', '$perfil', '$telephone', '$type', '$title', '$text', '$created_at', '$origin')";
$res = mysqli_query($con, $sql);
$rows = mysqli_affected_rows($con);

//Verificando se as alterações foram feitas com base na quantidade de linhas afetadas
if($rows > 0) {
  //Gerando o Log
  $log_desc = "Realizou uma postagem";
  $log_action = "Post";    

  $log_created = $data->format('d-m-Y H:i:s');
        
  $log = "INSERT INTO log (description, action, user_id, user_name, user_doc, created_at) VALUES ('$log_desc', '$log_action', '$id', '$name', '$document', '$log_created')";
  $exec = mysqli_query($con, $log);  

  header('location:' . BASE . '_site/_adm/edit/edit_notifies.php');
} else {
  echo "<script type='text/javascript'>alert('Oops... não foi possível realizar a postagem!');</script>";   
  header('location:' . BASE . '_site/_adm/edit/edit_notifies.php');
}
?>