<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- INICIO DIV CONTEÚDO -->
    <div class="row">
        <div class="col-12 pb-4">
            <h3 class="text-center">Meus Produtos</h3>
        </div>
    </div> 
    <div class="row"> 
        <div class="col-1"></div>
        <div class="col-10">
            <div class="row mt-4 mb-3">
                <div class="col-5 ">
                    <a href="<?= site_url('Produto/CadastraProduto')?>" class="btn btn-success"><i class="fas fa-plus mr-1"></i> Novo Produto</a>
                </div>
                <div class="col-lg-7">
                    <form action="" method="post">
                        <div class="input-group mb-3 float-right">
                            <input type="text" name="procurar" id="nome" class="form-control" placeholder="Procurar pelo Nome" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i> Procurar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width: 15%;">CÓDIGO</th>
                        <th style="width: 40%;">PRODUTO</th>
                        <th style="width: 20%;">VALOR UNITÁRIO</th>
                        <th style="width: 15%;">QTD EM ESTOQUE</th>
                        <th style="width: 10%;" class="text-center">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0001</td>
                        <td>Ração Bong 20kg</td>
                        <td>R$ 89,90</td>
                        <td class="text-center">30</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-outline-warning" title="ALTERAR"><i class="far fa-file-alt"></i></a>
                            <a href="#" class="btn btn-outline-danger" title="EXCLUIR"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>0002</td>
                        <td>Osso de borracha</td>
                        <td>R$ 15,00</td>
                        <td class="text-center"> 60 </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-outline-warning" title="ALTERAR"><i class="far fa-file-alt"></i></a>
                            <a href="#" class="btn btn-outline-danger" title="EXCLUIR"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>0003</td>
                        <td>Shampoo banny 300ml</td>
                        <td>R$ 25,50</td>
                        <td class="text-center">15</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-outline-warning" title="ALTERAR"><i class="far fa-file-alt"></i></a>
                            <a href="#" class="btn btn-outline-danger" title="EXCLUIR"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
<!-- FIM DIV CONTEÚDO -->