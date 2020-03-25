<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct() {
		parent::__construct(); 
		date_default_timezone_set("America/Sao_Paulo");
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
		
		$this->load->model('Usuario_model');
		$i = $this->Usuario_model->GravaAcessoUsuario();

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

		$id = null;
		if ($this->uri->segment(3) != "") {
			$id = $this->uri->segment(3);

			$this->load->model('Usuario_model');
			$i = $this->Usuario_model->GravaAcessoUsuario($id);
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
		
		$this->load->model('Usuario_model');

		$data = explode('/', $this->input->post('nascimento'));

			if ($checkbox == '1') {  //CPF
				//VERIFICA SE CPF JÁ FOI CADASTRADO
				$cpfcnpj = $this->input->post('cpf');
				$Verificado = $this->Usuario_model->VerificaCpfCnpj($cpfcnpj);

				if (empty($Verificado)) {
					$Grava = array (
						'cpf_cnpj_usuario' => $this->input->post('cpf'),
						'nome_empresa_usuario' => $this->input->post('nome'),
						'nascimento_usuario' => $data[2].'-'.$data[1].'-'.$data[0] ,
						'email_usuario' => $this->input->post('email_usuario'),
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
				} else {
						$this->session->set_flashdata('Error', 'CPF já cadastrado!');
						redirect(site_url('CadastroDeUsuario')); 
						exit;
				}
			} else { //CNPJ
				//VERIFICA SE CNPJ JÁ FOI CADASTRADO
				$cnpj = $this->input->post('cnpj');
				$Verificado = $this->Usuario_model->VerificaCpfCnpj($cpfcnpj);

				if (empty($Verificado)) {
					$Grava = array (
						'cpf_cnpj_usuario' => $this->input->post('cnpj'),
						'nome_empresa_usuario' => $this->input->post('empresa'),
						'responsavel_empresa_usuario' => $this->input->post('responsavel'),
						'email_usuario' => $this->input->post('email_empresa'),
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
				} else {
					$this->session->set_flashdata('Error', 'CNPJ já cadastrado!');
					redirect(site_url('CadastroDeUsuario')); 
					exit;
				}
			}

		$i = $this->Usuario_model->GravaDadosUsuario($Grava);

		if(!empty($i)) {
			//$this->session->set_flashdata('Success', 'Banner Cadastrado com Sucesso');
            redirect(site_url('Usuario/CadastrarAcessoDoUsuario/'.$i));
		} else {
            $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
            redirect(site_url('CadastroDeUsuario'));
		}
	}
    
    //PÁGINA DE CADASTRO DE ACESSO AO SISTEMA DO USUÁRIO
	public function CadastrarAcessoDoUsuario() {
		$id = $this->uri->segment(3);

		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'Cadastrar Acesso do Usuário - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg, 'id' => $id);

		$this->load->view('s_header', $dados);
		$this->load->view('s_usuario_cadastra_altera_acesso', $dados);
		$this->load->view('s_footer');
	}
	
	//PÁGINA DE CADASTRO DE ACESSO AO SISTEMA DO USUÁRIO
	public function GravaDadosAcessoDoUsuario() {
		$id = $this->input->post('id');

		if ($this->input->post('status') == '1') {
			$Status = $this->input->post('status');
		} else {
			$Status = '0';
		}

		$Grava = array (
			'login_usuario' => $this->input->post('login'),
			'senha_usuario' => md5($this->input->post('password')),
			'tipo_usuario' => $this->input->post('perfil'),
			'status_usuario' => $Status,
			'img_usuario' => $this->input->post('logo'),
			'create_usuario' => date('Y-m-d H:i:s'),
		);

		$this->load->model('Usuario_model');
		$i = $this->Usuario_model->GravaAcessoUsuario($id, $Grava);

		if(!empty($i)) {
			$this->session->set_flashdata('Success', 'Usuário Cadastrado com Sucesso');
            redirect(site_url('Usuario/CadastroDeUsuario'));
		} else {
            $this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
            redirect(site_url('Usuario/CadastroDeUsuario'));
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
