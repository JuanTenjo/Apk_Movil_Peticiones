<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Model_Inicio extends CI_Model {

  function __construct(){
    parent::__construct();
  }
  public function inicio($usuario = null, $contrasena=null){
    $sql = "SELECT COUNT(*) cuenta FROM usuario WHERE USER='$usuario' AND PASS='$contrasena';";
    $query=$this->db->query($sql);
    return $query->row();
  }
  public function con_usuario($usuario = null, $contrasena=null){
    $sql = "SELECT u.id, u.user,u.pass, r.nombre_rol FROM usuario u, roles r
    WHERE u.id_rol = r.id_rol
    AND USER='$usuario' AND PASS='$contrasena';";
    $query=$this->db->query($sql);
    return $query->row();
  }
  public function cambia_con($usuario = null){
    $sql = "SELECT COUNT(*) cuenta FROM usuario WHERE USER='$usuario';";
    $query=$this->db->query($sql);
    return $query->row();
  }
  public function act_usuario($usuario=null,$nueva_con=null){
    $this->db->where('user',$usuario);
    $this->db->update('usuario',array('pass'=>$nueva_con));
    $this->load->view('view_iniciesesion');
  }
  public function datos(){
    $sql = "SELECT * FROM usuario;";
    $query=$this->db->query($sql);
    return $query->row();
  }


}
