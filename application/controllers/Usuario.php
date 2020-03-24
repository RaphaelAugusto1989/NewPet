<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
	public function UsuariosCadastrados() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'Usuários Cadastrados - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg);

		$this->load->view('s_header', $dados);
		$this->load->view('s_usuarios_visualizar', $dados);
		$this->load->view('s_footer');
	}

	//PÁGINA DE CADASTRO DO USUÁRIO DO SISTEMA
	public function CadastroDeUsuario() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'Cadastro de Usuário - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg);

		$this->load->view('s_header', $dados);
		$this->load->view('s_usuario_cadastra_altera', $dados);
		$this->load->view('s_footer');
	}
	
	//FUNÇÃO GRAVA DADOS PESSOAIS DO USUÁRIO NO SISTEMA
	public function GravaDadosPessoaisUsuario() {

		//CHECKBOK FOR IGUAL A 1 É CPF, IGUAL A 2 É CNPJ
		$checkbox = $this->input->post('check');

			if ($checkbox == '1') {  //CPF
				$Grava = array (
					'cpf_cnpj_usuario' => $this->input->post('cpf'),
					'nome_empresa_usuario' => $this->input->post('nome'),
					'nascimento_usuario' => $this->input->post('nascimento'),
					'email_usuario' => $this->input->post('email'),
					'fixo_usuario' => $this->input->post('fixo'),
					'celular_usuario' => $this->input->post('celular'),
					'cep_usuario' => $this->input->post('cep'),
					'rua_usuario' => $this->input->post('rua'),
					'num_usuario' => $this->input->post('numero'),
					'bairro_usuario' => $this->input->post('bairro'),
					'cidade_usuario' => $this->input->post('cidade'),
					'estado_usuario' => $this->input->post('estado'),
					'complemento_usuario' => $this->input->post('complemento'),
				);
			} else { //CNPJ
				$Grava = array (
					'cpf_cnpj_usuario' => $this->input->post('cnpj'),
					'nome_empresa_usuario' => $this->input->post('empresa'),
					'responsavel_empresa_usuario' => $this->input->post('responsavel'),
					'email_usuario' => $this->input->post('email'),
					'fixo_usuario' => $this->input->post('fixo'),
					'celular_usuario' => $this->input->post('celular'),
					'cep_usuario' => $this->input->post('cep'),
					'rua_usuario' => $this->input->post('rua'),
					'num_usuario' => $this->input->post('numero'),
					'bairro_usuario' => $this->input->post('bairro'),
					'cidade_usuario' => $this->input->post('cidade'),
					'estado_usuario' => $this->input->post('estado'),
					'complemento_usuario' => $this->input->post('complemento'),
				);
			}

		

		$this->load->model('Usuario_model');
		$i = $this->Usuario_model->GravaDadosUsuario($Grava);
		echo '<pre>';
		print_r($i); exit;

		if(!empty($i)) {
			//$this->session->set_flashdata('Success', 'Banner Cadastrado com Sucesso');
            redirect(site_url('Usuario/CadastrarAcessoDoUsuario'));
		} else {
            $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
            redirect(site_url('CadastroDeUsuario'));
		}
	}
    
    //PÁGINA DE CADASTRO DE ACESSO AO SISTEMA DO USUÁRIO
	public function CadastrarAcessoDoUsuario() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'Cadastrar Acesso do Usuário - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg);

		$this->load->view('s_header', $dados);
		$this->load->view('s_usuario_cadastra_altera_acesso', $dados);
		$this->load->view('s_footer');
	}
	
	//PÁGINA DE CADASTRO DE ACESSO AO SISTEMA DO USUÁRIO
	public function GravaDadosAcessoDoUsuario() {
		$Grava = array (
			'cpf_cnpj_usuario' => $this->input->post('cpf'),
			'nome_empresa_usuario' => $this->input->post('nome'),
			'nascimento_usuario' => $this->input->post('nascimento'),
			'email_usuario' => $this->input->post('email'),
			'fixo_usuario' => $this->input->post('fixo'),
			'celular_usuario' => $this->input->post('celular'),
			'cep_usuario' => $this->input->post('cep'),
			'rua_usuario' => $this->input->post('rua'),
			'num_usuario' => $this->input->post('numero'),
			'bairro_usuario' => $this->input->post('bairro'),
			'cidade_usuario' => $this->input->post('cidade'),
			'estado_usuario' => $this->input->post('estado'),
			'complemento_usuario' => $this->input->post('complemento'),
		);

		$this->load->model('Usuario_model');
		$i = $this->Usuario_model->GravaAcessoUsuario($Grava);

		if(!empty($i)) {
			//$this->session->set_flashdata('Success', 'Banner Cadastrado com Sucesso');
            redirect(site_url('Usuario/CadastrarAcessoDoUsuario'));
		} else {
            $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
            redirect(site_url('CadastroDeUsuario'));
		}
    }
    
    //PÁGINA DOS PLANOS DO SISTEMA DO USUÁRIO
	public function PlanoDoUsuario() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'Plano do Usuário - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg);

		$this->load->view('s_header', $dados);
		$this->load->view('s_usuario_cadastra_altera_planos', $dados);
		$this->load->view('s_footer');
	}

	//PÁGINA DOS DADOS DO USUÁRIO DO SISTEMA
	public function MeusDados() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'Meus Dados - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg);

		$this->load->view('s_header', $dados);
		$this->load->view('s_usuario_visualiza_altera_meus_dados', $dados);
		$this->load->view('s_footer');
	}

	//PÁGINA DE CADASTRO DE ACESSO AO SISTEMA DO USUÁRIO
	public function MeusDadosDeAcesso() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'Meus Dados De Acesso - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg);

		$this->load->view('s_header', $dados);
		$this->load->view('s_usuario_visualiza_altera_meus_dados_acesso.php', $dados);
		$this->load->view('s_footer');
    }
}
