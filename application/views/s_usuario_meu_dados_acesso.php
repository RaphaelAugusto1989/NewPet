<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">         
    <div class="col-2"></div>
    <div class="col-8 text-center">
        <h3 class="text-center">Meus Dados</h3>
    </div>
    <div class="col-2 pr-0 mr-0"></div>
</div>
<div class="row">
    <div class="col-3"></div>
    <div class="col-8 text-right">
        <a href="#" class="btn btn-outline-primary" onclick="Voltar();"> <i class="fas fa-reply mr-2"></i> Voltar</a>
    </div>
    <div class="col-1 pr-0 mr-0"></div>
</div>
<div class="row"> 
    <div class="col-2"></div> 
    <div class="col-8">   
        <div class="row">
            <div class="col-lg-12 pt-2">
                <h5 class="text-primary"> Meus Dados de Acesso</h5>
            </div>
        </div>
        <form action="" method="post">
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Login:</label>
                    <input type="text" name="" class="form-control" id="" placeholder="Login do Usuário">
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
                <div class="col-lg-12 mt-3 mb-4 pb-4 text-right">
                    <!-- SE EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO ALTERAR -->
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-edit mr-2"></i> Alterar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-2 pr-0 mr-0"></div>
</div> <!-- FIM DIV CONTEÚDO -->

