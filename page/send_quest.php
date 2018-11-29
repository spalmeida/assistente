<?php 

require_once("../controller/system.php");
$user_name = $system_user['0']['user_name'];
$assistente_nome = $assistente['0']['assistente_name'];
$time = date('H:i');
$key = $busca->Rand(20);

if (isset($_POST['send_quest'])) {
	
	$quest = $_POST['send_quest'];

		$dados['retorno'] = '

		<div class="chat-message-left mb-4">
		<div>
		<img src="assets/img/avatars/5.png" class="ui-w-40 rounded-circle" alt>
		<div class="text-muted small text-nowrap mt-2">'.$time.'</div>
		</div>
		<div class="flex-shrink-1 bg-lighter rounded py-2 px-3 ml-3">
		<div class="font-weight-semibold mb-1">'.$assistente_nome.' <a href="#"><i title="Ensinar Mais" class="text-success fas fa-plus-circle"></i></a>

		</div>
		RESPOSTA AQUI
		</div>
		';


	header("Content-Type: text/plain");
	echo json_encode($dados);

}

?>



