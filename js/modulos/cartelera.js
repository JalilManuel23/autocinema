// Config general
let ruta = "../php/cartelera";

// Agregar pelicula
if (document.getElementById("formAgregar")) {
  document.getElementById("btnAgregar").addEventListener("click", (e) => {
  e.preventDefault();

  let tituloPelicula = $("#tituloPelicula").val();
  let tituloImg = $("#tituloImg").val();
  let genero = $("#generoPelicula").val();
  let sinopsis = $("#sinopsisPelicula").val();
  let horario = $("#horarioPelicula").val();
  let idioma = $("#idiomaPelicula").val();
  let duracion = $("#duracionPelicula").val();
  let formato = $("#formatoPelicula").val();
  let imagen = $("#imgAñadir").val();
  let imagenFile = $("#imgAñadir").prop("files");
  
  // Valida que vayan todos los datos
  if(
    tituloPelicula != "" && tituloImg != "" &&
    genero != "" && sinopsis != "" &&
    horario != "" && idioma != "" &&
    duracion != "" && formato != "" && imagen != ""
  ) {
    
    // Si se envian todos los datos los envia a PHP para que los agregué a la BD
    var formData = new FormData();
    formData.append("tituloPelicula", tituloPelicula);
    formData.append("tituloImg", tituloImg);
    formData.append("genero", genero);
    formData.append("sinopsis", sinopsis);
    formData.append("horario", horario);
    formData.append("idioma", idioma);
    formData.append("duracion", duracion);
    formData.append("formato", formato);
    formData.append("imagen", imagenFile[0]);

    fetch(`${ruta}/agregar.php`, {
        method: "POST",
        body: formData,
      })
      .then((response) => response.json())
      .then((response) => {
        if (response == "correcto") {
          Swal.fire({
              position: "center",
              icon: "success",
              title: "Película agregada",
              showConfirmButton: !1,
              timer: 1500,
            });
            setTimeout(Reedireccion, 500);
            function Reedireccion() {
              location.href = "./cartelera.php";
            }
        }
      });
    } else {
      Swal.fire({
        position: "center",
        icon: "error",
        title: "Faltan datos",
        showConfirmButton: !1,
        timer: 1500,
      });
      setTimeout(Reedireccion, 1000);
      function Reedireccion() {
        location.href = "./cartelera.php";
      }
    }
  });
}

// Editar pelicula
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
  
// Eliminar pelicula
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
        fetch(`${ruta}/eliminar.php`, {
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