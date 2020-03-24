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
                <h5 class="text-primary"> Dados Pessoais</h5>
            </div>
        </div>
        <form action="<?= site_url('Usuario/GravaDadosPessoaisUsuario')?>" method="post">
            <div class="form-row">
                <div class="col-lg-1">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input checkradio" id="checkedcpf" name="check" doc="cpf" value="1" checked>
                        <label class="custom-control-label" for="checkedcpf"> CPF</label>
                    </div>
                </div>
                <div class="col-lg-2" >
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input checkradio" id="checkedcnpj" name="check" doc="cnpj" value="2">
                        <label class="custom-control-label" for="checkedcnpj"> CNPJ</label>
                    </div>
                </div>
                <div class="col-lg-9"></div>
            </div>
            <!-- INICIO DIV CAMPOS CPF -->
            <div id="cpf"> 
                <div class="form-row">
                    <div class="col-lg-4">
                        <label for="cpfcnpj" class="mb-0 mt-2">CPF:</label>
                        <input type="text" name="cpf" class="form-control cpf" id="" placeholder="000.000.000-00">
                    </div>
                    <div class="col-lg-8"></div>
                </div> 
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="" class="mb-0 mt-2">Nome Completo:</label>
                        <input type="text" name="nome" class="form-control" id="" maxlength="500" placeholder="Nome Completo do Usuário">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4">
                        <label for="nascimento" class="mb-0 mt-2">Data de Nascimento:</label>
                        <input type="text" name="nascimento" class="form-control data" id="" placeholder="00/00/0000">
                    </div>
                    <div class="col-lg-8">
                        <label for="email" class="mb-0 mt-2">E-mail:</label>
                        <input type="email" name="email" class="form-control" id="" maxlength="200" placeholder="E-mail de contato">
                    </div>
                </div> 
            </div>
            <!-- FIM DIV CAMPOS CPF -->
            <!-- INICIO DIV CAMPOS CNPJ -->
            <div  id="cnpj" style="display: none;">
                <div class="form-row">
                    <div class="col-lg-4">
                        <label for="cpfcnpj" class="mb-0 mt-2">CNPJ:</label>
                        <input type="text" name="cnpj" class="form-control cnpj" id=""  placeholder="00.000.000/0000-00">
                    </div>
                    <div class="col-lg-8"></div>
                </div> 
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="" class="mb-0 mt-2">Nome da Empresa:</label>
                        <input type="text" name="empresa" class="form-control" id="" maxlength="300" placeholder="Nome da empresa">
                    </div>
                </div> 
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="" class="mb-0 mt-2">Responsável:</label>
                        <input type="text" name="responsavel" class="form-control" id="" maxlength="300" placeholder="Nome do Responsável">
                    </div>
                </div> 
                <div class="form-row">
                    <div class="col-lg-12">
                        <label for="email" class="mb-0 mt-2">E-mail:</label>
                        <input type="email" name="email" class="form-control" id="" maxlength="200" placeholder="E-mail de contato">
                    </div>
                </div>
            </div>
            <!-- INICIO DIV CAMPOS CNPJ -->
            <div class="form-row">
                <div class="col-lg-6">
                    <label for="fixo" class="mb-0 mt-2">Telefone Fixo:</label>
                    <input type="text" name="fixo" class="form-control fixo" id="" placeholder="(99) 9999-9999">
                </div>
                <div class="col-lg-6">
                    <label for="celular" class="mb-0 mt-2">Celular:</label>
                    <input type="text" name="celular" class="form-control cel" id="" placeholder="(99) 99999-9999">
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-lg-12 pt-4">
                    <h5 class="text-primary"> Endereço</h5>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4">
                    <label class="mb-0 mt-2">CEP:</label>
                    <input type="text" name="cep" class="form-control cep" id="cep" placeholder="00.000-000">
                </div>
                <div class="col-lg-8"></div>
            </div> 
            <small id="passwordHelpInline" class="text-muted">
                *Digite o CEP e ao sair do campo o endereço será preenchido automáticamente. Pode utilizar a tecla TAB após digitar o CEP.
            </small> 
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Rua:</label>
                    <input type="text" name="rua" class="form-control" id="rua" placeholder="Rua">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-3">
                    <label class="mb-0 mt-2">Número:</label>
                    <input type="text" name="numero" class="form-control" id="" placeholder="" maxlength="5" onkeypress="return somenteNumeros(event)">
                </div>
                <div class="col-lg-9">
                    <label class="mb-0 mt-2">Cidade:</label>
                    <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Cidadae">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-10">
                    <label class="mb-0 mt-2">Bairro:</label>
                    <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Bairro">
                </div>
                <div class="col-lg-2">
                    <label class="mb-0 mt-2">UF:</label>
                    <input type="text" name="estado" class="form-control" id="uf"  maxlength="2" placeholder="UF">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Complemento:</label>
                    <input type="text" name="complemento" class="form-control" id="" maxlength="500" placeholder="Complemento">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-12 mt-3 mb-4 pb-4 text-right">                    
                    <!-- SE NÃO EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO SALVAR -->
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-save mr-2"></i> Salvar</button>
                    <!-- SE EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO ALTERAR -->
                    <!-- <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-edit mr-2"></i> Alterar</button> -->
                    <!-- SE MSG FOR TRUE MOSTRAR BOTÃO PRÓXIMO -->
                    <a href="<?= site_url('Usuario/CadastrarAcessoDoUsuario'); ?>" class="btn btn-success padbutton"> Próximo <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-1 pr-0 mr-0"></div>
</div> <!-- FIM DIV CONTEÚDO -->
