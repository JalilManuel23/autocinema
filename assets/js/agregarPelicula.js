if (document.getElementById("formAgregar")) {
    document.getElementById("btnAgregar").addEventListener("click", (e) => {
      e.preventDefault();
    imagen = $("#imgAñadir").prop("files");
    var formData = new FormData();
    formData.append("tituloPelicula", $("#tituloPelicula").val());
    formData.append("tituloImg", $("#tituloImg").val());
    formData.append("genero", $("#generoPelicula").val());
    formData.append("sinopsis", $("#sinopsisPelicula").val());
    formData.append("imagen", imagen[0]);

    fetch("../php/agregarCartelera.php", {
        method: "POST",
        body: formData,
      })
        .then(() => {
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
        });
})
}
