//limpar==================================================================
//Limpa o Chat comando [limpar]
function limpar(){

  document.getElementById("resposta").innerHTML=location.reload();

}
//========================================================================


//autoScroll==============================================================
//O chat desce automaticamente ao enviar uma mensagem 
function autoScroll(){

  $('#scroll').animate({scrollTop: $('#scroll')[0].scrollHeight}, 300);

}
//========================================================================


//enviaEnter==============================================================
//Envia a pergunta ao precionar a tecla [Enter]
function enviaEnter(){

  document.addEventListener('keydown', function (event) {

    if (event.keyCode !== 13) return;

    search(document.getElementById('pergunta').value);

  });
}
//========================================================================


//limpaCampo==============================================================
//Limpa o campo da caixa Enviar após enviar a pergunta
function limpaCampo(){

  $("#pergunta").val('');

}
//========================================================================


//search==================================================================
//retorna a resposta da assistente
function search(value) {

  if(document.getElementById('pergunta').value !== ''){

    $.post('page/busca_dados.php',{quest: value},function(data){

      var obj = jQuery.parseJSON( data );

      if(obj.quest == '[limpar]'){

        limpar();

      }else{

        $("#resposta").append(obj.resposta);

      }

    });

    autoScroll();

    limpaCampo();

  }

}

enviaEnter();
//========================================================================
