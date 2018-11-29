function nada(){
      alert("oi");
    }


//search==================================================================
//retorna a resposta da assistente
function send_quest(quest, answer) {

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
