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
//====================================
	//aqui a assistente verifica se a pergunta existe no banco de dados
	$pergunta = $busca->select("perguntas", "pergunta_name = '$quest'");
//====================================
	$dados['quest'] = $quest;

//001 - QUANDO A PERGUNTAR NÃO EXISTIR
	if(empty($pergunta)){

		require_once("perguntas/001.php");
//FIM - 001	

//A PERGUNTA EXISTE ENTÃO ELA RETORNA UMA RESPOSTA ALEATÓRIA	
}elseif($pergunta[0]['pergunta_name'] == $quest or $pergunta[0]['pergunta_name'] !== $quest){

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
	<div class="font-weight-semibold mb-1">'.$assistente_nome.' <a href="#" data-toggle="modal" data-target="#'.$key.'"><i title="Ensinar Mais" class="text-success fas fa-plus-circle"></i></a>

	</div>
	'.$resposta[0]["resposta_name"].'
	</div>

	<div class="modal fade" id="'.$key.'">
		<div class="modal-dialog">
		<form class="modal-content">

		<div class="modal-header">
		<h5 class="modal-title">
		Me ajude a responder
		</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
		</div>

		<div class="modal-body">
		<div class="form-row">
		<div class="form-group col">
		<p align="center"><img src="assets/img/avatars/assistente_green.png" class="ui-w-100 rounded-circle" alt></p>
		<label class="form-label"><h5>Ual, Estou pronta para aprender ainda mais ;)</h5></label>
		<br>
		<label class="form-label">Quando você perguntar</label>
		<fieldset disabled="">
		<input name="'.$key.'pergunta" id="'.$key.'pergunta" type="text" class="form-control" placeholder="Informe o texto da pergunta" value="'.$quest.'">
		</fieldset>
		<br>
		<label class="form-label">Também posso responder...</label>
		<input name="'.$key.'resposta" id="'.$key.'resposta"  type="text" class="form-control" placeholder="Informe o texto da resposta">
		</div>
		</div>
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		<button type="button" onClick="SendQuest(document.getElementById('.$key.'pergunta), document.getElementById('.$key.'resposta))"  data-dismiss="modal" class="btn btn-success">Ensinar <i class="fas fa-chalkboard-teacher"></i></button>
		</div>
		</form>
		</div>
		</div>

		<script type="text/javascript">

		function SendQuest(value){
			'."var pergunta  = document.getElementById('".$key."pergunta');".'
			'."var resposta  = document.getElementById('".$key."resposta');".'


			'."if(resposta !== ''){".'

    '." $.post('page/update_quest.php',{send_quest: pergunta.value, send_answer: resposta.value},function(data){ ".'

      var obj = jQuery.parseJSON( data );

        $("#resposta").append(obj.resposta);

    });

		}
	}
	</script>
	';
}

header("Content-Type: text/plain");
echo json_encode($dados);

}

?>