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
 

  // Abrir modal Editar pelicula
  $(document).on("click", ".editarPeli", function () {
    let checks = document.querySelectorAll('.check-peli');
    Array.from(checks).map((check) => {
      return check.checked = false;
    });

    var id = $(this).data("id");
    var titulo = $(this).data("titulo");
    var genero = $(this).data("genero");
    var sinopsis = $(this).data("sinopsis");
    var idioma = $(this).data("idioma");
    var duracion = $(this).data("duracion");
    var formato = $(this).data("formato");
    var imagen = $(this).data("imagen");

    let generosS = genero.split(",");

    generosS.map((gen) => {
      document.getElementById(gen).checked = true;
    });

    $(".modalEditar").modal("show");

    document.querySelector("#idEditar").value = id;

    document.querySelector("#tituloEditar").innerHTML = 'Editar ' + titulo;

    document.querySelector("#tituloPeliculaEditar").value = titulo;

    document.querySelector("#imgPrev_editar").src = "../public/img/cartelera/" + imagen;

    document.querySelector("#seleccionada").value = idioma;
    document.querySelector("#seleccionada").innerHTML = idioma;
    document.querySelector("#noSeleccionada").value = (idioma == "Español") ? "Subtitulos" : "Español";
    document.querySelector("#noSeleccionada").innerHTML = (idioma == "Español") ? "Subtitulos" : "Español";

    document.querySelector("#seleccionadaFormato").value = formato;
    document.querySelector("#seleccionadaFormato").innerHTML = formato;
    document.querySelector("#noSeleccionadaFormato").value = (formato == "2D") ? "3D" : "2D";
    document.querySelector("#noSeleccionadaFormato").innerHTML = (formato == "2D") ? "3D" : "2D";

    document.querySelector("#duracionPeliculaEditar").value = duracion;
    document.querySelector("#descripcionInputEditar").innerText = sinopsis;

  });

  $("#formEditar").on("submit", function (e) {
    e.preventDefault();
    $(".modalEditar").modal("hide");
    $.post({
        url: $(this).attr('action'),
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (res) {
          Swal.fire({
              icon: "success",
              title: 'Pelicula editada correctamente',
              text: 'La pelicula ha sido editada correctamente',
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
                title: 'Error al editar pelicula',
                text: 'Lo sentimos, hubo un error al editar la pelicula',
                confirmButtonText: 'Aceptar',
            });
        },
    });
});

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