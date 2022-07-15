function agregar() {
    imagen = $("#imgAñadir").prop("files");
    var formData = new FormData();
    formData.append("tituloPelicula", $("#tituloPelicula").val());
    formData.append("tituloImg", $("#tituloImg").val());
    formData.append("genero", $("#generoPelicula").val());
    formData.append("sinopsis", $("#sinopsisPelicula").val());
    formData.append("imagen", imagen[0]);

    $.ajax({
        url: "../../pages/cartelera.php",
        data: formData,
        type: "POST",
        processData: false,
        contentType: false,
        success: function (respuesta) {
            switch (respuesta) {
                case "1":
                    Swal.fire(
                        'Correcto',
                        'La información fue guardada con éxito',
                        'success'
                    );
                    $("#formAgregar")[0].reset();
                    break;
                default:
                    Swal.fire("Error", "Algo salió mal.", "error");
            }
        },
    });
}
