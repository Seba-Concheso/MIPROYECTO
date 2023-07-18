<?php



class productos {
    public $id;
    public $nombre;
    public $categoria;
    public $imagen;

    function __construct($id=null){
      if($id != null){
        foreach (self:: $_lista_productos as $producto) {
          if($producto["id"] == $id){
            $this->id = $producto["id"];
            $this->nombre = $producto["nombre"];
            $this->categoria = $producto["categoria"];
            $this->imagen = $producto["imagen"];
           
          }
        }
      }
    }

    //voy a hacer una funcion que me devuelva todos los productos
    static function listar(){
      $db = new base_datos();
      $result = $db->listar("productos");
    }
}


