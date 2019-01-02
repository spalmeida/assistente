<?php 

$dados['resposta'] = '

		<div class="chat-message-right mb-4">
		<div>
		<img src="assets/img/avatars/1.png" class="ui-w-40 rounded-circle" alt>
		<div class="text-muted small text-nowrap mt-2">'.$time.'</div>
		</div>
		<div class="flex-shrink-1 bg-lighter rounded py-2 px-3 mr-3">
		<div class="font-weight-semibold mb-1">'.$user_name.'</div>
		'.htmlspecialchars($quest).'
		</div>
		</div>

		<div class="chat-message-left mb-4">
		<div>
		<img src="assets/img/avatars/assistente_red.png" class="ui-w-40 rounded-circle" alt>
		<div class="text-muted small text-nowrap mt-2">'.$time.'</div>
		</div>
		<div class="flex-shrink-1 bg-lighter rounded py-2 px-3 ml-3">
		<div class="font-weight-semibold mb-1">'.$assistente_nome.'

		</div>
		<p align="center">Ops, Estou Perdida <i class="far fa-frown"></i> pode me ajudar?</p>
		<div  align="center">
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#'.$key.'">Ajudar Assistente <i class="fas fa-chalkboard-teacher"></i></button>
		</div>
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
		<p align="center"><img src="assets/img/avatars/assistente_red.png" class="ui-w-100 rounded-circle" alt></p>
		<label class="form-label"><h5>Desculpe <?=$user_name ?>, ainda não sei responder a isso, mas preparei um formulário para que possa me ensinar ;)</h5></label>

		<label class="form-label">Quando você perguntar</label>
		<fieldset disabled="">
		<input name="'.$key.'pergunta" id="'.$key.'pergunta" type="text" class="form-control" placeholder="Informe o texto da pergunta" value="'.$quest.'">
		</fieldset>
		<br>
		<label class="form-label">Como devo responder?</label>
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

    '." $.post('page/send_quest.php',{send_quest: pergunta.value, send_answer: resposta.value},function(data){ ".'

      var obj = jQuery.parseJSON( data );

        $("#resposta").append(obj.resposta);

    });

		}
	}
	</script>


	';

?>