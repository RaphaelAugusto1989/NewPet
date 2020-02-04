<?php include "s_header.php";?>

<!-- INICIO DIV CONTEÚDO -->
<div class="col-3 ">
    <nav class="col-lg-12 sidebar">
        <div class="pt-4 pb-4 mt-4 mb-4 text-center"> </div>
        <ul class="list-unstyled">
            <li><a href="#"><i class="fas fa-check-circle"></i> Dados Pessoais</a></li>
            <li><a href="#"><i class="fas fa-check-circle"></i> Endereço</a></li>
            <li><a href="#"><i class="fas fa-check-circle"></i> Pets</a></li>
        </ul>
    </nav>
</div>
<div class="col-6">   
    <div class="row">
        <div class="col-lg-12 pt-4 pb-4 mt-4">
            <h3 class="text-center">Cadastro de Usuário</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 pt-4">
            <h5 class="text-primary"> Endereço</h5>
        </div>
    </div>
    <form action="" method="post">
            <div class="form-row">
                <div class="col-lg-4">
                    <label class="mb-0 mt-2">CEP:</label>
                    <input type="text" name="cep" class="form-control cep" id="" placeholder="00.000-000">
                </div>
                <div class="col-lg-4 pt-4" style="font-size: 12px;">*Preenchimento automático.</div>
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
        </div>
</div>
<div class="col-3"></div>
<!-- FIM DIV CONTEÚDO -->

<?php include "s_footer.php";?>

