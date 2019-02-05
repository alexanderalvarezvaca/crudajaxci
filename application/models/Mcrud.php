<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_MODEL {

	/**/

  public function __construct(){
      parent::__construct();
  }

  /**/

  public function __destruct(){
      $this->db->close();
  }

  /**/

  public function getMaestros(){
      
      $this->db->order_by("mae_id", "desc");
      $query = $this->db->get("cc_maestro");
      $result = $query->result();
      return $result;
  }

  /**/

  public function saveMaestros($post){
      
      $response = false;
      foreach ($post as $key => $value) $$key = $value;
      
      if($name){
        $datos = array('mae_name' => $name, 'mae_detail'=> $detail);
        $response = $this->db->insert("cc_maestro", $datos);
      }

      return $response;
  }

}
?>