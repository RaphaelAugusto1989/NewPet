<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newpet extends CI_Controller {

	function __construct() {
		parent::__construct(); 
	}

	//PÁGINA INICIAL DE LOGIN
	public function index() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'NewPet - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg);

		$this->load->view('header', $dados);
		$this->load->view('login', $dados);
		$this->load->view('footer');
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

	//AUTENTICA LOGIN E SENHA PARA ENTRAR NO SISTEMA
	public function AutenticaLogin() {
		$login = $this->input->post('login');
		$Senha = md5($this->input->post('senha'));

		$tipoLogin = is_numeric($login);

		if ($tipoLogin == true) {
			$tam = mb_strlen($login, 'utf8');
			if ($tam == '11') {
				echo $login = self::mask($login, '###.###.###-##');
				exit;
			} else {
				echo $login = self::mask($login, '##.###.###/####-##');
				exit;
			}
		} 

		$this->load->model('UsuariosController');
		$success = $this->UsuariosController->AcessarSistema($login, $senha);

		if(!empty($user)) {
			$this->session->set_userdata('timer', time() + (60 * 1)); //1 minuto
			$this->session->set_userdata('idUsuario', $user[0]->id_usuario);
			$this->session->set_userdata('nome', $user[0]->nome_usuario);

			redirect(site_url('Sistema'));
		} else {
			$msg = $this->session->flashdata('Error', 'Login ou Senha incorreto!');
			redirect(site_url('index'));
		}

	}

	//PÁGINA DE RECUPERAÇÃO DE SENHA
	public function EsqueciMinhaSenha() {
		$msg = null;
		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'Recuperar Senha - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg);

		$this->load->view('header', $dados);
		$this->load->view('recuperar_senha', $dados);
		$this->load->view('footer');
	}
}
