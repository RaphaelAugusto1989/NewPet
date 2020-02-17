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
                <li><a href="<?= site_url('Usuario_controller/CadastroDoUsuario');?>"><i class="fas fa-check-circle"></i> Dados Pessoais</a></li>
                <li><a href="<?= site_url('Usuario_controller/CadastrarEnderecoDoUsuario');?>"><i class="fas fa-check-circle"></i> Acesso ao Sistema</a></li>
                <li><a href="<?= site_url('Usuario_controller/CadastrarAcessoDoUsuario');?>"><i class="fas fa-check-circle"></i> Planos</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-8">   
        <div class="row">
            <div class="col-lg-12 pt-2">
                <h5 class="text-primary"> Dados Pessoais</h5>
            </div>
        </div>
        <form action="" method="post">
            <div class="form-row">
                <div class="col-lg-1">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input checkradio" id="checkedcpf" name="check" doc="cpf" checked>
                        <label class="custom-control-label" for="checkedcpf"> CPF</label>
                    </div>
                </div>
                <div class="col-lg-2" >
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input checkradio" id="checkedcnpj" name="check" doc="cnpj">
                        <label class="custom-control-label" for="checkedcnpj"> CNPJ</label>
                    </div>
                </div>
                <div class="col-lg-9"></div>
            </div>
            <div class="form-row">
                <div class="col-lg-4" id="cpf">
                    <label for="cpfcnpj" class="mb-0 mt-2">CPF:</label>
                    <input type="text" name="cpforcnpj" class="form-control cpf" id="" placeholder="000.000.000-00">
                </div>
                <div class="col-lg-4" id="cnpj" style="display: none;" >
                    <label for="cpfcnpj" class="mb-0 mt-2">CNPJ:</label>
                    <input type="text" name="cpforcnpj" class="form-control cnpj" id=""  placeholder="00.000.000/0000-00">
                </div>
                <div class="col-lg-8"></div>
            </div>  
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Nome do Usuário ou Empresa:</label>
                    <input type="text" name="" class="form-control" id="" placeholder="Nome do usuário ou nome da empresa">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4">
                    <label for="nascimento" class="mb-0 mt-2">Data de Nascimento:</label>
                    <input type="text" name="nascimento data" class="form-control data" id="" placeholder="00/00/0000">
                </div>
                <div class="col-lg-8">
                    <label for="email" class="mb-0 mt-2">E-mail:</label>
                    <input type="email" name="email" class="form-control" id="" placeholder="E-mail de contato">
                </div>
            </div>
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
                    <input type="text" name="cep" class="form-control cep" id="" placeholder="00.000-000">
                </div>
                <div class="col-lg-4 pt-4" style="font-size: 12px;">
                    <small id="passwordHelpInline" class="text-muted">
                        *Preenchimento automático.
                    </small>
                </div>
                <div class="col-lg-8"></div>
            </div>  
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Rua:</label>
                    <input type="text" name="rua" class="form-control" id="" placeholder="Rua">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-3">
                    <label class="mb-0 mt-2">Número:</label>
                    <input type="text" name="numero" class="form-control" id="" placeholder="">
                </div>
                <div class="col-lg-9">
                    <label class="mb-0 mt-2">Cidade:</label>
                    <input type="text" name="cidade" class="form-control" id="" placeholder="Cidadae">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-10">
                    <label class="mb-0 mt-2">Bairro:</label>
                    <input type="text" name="bairro" class="form-control" id="" placeholder="Bairro">
                </div>
                <div class="col-lg-2">
                    <label class="mb-0 mt-2">UF:</label>
                    <input type="text" name="estado" class="form-control" id="" placeholder="UF">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-12 mt-3 mb-4 pb-4 text-right">
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-save mr-2"></i> Salvar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-1 pr-0 mr-0"></div>
</div> <!-- FIM DIV CONTEÚDO -->
