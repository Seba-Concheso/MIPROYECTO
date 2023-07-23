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
    $db = new base_datos("mysql", "miproyecto", "localhost:3306", "root", "");
    $result = $db->select("productos", "id=?", array($id));

    if (isset($result[0])) {
      $this->id = $result[0]['id'];
      $this->nombre = $result[0]['nombre_producto'];
      $this->categoria = $result[0]['categoria_id'];
      $this->descripcion = $result[0]['descripcion'];
      $this->precio = $result[0]['precio'];
      $this->imagen = $result[0]['imagen'];
      $this->exist = true;
    }
    return false;
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
    $db = new base_datos("mysql", "miproyecto", "localhost:3306", "root", "");
    return $db->delete("productos", "id= " . $this->id);
  }

  private function insertar()
  {
    $db = new base_datos("mysql", "miproyecto", "localhost:3306", "root", "");
    $result = $db->insert(
      "productos",
      array("nombre_producto", "categoria_id", "descripcion", "precio", "imagen"),
      array("?", "?", "?", "?", "?"),
      array($this->nombre, $this->categoria, $this->descripcion, $this->precio, $this->imagen)
    );

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
    $db = new base_datos("mysql", "miproyecto", "localhost:3306", "root", "");
    return $db->update(
      "productos",
      array("nombre_producto", "categoria_id", "descripcion", "precio", "imagen"),
      array("?", "?", "?", "?", "?"),
      array($this->nombre, $this->categoria, $this->descripcion, $this->precio, $this->imagen),
      "id=?",
      array($this->id)
    );
  }
  public function product_show()
  {
    echo '<pre>';
    print_r($this);
    echo '</pre>';
  }

  //voy a hacer una funcion que me devuelva todos los productos
  static function listar()
  {
    $db = new base_datos("mysql", "miproyecto", "localhost:3306", "root", "");
    return $db->select("productos");
  }
}
