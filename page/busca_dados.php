<?php 

require_once("../controller/system.php");

//DECLARAÇÃO DAS VÁRIAVEIS =======================================================================
$user_name = $system_user['0']['user_name'];
$assistente_nome = $assistente['0']['assistente_name'];
$time = date('H:i');
$key = $busca->Rand(20);

//================================================================================================
/*
|
|
|
|================================================================================================*/
if (isset($_POST['quest'])) {

	$quest = $_POST['quest'];

	$pergunta = $busca->select("perguntas", "pergunta_name = '$quest'  order by rand() limit 1");

	$dados['quest'] = $quest;

//001 - QUANDO A PERGUNTAR NÃO EXISTIR
	if(empty($pergunta)){

		require_once("perguntas/001.php");
//FIM - 001	

//A PERGUNTA EXISTE ENTÃO ELA RETORNA UMA RESPOSTA ALEATÓRIA	
}elseif($pergunta[0]['pergunta_name'] == $quest){

	$pergunta_id = $pergunta[0]['id'];

	$resposta = $busca->select("respostas", "resposta_pergunta_id = '$pergunta_id' order by rand() limit 1");

	$dados['resposta'] = '

	<div class="chat-message-right mb-4">
	<div>
	<img src="assets/img/avatars/1.png" class="ui-w-40 rounded-circle" alt>
	<div class="text-muted small text-nowrap mt-2">'.$time.'</div>
	</div>
	<div class="flex-shrink-1 bg-lighter rounded py-2 px-3 mr-3">
	<div class="font-weight-semibold mb-1">'.$user_name.'</div>
	'.$quest.'
	</div>
	</div>

	<div class="chat-message-left mb-4">
	<div>
	<img src="assets/img/avatars/5.png" class="ui-w-40 rounded-circle" alt>
	<div class="text-muted small text-nowrap mt-2">'.$time.'</div>
	</div>
	<div class="flex-shrink-1 bg-lighter rounded py-2 px-3 ml-3">
	<div class="font-weight-semibold mb-1">'.$assistente_nome.' <a href="#"><i title="Ensinar Mais" class="text-success fas fa-plus-circle"></i></a>

	</div>
	'.$resposta[0]["resposta_name"].'
	</div>
	';
}

header("Content-Type: text/plain");
echo json_encode($dados);

}

?>