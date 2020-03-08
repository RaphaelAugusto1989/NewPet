<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">         
    <div class="col-3"></div>
    <div class="col-8 text-center">
        <h3 class="text-center">Cadastro de Cliente</h3>
    </div>
    <div class="pr-0 mr-0 col-1"></div>
</div>
<div class="row">
    <div class="col-3">
    </div>
    <div class="col-3">
        <a href="#" class="btn btn-outline-success"> <i class="fas fa-plus mr-1"></i> Pet</a>
    </div>
    <div class="col-5 text-right">
        <a href="#" class="btn btn-outline-primary" onclick="Voltar();"> <i class="fas fa-reply mr-2"></i> Voltar</a>
    </div>
    <div class="col-1 pr-0 mr-0"></div>
</div>
<div class="row">  
    <div class="col-3">
        <nav class="col-12 sidebar">
            <ul class="list-unstyled">
                <li><a href="<?= site_url('Cliente/CadastraCliente'); ?>"><i class="fas fa-money-check-alt"></i> Dados Cadastrais</a></li>
                <li><a href="<?= site_url('Cliente/CadastraPet'); ?>"><i class="fas fa-paw"></i> Pets</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-8">   
        <div class="row">
            <div class="col-lg-12 pt-2">
                <h5 class="text-primary"> Dados do Pet</h5>
            </div>
        </div>
        <form action="" method="post">
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Nome do Pet:</label>
                    <input type="text" name="" class="form-control" id="" placeholder="Nome do Pet">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4">
                    <label for="nascimento" class="mb-0 mt-2">Data de Nascimento:</label>
                    <input type="text" name="nascimento data" class="form-control data" id="" placeholder="00/00/0000">
                </div>
                <div class="col-lg-4">
                    <label for="" class="mb-0 mt-2">Tipo:</label>
                    <select name="" class="form-control custom-select" id="">
                        <option selected disable> -- </option>
                        <option value=""> Ave</option>
                        <option value=""> Canino</option>
                        <option value=""> Felino</option>
                        <option value=""> Réptil</option>
                        <option value=""> Roedor</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="raca" class="mb-0 mt-2">Raça:</label>
                    <input type="text" name="raca" class="form-control" id="" placeholder="Raça do Animal">
                </div>
            </div> 
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Observações:</label>
                    <textarea name="obs" class="form-control" id="" cols="30" rows="4"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-12 mt-3 mb-4 pb-4 text-right">
                    <!-- SE NÃO EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO SALVAR -->
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-save mr-2"></i> Salvar</button>
                    <!-- SE EXISTIR DADOS CADASTRADOS, MOSTRAR BOTÃO ALTERAR -->
                    <button type="submit" class="btn btn-primary padbutton"><i class="fas fa-edit mr-2"></i> Alterar</button>
                    <!-- SE MSG FOR TRUE MOSTRAR BOTÃO PRÓXIMO -->
                    <a href="<?= site_url('Cliente/ClientesCadastrados'); ?>" class="btn btn-success padbutton"><i class="fas fa-check mr-2"></i> Finalizar </a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-1 pr-0 mr-0"></div>
</div> <!-- FIM DIV CONTEÚDO -->
