<?php 

$pergunta = $busca->Fetchall("perguntas");


 ?>

<div class="layout-content">

          <!-- Content -->
          <div class="container-fluid flex-grow-1 container-p-y">

            <!-- DataTable within card -->

            <div class="card">
              <h6 class="card-header">
                STATUS DAS PERGUNTAS
              </h6>
              <div class="card-datatable table-responsive">
                <table class="datatables-demo table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Pergunta</th>
                      <th>Resposta</th>
                      <th>Status</th>
                      <th>STATUS</th>
                      <th>VER</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pergunta as $value) { 
                      $pergunta_id = $value['id'];
                      $resposta = $busca->select("respostas", "resposta_pergunta_id = '$pergunta_id'")
                      ?>
                      <tr class="odd gradeX">
                      <td><?=$value['id'] ?></td>
                      <td><?=$value['pergunta_name'] ?></td>
                      <?php 

                      if(!empty($resposta)){
                        echo "<td>".$resposta[0]['resposta_name']."</td>";
                      }else{
                        echo '<td align="center" class="text-danger">NÃO RESPONDIDA</td>';
                      }

                      ?>
                      <td><?=$value['pergunta_status'] ?></td>
                      <td>Trident</td>
                      <td>Trident</td>
                      </tr>
                      <?php } ?>
                    
                  </tbody>
                </table>
              </div>
            </div>

          </div>
          <!-- / Content -->

          <!-- Layout footer -->
          <nav class="layout-footer footer bg-footer-theme">
            <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
              <div class="pt-3">
                <span class="footer-text font-weight-bolder">Appwork</span> ©
              </div>
              <div>
                <a href="javascript:void(0)" class="footer-link pt-3">About Us</a>
                <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Help</a>
                <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Contact</a>
                <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Terms &amp; Conditions</a>
              </div>
            </div>
          </nav>
          <!-- / Layout footer -->

        </div>