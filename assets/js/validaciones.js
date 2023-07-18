$("form#form_categoria").on("submit", function (event) {
  event.preventDefault();
  const nombre = $.trim($("#nombre").val());

  const error = new Array();

  if (nombre == "") {
    error.push("por favor complete el nombre");
  }
  if (error.length > 0) {
    error.push("Sebastián Concheso");
    alert(error.join("\n"));
    return false;
  }
  // confirmar envio de formulario
  alert(`formulario enviado.\n Categoría ${nombre} creada exitosamente`);
  return true;
});

$("form#form_product").on("submit", function (event) {
  event.preventDefault();
  const nombre = $.trim($("#nombre_producto").val());
  const descripcion = $.trim($("#descripcion").val());
  const precio = $.trim($("#precio").val());
  const categoria = $($("#categoria").val());

  const error = new Array();

  if (nombre == "") {
    error.push("por favor complete el nombre");
  }
  if (descripcion == "") {
    error.push("Ingrese una descripción");
  }
  if (precio == "") {
    error.push("Ingrese un precio");
  }
  if (categoria == "" || categoria == null) {
    error.push("Ingrese una categoria");
  }
  if (error.length > 0) {
    error.push("Sebastián Concheso");
    alert(error.join("\n"));
    return false;
  }
  // confirmar envio de formulario
  alert(`formulario enviado exitosamente`);
  return true;
});
