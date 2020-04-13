<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newpet extends CI_Controller {

	function __construct() {
		parent::__construct(); 
	}

	//PÁGINA INICIAL DE LOGIN
	public function index() {
		$msg = null;
		if ($this->session->flashdata('Error')) {
			echo $msg = $this->session->flashdata('Error');
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

		//VERIFICA SE É CPF OU CNPJ PARA INSERIR A MASCARA
		$tipoLogin = is_numeric($login);
		if ($tipoLogin == true) {
			$tam = mb_strlen($login, 'utf8');
			if ($tam == '11') {
				$login = self::mask($login, '###.###.###-##');
			} else {
				$login = self::mask($login, '##.###.###/####-##');
			}
		}

		//ABRE MODEL 
		$this->load->model('Usuario_model');
		$db = $this->Usuario_model->AcessarSistema($login, $Senha);

		//ABRE O JSON
		$userMaster = base_url('assets/js/usermaster.json');
		$abreJson = file_get_contents($userMaster);
		$leJson = json_decode($abreJson);

		if(!empty($db)) {
			$this->session->set_userdata('timer', time() + (60 * 1)); //1 minuto
			$this->session->set_userdata('id_user', $db[0]->id_usuario);
			$this->session->set_userdata('nome_user', $db[0]->nome_empresa_usuario);
			$this->session->set_userdata('img_user', $db[0]->img_usuario);

			redirect(site_url('Newpet/Home'));
		} elseif (!empty($leJson)) {
			foreach($leJson as $j) {
				if ($j->cpf_cnpj_usuario == $login && $j->senha_usuario == $Senha) {
					$this->session->set_userdata('timer', time() + (60 * 1)); //1 minuto
					$this->session->set_userdata('id_user', $j->id_usuario);
					$this->session->set_userdata('nome_user', $j->nome_empresa_usuario);
					$this->session->set_userdata('img_user', $j->img_usuario);

					redirect(site_url('Newpet/Home'));
				} elseif ($j->login_usuario == $login && $j->senha_usuario == $Senha) {
					$this->session->set_userdata('timer', time() + (60 * 1)); //1 minuto
					$this->session->set_userdata('id_user', $j->id_usuario);
					$this->session->set_userdata('nome_user', $j->nome_empresa_usuario);
					$this->session->set_userdata('img_user', $j->img_usuario);

					redirect(site_url('Newpet/Home'));
				} else {
					$msg = $this->session->flashdata('Error', 'Login ou Senha incorreto!');
					redirect(site_url('Newpet/index'));
				}
			}
		} else {
			$msg = $this->session->flashdata('Error', 'Login ou Senha incorreto!');
			redirect(site_url('Newpet/index'));
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

	//PÁGINA DE RECUPERAÇÃO DE SENHA
	public function Home() {
		$dados = array('title' => 'Sistema NewPet- Sistema de Petshop e Clínica Veterinária');

		$this->load->view('s_header', $dados);
		$this->load->view('s_home', $dados);
		$this->load->view('s_footer');
	}
}
