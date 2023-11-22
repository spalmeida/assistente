<?php $user_name = $system_user['0']['user_name']; ?>

<div class="layout-content">

  <div class="container-fluid d-flex align-items-stretch flex-grow-1 p-0">

    <div class="chat-wrapper container-p-x container-p-y">

      <div class="card flex-grow-1 position-relative overflow-hidden" style="height: 500px">

        <div class="row no-gutters h-100">

          <div class="d-flex col flex-column">

            <div class="flex-grow-0 py-3 pr-4 pl-lg-4">

              <div class="media align-items-center">
                <a href="javascript:void(0)" class="chat-sidebox-toggler d-lg-none d-block text-muted text-large px-4 mr-2"></a>

                <div class="position-relative">
                  <span class="badge badge-dot badge-success indicator"></span>
                  <img src="assets/img/avatars/5.png" class="ui-w-40 rounded-circle" alt="">
                </div>
                <div class="media-body pl-3">
                  <strong>ASSISTENTE - <?=$assistente[0]['assistente_name']; ?></strong>
                </div>
              </div>

            </div>
            <hr class="flex-grow-0 border-light m-0">

            <div class="flex-grow-1 position-relative">

              <div class="chat-messages chat-scroll p-4" id="scroll">

              	<!-- RETORNA A RESPOSTA -->


                  <div  id="resposta">                <div>
                  <div class="chat-message-left mb-4">
                    <div>
                      <img src="assets/img/avatars/5.png" class="ui-w-40 rounded-circle" alt>
                      <div class="text-muted small text-nowrap mt-2"><?=date('H:i'); ?></div>
                    </div>
                    <div class="flex-shrink-1 bg-lighter rounded py-2 px-3 ml-3">
                      <div class="font-weight-semibold mb-1">Lilly

                      </div>
                      <p>Olá, precisando é só chamar ;)</p>
                    </div>
                  </div>
                </div></div>

                </div>

              </div>

              <!-- Chat footer -->
              <hr class="border-light m-0">
              <div class="flex-grow-0 py-3 px-4">
                <div class="input-group">
                  <input type="text" class="form-control" id="pergunta" placeholder="Escreva sua Mensagem">
                  <div class="input-group-append">

                    <button type="button" class="btn btn-primary" onclick="search(document.getElementById('pergunta').value)">Enviar</button>
                  </div>
                </div>
              </div>
              <!-- / Chat footer -->

            </div>
          </div>

        </div>

      </div>

    </div>

  </div>