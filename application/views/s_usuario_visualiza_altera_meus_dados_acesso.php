<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

    $login = $senha = $tipo = $status = $logo = null;
    $statusAtivo = ' style="display: none;"';
    $titulo = "CADASTRO DO USUÁRIO";

    if(!empty($user)){
        $titulo = "ALTERAR DADOS DO USUÁRIO";
            
        foreach($user as $i => $us) {
            $idUsuario = $user[$i]->id_usuario;
            $login = $user[$i]->login_usuario;
            $senha = $user[$i]->senha_usuario;
            $tipo = $user[$i]->tipo_usuario;
            $status = $user[$i]->status_usuario;
            $logo = $user[$i]->img_usuario;
        }
    }
?>
<div class="row pt-3">         
    <div class="col-2"></div>
    <div class="col-8 text-center">
        <h3 class="text-center"><?= $titulo ?></h3>
    </div>
    <div class="col-1 pr-0 mr-0"></div>
</div>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8 text-right">
        <a href="#" class="btn btn-outline-primary" onclick="Voltar();"> <i class="fas fa-reply mr-2"></i> Voltar</a>
    </div>
    <div class="col-2 pr-0 mr-0"></div>
</div>
<div class="row">  
    <div class="col-2"></div>
    <div class="col-8">   
        <div class="row">
            <div class="col-lg-12 pt-2">
                <h5 class="text-primary"> Dados de Acesso</h5>
            </div>
        </div>
        <form action="<?= site_url('Usuario/GravaDadosDoUsuario')?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $idUsuario; ?>">
            <input type="hidden" name="cpf" value="<?= $cpf_cnpj_usuario; ?>">
            <input type="hidden" name="nome" value="<?= $nome_empresa_usuario; ?>">
            <input type="hidden" name="responsavel" value="<?= $responsavel_empresa_usuario; ?>">
            <input type="hidden" name="nascimento" value="<?= $nascimento_usuario; ?>">
            <input type="hidden" name="email_usuario" value="<?= $email_usuario; ?>">
            <input type="hidden" name="fixo" value="<?= $fixo_usuario; ?>">
            <input type="hidden" name="celular" value="<?= $celular_usuario; ?>">
            <input type="hidden" name="cep" value="<?= $cep_usuario; ?>">
            <input type="hidden" name="rua" value="<?= $rua_usuario; ?>">
            <input type="hidden" name="numero" value="<?= $num_usuario; ?>">
            <input type="hidden" name="bairro" value="<?= $bairro_usuario; ?>">
            <input type="hidden" name="cidade" value="<?= $cidade_usuario; ?>">
            <input type="hidden" name="estado" value="<?= $estado_usuario; ?>">
            <input type="hidden" name="complemento" value="<?= $complemento_usuario; ?>">
            <?php
                if($logo == null) {
            ?>
            <div class="form-row">
                <div class="col-10">
                    <label class="">Logo:</label>
                    <input type="file" name="logo" id="files" class="form-control input-group-sm col-12" accept="image/*" >
                </div>
                <div class="col-2 text-right">
                <output id="list"></output>
                </div>
            </div>
            <?php
                } else {
                    echo "";
                }
            ?>
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Login:</label>
                    <input type="text" name="login" class="form-control" id="" placeholder="Login do Usuário" value="<?= $login; ?>">
                </div>
            </div>
            <?php
                if ($senha == null) {
            ?>
            <div class="form-row align-items-center">
                <div class="col-10">
                    <label for="nascimento" class="mb-0 mt-2">Senha:</label>
                    <div class="input-group-prepend">
                        <input type="password" name="password" class="form-control border-right-0" id="password" placeholder="Senha" required>
                        <div class="input-group-append border-left-0">
                            <a href="#" class="input-group-text bg-white border border-left-0 btn btn-link" id="showPassword" title="Mostrar Senha" style="text-decoration: none;"><i class="fas fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-2 pt-4">
                    <a href="javascript:geraPassword(this);" class="btn btn-outline-warning btn-block mt-2"><i class="fas fa-key"></i>  Gerar Senha</a>
                </div>
            </div>
            <?php
                } 
            ?>
            <div class="form-row">
                <div class="col-10">
                    <label for="perfil" class="mb-0 mt-2">Perfil do Usuário:</label>
                    <select name="perfil" class="form-control custom-select" id="">
                        <option disable   <?php if($tipo == null){echo 'selected';}?>> -- </option>
                        <option value="1" <?php if($tipo == '1'){echo 'selected';}?>> *Administrador do Sistema</option>
                        <option value="2" <?php if($tipo == '2'){echo 'selected';}?>> *Consultor do Sistema</option>
                        <option value="3" <?php if($tipo == '3'){echo 'selected';}?>> Clinica Veterinária</option>
                        <option value="4" <?php if($tipo == '4'){echo 'selected';}?>> PetShop</option>
                        <option value="5" <?php if($tipo == '5'){echo 'selected';}?>> Personalizado</option>
                    </select>
                </div>
                <div class="col-2">
                    <label class="mb-0 mt-2 mb-2">Status:</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="status" class="custom-control-input" value="1" id="ativo" <?php if ($status == '1') { echo "checked"; } else { echo "";} ?>>
                        <label class="custom-control-label" for="ativo">
                            <span id="ativado" <?php if ($status == null) { echo "style='display: none;'"; } elseif ($status == '0') { echo "style='display: none;'"; }?> >Ativado</span>
                            <span id="desativado" <?php if ($status == '1') { echo "style='display: none;'"; }?>>Desativado</span>
                        </label>

                    </div>
                </div>
            </div>
            <?php
                if ($senha != null ) {
            ?>
            <div class="form-row">
                <div class="col-12 mt-2">
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAlteraSenha" title="Alterar Senha"><i class="fas fa-key"></i>  Alterar Senha</a>
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAlteraLogo" title="Alterar Senha"><i class="fas fa-image"></i>  Alterar Logo</a>
                </div>
            </div>
            <?php
                }
            ?>
            <!--
            <div class="form-row">
                <div class="col">
                    <label for="email" class="mb-0 mt-2">Permissões:</label>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Agendamentos</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Clientes</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Caixa</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Estoque</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Fornecedores</label>
                    </div>
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Financeiro</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Veterinária</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Funcionários</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Relatórios</label>
                    </div>
                </div>
                <div class="col"> </div>
            </div>
            <div class="form-row mt-2">
                <div class="col"> </div>
            </div> 
            <div class="form-row mt-2">
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Usuários do Sistema</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Planos do Sistema</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Relatórios do Sistema</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2"> </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox mr-sm-2"> </div>
                </div>
            </div>
            -->

            <div class="form-row">
                <div class="col-lg-12 mt-3 mb-4 pb-4 text-right">
                 <!-- SE NÃO EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO SALVAR -->
                    <?php 
                        if ($login == null) {
                    ?>
                    <a href="<?= site_url('Usuario/UsuariosCadastrados'); ?>" class="btn btn-outline-danger padbutton"> <i class="fas fa-times"></i> Cancelar</a>
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-save mr-2"></i> Salvar</button>
                    <!-- SE EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO ALTERAR -->
                    <?php 
                        } else {
                    ?>
                    <a href="<?= site_url('Usuario/UsuariosCadastrados'); ?>" class="btn btn-outline-danger padbutton"> <i class="fas fa-times"></i> Cancelar</a>
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-edit mr-2"></i> Alterar</button>
                    <!-- SE MSG FOR TRUE MOSTRAR BOTÃO PRÓXIMO -->
                    <!-- <a href="<?= site_url('Usuario/PlanoDoUsuario'); ?>" class="btn btn-success padbutton"> Próximo <i class="fas fa-arrow-right ml-2"></i></a> -->
                    <?php 
                      }
                    ?>
                </div>
            </div>
        </form>
    </div>
    <div class="col-2 pr-0 mr-0"></div>
