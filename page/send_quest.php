<?php 

require_once("../controller/system.php");

$user_name = $system_user['0']['user_name'];
$assistente_nome = $assistente['0']['assistente_name'];
$time = date('H:i');


if( isset($_POST['send_quest']) and isset($_POST['send_answer'])){

	$pergunta_name = $_POST['send_quest'];
	$resposta_name = $_POST['send_answer'];

	$send_pergunta['pergunta_name']		=	$pergunta_name;
	$send_pergunta['pergunta_type']		=	"";
	$send_pergunta['pergunta_status']	=	"";
	$send_pergunta['user_id']			=	$system_user['0']['id'];
	$send_pergunta['like']				=	1;
	$send_pergunta['deslike']			=	0;

	if(empty($busca->select("perguntas", "pergunta_name = '$pergunta_name' "))){

//a assistente grava a pergunta e a resposta no banco de dados e retorna ambas no chat avisando que aprendeu
		require_once("respostas/002.php");
	}else{
//você já ensinou essa resposta para a assistente
		require_once("respostas/001.php");
	}

	header("Content-Type: text/plain");
	echo json_encode($dados);
}

?>



