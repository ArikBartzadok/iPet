<?
//execução de todas as funções que exigem cálculos matemáticos

/*

1 - total de usuários;
2 - 
3 - 
4 - 
...

*/
function math_calcs($type){
  include_once "connect.php";

  if($type == 1){
  
  $sql = "SELECT COUNT FROM user";
  $res = mysqli_query($con, $sql);

  //$lines = mysqli_num_rows($res);
  return $res;

  }
  
}