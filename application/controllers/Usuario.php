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

		//QTD DE USUÁRIOS COMUNS CADASTRADOS NO SISTEMA
		$QtdUserCadastrados = $this->Usuario_model->MostraQtdUsuarios();
		$TotalCadastrados = count($QtdUserCadastrados);

		$ContUsuario = $this->Usuario_model->MostraTodosUsuarios();
        $QtdReg = 10; //QTD DE REGISTROS A SER MOSTRADO POR PÁGINA

		$pg = isset($_GET["pg"]) ? $_GET["pg"] : 1;
		$Inicial = ($pg * $QtdReg) - $QtdReg;

		$TotalReg = count($ContUsuario);
		
		$lista = $this->Usuario_model->MostraListaUsuarios($Inicial, $QtdReg);

		$dados = array('title' => 'Usuários Cadastrados - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg, 'user' => $lista, 'qtdUser' => $TotalCadastrados);

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
		$lista = null;
		if ($this->uri->segment(3) != "") {
			$id = $this->uri->segment(3);
			$this->load->model('Usuario_model');
			$lista = $this->Usuario_model->MostraUsuarioSelecionado($id);
		}

		$dados = array('title' => 'Cadastro de Usuário - Sistema de Petshop e Clínica Veterinária', 'msg' => $msg, 'user' => $lista);

		$this->load->view('s_header', $dados);
		$this->load->view('s_usuario_cadastra_altera', $dados);
		$this->load->view('s_footer');
	}
	   
    //PÁGINA DE CADASTRO DE ACESSO AO SISTEMA DO USUÁRIO E GRAVA TODOS OS DADOS
	public function CadastraUsuario() {
		$id = $this->input->post('id');
		$lista = null;
		$msg = null;

		//CHECKBOK FOR IGUAL A 1 É CPF, IGUAL A 2 É CNPJ
		$checkbox = $this->input->post('check');

		$this->load->model('Usuario_model');

		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		if ($id != "0") {
			$lista = $this->Usuario_model->MostraUsuarioSelecionado($id);
		}

		if ($checkbox == '1') {
			//VERIFICA SE CPF JÁ FOI CADASTRADO
			$cpfcnpj = $this->input->post('cpf');
			$nome = $this->input->post('nome');
			$email = $this->input->post('email_usuario');

			if($id == '0') { //VERIFICA SE É CADASTRO OU ALTERAÇÃO
				$Verificado = $this->Usuario_model->VerificaCpfCnpj($cpfcnpj);
				if (!empty($Verificado)) {
					$this->session->set_flashdata('Error', 'CPF já cadastrado!');
					redirect(site_url('CadastroDeUsuario')); 
					exit;
				}
			}
		} else {
			//VERIFICA SE CNPJ JÁ FOI CADASTRADO
			$cpfcnpj = $this->input->post('cnpj');
			$nome = $this->input->post('empresa');
			$email = $this->input->post('email_empresa');

			if($id == '0') { //VERIFICA SE É CADASTRO OU ALTERAÇÃO
				$Verificado = $this->Usuario_model->VerificaCpfCnpj($cpfcnpj);
				if (!empty($Verificado)) {
					$this->session->set_flashdata('Error', 'CNPJ já cadastrado!');
					redirect(site_url('CadastroDeUsuario')); 
					exit;
				}
			}
		}
			
		if (empty($Verificado)) {
			if (!empty($this->input->post('nascimento'))) {
				$data = explode('/', $this->input->post('nascimento'));
			} else {
				$data = explode('/', date('d/m/Y'));
			}

			$dados = array (
							'title' => 'Cadastrar Acesso do Usuário - Sistema de Petshop e Clínica Veterinária',
							'msg' => $msg,
							'idUsuario' => $id,
							'user' => $lista,
							'cpf_cnpj_usuario' => $cpfcnpj,
							'nome_empresa_usuario' => $nome,
							'responsavel_empresa_usuario' => $this->input->post('responsavel'),
							'nascimento_usuario' => $data[2].'-'.$data[1].'-'.$data[0],
							'email_usuario' => $email,
							'fixo_usuario' => $this->input->post('fixo'),
							'celular_usuario' => $this->input->post('celular'),
							'cep_usuario' => $this->input->post('cep'),
							'rua_usuario' => $this->input->post('rua'),
							'num_usuario' => $this->input->post('numero'),
							'bairro_usuario' => $this->input->post('bairro'),
							'cidade_usuario' => $this->input->post('cidade'),
							'estado_usuario' => $this->input->post('estado'),
							'complemento_usuario' => $this->input->post('complemento')
							);

			$this->load->view('s_header', $dados);
			$this->load->view('s_usuario_cadastra_altera_acesso', $dados);
			$this->load->view('s_footer');
		}
			
	}
	
	//PÁGINA DE CADASTRO DE ACESSO AO SISTEMA DO USUÁRIO
	public function GravaDadosDoUsuario() {
		$id = $this->input->post('id');
		// echo $logo = $this->input->post('logo');exit;

		if ($this->input->post('status') == '1') {
			$Status = $this->input->post('status');
		} else {
			$Status = '0';
		}
		
		if ($_FILES["logo"] == "") {
			echo $_FILES["logo"]; exit;
			$novo_nome = "sem_logo.png";
		} else {
			//BUSCA DADOS CADASTRADO NA PÁGINA ANTERIOR
			$this->load->model('Usuario_model');
			$lista = $this->Usuario_model->MostraUsuarioSelecionado($id);

			foreach($lista as $l => $user) {
				$cpf = explode('.',  $lista[$l]->cpf_cnpj_usuario);
				$cpf2 = explode('-',  $cpf[2]);
				$cpf3 = explode('/',  $cpf2[0]);
				$cpfcnpj = $cpf[0].$cpf[1].$cpf3[0].$cpf3[1].$cpf2[1];
			}

			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size'] = 100;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;
			$caminhoCompleto = "assets/img/user_logos/".$_FILES["logo"]["name"];
			$ext = 'jpg'; //pathinfo($caminhoCompleto, PATHINFO_EXTENSION);
			$novo_nome = $id.$cpfcnpj.date("dmYhis").".".$ext;
			$caminhoCompleto2 = "assets/img/user_logos/".$novo_nome;

			if(move_uploaded_file($_FILES["logo"]["tmp_name"], $caminhoCompleto)) {
				if(!rename($caminhoCompleto,  $caminhoCompleto2)) {
					$this->session->set_flashdata('Error', 'ERRO AO RENOMEAR A IMAGEM DO BANNER!');
					redirect(site_url('Usuario/CadastraUsuario/')); 
				}
			} else {
				$this->session->set_flashdata('Error', 'ERRO AO COPIAR A IMAGEM AO SERVIDOR, ENTRE EM CONTATO COM O RESPONSÁVEL PELO SITE!');
				redirect(site_url('Usuario/CadastraUsuario/')); 
			}
		}

		if ($id == 0) {
			//GRAVA DADOS DO USUÁRIO
			$Grava = array (
				'cpf_cnpj_usuario' => $this->input->post('cpf'),
				'nome_empresa_usuario' => $this->input->post('nome'),
				'responsavel_empresa_usuario' => $this->input->post('responsavel'),
				'nascimento_usuario' => $this->input->post('nascimento'),
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
				'login_usuario' => $this->input->post('login'),
				'senha_usuario' => md5($this->input->post('password')),
				'tipo_usuario' => $this->input->post('perfil'),
				'status_usuario' => $Status,
				'img_usuario' => $novo_nome,
				'create_usuario' => date('Y-m-d H:i:s')
			);

			$this->load->model('Usuario_model');
			$i = $this->Usuario_model->GravaDadosUsuario($Grava);

			if(!empty($i)) {
				$this->session->set_flashdata('Success', 'Usuário Cadastrado com Sucesso');
				redirect(site_url('Usuario/CadastroDeUsuario/'.$i));
			} else {
				$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
				redirect(site_url('Usuario/CadastroDeUsuario/'.$i));
			}

		} else {
			//ALTERA DADOS DO USUÁRIO
			$Grava = array (
				'cpf_cnpj_usuario' => $this->input->post('cpf'),
				'nome_empresa_usuario' => $this->input->post('nome'),
				'responsavel_empresa_usuario' => $this->input->post('responsavel'),
				'nascimento_usuario' => $this->input->post('nascimento'),
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
				'login_usuario' => $this->input->post('login'),
				'senha_usuario' => md5($this->input->post('password')),
				'tipo_usuario' => $this->input->post('perfil'),
				'status_usuario' => $Status,
				'img_usuario' => $novo_nome,
				'alter_usuario' => date('Y-m-d H:i:s')
			);

			$this->load->model('Usuario_model');
			$i = $this->Usuario_model->AlteraDadosUsuario($id, $Grava);

			if(!empty($i)) {
				$this->session->set_flashdata('Success', 'Usuário Alterado com Sucesso');
				redirect(site_url('Usuario/CadastroDeUsuario/'.$id));
			} else {
				$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
				redirect(site_url('Usuario/CadastroDeUsuario/'.$id));
			}

		}
	}
	
	//ALTERA SENHA DO USUÁRIO DO SISTEMA
	public function AlteraSenhaUsuario() {
		$id = $this->input->post('id');

		$Grava = array (
			'senha_usuario' => md5($this->input->post('password')),
			'alter_usuario' => date('Y-m-d H:i:s')
		);

		$this->load->model('Usuario_model');
		$i = $this->Usuario_model->AlteraDadosUsuario($id, $Grava);

		if(!empty($i)) {
			$this->session->set_flashdata('Success', 'Senha Alterada com Sucesso');
			redirect(site_url('Usuario/CadastroDeUsuario/'.$id));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
			redirect(site_url('Usuario/CadastroDeUsuario/'.$id));
		}
	}

	//ALTERA LOGO DO USUÁRIO DO SISTEMA
	public function AlteraLogoUsuario() {
		$id = $this->input->post('id');

		//BUSCA DADOS CADASTRADO NA PÁGINA ANTERIOR
		$this->load->model('Usuario_model');
		$lista = $this->Usuario_model->MostraUsuarioSelecionado($id);

		foreach($lista as $l => $user) {
			$cpf = explode('.',  $lista[$l]->cpf_cnpj_usuario);
			$cpf2 = explode('-',  $cpf[2]);
			$cpf3 = explode('/',  $cpf2[0]);
			$cpfcnpj = $cpf[0].$cpf[1].$cpf3[0].$cpf3[1].$cpf2[1];

			if ($lista[$l]->img_usuario == "sem_logo.png") {
				$nomeLogo = $id.$cpfcnpj.date("dmYhis");
			} else {
				$l = explode('.', $lista[$l]->img_usuario);
				$nomeLogo = $l[0];
			}

			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size'] = 100;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;
			$caminhoCompleto = "assets/img/user_logos/".$_FILES["logo"]["name"];
			$ext = 'jpg'; //pathinfo($caminhoCompleto, PATHINFO_EXTENSION);
			$novo_nome = $nomeLogo.".".$ext;
			$caminhoCompleto2 = "assets/img/user_logos/".$novo_nome;

			if(move_uploaded_file($_FILES["logo"]["tmp_name"], $caminhoCompleto)) {
				if(!rename($caminhoCompleto,  $caminhoCompleto2)) {
					$this->session->set_flashdata('Error', 'ERRO AO RENOMEAR A IMAGEM!');
					redirect(site_url('Usuario/CadastroDeUsuario/'.$id));
				// echo "ERRO AO RENOMEAR A IMAGEM DO BANNER";exit;
				}
			} else {
				$this->session->set_flashdata('Error', 'ERRO AO COPIAR A IMAGEM AO SERVIDOR, ENTRE EM CONTATO COM O RESPONSÁVEL PELO SITE!');
				redirect(site_url('Usuario/CadastroDeUsuario/'.$id));
			}

			$Grava = array (
				'img_usuario' => $novo_nome,
				'alter_usuario' => date('Y-m-d H:i:s')
			);

			$this->load->model('Usuario_model');
			$i = $this->Usuario_model->AlteraDadosUsuario($id, $Grava);

			if(!empty($i)) {
				$this->session->set_flashdata('Success', 'Logo Alterada com Sucesso');
				redirect(site_url('Usuario/CadastroDeUsuario/'.$id));
			} else {
				$this->session->set_flashdata('Error', 'Ocorreu algum problema, verifique os dados e tente novamente!');
				redirect(site_url('Usuario/CadastroDeUsuario/'.$id));
			}
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
	
	//PÁGINA DE CADASTRO DE ACESSO AO SISTEMA DO USUÁRIO
	public function ExcluiUsuario() {
		$id = $this->uri->segment(3); 
		
		$this->load->model('Usuario_model');
		$lista = $this->Usuario_model->MostraUsuarioSelecionado($id);
		$true = $this->Usuario_model->DeletaUsuario($id);

		foreach($lista as $l => $user) {
			$caminho = "assets/img/user_logos/".$lista[$l]->img_usuario;
		}

		if ($true == TRUE) {
			unlink($caminho);
			$this->session->set_flashdata('Success', 'Usuário excluído com Sucesso');
			redirect(site_url('Usuario/UsuariosCadastrados'));
		} else {
			$this->session->set_flashdata('Error', 'Ocorreu algum erro ao excluir, verifique e tente novamente!');
			redirect(site_url('Usuario/UsuariosCadastrados'));
		}
	}
}
