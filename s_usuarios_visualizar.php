<?php include "s_header.php";?>
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
                    <a href="http://" class="btn btn-success"><i class="fas fa-plus mr-1"></i> Novo Usuário</a>
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
                    <th scope="col">NOME</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">TELEFONE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <td>Mark</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <td>Mark</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
<!-- FIM DIV CONTEÚDO -->
<?php include "s_footer.php";?>
