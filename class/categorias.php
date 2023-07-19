<?php


class categorias
{
  protected $id;
  public $nombre_categoria;
  private $exist = false;

  function __construct($id = null)
  {
    if ($id != null) {
      $db = new base_datos();
      $result = $db->select("categorias", "id=?", array($id));

      if (isset($result["id"])) {
        $this->id = $result["id"];
        $this->nombre_categoria = $result["nombre_categoria"];
        $this->exist = true;
      }
    }
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
    $db = new base_datos();
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
    $db = new base_datos();
    return $db->update("categorias", array("nombre_categoria"), array("?"), array($this->nombre_categoria), "id=?", array($this->id));
  }

  public function eliminar()
  {
    $db = new base_datos();
    return $db->delete("categorias", "id=?", array($this->id));
  }

  static public function listar()
  {
    $db = new base_datos();

    return $db->select('categorias');
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


/* Sebastián Concheso */