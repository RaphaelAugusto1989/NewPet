<?php include "s_header.php";?>

<!-- INICIO DIV CONTEÚDO -->
<div class="col-3 "></div>
<div class="col-6">   
    <div class="row">
        <div class="col-lg-12 mt-4 mb-3">
            <h3 class="text-center">Cadastrar Usuário</h3>
        </div>
    </div>
    <form action="" method="post">
            <div class="form-row pl-3">
                <div class="col-lg-1">
                    <input type="radio" name="cpfcnpj" class="form-check-input" id="cpfcombobox">
                    <label for="cpf"> CPF</label>
                </div>
                <div class="col-lg-1" >
                    <input type="radio" name="cpfcnpj" class="form-check-input" id="cnpjcombobox">
                    <label for="cnpj"> CNPJ </label>
                </div>
                <div class="col-lg-10"></div>
            </div>
            <div class="form-row">
                <div class="col-lg-4" id="cpfinput">
                    <label for="cpfcnpj">CPF</label>
                    <input type="text" name="cpforcnpj" class="form-control" id="">
                </div>
                <div class="col-lg-4" id="cnpjinput">
                    <label for="cpfcnpj">CNPJ</label>
                    <input type="text" name="cpforcnpj" class="form-control" id="">
                </div>
                <div class="col-lg-8"></div>
            </div>  
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="">Nome Usuário / Loja:</label>
                    <input type="text" name="" class="form-control" id="">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4">
                    <label for="nascimento">Data de Nascimento</label>
                    <input type="text" name="nascimento" class="form-control" id="">
                </div>
                <div class="col-lg-8">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-6">
                    <label for="fixo">Telefone Fixo</label>
                    <input type="text" name="fixo" class="form-control" id="">
                </div>
                <div class="col-lg-6">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" class="form-control" id="">
                </div>
            </div>
        </div>
</div>
<div class="col-3"></div>
<!-- FIM DIV CONTEÚDO -->
<?php include "s_footer.php";?>
