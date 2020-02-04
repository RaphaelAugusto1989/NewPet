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
            <h5 class="text-primary"> Dados Pessoais</h5>
        </div>
    </div>
    <form action="" method="post">
            <div class="form-row pl-3">
                <div class="col-lg-2">
                    <label>
                        <input type="radio" name="cpfcnpj" class="form-check-input" id="checked" doc="cpf" checked>  CPF
                    </label>
                </div>
                <div class="col-lg-2" >
                    <label> 
                        <input type="radio" name="cpfcnpj" class="form-check-input" id="checked" doc="cnpj"> CNPJ
                    </label>
                </div>
                <div class="col-lg-8"></div>
            </div>
            <div class="form-row">
                <div class="col-lg-4" id="cpf">
                    <label for="cpfcnpj" class="mb-0 mt-2">CPF:</label>
                    <input type="text" name="cpforcnpj" class="form-control cpf" id="" placeholder="000.000.000-00">
                </div>
                <div class="col-lg-4" id="cnpj" style="display: none;" >
                    <label for="cpfcnpj" class="mb-0 mt-2">CNPJ:</label>
                    <input type="text" name="cpforcnpj" class="form-control cnpj" id=""  placeholder="00.000.000/0000-00">
                </div>
                <div class="col-lg-8"></div>
            </div>  
            <div class="form-row">
                <div class="col-lg-12">
                    <label for="" class="mb-0 mt-2">Nome do Usuário ou Empresa:</label>
                    <input type="text" name="" class="form-control" id="" placeholder="Nome do usuário ou nome da empresa">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4">
                    <label for="nascimento" class="mb-0 mt-2">Data de Nascimento:</label>
                    <input type="text" name="nascimento" class="form-control data" id="" placeholder="00/00/0000">
                </div>
                <div class="col-lg-8">
                    <label for="email" class="mb-0 mt-2">E-mail:</label>
                    <input type="email" name="email" class="form-control" id="" placeholder="E-mail de contato">
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-6">
                    <label for="fixo" class="mb-0 mt-2">Telefone Fixo:</label>
                    <input type="text" name="fixo" class="form-control fixo" id="" placeholder="(99) 9999-9999">
                </div>
                <div class="col-lg-6">
                    <label for="celular" class="mb-0">Celular:</label>
                    <input type="text" name="celular" class="form-control cel" id="" placeholder="(99) 99999-9999">
                </div>
            </div>
        </div>
</div>
<div class="col-3"></div>
<!-- FIM DIV CONTEÚDO -->

<?php include "s_footer.php";?>

