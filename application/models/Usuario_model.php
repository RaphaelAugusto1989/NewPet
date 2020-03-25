<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	function __construct() {
		parent::__construct();
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
}
?>