</div> <!-- FIM DIV CONTEÚDO -->

<!-- MODAL FORM ALTERAR SENHA -->
<div class="modal fade" id="modalAlteraSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content border border-primary">
        <div class="modal-header border-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= site_url('Usuario/AlteraSenhaUsuario')?>" method="post" enctype="multipart/form-data">
            <div class="modal-body border-0 text-center">
                <div class="form-row align-items-center">
                    <div class="col-12">
                        <label for="nascimento" class="mb-0"><h5>ALTERAR SENHA</h5></label>
                            <div class="input-group-prepend mt-4">
                                <input type="hidden" name="id" value="<?= $idUsuario; ?>">
                                <input type="password" name="password" class="form-control border-right-0" id="password" placeholder="Senha" required>
                                <div class="input-group-append border-left-0">
                                    <a href="#" class="input-group-text bg-white border border-left-0 btn btn-link" id="showPassword" title="Mostrar Senha" style="text-decoration: none;"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-12">
                        <a href="javascript:geraPassword(this);" class="btn btn-outline-warning btn-block mt-2"><i class="fas fa-key"></i>  Gerar Senha</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center border-0">
                <button type="submit" class="btn btn-primary pl-5 pr-5"><i class="fas fa-edit mr-2"></i>Alterar</button>
                <button type="button" class="btn btn-outline-danger pl-5 pr-5" data-dismiss="modal"><i class="fas fa-times"></i>  Cancelar</button>
            </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL FORM ALTERAR LOGO -->
<div class="modal fade" id="modalAlteraLogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border border-primary">
        <div class="modal-header border-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= site_url('Usuario/AlteraLogoUsuario')?>" method="post" enctype="multipart/form-data">
            <div class="modal-body border-0 text-center">
                <div class="form-row align-items-center">
                    <div class="col-12">
                        <label for="nascimento" class="mb-0"><h5>ALTERAR LOGO</h5></label>
                            <div class="input-group-prepend mt-4">
                                <input type="hidden" name="id" value="<?= $idUsuario; ?>">
                                <input type="file" name="logo" id="files" class="form-control input-group-sm col-12" accept="image/*">
                            </div>
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-12">
                        <output id="list"></output>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 align-self-center">
                <button type="submit" class="btn btn-primary align-self-center pl-5 pr-5"><i class="fas fa-edit mr-2"></i>Alterar</button>
                <button type="button" class="btn btn-outline-danger pl-5 pr-5" data-dismiss="modal"><i class="fas fa-times"></i>  Cancelar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<script>
    //MOSTRA UPLOAD DA IMAGEM DO USUÁRIO
    function handleFileSelect(evt) {
        var files = evt.target.files; //Objeto FileList

        //Faz um loop pelo FileList e renderiza os arquivos de imagem como miniaturas.
        for (var i = 0, f; f = files[i]; i++) {

        //Processa apenas arquivos de imagem.
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();

        //Fechamento para capturar as informações do arquivo.
        reader.onload = (function(theFile) {
            return function(e) {

            //Renderizar miniatura.
            var span = document.createElement('span');
            span.innerHTML = ['<img class="thumb" src="', e.target.result,
                                '" title="', escape(theFile.name), '"/>'].join('');
            document.getElementById('list').insertBefore(span, null);
            };
        })(f);

        //Leia o arquivo de imagem como um URL de dados.
        reader.readAsDataURL(f);
        }
    }

    document.getElementById('files').addEventListener('change', handleFileSelect, false);

</script>

