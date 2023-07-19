<?php



class productos
{
  protected $id;
  public $nombre;
  public $categoria;
  public $descripcion;
  public $precio;
  public $imagen;
  private $exist = false;

  function __construct($id = null)
  {
    $db = new base_datos();
    $result = $db->select("productos", "id=?", array($id));

    if (isset($result[0])) {
      $this->id = $result[0]['id'];
      $this->nombre = $result[0]['nombre'];
      $this->categoria = $result[0]['categoria_id'];
      $this->descripcion = $result[0]['descripcion'];
      $this->precio = $result[0]['precio'];
      $this->imagen = $result[0]['imagen'];
      $this->exist = true;
    }
  }

  public function guardar()
  {
    if ($this->exist) {
      return $this->actualizar();
    } else {
      return $this->insertar();
    }
  }

  public function eliminar()
  {
    $db = new base_datos();
    return $db->delete("productos", "id=?", array($this->id));
  }

  private function insertar()
  {
    $db = new base_datos();
    $result = $db->insert("productos", array("nombre", "categoria_id", "descripcion", "precio", "imagen"), array("?", "?", "?", "?", "?"), array($this->nombre, $this->categoria, $this->descripcion, $this->precio, $this->imagen));

    if ($result) {
      $this->id = $result;
      $this->exist = true;
      return true;
    } else {
      return false;
    }
  }

  private function actualizar()
  {
    $db = new base_datos();
    return $db->update("productos", array("nombre", "categoria_id", "descripcion", "precio", "imagen"), array("?", "?", "?", "?", "?"), array($this->nombre, $this->categoria, $this->descripcion, $this->precio, $this->imagen), "id=?", array($this->id));
  }

  //voy a hacer una funcion que me devuelva todos los productos
  static function listar()
  {
    $db = new base_datos();
    return $db->select("productos");
  }
}
