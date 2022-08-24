$(document).ready(function () {

  // Agregar pelicula
  $("#formAgregar").on("submit", function (e) {
    e.preventDefault();
    $("#agregarPeli").modal("hide");
    $.post({
        url: $(this).attr('action'),
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (res) {
          Swal.fire({
              icon: "success",
              title: 'Pelicula agregada correctamente',
              text: 'La pelicula ha sido agregada correctamente',
              confirmButtonText: 'Aceptar',
          });
          setTimeout(Reedireccion, 500);
          function Reedireccion() {
            location.href = "./cartelera.php";
          }
        },
        error: function (e) {
            Swal.fire({
                icon: "error",
                title: 'Error al añadir pelicula',
                text: 'Lo sentimos, hubo un error al añadir la pelicula',
                confirmButtonText: 'Aceptar',
            });
        },
    });
});
 

  // Editar pelicula
  let abrirEditar = (id) => {
    let checks = document.querySelectorAll('.check-peli');
    Array.from(checks).map((check) => {
      return check.checked = false;
    });

    fetch('../php/cartelera/traer_por_id.php', {
        method: "POST",
        body: JSON.stringify({id}),
        headers: { "Content-type": "aplication/json" },
    })
    .then((res) => res.json())
    .then((data) => {
      let {id_cartelera, imagen, genero, nombre, descripcion, duracion, formato, horario, idioma} = data;

      document.querySelector("#idEditar").value = id_cartelera;
      document.querySelector("#tituloEditar").innerText = nombre;
      document.querySelector("#tituloPeliculaEditar").value = nombre;
      document.querySelector("#imgPrev_editar").src = `../public/img/cartelera/${imagen}`;
      document.querySelector("#horarioPeliculaEditar").value = horario;

      let generosS = genero.split(",");

      generosS.map((gen) => {
        document.getElementById(gen).checked = true;
      });

      document.querySelector("#seleccionada").value = idioma;
      document.querySelector("#seleccionada").innerHTML = idioma;
      document.querySelector("#noSeleccionada").value = (idioma == "Español") ? "Subtitulos" : "Español";
      document.querySelector("#noSeleccionada").innerHTML = (idioma == "Español") ? "Subtitulos" : "Español";

      document.querySelector("#seleccionadaFormato").value = formato;
      document.querySelector("#seleccionadaFormato").innerHTML = formato;
      document.querySelector("#noSeleccionadaFormato").value = (formato == "2D") ? "3D" : "2D";
      document.querySelector("#noSeleccionadaFormato").innerHTML = (formato == "2D") ? "3D" : "2D";

      document.querySelector("#duracionPeliculaEditar").value = duracion;
      document.querySelector("#descripcionInputEditar").innerText = descripcion;
    });
  }

  if (document.getElementById("formEditar")) {
    document.getElementById("btnEditar").addEventListener("click", (e) => {
      e.preventDefault();
      const formEditar = document.getElementById("formEditar");
      let formulario = new FormData(formEditar);

      fetch('../php/cartelera/editar.php', {
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
    });
  }

  // Eliminar pelicula

  $(document).on("click", ".eliminarPeli", function () {
    var id = $(this).data("id");

    Swal.fire({
        icon: "warning",
        title: 'Eliminar Pelicula',
        text: '¿Estás seguro de eliminar esta pelicula? esta opción no se puede deshacer',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            $.post("../php/cartelera/eliminar.php", {
                id: id
            }, function () {
                Swal.fire({
                    icon: "success",
                    title: 'Pelicula eliminada',
                    text: 'La pelicula se ha eliminado correctamente',
                });
                setTimeout(Reedireccion, 500);
                function Reedireccion() {
                  location.href = "./cartelera.php";
                }
            });
        } else {
            Swal.fire({
                icon: "error",
                title: 'Cancelado',
                text: 'La pelicula no se ha eliminado',
                confirmButtonText: 'Aceptar'
            });
        }
    });
  });
});