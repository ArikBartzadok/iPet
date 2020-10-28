<?php
include_once ('../../controller/connect.php');
include_once ('../../controller/config.php');

$id = filter_input(INPUT_POST, "user_id");
$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email");
$document = filter_input(INPUT_POST, "document");
$telephone = filter_input(INPUT_POST, "tel");
$instagram = filter_input(INPUT_POST, "insta");
$street = filter_input(INPUT_POST, "street");
$neighborhood = filter_input(INPUT_POST, "neig");
$city = filter_input(INPUT_POST, "city");
$uf = filter_input(INPUT_POST, "uf");
$banner = filter_input(INPUT_POST, "banner");
$pic = filter_input(INPUT_POST, "pic");
$bio = filter_input(INPUT_POST, "bio");

$pic = "eugenio.png";

//Fazendo a alteração dos dados no banco de dados
$sql = "UPDATE user SET name='$name', email='$email', cpf='$document', telephone='$telephone', instagram='$instagram', street='$street', neighborhood='$neighborhood', city='$city', uf='$uf', bio='$bio', image='$pic', banner='$banner' WHERE id_user='$id'";
$res = mysqli_query($con, $sql);
$rows = mysqli_affected_rows($con);

//Verificando se as alterações foram feitas com base na quantidade de linhas afetadas
if($rows > 0) {
  //Gerando o Log
  $log_desc = "Alterou seus dados pessoais";
  $log_action = "update";    
    
  $data = new DateTime();
  $log_created = $data->format('d-m-Y H:i:s');
    
  $log = "INSERT INTO log (description, action, user_id, user_name, user_doc, created_at) VALUES ('$log_desc', '$log_action', '$id', '$name', '$document', '$log_created')";
  $exec = mysqli_query($con, $log);  

  header('location:' . BASE . '_site/_ong/profile.php');
} else {
  //echo "<script type='text/javascript'>alert('Oops, não foi possível realizar as alterações!');</script>";   
  header('location:' . BASE . '_site/_ong/profile.php');
}
?>