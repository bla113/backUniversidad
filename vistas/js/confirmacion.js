function confirmacion() {
    var respuesta = confirm("¿Realmente desea borrar el registro?");
    if (respuesta == true) {
      return true;
    } else {
      return false;
    }
  }