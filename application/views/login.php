<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid">
    <div class="row ">
        <div class="col-4"></div>
        <div class="col-4"></div>
        <div class="col-4 text-center p-4 login">
            <form action="<?= site_url('Newpet/AutenticaLogin'); ?>" method="POST">
                <div class="form-row align-intems-center">
                    <div class="col-10 mb-4 text-left">
                        <img src="<?= base_url('assets/img/logo-newpet-azul.png');?>" alt="Logo NewPet">
                        <?php
                            if ($this->session->flashdata('Error') != "") {
                                echo "<p class='alert alert-danger text-center'><i class='fas fa-exclamation-circle'></i> " .$msg. "</p>";
                            }
                        ?>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-10 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text border border-right-0 border-primary bg-light text-primary">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" name="login" class="form-control form-control-lg border border-primary border-left-0" id="show-option" placeholder="CPF, CNPJ, Login ou E-mail" title="Digite só os números caso for CPF ou CNPJ." required >
                        </div>
                        <small class="form-text text-muted text-left">*Inserir CPF ou CNPJ sem pontos, traço e barra!</small>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-10 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text border border-right-0 border-primary bg-light text-primary">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" name="senha" class="form-control form-control-lg border border-primary border-left-0 border-right-0" id="password" placeholder="Senha" required>
                            <div class="input-group-append border border-primary border-left-0 rounded-right">
		          				<a href="#" class="input-group-text bg-white border-0 btn btn-link" id="showPassword" title="Mostrar Senha" style="text-decoration: none;"><i class="fas fa-eye"></i></a>
		          			</div>
                        </div>
                    </div>
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                    <span id="msgCapsLock" class="text-left text-danger" style="display: none;">*Caps Lock Ativado!</span>
                    </div>
                    <div class="col-6 mb-4 text-right">
                        <button type="submit" class="btn btn-primary"> Entrar <i class="fas fa-sign-in-alt"></i></button>
                    </div>
                    <div class="col-2"> </div>
                    <div class="col-10 mb-1 text-left">
                        <a href="EsqueciMinhaSenha">Esqueceu sua senha?</a>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-10 mb-1 text-left">
                        <a href="PrecisaDeAjuda">Precisa de ajuda?</a>
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
        </div>
    </div>
</div>