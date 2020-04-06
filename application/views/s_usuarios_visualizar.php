<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- INICIO DIV CONTEÚDO -->
    <div class="row pt-3">
        <div class="col-12 pb-4">
            <h3 class="text-center">USUÁRIOS CADASTRADOS</h3>
        </div>
    </div> 
    <div class="row"> 
        <div class="col-1"></div>
        <div class="col-10">
            <div class="row mt-4 mb-3">
                <div class="col-lg-7 ">
                    <a href="<?= site_url('Usuario/CadastroDeUsuario')?>" class="btn btn-success"><i class="fas fa-plus mr-1"></i> Novo Usuário</a>
                </div>
                <div class="col-lg-5">
                    <form action="" method="post">
                        <div class="input-group mb-3 float-right">
                            <input type="text" class="form-control" placeholder="Procurar por Nome CPF ou CNPJ" aria-label="Procurar por Nome CPF ou CNPJ" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i> Procurar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-4 mb-3">
                <div class="col-lg-7 ">
                </div>
                <div class="col-lg-5 text-right">
                    <?= $qtdUser?> Usuários Cadastrados
                </div>
            </div>
            <?php
                if ($this->session->flashdata('Success') !="") {
                    echo "<p class='alert alert-success text-center'><i class='fas fa-check-circle'></i> " .$msg. "</p>";
                } elseif ($this->session->flashdata('Error') !="") {
                    echo "<p class='alert alert-danger text-center'><i class='fas fa-exclamation-circle'></i> " .$msg. "</p>";
                }
            ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 35%;">NOME/EMPRESA</th>
                        <th style="width: 15%;">CPF/CNPJ</th>
                        <th style="width: 25%;">EMAIL</th>
                        <th style="width: 15%;">TELEFONE</th>
                        <th style="width: 10%;" class="text-center">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($qtdUser == '0') {
                    echo "<tr>";
                    echo "<td colspan='5' class='text-center'> NENHUM USUÁRIO CADASTRADO NO MOMENTO! :( </td>";
                    echo "</tr>";
                } else {
                    foreach($user as $i => $us) {
                ?>
                    <tr>
                        <td><?= $user[$i]->nome_empresa_usuario ?></td>
                        <td><?= $user[$i]->cpf_cnpj_usuario ?></td>
                        <td><?= $user[$i]->email_usuario ?></td>
                        <td><?= $user[$i]->fixo_usuario ?></td>
                        <td class="text-center">
                            <a href="<?= site_url('Usuario/CadastroDeUsuario/'.$user[$i]->id_usuario); ?>" class="btn btn-outline-warning" title="ALTERAR"><i class="far fa-file-alt"></i></a>
                            <a href="#" class="btn btn-outline-danger btnExcluir" data-toggle="modal" data-target="#modalExcluir" data-nome="<?php echo $user[$i]->nome_empresa_usuario ?>" data-id="<?= $user[$i]->id_usuario ?>" data-whatever="<?= $user[$i]->nome_empresa_usuario ?>" title="EXCLUIR"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php
                }
                    }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
<!-- FIM DIV CONTEÚDO -->

<!-- MODAL MENSAGEM EXCLUSÃO -->
<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body border-0 text-center">
        <h4> Deseja realmente excluir usuário, <br /> <b>"<span id="recipient-name"></span>"</b>? </h4>
      </div>
      <div class="modal-footer align-self-center">
        <a id="linkExclusao" href="#" class="btn btn-primary pl-5 pr-5" >Sim</a>
        <button type="button" class="btn btn-secondary pl-5 pr-5" data-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>