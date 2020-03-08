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
                <h5 class="text-primary"> Plano do Usuário</h5>
            </div>
        </div>
        <form action="" method="post">
            <div class="form-row">
                <div class="col-lg-12 mt-3 mb-4 pb-4 text-right">
                    <!-- SE NÃO EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO SALVAR -->
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-save mr-2"></i> Salvar</button>
                    <!-- SE EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO ALTERAR -->
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-edit mr-2"></i> Alterar</button>
                    <!-- SE MSG FOR TRUE MOSTRAR BOTÃO PRÓXIMO -->
                    <a href="<?= site_url('Cliente/CadastraPet'); ?>" class="btn btn-success padbutton"><i class="fas fa-check mr-2"></i> Finalizar </a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-1 pr-0 mr-0"></div>
</div> <!-- FIM DIV CONTEÚDO -->
