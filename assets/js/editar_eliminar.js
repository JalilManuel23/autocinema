if (document.getElementById("formEditar")) {
  document.getElementById("btnEditar").addEventListener("click", (e) => {
    e.preventDefault();
    const formEditar = document.getElementById("formEditar");
    let formulario = new FormData(formEditar);

    let nombre = formulario.get("nombre").trim();
    let descripcion = formulario.get("descripcion").trim();
    let genero = formulario.get("generoPeliculaEditar");

    if (nombre == "" || descripcion == "" || genero == "") {
      Swal.fire("Aviso!", "Debes de llenar todos los campos", "warning");
    } else if (nombre.length > 0) {
      if (descripcion.length > 0) {
        if (genero.length > 0) {
          fetch("../php/editar.php", {
            method: "POST",
            body: formulario,
          })
            .then((response) => response.json())
            .then((response) => {
              if (response == "correcto") {
                Swal.fire({
                  position: "center",
                  icon: "success",
                  title: "Película actualizada",
                  showConfirmButton: !1,
                  timer: 1500,
                });
                setTimeout(Reedireccion, 500);
                function Reedireccion() {
                  location.href = "./cartelera.php";
                }
              } else if (response == "vacio") {
                Swal.fire("Error!", "Datos vacíos", "error");
              } else if (response == "error") {
                Swal.fire("Error!", "Error en el servidor", "error");
              }
            });
        } else {
          Swal.fire("Aviso!", "El genero no es valido", "warning");
          formulario = null;
        }
      } else {
        Swal.fire("Aviso!", "La descripcion no es válida", "warning");
        formulario = null;
      }
    } else {
      Swal.fire("Aviso!", "El nombre no es válido", "warning");
      formulario = null;
    }
  });
}

function eliminar(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas eliminar la película?",
    text: "No podras recuperar la información.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      eliminar_pelicula = {
        id: id,
      };
      fetch(`../php/eliminar.php`, {
        method: "POST",
        body: JSON.stringify(eliminar_pelicula),
        headers: { "Content-type": "aplication/json" },
      })
        .then((res) => res.json())
        .then((data) => {
          if (data == "correcto") {
            Swal.fire({
              icon: "success",
              title: "Película eliminada",
              showConfirmButton: false,
              timer: 1500,
            });
            setTimeout(Reedireccion, 500);
            function Reedireccion() {
              location.href = "./cartelera.php";
            }
          } else {
            Swal.fire({
              icon: "error",
              title: "Error en el servidor",
              showConfirmButton: false,
              timer: 3000,
            });
          }
        });
    }
  });
}
