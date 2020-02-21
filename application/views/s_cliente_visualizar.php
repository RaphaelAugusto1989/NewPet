<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- INICIO DIV CONTEÚDO -->
    <div class="row">
        <div class="col-12 pb-4">
            <h3 class="text-center">Meus Clientes</h3>
        </div>
    </div> 
    <div class="row"> 
        <div class="col-1"></div>
        <div class="col-10">
            <div class="row mt-4 mb-3">
                <div class="col-5 ">
                    <a href="<?= site_url('Cliente/CadastroDeCliente')?>" class="btn btn-success"><i class="fas fa-plus mr-1"></i> Novo Cliente</a>
                </div>
                <div class="col-lg-7">
                    <form action="" method="post">
                        <div class="input-group mb-3 float-right">
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="1" selected> Nome do Cliente </option>
                                <option value="2"> Nome do Pet </option>
                                <option value="3"> CPF do Cliente </option>
                                <option value="4"> Telefone do Cliente </option>
                            </select>
                            <input type="text" name="procurar" id="nome" class="form-control" placeholder="Procurar pelo Nome" aria-describedby="button-addon2">
                            <input type="text" name="procurar" id="pet" class="form-control" placeholder="Procurar pelo Nome do Pet" aria-describedby="button-addon2" style="display: none;">
                            <input type="text" name="procurar" id="cpf" class="form-control cpf" placeholder="Procurar pelo CPF do Cliente" aria-describedby="button-addon2" style="display: none;">
                            <input type="text" name="procurar" id="fone" class="form-control cel" placeholder="Procurar pelo Telefone do Cliente" aria-describedby="button-addon2" style="display: none;">
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
                        <th style="width: 35%;">NOME</th>
                        <th style="width: 15%;">PETs</th>
                        <th style="width: 25%;">EMAIL</th>
                        <th style="width: 15%;">TELEFONES</th>
                        <th style="width: 10%;" class="text-center">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Raphael Augusto Almeida Pereira</td>
                        <td>Melissa</td>
                        <td>raphael.a.a.p@gmail.com</td>
                        <td>(61) 98221-6572</td>
                        <td>
                            <a href="#" class="btn btn-outline-warning" title="ALTERAR"><i class="far fa-file-alt"></i></a>
                            <a href="#" class="btn btn-outline-danger" title="EXCLUIR"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Danielle</td>
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