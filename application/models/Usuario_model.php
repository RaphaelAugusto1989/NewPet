<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	//MOSTRA OS USUARIOS CADASTRADOS
	public function MostraTodosUsuarios() {
		return $this->db->get('np_usuario')->result();
	}

	//MOSTRA QUANTIDADE DE USUARIOS CADASTRADOS
	public function MostraQtdUsuarios () {
		$array = array(3,4,5);
		$this->db->where_in('tipo_usuario', $array);
		return $this->db->get('np_usuario')->result();
	}
	
	//MOSTRA LISTA DOS USUARIOS CADASTRADOS
	public function MostraListaUsuarios($Inicial, $QtdReg)  {
		$array = array(3,4,5);
		$this->db->where_in('tipo_usuario', $array);
		$this->db->limit($QtdReg, $Inicial);
		$this->db->order_by('nome_empresa_usuario', 'ASC');
		return $this->db->get('np_usuario')->result();
	}

    //VERIFICA SE CPF OU CNPJ JÁ ESTÁ CADASTRADO NO BANCO DE DADOS
	public function VerificaCpfCnpj ($cpfcnpj) {
        $this->db->where('cpf_cnpj_usuario', $cpfcnpj);
		return $this->db->get('np_usuario')->result();
	}
    
    //INSERE DADOS DO USUARIO NO BANCO DE DADOS
	public function GravaDadosUsuario ($Grava) {
        $this->db->insert('np_usuario', $Grava);
        return $this->db->insert_id();
    }
    
    //INSERE DADOS DO USUARIO NO BANCO DE DADOS
	public function GravaAcessoUsuario ($id, $Grava) {
        $this->db->where('id_usuario', $id);
		$this->db->update('np_usuario', $Grava);
		return TRUE;
	}
	
	//MOSTRA USUARIO SELECIONADO CADASTRADO
	public function MostraUsuarioSelecionado ($id) {
        $this->db->where('id_usuario', $id);
		return $this->db->get('np_usuario')->result();
	}
}
?>