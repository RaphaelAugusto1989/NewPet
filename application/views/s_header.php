<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery_ui.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">

    <script type="text/javascript" src="<?= base_url('assets/js/jquery.js') ?>" charset="utf-8"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js') ?>" charset="utf-8"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery_ui.js') ?>" charset="utf-8"></script>
    
    <title><?= $title; ?></title>
</head>
<body>
<div class="container-fluid pt-3 pb-3 corpo">  
<header class="navbar navbar-dark navbar-expand-lg fixed-top bg-primary header">
    <!-- <a class="logo" href="#">SISTEMA NEWPET</a> -->
    <a class="navbar-brand" href="#">
        <img src="<?= base_url('assets/img/logo-newpet-branco.png') ?>" class="d-inline-block align-middle logo_empresas" alt="Logo NewPet">
    </a>
    <div class="collapse navbar-collapse navbar-expand-lg" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link text-white" href="<?= site_url('Newpet/Home');?>"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars"></i> Menu
                </a>
                <div class="dropdown-menu mt-2 bg-dark submenu" aria-labelledby="navbarDropdown">
                    <a href="#" class="dropdown-item pt-2 pb-2"><i class="fas fa-calendar-alt mr-1"></i> Agendamentos</a>
                    <a href="#" class="dropdown-item pt-2 pb-2"><i class="fas fa-money-check-alt mr-1"></i> Caixa</a>
                    <a href="<?= site_url('Cliente/ClientesCadastrados');?>" class="dropdown-item pt-2 pb-2"><i class="fas fa-users mr-1"></i> Clientes</a>
                    <a href="#" class="dropdown-item pt-2 pb-2"><i class="fas fa-money-bill-wave mr-1"></i> Financeiro</a>
                    <a href="#" class="dropdown-item pt-2 pb-2"><i class="fas fa-truck mr-1"></i> Fornecedores</a>
                    <a href="#" class="dropdown-item pt-2 pb-2"><i class="fas fa-user-tie mr-1"></i> Funcionários</a>
                    <a href="<?= site_url('Produto/ProdutosCadastrados');?>" class="dropdown-item pt-2 pb-2"><i class="fas fa-shopping-basket mr-1"></i> Produtos </a>
                    <a href="#" class="dropdown-item pt-2 pb-2"><i class="fas fa-chart-bar mr-1"></i> Relatórios</a>
                    <a href="#" class="dropdown-item pt-2 pb-2"><i class="fas fa-user-md mr-1"></i> Veterinária</a>
                </div>
            </li>
            <li class="dropdown nav-item">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fab fa-whmcs"></i> Sistema
                </a>
                <div class="dropdown-menu mt-2 bg-dark submenu" aria-labelledby="navbarDropdown">
                    <a href="<?= site_url('Usuario/UsuariosCadastrados');?>" class="dropdown-item pt-2 pb-2"><i class="fas fa-users-cog mr-1"></i> Usuários do Sistema</a>
                    <a href="#" class="dropdown-item pt-2 pb-2"><i class="fas fa-user-tie mr-1"></i> Planos</a>
                    <a href="#" class="dropdown-item pt-2 pb-2"><i class="fas fa-chart-bar mr-1"></i> Relatórios</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user mr-2"></i> 
                    <?php  
                        $nome = explode(' ', $this->session->userdata('nome_user')); 

                        //SE FOR CPF MOSTRA OS 2 PRIMEIROS NOMES
                        $tam = mb_strlen($this->session->userdata('cpfcnpj_user'), 'utf8');
                        if ($tam  == '14') {
                            echo $nome[0].' '.$nome[1]; 
                        } else {
                            echo $this->session->userdata('nome_user'); 
                        }                        
                    ?>
                </a>
                <div class="dropdown-menu mt-2 bg-dark submenu" aria-labelledby="navbarDropdown">
                    <a href="<?= site_url('Usuario/MeusDados');?>" class="dropdown-item pt-2 pb-2"><i class="fas fa-user-cog mr-1"></i> Meus Dados</a>
                    <a href="<?= site_url('Newpet/Logout');?>" class="dropdown-item pt-2 pb-2"><i class="fas fa-door-open mr-1"></i> Sair</a>
                </div>
            </li>
        </ul>
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('assets/img/sem_logo.png') ?>" class="d-inline-block align-middle logo_empresas" alt="Logo NewPet">
        </a>
    </div>
</header>