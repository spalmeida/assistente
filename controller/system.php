<?php 
session_start();
require_once("config.php");

function __autoload($class){

	require_once("class".DIRECTORY_SEPARATOR."$class.php");

}

//FAZ A CONEÇÃO COM O BANCO DE DADOS ====================================
$busca = new Connect($localhost,$db,$user,$pass);
if(!empty($_SESSION)){
//DECLARA A ID DO USUÁRIO	
$system_user_id = $_SESSION['user_id'];
//DECLARA AS INFORMAÇÕES DO USUÁRIO
$system_user = $busca->select("system_users", "id = $system_user_id");
//DECLARA O TIPO DE PERMISSÃO DO USUÁRIO
$system_user_permission = $system_user[0]['user_type'];
//DECLARA AS PERMISSÕES QUE O USUÁRIO TEM
$system_permission = $busca->select("system_permission", "id = $system_user_permission");
}
//=======================================================================
$assistente = $busca->select("assistente", "id = 1");

//$systemName = $busca->select("system_siimet", "id=1");


// if(isset($_SESSION['email'])){
// $system_user = $busca->select("system_users", "user_email='".$_SESSION['email']."'");
// }

//FUNÇÃO UTILIZADA PARA REMOÇÃO DE ACENTOS ==============================
function RemoveAcento($string){
$remover_separador = str_replace(" ", "_", $string); 
$nome = strtolower(preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $remover_separador ) ));
return $nome;
}
//=======================================================================

//CONFIGURAÇÕES DE FUNCIONAMENTO  =======================================
ini_set('memory_limit', '-1');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
//=======================================================================

?>