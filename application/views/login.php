<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
    <div class="row ">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4 text-center p-4 login">
            <form action="" method="POST">
                <div class="form-row align-intems-center">
                    <div class="col-lg-12 mb-4 text-left">
                        <img src="<?= base_url('assets/img/logo-newpet-azul.png');?>" alt="Logo NewPet">
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text border border-right-0 border-primary bg-light text-primary">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" name="login" class="form-control form-control-lg border border-primary border-left-0" id="show-option" placeholder="CPF, CNPJ ou E-mail" title="Digite só os números caso for CPF ou CNPJ." required >
                        </div>
                    </div>

                    <div class="col-lg-12 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text border border-right-0 border-primary bg-light text-primary">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control form-control-lg border border-primary border-left-0 border-right-0" id="password" placeholder="Senha" required>
                            <div class="input-group-append border border-primary border-left-0 rounded-right">
		          				<a href="#" class="input-group-text bg-white border-0 btn btn-link" id="showPassword" title="Mostrar Senha" style="text-decoration: none;"><i class="fas fa-eye"></i></a>
		          			</div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-4 text-right">
                        <button type="submit" class="btn btn-outline-primary"> Entrar <i class="fas fa-sign-in-alt"></i></button>
                    </div>
                    <div class="col-lg-12 mb-1 text-left">
                        <a href="recuperar_senha.php">Esqueceu sua senha?</a>
                    </div>
                    <div class="col-lg-12 mb-1 text-left">
                        <a href="#">Precisa de ajuda?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>