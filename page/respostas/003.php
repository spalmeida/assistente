<?php 

$quest_search = $busca->select("perguntas", "pergunta_name = '$pergunta_name' ");
$quest_id = $quest_search[0]['id'];


$send_resposta['resposta_name']				=	$resposta_name;
$send_resposta['resposta_pergunta_id']		=	$quest_id;
$send_resposta['resposta_status']			=	0;
$send_resposta['user_id']					=	$system_user['0']['id'];
$send_resposta['aprovado']					=	1;
$send_resposta['reprovado']					=	0;

if(empty($busca->select("respostas", "resposta_name = '$resposta_name' "))){

//a assistente grava a pergunta e a resposta no banco de dados e retorna ambas no chat avisando que aprendeu
	$busca->Query("respostas", $send_resposta , "insert", "");

	$dados['resposta'] = '
	<div class="chat-message-left mb-4">
	<div>
	<img src="assets/img/avatars/assistente_green.png" class="ui-w-40 rounded-circle" alt>
	<div class="text-muted small text-nowrap mt-2">'.$time.'</div>
	</div>
	<div class="flex-shrink-1 bg-lighter rounded py-2 px-3 ml-3">
	<div class="font-weight-semibold mb-1">'.$assistente_nome.' <a href="#"><i title="Ensinar Mais" class="text-success fas fa-plus-circle"></i></a>

	</div>
	Certo agora vou responder <b>'.$_POST['send_answer'].'</b> quando me perguntar <b>'.$_POST['send_quest'].'</b>
	</div>
	<script type="text/javascript">
	autoScroll();
	</script>

	';
}else{
	$dados['resposta'] = '
	<div class="chat-message-left mb-4">
	<div>
	<img src="assets/img/avatars/assistente_red.png" class="ui-w-40 rounded-circle" alt>
	<div class="text-muted small text-nowrap mt-2">'.$time.'</div>
	</div>
	<div class="flex-shrink-1 bg-lighter rounded py-2 px-3 ml-3">
	<div class="font-weight-semibold mb-1">'.$assistente_nome.' <a href="#"><i title="Ensinar Mais" class="text-success fas fa-plus-circle"></i></a>

	</div>
	Ops! você já me ensinou a responder <b>'.$_POST['send_answer'].'</b> quando me pergunta <b>'.$_POST['send_quest'].'</b>
	</div>
	<script type="text/javascript">
	autoScroll();
	</script>

	';
}






?>