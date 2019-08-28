<?php 

require_once("../controller/system.php");

$user_name = $system_user['0']['user_name'];
$assistente_nome = $assistente['0']['assistente_name'];
$time = date('H:i');


if( isset($_POST['send_quest']) and isset($_POST['send_answer'])){

	$pergunta_name = $_POST['send_quest'];
	$resposta_name = strip_tags_content($_POST['send_answer']);

	if ($resposta_name !== "") {
	# code...

		if(!empty($busca->select("perguntas", "pergunta_name = '$pergunta_name' "))){

//a assistente grava a pergunta e a resposta no banco de dados e retorna ambas no chat avisando que aprendeu
			require_once("respostas/003.php");
		}
		
	}else{
		require_once("respostas/004.php");
	}

	header("Content-Type: text/plain");
	echo json_encode($dados);
}

?>



