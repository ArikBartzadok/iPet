<?php
//Constantes
//ou "localhost/"
$url_site = "http://localhost/tcc_ipet/";

//Me retorna a raiz do  (para includes ou requires):
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

//Incluir os arquivos públicos (imagem ou css)
define('BASE', $url_site);

//Incluir os arquivos públicos (imagem ou css)
define('PUBLICO', $url_site . '_site/assets/');

//---> para usar basta escrever: PUBLICO ou ROOT

//TimeZone
date_default_timezone_set('America/Sao_Paulo');
//echo 'TIMEZONE-> '. date_default_timezone_get();

function info($color, $msg){
  $alerta = <<<MSG
  <div class="alert alert-{$color} alert-dismissible fade show" role="alert">
    {$msg}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
MSG;

  return $alerta;
}

/*== DEBUG ==*/

function debug($parametro){
  echo "<pre>";
  echo "<h1>Debugando...</h1>";
  echo "";
  var_dump($parametro);
  echo "</pre>";
}