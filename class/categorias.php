<?php  /* @Sebastián Concheso */


class categorias
{
  protected $id;
  public $nombre_categoria;
  private $exist = false;

  function __construct($id = null)
  {
    if ($id != null) {
      $db = new base_datos("mysql", "miproyecto", "localhost:3306", "root", "");
      $result = $db->select("categorias", "id=?", array($id));

      if (isset($result[0]["id"])) {
        $this->id = $result[0]["id"];
        $this->nombre_categoria = $result[0]["nombre_categoria"];
        $this->exist = true;
      }
    }
    return false;
  }

  public function mostrar()
  {
    echo "ID: " . $this->id . "<br>";
    echo "Nombre: " . $this->nombre_categoria . "<br>";
  }

  public function guardar()
  {
    if ($this->exist) {
      return $this->actualizar();
    } else {
      return $this->insertar();
    }
  }

  public function insertar()
  {
    $db = new base_datos("mysql", "miproyecto", "localhost:3306", "root", "");
    $result = $db->insert("categorias", array("nombre_categoria"), array("?"), array($this->nombre_categoria));

    if ($result) {
      $this->id = $result;
      $this->exist = true;
      return true;
    } else {
      return false;
    }
  }

  public function actualizar()
  {
    $db = new base_datos("mysql", "miproyecto", "localhost:3306", "root", "");
    return $db->update("categorias", array("nombre_categoria"), array("?"), array($this->nombre_categoria), "id=?", array($this->id));
  }

  public function eliminar()
  {
    $db = new base_datos("mysql", "miproyecto", "localhost:3306", "root", "");
    return $db->delete("categorias", "id=?", array($this->id));
  }

  static public function listar()
  {
    $db = new base_datos("mysql", "miproyecto", "localhost:3306", "root", "");

    return $db->select('categorias');
  }
  public function category_show()
  {
    echo '<pre>';
    print_r($this);
    echo '</pre>';
  }


  static public function validar($nombre_categoria /*, $email, $precio*/)
  {
    if (trim($nombre_categoria) == "") {
      echo "El nombre de la categoría no puede estar vacío";
      return false;
    }
    //   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     echo "El email no puede estar vacío";
    //     return false;
    //   }
    //   if (!filter_var($precio, FILTER_VALIDATE_FLOAT)) {
    //     echo "El precio no puede estar vacío";
    //     return false;
    //   }
    return true;
  }
}
