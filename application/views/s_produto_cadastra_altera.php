<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">         
    <div class="col-2"></div>
    <div class="col-8 text-center">
        <h3 class="text-center">Cadastro de Produto</h3>
    </div>
    <div class="pr-0 mr-0 col-2"></div>
</div>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8 text-right">
        <a href="#" class="btn btn-outline-primary" onclick="Voltar();"> <i class="fas fa-reply mr-2"></i> Voltar</a>
    </div>
    <div class="col-2 pr-0 mr-0"></div>
</div>
<div class="row">  
    <div class="col-2">
        <!-- <nav class="col-12 sidebar">
            <ul class="list-unstyled">
                <li><a href="<?= site_url('Cliente/CadastraCliente'); ?>"><i class="fas fa-money-check-alt"></i> Dados Cadastrais</a></li>
                <li><a href="<?= site_url('Cliente/CadastraPet'); ?>"><i class="fas fa-paw"></i> Pets</a></li>
            </ul>
        </nav> -->
    </div>
    <div class="col-8">   
        <div class="row">
            <div class="col-lg-12 pt-2">
                <h5 class="text-primary"> Dados do Produto</h5>
            </div>
        </div>
        <form action="" method="post">
            <div class="form-row">
                <div class="col-lg-4">
                    <label for="codigo" class="mb-0 mt-2">Código:</label>
                    <input type="text" name="codigo" class="form-control" id="" placeholder="Código do Produto"  maxlength="6" onkeypress="return somenteNumeros(event)">
                </div>
                <div class="col-lg-8"></div>
            </div> 
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Nome:</label>
                    <input type="text" name="" class="form-control" id="" placeholder="Nome do Produto">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Código de Barras:</label>
                    <input type="text" name="" class="form-control" id="" placeholder="Código de barras do produto" onkeypress="return somenteNumeros(event)">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4">
                    <label for="" class="mb-0 mt-2">Tipo de Produto:</label>
                    <input type="text" name="" class="form-control" id="" placeholder="Tipo de Produto">
                </div>
                <div class="col-lg-4">
                    <label for="" class="mb-0 mt-2">Quantidade:</label>
                    <input type="text" name="" class="form-control" id="" placeholder="Quantidade de Produto" onkeypress="return somenteNumeros(event)">
                </div>
                <div class="col-lg-4">
                    <label for="" class="mb-0 mt-2">Valor por unidade:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="text" name="" class="form-control moeda" id="" placeholder="0,00">
                    </div>
                </div>
            </div> 

            <div class="form-row">
                <div class="col-lg-12">
                    <label class="mb-0 mt-2">Especificações:</label>
                    <textarea name="obs" class="form-control" id="" cols="30" rows="4"></textarea>
                </div>
            </div> 
            <div class="form-row">
                <div class="col-lg-12 mt-3 mb-4 pb-4 text-right">
                    <!-- SE NÃO EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO SALVAR -->
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-save mr-2"></i> Salvar</button>
                    <!-- SE EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO ALTERAR -->
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-edit mr-2"></i> Alterar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-2 pr-0 mr-0"></div>
</div> <!-- FIM DIV CONTEÚDO -->
