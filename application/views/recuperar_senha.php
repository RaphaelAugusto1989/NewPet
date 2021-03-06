<div class="container-fluid">
    <div class="row ">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 text-center p-4 login">
            <form action="" method="POST">
                <div class="form-row align-intems-center">
                    <div class="col-lg-12 mb-4 text-center">
                        <img src="<?= base_url('assets/img/logo-newpet-azul.png') ?>" alt="Logo NewPet">
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 text-center text-primary">
                        <p>RECUPERAR SENHA</p>
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-12 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text border border-right-0 border-primary bg-light text-primary">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="text" name="email" class="form-control form-control-lg border border-primary border-left-0" placeholder="E-mail" onclick="validaEmail()" required >
                        </div>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text border border-right-0 border-primary bg-light text-primary">
                                    <i class="fas fa-address-card"></i>
                                </div>
                            </div>
                            <input type="text" name="cpforcnpj" id="cpfcnpj" class="cpfRecLogin form-control form-control-lg border border-primary border-left-0" placeholder="CPF ou CNPJ" required>
                        </div>
                        <small class="form-text text-muted text-left">*Inserir CPF ou CNPJ sem pontos, traço e barra!</small>
                    </div>
                    <div class="col-6 mb-4 text-left">
                        <a href="#" onclick="Voltar()" class="btn btn-outline-primary"><i class="fas fa-reply"></i> Voltar </a>
                    </div>
                    <div class="col-6 mb-4 text-right">
                        <button type="submit" class="btn btn-primary"> Recuperar Senha <i class="fas fa-sign-in-alt"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>