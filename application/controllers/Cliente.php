<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	function __construct() {
		parent::__construct(); 
	}

    //FUNÇÃO PARA MASCARA DE CPF E CNPJ
	public function mask($val, $mask) {
		$maskared = '';
		$k = 0;
		for($i = 0; $i <= strlen($mask) - 1; $i++) {
			if($mask[$i] == '#') {
				if(isset($val[$k])) 
					$maskared .= $val[$k++];
				} else {
					if(isset($mask[$i]))
						$maskared .= $mask[$i];
					}
			}
		return $maskared;
    }
    
	//MOSTRA USUÁRIOS CADASTRADOS NO SISTEMA
	public function ClientesCadastrados() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'Meus Clientes - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg);

		$this->load->view('s_header', $dados);
		$this->load->view('s_cliente_visualizar', $dados);
		$this->load->view('s_footer');
	}

	//PÁGINA DE CADASTRO DO USUÁRIO DO SISTEMA
	public function CadastraCliente() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'Cadastrar Cliente - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg);

		$this->load->view('s_header', $dados);
		$this->load->view('s_cliente_cadastra_altera', $dados);
		$this->load->view('s_footer');
    }
    
    //PÁGINA DE CADASTRO DE ACESSO AO SISTEMA DO USUÁRIO
	public function CadastraPet() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'Cadastrar Pets - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg);

		$this->load->view('s_header', $dados);
		$this->load->view('s_cliente_cadastra_altera_pet', $dados);
		$this->load->view('s_footer');
    }
}
