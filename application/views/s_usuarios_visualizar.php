<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- INICIO DIV CONTEÚDO -->
    <div class="row">
        <div class="col-12 pb-4">
            <h3 class="text-center">Usuários do Sistema</h3>
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
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="col-3">NOME</th>
                        <th class="col-2">CPF/CNPJ</th>
                        <th class="col-3">EMAIL</th>
                        <th class="col-2">TELEFONE</th>
                        <th class="col-2">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-3">Raphael Augusto</td>
                        <td class="col-2">023.486.491-52</td>
                        <td class="col-3">raphael.a.a.p@gmail.com</td>
                        <td class="col-2">(61) 98221-6572</td>
                        <td class="col-2">
                            <a href="#" class="btn btn-outline-warning" title="ALTERAR"><i class="far fa-file-alt"></i></a>
                            <a href="#" class="btn btn-outline-danger" title="EXCLUIR"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Star Petshop</td>
                        <td>23.123.456/0001-52</td>
                        <td>starpet@gmail.com</td>
                        <td>(61) 3352-5222</td>
                        <td>
                            <a href="#" class="btn btn-outline-warning" title="ALTERAR"><i class="far fa-file-alt"></i></a>
                            <a href="#" class="btn btn-outline-danger" title="EXCLUIR"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Clinic Pet</td>
                        <td>23.547.112/0001-55</td>
                        <td>clinicpet@hotmail.com</td>
                        <td>(61) 3022-5541</td>
                        <td>
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