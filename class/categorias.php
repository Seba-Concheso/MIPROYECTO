<?php


class categorias {
    public $id;
    public $nombre;


    static public function listar(){
      $db = new base_datos();
      $result = $db->listar("categorias");
      return $result;
    }
}