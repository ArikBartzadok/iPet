<?php
include_once ('../../controller/connect.php');
include_once ('../../controller/config.php');
/*
id_user
ranking
name
email
password
cpf
telephone
instagram
street
neighborhood
city
uf
bio
image
banner
use_terms
status (0 = inativo | 1 = ativo)
 */
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
  //echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=". BASE . "_site/_user/profile.php'>" . "<script type='text/javascript'>alert('Uhuu, dados alterados com sucesso!');</script>";    
  header('location:' . BASE . '_site/_user/profile.php');
} else {
  echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=". BASE . "_site/_user/profile.php'>" . "<script type='text/javascript'>alert('Oops, não foi possível realizar as alterações!');</script>";   
  //echo "<script type='text/javascript'>alert('Oops, não foi possível realizar as alterações!');</script>";   
  //header('location:' . BASE . '_site/_user/profile.php');
}
?>