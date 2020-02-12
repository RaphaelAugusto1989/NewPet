<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newpet extends CI_Controller {

	function __construct() {
		parent::__construct(); 
	}

	public function index() {
		$msg = null;

		if ($this->session->flashdata('Success') !="") {
			$msg = $this->session->flashdata('Success');
		} else {
			$msg = $this->session->flashdata('Error');
		}

		$dados = array('title' => 'NewPet - Sistema de Petshop e Clínica Veterinária');

		$this->load->view('header', $dados);
		$this->load->view('login', $dados);
		$this->load->view('footer');
	}
}
