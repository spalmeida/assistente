<?php 

$busca->Query("perguntas", $send_pergunta , "insert", "");

$pergunta_select_id = $busca->selectDefault("perguntas","id", "LAST_INSERT_ID()");
$ultima_id_pergunta = end($pergunta_select_id);

$send_resposta['resposta_name']				=	$resposta_name;
$send_resposta['resposta_pergunta_id']		=	$ultima_id_pergunta['id'];
$send_resposta['resposta_status']			=	"";
$send_resposta['user_id']					=	$system_user['0']['id'];
$send_resposta['like']						=	1;
$send_resposta['deslike']					=	0;

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

?>