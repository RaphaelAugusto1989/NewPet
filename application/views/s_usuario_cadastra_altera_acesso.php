<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">         
    <div class="col-3"></div>
    <div class="col-8 text-center">
        <h3 class="text-center">Cadastro de Usuário</h3>
    </div>
    <div class="pr-0 mr-0 col-1"></div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-8 text-right">
        <a href="#" class="btn btn-outline-primary" onclick="Voltar();"> <i class="fas fa-reply mr-2"></i> Voltar</a>
    </div>
    <div class="col-1 pr-0 mr-0"></div>
</div>
<div class="row">  
    <div class="col-3">
        <nav class="col-12 sidebar">
            <ul class="list-unstyled">
                <li><a href="<?= site_url('Usuario/CadastroDeUsuario');?>"><i class="fas fa-check-circle"></i> Dados Pessoais</a></li>
                <li><a href="<?= site_url('Usuario/CadastrarAcessoDoUsuario');?>"><i class="fas fa-check-circle"></i> Acesso ao Sistema</a></li>
                <li><a href="<?= site_url('Usuario/PlanoDoUsuario');?>"><i class="fas fa-check-circle"></i> Planos</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-8">   
        <div class="row">
            <div class="col-lg-12 pt-2">
                <h5 class="text-primary"> Dados de Acesso</h5>
            </div>
        </div>
        <form action="<?= site_url('Usuario/GravaDadosAcessoDoUsuario')?>" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="custom-file">
                    <input type="file" name="logo" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Logo do Usuário:</label>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Login:</label>
                    <input type="text" name="login" class="form-control" id="" placeholder="Login do Usuário">
                </div>
            </div>
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
                    <a href="" class="btn btn-outline-warning mt-2"> Gerar Senha</a>
                </div>
            </div>
            <div class="form-row">
                <div class="col-10">
                    <label for="email" class="mb-0 mt-2">Perfil do Usuário:</label>
                    <select name="perfil" class="form-control custom-select" id="">
                        <option selected disable> -- </option>
                        <option value="1"> *Administrador do Sistema</option>
                        <option value="2"> *Consultor do Sistema</option>
                        <option value="3"> Clinica Veterinária</option>
                        <option value="4"> PetShop</option>
                        <option value="5"> Personalizado</option>
                    </select>
                </div>
                <div class="col-2">
                    <label class="mb-0 mt-2 mb-2">Status:</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="status" class="custom-control-input" value="1" id="ativo">
                        <label class="custom-control-label" for="ativo">
                            <span id="ativado" style="display: none;">Ativado</span>
                            <span id="desativado">Desativado</span>
                        </label>
                    </div>
                </div>
            </div>
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
                <div class="col"> </div>
            </div>
            <div class="form-row">
                <div class="col-lg-12 mt-3 mb-4 pb-4 text-right">
                    <!-- SE NÃO EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO SALVAR -->
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-save mr-2"></i> Salvar</button>
                    <!-- SE EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO ALTERAR -->
                    <!-- <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-edit mr-2"></i> Alterar</button> -->
                    <!-- SE MSG FOR TRUE MOSTRAR BOTÃO PRÓXIMO -->
                    <a href="<?= site_url('Usuario/PlanoDoUsuario'); ?>" class="btn btn-success padbutton"> Próximo <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-1 pr-0 mr-0"></div>
</div> <!-- FIM DIV CONTEÚDO -->

