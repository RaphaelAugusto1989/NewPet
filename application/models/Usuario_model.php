<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	function __construct() {
		parent::__construct();
    }
    
    //INSERE DADOS DO USUARIO NO BANCO DE DADOS
	public function GravaDadosUsuario ($Grava) {
        $this->db->insert('np_usuario', $Grava);
        return $this->db->insert_id();
    }
    
    //INSERE DADOS DO USUARIO NO BANCO DE DADOS
	public function GravaAcessoUsuario ($Grava) {
        $this->db->insert('np_usuario', $Grava);
	}
}
?>