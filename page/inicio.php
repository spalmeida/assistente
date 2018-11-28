<div class="layout-content">

  <!-- Content -->
  <div class="container-fluid d-flex align-items-stretch flex-grow-1 p-0">

    <!-- `.chat-wrapper` fills all available space of container -->
    <div class="chat-wrapper container-p-x container-p-y">

      <!-- Make card full height of `.chat-wrapper` -->
      <div class="card flex-grow-1 position-relative overflow-hidden" style="height: 500px">

        <!-- Make row full height of `.card` -->
        <div class="row no-gutters h-100">

          <div class="d-flex col flex-column">

            <!-- Chat header -->
            <div class="flex-grow-0 py-3 pr-4 pl-lg-4">

              <div class="media align-items-center">
                <a href="javascript:void(0)" class="chat-sidebox-toggler d-lg-none d-block text-muted text-large px-4 mr-2"></a>

                <div class="position-relative">
                  <span class="badge badge-dot badge-success indicator"></span>
                  <img src="assets/img/avatars/5.png" class="ui-w-40 rounded-circle" alt="">
                </div>
                <div class="media-body pl-3">
                  <strong>SECRETARIA - <?=$assistente[0]['assistente_name']; ?></strong>
                </div>
              </div>

            </div>
            <hr class="flex-grow-0 border-light m-0">
            <!-- / Chat header -->

            <!-- Wrap `.chat-scroll` to properly position scroll area. Remove this wtapper if you don't need scroll -->
            <div class="flex-grow-1 position-relative">

              <!-- Remove `.chat-scroll` and add `.flex-grow-1` if you don't need scroll -->
              <div class="chat-messages chat-scroll p-4" id="scroll">

              	<!-- RETORNA A RESPOSTA -->
                <div  id="resposta"></div>
                <!-- FIM - RETORNA A RESPOSTA -->

              </div><!-- / .chat-messages -->
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
        </div><!-- / .row -->

      </div><!-- / .card -->

    </div><!-- / .chat-wrapper -->

  </div>
  <!-- / Content -->

  <!-- Layout footer -->

  <!-- / Layout footer -->

</div>
<script type="text/javascript">
		function Envia_Pergunta(key) {
			var chave = key;
			alert(chave);
			

			}
			</script>