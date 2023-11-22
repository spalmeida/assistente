<?php 

require_once("../../controller/system.php");
$user_name = $system_user['0']['user_name'];
$assistente_nome = $assistente['0']['assistente_name'];
$time = date('H:m');


if (isset($_POST['quest'])) and isset($_POST['answer']){

	$quest = $_POST['quest'];
	$answer = $_POST['answer'];



			$dados['resposta'] = '

			<div class="chat-message-left mb-4">
			<div>
			<img src="assets/img/avatars/5.png" class="ui-w-40 rounded-circle" alt>
			<div class="text-muted small text-nowrap mt-2">'.$time.'</div>
			</div>
			<div class="flex-shrink-1 bg-lighter rounded py-2 px-3 ml-3">
			<div class="font-weight-semibold mb-1">'.$assistente_nome.'

			</div>
			Você adicionou a pergunta <b>'.$quest.'</b> com a resposta <i>'.$answer.'</i>
			</div>
			';
		}


		header("Content-Type: text/plain");
		echo json_encode($dados);

	}

	?>



