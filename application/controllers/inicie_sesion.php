<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicie_Sesion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_inicio');
	}
	public function vistainicio()
	{
		$this->load->view('view_iniciesesion');
	}
	public function carga_admin()
		{
			$result = $this->model_inicio->datos('');
			$result=array(
				'ID' => $result->id,
				'USUARIO' => $result->user,
				'CONTRASENA' => $result->pass,
				'ROL' => $result->id_rol,
			);
			$this->load->view('view_admin',$result);
			}
	public function carga_mesero()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->view('view_mesero');
		}
	}
	public function carga_cocina()
	{
		if ($this->session->userdata('is_logged_in')) {
			$this->load->view('view_cocina');
		}
	}
	public function olvidar_contra()
	{
		$this->load->view('view_olvidar');
	}
	public function cambia_contra()
	{
		$usuario=$this->input->post('usuario');
		$nueva_con=$this->input->post('nueva_con');
		$con_contra=$this->input->post('con_contra');
		if ($nueva_con == $con_contra) {
			$re = $this->model_inicio->cambia_con($usuario);
			if($re->cuenta == 1){
				$result = $this->model_inicio->act_usuario($usuario,$nueva_con);
			}
		}
	}

	public function inicio(){
		$usuario=$this->input->post('usuario');
		$contrasena=$this->input->post('contrasena');

		$re = $this->model_inicio->inicio($usuario,$contrasena);
		if($re->cuenta == 1){
			$result = $this->model_inicio->con_usuario($usuario,$contrasena);
			//echo "correcto";
			$session = array(
				'ID' => $result->id,
				'USUARIO' => $result->user,
				'CONTRASENA' => $result->pass,
				'ROL' => $result->nombre_rol,
				'is_logged_in' => TRUE,
			);
			$this->session->set_userdata($session);
			if ($result->nombre_rol == "admin") {
				if ($this->session->userdata('is_logged_in')) {
					redirect("".base_url()."index.php/inicie_sesion/carga_admin");
				}
			}elseif ($result->nombre_rol == "mesero") {
				if ($this->session->userdata('is_logged_in')) {
					redirect("".base_url()."index.php/inicie_sesion/carga_mesero");
				}
			}elseif ($result->nombre_rol == "cocina") {
				if ($this->session->userdata('is_logged_in')) {
					redirect("".base_url()."index.php/inicie_sesion/carga_cocina");
				}
			}else {

			}
		}else{
			echo "Datos incorrectos";
			$this->load->view('view_iniciesesion');
		}
	}
}
