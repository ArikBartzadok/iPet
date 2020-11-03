<?php
include_once ('../../controller/connect.php');
include_once ('../../controller/config.php');
include_once ('../../controller/session.php');

require('../../controller/wideimage/WideImage.php');

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
$bio = filter_input(INPUT_POST, "bio");

if($_FILES['pic']['size'] > 0){
  $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
  $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
  //$dir = chmod("../../assets/img/users/", 0755); //Diretório para uploads
  $dir = '../../assets/img/users/'; //Diretório para uploads

  move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

  $image = $new_name;   
  
  // Carrega a imagem a ser manipulada
  $crop_image = WideImage::load('../../assets/img/users/' . $image);

  //Cortando a imagem a partir de seu exato centro
  $cropped = $crop_image->crop('center', 'center', 400, 400);

  //Salvando a imagem já recortada
  $cropped->saveToFile('../../assets/img/users/' . $image);

}else{
$image = $_SESSION['profile_image'];
}

//Fazendo a alteração dos dados no banco de dados
$sql = "UPDATE user SET name='$name', email='$email', cpf='$document', telephone='$telephone', instagram='$instagram', street='$street', neighborhood='$neighborhood', city='$city', uf='$uf', bio='$bio', image='$image', banner='$banner' WHERE id_user='$id'";
$res = mysqli_query($con, $sql);
$rows = mysqli_affected_rows($con);

//Verificando se as alterações foram feitas com base na quantidade de linhas afetadas
if($rows > 0) {
  //Gerando o Log
  $log_desc = "Alterou seus dados pessoais";
  $log_action = "Update";    
    
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