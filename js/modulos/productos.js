let formularioComida = document.getElementById("formModalComida");
let formularioBoletos = document.getElementById("formModalBoletos");
let formularioPromociones = document.getElementById("formModalPromociones");

let acc = "";
let tabla = "";

let formatterMXN = new Intl.NumberFormat("es-MX", {
  style: "currency",
  currency: "MXN",
});

$(document).on("click", ".addButton", function (e) {
  e.preventDefault();
  acc = "new";

  tabla = $(this).data("tabla");

  if (tabla == "comida") {
    formularioComida.reset();

    $("#formModalComida").attr("action", "../php/productos/agregar_comida.php");
    $("#tituloModalComida").text("Agregar comida");
    $("#btnSubmitComida").text("Agregar");

    $("#modalAgregarEditarComida").modal("show");
  } else if (tabla == "boletos") {
    formularioBoletos.reset();

    $("#formModalBoletos").attr(
      "action",
      "../php/productos/agregar_boleto.php"
    );
    $("#tituloModalBoletos").text("Agregar boletos");
    $("#btnSubmitBoletos").text("Agregar");

    $("#modalAgregarEditarBoletos").modal("show");
  } else if (tabla == "promociones") {
    formularioPromociones.reset();

    $("#formModalPromociones").attr(
      "action",
      "../php/productos/agregar_promociones.php"
    );
    $("#tituloModalPromociones").text("Agregar promociones");
    $("#btnSubmitPromociones").text("Agregar");

    $("#modalAgregarEditarPromociones").modal("show");

    $("#imgPrev_editar").addClass("d-none");
  }
});

$(document).on("click", ".editButton", function (e) {
  e.preventDefault();
  acc = "edit";

  tabla = $(this).data("tabla");
  if (tabla == "comida") {
    formularioComida.reset();

    $("#formModalComida").attr("action", "../php/productos/editar_comida.php");
    $("#tituloModalComida").text("Editar comida");
    $("#idInputComida").val($(this).data("id"));
    $("#nombreInputComida").val($(this).data("nombre"));
    $("#descripcionInputComida").val($(this).data("descripcion"));
    $("#precioInputComida").val($(this).data("precio"));
    $("#stockInputComida").val($(this).data("stock"));
    $("#btnSubmitComida").text("Editar");

    $("#modalAgregarEditarComida").modal("show");
  } else if (tabla == "boletos") {
    formularioBoletos.reset();

    $("#formModalBoletos").attr(
      "action",
      "../php/productos/editar_boletos.php"
    );
    $("#tituloModalBoletos").text("Editar boletos");
    $("#idInputBoletos").val($(this).data("id"));
    $("#funcionInputBoletos").val($(this).data("funcion"));

    let fecha_boletos = $(this).data("fecha").replace(" ", "T");
    $("#fecha_horaInputBoletos").val(fecha_boletos);
    $("#precioInputBoletos").val($(this).data("precio"));
    $("#stockInputBoletos").val($(this).data("stock"));
    $("#btnSubmitBoletos").text("Editar");

    $("#modalAgregarEditarBoletos").modal("show");
  } else if (tabla == "promociones") {
    formularioPromociones.reset();

    $("#formModalPromociones").attr(
      "action",
      "../php/productos/editar_promociones.php"
    );
    $("#tituloModalPromociones").text("Editar promociones");
    $("#idInputPromociones").val($(this).data("id"));
    $("#imgPrev_editar").removeClass("d-none");
    let foto = $(this).data("imagen");
    document.querySelector(
      "#imgPrev_editar"
    ).src = `../public/img/promociones/${foto}`;

    $("#imagenInputPromociones").prop("required", false);
    $("#nombreInputPromociones").val($(this).data("nombre"));
    $("#descripcionInputPromociones").val($(this).data("descripcion"));
    $("#precioInputPromociones").val($(this).data("precio"));
    let fecha_inicio = $(this).data("inicio").replace(" ", "T");
    $("#inicioInputPromociones").val(fecha_inicio);
    let fecha_fin = $(this).data("fin").replace(" ", "T");
    $("#finInputPromociones").val(fecha_fin);
    $("#btnSubmitPromociones").text("Editar");

    $("#modalAgregarEditarPromociones").modal("show");
  }
});

$(document).on("click", ".deleteButton", function (e) {
  e.preventDefault();
  var id = $(this).data("id");

  tabla = $(this).data("tabla");

  if (tabla == "comida") {
    Swal.fire({
      title: "Eliminar comida",
      text: "¿Estás seguro de eliminar esta comida? esta opción no se puede deshacer",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Eliminar",
      confirmButtonColor: "#344767",
      cancelButtonText: "Cancelar",
      cancelButtonColor: "#cb0c9f",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "../php/productos/eliminar_comida.php",
          data: { id: id },
          dataType: "json",
          success: function (response) {
            if (response == "error") {
              Swal.fire({
                icon: "error",
                title: "Ocurrio un error, intentalo más tarde",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#344767",
              });
            } else {
              Swal.fire({
                icon: "success",
                title: "Producto eliminado",
                text: "El producto se ha eliminado correctamente",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#344767",
              });

              let trContenido = "";
              response.map((comida) => {
                trContenido += `<tr class="align-middle">
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/popcorn.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">${comida.nombre}</h6>
                          <p class="text-xs text-secondary mb-0">${
                            comida.descripcion
                          }</p>
                        </div>
                      </div>
                    </td>                        
                    <td>
                      <p class="text-xs font-weight-bold mb-0">${formatterMXN.format(
                        comida.precio
                      )}</p>
                    </td>
                    <td class="align-middle text-center text-sm">`;
                if (comida.stock > 0) {
                  trContenido += `<span class="badge badge-sm bg-gradient-success">Disponible</span>`;
                } else {
                  trContenido += `<span class="badge badge-sm bg-gradient-secondary">Sin stock</span>`;
                }
                trContenido += `</td>
                    <td class="text-xs align-middle">
                      <i style="cursor:pointer;" class="editButton fas fa-edit me-sm-1 fs-5 text-success" data-tabla="comida" data-id="${comida.id}" data-nombre="${comida.nombre}" data-descripcion="${comida.descripcion}" data-precio="${comida.precio}" data-stock="${comida.stock}"></i>
                          <i style="cursor:pointer;" class="deleteButton fas fa-trash me-sm-1 fs-5 text-danger" data-tabla="comida" data-id="${comida.id}"></i>
                    </td>
                </tr>`;
              });

              $("#bodyComida").empty();
              $("#bodyComida").append(trContenido);
            }
          },
        });
      }
    });
  } else if (tabla == "boletos") {
    Swal.fire({
      title: "Eliminar producto",
      text: "¿Estás seguro de eliminar esta comida? esta opción no se puede deshacer",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Eliminar",
      confirmButtonColor: "#344767",
      cancelButtonText: "Cancelar",
      cancelButtonColor: "#cb0c9f",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "../php/productos/eliminar_boletos.php",
          data: { id: id },
          dataType: "json",
          success: function (response) {
            if (response == "error") {
              Swal.fire({
                icon: "error",
                title: "Ocurrio un error, intentalo más tarde",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#344767",
              });
            } else {
              Swal.fire({
                icon: "success",
                title: "Boleto eliminado",
                text: "El boleto se ha eliminado correctamente",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#344767",
              });

              let trContenido = "";
              response.map((boletos) => {
                const meses = [
                  "Enero",
                  "Febrero",
                  "Marzo",
                  "Abril",
                  "Mayo",
                  "Junio",
                  "Julio",
                  "Agosto",
                  "Setiembre",
                  "Octubre",
                  "Noviembre",
                  "Diciembre",
                ];
                let fecha = new Date(boletos.fecha_hora);
                let dia = fecha.getDate();
                let mes = meses[fecha.getMonth()];

                var date = new Date(boletos.fecha_hora);
                var options = {
                  hour: "numeric",
                  minute: "numeric",
                  hour12: true,
                };

                let hora = date.toLocaleString("en-US", options);
                trContenido += `
                  <tr class="align-middle">
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/entradas.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">Boleto | ${
                            boletos.nombre
                          }</h6>
                          <p class="text-xs text-secondary mb-0">Costo: ${formatterMXN.format(
                            boletos.precio
                          )}</p>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <p class="text-xs font-weight-bold mb-0">${dia} de ${mes} a las ${hora}</p>                              
                    </td>
                    <td class="align-middle text-center text-sm">`;
                let fechaBoletos = Date.parse(boletos.fecha_hora);
                let fechaActual = Date.now();
                if (boletos.stock <= 0 || fechaBoletos < fechaActual) {
                  trContenido += `<span class="badge badge-sm bg-gradient-secondary">No disponible</span>`;
                } else {
                  trContenido += `<span class="badge badge-sm bg-gradient-success">Disponible</span>`;
                }
                trContenido += `</td>
                    <td class="text-xs align-middle">
                      <i style="cursor:pointer;" class="editButton fas fa-edit me-sm-1 fs-5 text-success" data-tabla="boletos" data-id="${boletos.id}" data-funcion="${boletos.id_cartelera}" data-fecha="${boletos.fecha_hora}" data-precio="${boletos.precio}" data-stock="${boletos.stock}"></i>
                      <i style="cursor:pointer;" class="deleteButton fas fa-trash me-sm-1 fs-5 text-danger" data-tabla="boletos" data-id="${boletos.id}"></i>
                    </td>
                  </tr>
                `;
              });

              $("#bodyBoletos").empty();
              $("#bodyBoletos").append(trContenido);
            }
          },
        });
      }
    });
  } else if (tabla == "promociones") {
    Swal.fire({
      title: "Eliminar promocion",
      text: "¿Estás seguro de eliminar esta promocion? esta opción no se puede deshacer",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Eliminar",
      confirmButtonColor: "#344767",
      cancelButtonText: "Cancelar",
      cancelButtonColor: "#cb0c9f",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "../php/productos/eliminar_promocion.php",
          data: { id: id },
          dataType: "json",
          success: function (response) {
            if (response == "error") {
              Swal.fire({
                icon: "error",
                title: "Ocurrio un error, intentalo más tarde",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#344767",
              });
            } else {
              Swal.fire({
                icon: "success",
                title: "promocion eliminada",
                text: "El promocion se ha eliminada correctamente",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#344767",
              });

              let cardContenido = "";
              let carrousel = "";
              let i = 0;
              response.map((promocion) => {
                i++;
                const meses = [
                  "Enero",
                  "Febrero",
                  "Marzo",
                  "Abril",
                  "Mayo",
                  "Junio",
                  "Julio",
                  "Agosto",
                  "Setiembre",
                  "Octubre",
                  "Noviembre",
                  "Diciembre",
                ];

                let fechaInicio = new Date(promocion.fecha_inicio);
                let diaInicio = fechaInicio.getDate();
                let mesInicio = meses[fechaInicio.getMonth()];

                let fechaFin = new Date(promocion.fecha_fin);
                let diaFin = fechaFin.getDate();
                let mesFin = meses[fechaFin.getMonth()];
                let anioFin = fechaFin.getFullYear();

                cardContenido += `
              <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card card-blog card-plain">
                  <div class="position-relative">
                    <a class="d-block shadow-xl border-radius-xl">
                      <img src="../public/img/promociones/${
                        promocion.imagen
                      }" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                    </a>
                  </div>
                <div class="card-body px-1 pb-0">
                  <p class="text-gradient text-dark mb-2 text-sm">Promoción #${i}</p>
                  <a href="javascript:;">
                    <h5> ${promocion.nombre} </h5>
                  </a>
                  <p class="text-sm mb-1">
                    ${promocion.descripcion}
                  </p>
                  <p class="mb-4 text-sm text-secondary">Costo: ${formatterMXN.format(
                    promocion.precio
                  )} MXN</p>
                  <p class="text-sm">
                    Promoción válida apartir del ${diaInicio} de ${mesInicio} hasta el ${diaFin} de ${mesFin} de ${anioFin}
                  </p>
                  <div class="mb-3 d-flex mx-1">
                    <a style="cursor:pointer;" data-tabla="promociones" class="editButton btn btn-link text-success text-gradient px-3 mb-0" data-id="${
                      promocion.id
                    }" data-imagen="${promocion.imagen}" data-nombre="${
                  promocion.nombre
                }" data-descripcion="${promocion.descripcion}" data-precio="${
                  promocion.precio
                }" data-inicio="${promocion.fecha_inicio}" data-fin="${
                  promocion.fecha_fin
                }"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
                    <a style="cursor:pointer;" data-tabla="promociones" class="deleteButton btn btn-link text-danger px-3 mb-0" data-id="${
                      promocion.id
                    }" ><i class="far fa-trash-alt me-2"></i>Eliminar</a>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <button type="button" class="enviarPromo btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modalEnviarPromo" data-nombre="${
                      promocion.nombre
                    }">Enviar</button>
                    <div class="avatar-group">
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                        <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                        <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                        <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                        <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            `;

                carrousel += `
              <div class="carousel-item active">
                <img src="../public/img/promociones/${promocion.imagen}" class="d-block w-100" alt="">
              </div>
            `;
              });

              $("#bodyPromociones").empty();
              $("#bodyPromociones").append(
                cardContenido +
                  `
                  <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                    <div style="cursor: pointer;" class="addButton card h-100 card-plain border" data-tabla="promociones" data-bs-toggle="modal" data-bs-target="#modalAgregarEditarPromociones">
                      <div class="card-body d-flex flex-column justify-content-center text-center">
                        <a href="javascript:;">
                          <i class="fa fa-plus text-secondary mb-3"></i>
                          <h5 class=" text-secondary"> Nueva Promoción </h5>
                        </a>
                      </div>
                    </div>
                  </div>
                `
              );

              $("#carrouselPromociones").empty();
              $("#carrouselPromociones").append(carrousel);
            }
          },
        });
      }
    });
  }
});

$("#formModalComida").on("submit", function (e) {
  e.preventDefault();
  var url = $(this).attr("action");

  $.ajax({
    type: "POST",
    url: url,
    data: new FormData(this),
    dataType: "json",
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      $("#modalAgregarEditarComida").modal("hide");
      formularioComida.reset();
      if (acc == "new") {
        if (response == "error") {
          Swal.fire({
            icon: "error",
            title: "Ocurrio un error, intentalo más tarde",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else if (response == "vacio") {
          Swal.fire({
            icon: "warning",
            title: "Los campos no pueden estar vacios",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else {
          Swal.fire({
            icon: "success",
            title: "producto agregado",
            text: "La producto ha sido agregado correctamente",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });

          let trContenido = "";
          response.map((comida) => {
            trContenido += `<tr class="align-middle">
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/popcorn.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">${comida.nombre}</h6>
                          <p class="text-xs text-secondary mb-0">${
                            comida.descripcion
                          }</p>
                        </div>
                      </div>
                    </td>                        
                    <td>
                      <p class="text-xs font-weight-bold mb-0">${formatterMXN.format(
                        comida.precio
                      )}</p>
                    </td>
                    <td class="align-middle text-center text-sm">`;
            if (comida.stock > 0) {
              trContenido += `<span class="badge badge-sm bg-gradient-success">Disponible</span>`;
            } else {
              trContenido += `<span class="badge badge-sm bg-gradient-secondary">Sin stock</span>`;
            }
            trContenido += `</td>
                    <td class="text-xs align-middle">
                      <i style="cursor:pointer;" class="editButton fas fa-edit me-sm-1 fs-5 text-success" data-tabla="comida" data-id="${comida.id}" data-nombre="${comida.nombre}" data-descripcion="${comida.descripcion}" data-precio="${comida.precio}" data-stock="${comida.stock}"></i>
                          <i style="cursor:pointer;" class="deleteButton fas fa-trash me-sm-1 fs-5 text-danger" data-tabla="comida" data-id="${comida.id}"></i>
                    </td>
                </tr>`;
          });

          $("#bodyComida").empty();
          $("#bodyComida").append(trContenido);
        }
      } else if (acc == "edit") {
        if (response == "error") {
          Swal.fire({
            icon: "error",
            title: "Ocurrio un error, intentalo más tarde",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else if (response == "vacio") {
          Swal.fire({
            icon: "warning",
            title: "Los campos no pueden estar vacios",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else {
          Swal.fire({
            icon: "success",
            title: "Producto actualizado",
            text: "El producto ha sido actualizado correctamente",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });

          let trContenido = "";
          response.map((comida) => {
            trContenido += `<tr class="align-middle">
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/popcorn.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">${comida.nombre}</h6>
                          <p class="text-xs text-secondary mb-0">${
                            comida.descripcion
                          }</p>
                        </div>
                      </div>
                    </td>                        
                    <td>
                      <p class="text-xs font-weight-bold mb-0">${formatterMXN.format(
                        comida.precio
                      )}</p>
                    </td>
                    <td class="align-middle text-center text-sm">`;
            if (comida.stock > 0) {
              trContenido += `<span class="badge badge-sm bg-gradient-success">Disponible</span>`;
            } else {
              trContenido += `<span class="badge badge-sm bg-gradient-secondary">Sin stock</span>`;
            }
            trContenido += `</td>
                    <td class="text-xs align-middle">
                      <i style="cursor:pointer;" class="editButton fas fa-edit me-sm-1 fs-5 text-success" data-tabla="comida" data-id="${comida.id}" data-nombre="${comida.nombre}" data-descripcion="${comida.descripcion}" data-precio="${comida.precio}" data-stock="${comida.stock}"></i>
                          <i style="cursor:pointer;" class="deleteButton fas fa-trash me-sm-1 fs-5 text-danger" data-tabla="comida" data-id="${comida.id}"></i>
                    </td>
                </tr>`;
          });

          $("#bodyComida").empty();
          $("#bodyComida").append(trContenido);
        }
      }
    },
    error: function (err, exception) {
      console.log(err);
    },
  });
});

$("#formModalBoletos").on("submit", function (e) {
  e.preventDefault();
  var url = $(this).attr("action");

  $.ajax({
    type: "POST",
    url: url,
    data: new FormData(this),
    dataType: "json",
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      console.log(response);
      $("#modalAgregarEditarBoletos").modal("hide");
      formularioBoletos.reset();
      if (acc == "new") {
        if (response == "error") {
          Swal.fire({
            icon: "error",
            title: "Ocurrio un error, intentalo más tarde",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else if (response == "vacio") {
          Swal.fire({
            icon: "warning",
            title: "Los campos no pueden estar vacios",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else {
          Swal.fire({
            icon: "success",
            title: "Boleto agregado",
            text: "El boleto ha sido agregado correctamente",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });

          let trContenido = "";
          response.map((boletos) => {
            const meses = [
              "Enero",
              "Febrero",
              "Marzo",
              "Abril",
              "Mayo",
              "Junio",
              "Julio",
              "Agosto",
              "Setiembre",
              "Octubre",
              "Noviembre",
              "Diciembre",
            ];
            let fecha = new Date(boletos.fecha_hora);
            let dia = fecha.getDate();
            let mes = meses[fecha.getMonth()];

            var date = new Date(boletos.fecha_hora);
            var options = {
              hour: "numeric",
              minute: "numeric",
              hour12: true,
            };

            let hora = date.toLocaleString("en-US", options);
            trContenido += `
              <tr class="align-middle">
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/entradas.png" class="avatar avatar-sm me-3" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Boleto | ${boletos.nombre}</h6>
                      <p class="text-xs text-secondary mb-0">Costo: ${formatterMXN.format(
                        boletos.precio
                      )}</p>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                  <p class="text-xs font-weight-bold mb-0">${dia} de ${mes} a las ${hora}</p>                              
                </td>
                <td class="align-middle text-center text-sm">`;
            let fechaBoletos = Date.parse(boletos.fecha_hora);
            let fechaActual = Date.now();
            if (boletos.stock <= 0 || fechaBoletos < fechaActual) {
              trContenido += `<span class="badge badge-sm bg-gradient-secondary">No disponible</span>`;
            } else {
              trContenido += `<span class="badge badge-sm bg-gradient-success">Disponible</span>`;
            }
            trContenido += `</td>
                <td class="text-xs align-middle">
                  <i style="cursor:pointer;" class="editButton fas fa-edit me-sm-1 fs-5 text-success" data-tabla="boletos" data-id="${boletos.id}" data-funcion="${boletos.id_cartelera}" data-fecha="${boletos.fecha_hora}" data-precio="${boletos.precio}" data-stock="${boletos.stock}"></i>
                  <i style="cursor:pointer;" class="deleteButton fas fa-trash me-sm-1 fs-5 text-danger" data-tabla="boletos" data-id="${boletos.id}"></i>
                </td>
              </tr>
            `;
          });

          $("#bodyBoletos").empty();
          $("#bodyBoletos").append(trContenido);
        }
      } else if (acc == "edit") {
        if (response == "error") {
          Swal.fire({
            icon: "error",
            title: "Ocurrio un error, intentalo más tarde",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else if (response == "vacio") {
          Swal.fire({
            icon: "warning",
            title: "Los campos no pueden estar vacios",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else {
          Swal.fire({
            icon: "success",
            title: "Boleto actualizado",
            text: "El boleto ha sido actualizado correctamente",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });

          let trContenido = "";
          response.map((boletos) => {
            const meses = [
              "Enero",
              "Febrero",
              "Marzo",
              "Abril",
              "Mayo",
              "Junio",
              "Julio",
              "Agosto",
              "Setiembre",
              "Octubre",
              "Noviembre",
              "Diciembre",
            ];
            let fecha = new Date(boletos.fecha_hora);
            let dia = fecha.getDate();
            let mes = meses[fecha.getMonth()];

            var date = new Date(boletos.fecha_hora);
            var options = {
              hour: "numeric",
              minute: "numeric",
              hour12: true,
            };

            let hora = date.toLocaleString("en-US", options);
            trContenido += `
              <tr class="align-middle">
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/entradas.png" class="avatar avatar-sm me-3" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Boleto | ${boletos.nombre}</h6>
                      <p class="text-xs text-secondary mb-0">Costo: ${formatterMXN.format(
                        boletos.precio
                      )}</p>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                  <p class="text-xs font-weight-bold mb-0">${dia} de ${mes} a las ${hora}</p>                              
                </td>
                <td class="align-middle text-center text-sm">`;
            let fechaBoletos = Date.parse(boletos.fecha_hora);
            let fechaActual = Date.now();
            if (boletos.stock <= 0 || fechaBoletos < fechaActual) {
              trContenido += `<span class="badge badge-sm bg-gradient-secondary">No disponible</span>`;
            } else {
              trContenido += `<span class="badge badge-sm bg-gradient-success">Disponible</span>`;
            }
            trContenido += `</td>
                <td class="text-xs align-middle">
                  <i style="cursor:pointer;" class="editButton fas fa-edit me-sm-1 fs-5 text-success" data-tabla="boletos" data-id="${boletos.id}" data-funcion="${boletos.id_cartelera}" data-fecha="${boletos.fecha_hora}" data-precio="${boletos.precio}" data-stock="${boletos.stock}"></i>
                  <i style="cursor:pointer;" class="deleteButton fas fa-trash me-sm-1 fs-5 text-danger" data-tabla="boletos" data-id="${boletos.id}"></i>
                </td>
              </tr>
            `;
          });

          $("#bodyBoletos").empty();
          $("#bodyBoletos").append(trContenido);
        }
      }
    },
    error: function (err, exception) {
      console.log(err);
    },
  });
});

$("#formModalPromociones").on("submit", function (e) {
  e.preventDefault();
  var url = $(this).attr("action");
  $.ajax({
    type: "POST",
    url: url,
    data: new FormData(this),
    dataType: "json",
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      $("#modalAgregarEditarPromociones").modal("hide");
      formularioPromociones.reset();
      if (acc == "new") {
        if (response == "error") {
          Swal.fire({
            icon: "error",
            title: "Ocurrio un error, intentalo más tarde",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else if (response == "vacio") {
          Swal.fire({
            icon: "warning",
            title: "Los campos no pueden estar vacios",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else {
          Swal.fire({
            icon: "success",
            title: "Promoción agregada",
            text: "La promoción ha sido agregada correctamente",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
            showConfirmButton: false,
          });

          let cardContenido = "";
          let carrousel = "";
          let i = 0;
          response.map((promocion) => {
            i++;
            const meses = [
              "Enero",
              "Febrero",
              "Marzo",
              "Abril",
              "Mayo",
              "Junio",
              "Julio",
              "Agosto",
              "Setiembre",
              "Octubre",
              "Noviembre",
              "Diciembre",
            ];

            let fechaInicio = new Date(promocion.fecha_inicio);
            let diaInicio = fechaInicio.getDate();
            let mesInicio = meses[fechaInicio.getMonth()];

            let fechaFin = new Date(promocion.fecha_fin);
            let diaFin = fechaFin.getDate();
            let mesFin = meses[fechaFin.getMonth()];
            let anioFin = fechaFin.getFullYear();

            cardContenido += `
              <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card card-blog card-plain">
                  <div class="position-relative">
                    <a class="d-block shadow-xl border-radius-xl">
                      <img src="../public/img/promociones/${
                        promocion.imagen
                      }" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                    </a>
                  </div>
                <div class="card-body px-1 pb-0">
                  <p class="text-gradient text-dark mb-2 text-sm">Promoción #${i}</p>
                  <a href="javascript:;">
                    <h5> ${promocion.nombre} </h5>
                  </a>
                  <p class="text-sm mb-1">
                    ${promocion.descripcion}
                  </p>
                  <p class="mb-4 text-sm text-secondary">Costo: ${formatterMXN.format(
                    promocion.precio
                  )} MXN</p>
                  <p class="text-sm">
                    Promoción válida apartir del ${diaInicio} de ${mesInicio} hasta el ${diaFin} de ${mesFin} de ${anioFin}
                  </p>
                  <div class="mb-3 d-flex mx-1">
                    <a style="cursor:pointer;" data-tabla="promociones" class="editButton btn btn-link text-success text-gradient px-3 mb-0" data-id="${
                      promocion.id
                    }" data-imagen="${promocion.imagen}" data-nombre="${
              promocion.nombre
            }" data-descripcion="${promocion.descripcion}" data-precio="${
              promocion.precio
            }" data-inicio="${promocion.fecha_inicio}" data-fin="${
              promocion.fecha_fin
            }"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
                    <a style="cursor:pointer;" data-tabla="promociones" class="deleteButton btn btn-link text-danger px-3 mb-0" data-id="${
                      promocion.id
                    }" ><i class="far fa-trash-alt me-2"></i>Eliminar</a>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <button type="button" class="enviarPromo btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modalEnviarPromo" data-nombre="${
                      promocion.nombre
                    }">Enviar</button>
                    <div class="avatar-group">
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                        <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                        <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                        <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                        <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            `;

            carrousel += `
              <div class="carousel-item active">
                <img src="../public/img/promociones/${promocion.imagen}" class="d-block w-100" alt="">
              </div>
            `;
          });

          $("#bodyPromociones").empty();
          $("#bodyPromociones").append(
            cardContenido +
              `
              <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div style="cursor: pointer;" class="addButton card h-100 card-plain border" data-tabla="promociones" data-bs-toggle="modal" data-bs-target="#modalAgregarEditarPromociones">
                  <div class="card-body d-flex flex-column justify-content-center text-center">
                    <a href="javascript:;">
                      <i class="fa fa-plus text-secondary mb-3"></i>
                      <h5 class=" text-secondary"> Nueva Promoción </h5>
                    </a>
                  </div>
                </div>
              </div>
            `
          );

          $("#carrouselPromociones").empty();
          $("#carrouselPromociones").append(carrousel);
        }
      } else if (acc == "edit") {
        if (response == "error") {
          Swal.fire({
            icon: "error",
            title: "Ocurrio un error, intentalo más tarde",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else if (response == "vacio") {
          Swal.fire({
            icon: "warning",
            title: "Los campos no pueden estar vacios",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
          });
        } else {
          Swal.fire({
            icon: "success",
            title: "Promocion actualizada",
            text: "La promocion ha sido actualizada correctamente",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#344767",
            showConfirmButton: false,
          });

          let cardContenido = "";
          let carrousel = "";
          let i = 0;
          response.map((promocion) => {
            i++;
            const meses = [
              "Enero",
              "Febrero",
              "Marzo",
              "Abril",
              "Mayo",
              "Junio",
              "Julio",
              "Agosto",
              "Setiembre",
              "Octubre",
              "Noviembre",
              "Diciembre",
            ];

            let fechaInicio = new Date(promocion.fecha_inicio);
            let diaInicio = fechaInicio.getDate();
            let mesInicio = meses[fechaInicio.getMonth()];

            let fechaFin = new Date(promocion.fecha_fin);
            let diaFin = fechaFin.getDate();
            let mesFin = meses[fechaFin.getMonth()];
            let anioFin = fechaFin.getFullYear();

            cardContenido += `
              <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card card-blog card-plain">
                  <div class="position-relative">
                    <a class="d-block shadow-xl border-radius-xl">
                      <img src="../public/img/promociones/${
                        promocion.imagen
                      }" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                    </a>
                  </div>
                <div class="card-body px-1 pb-0">
                  <p class="text-gradient text-dark mb-2 text-sm">Promoción #${i}</p>
                  <a href="javascript:;">
                    <h5> ${promocion.nombre} </h5>
                  </a>
                  <p class="text-sm mb-1">
                    ${promocion.descripcion}
                  </p>
                  <p class="mb-4 text-sm text-secondary">Costo: ${formatterMXN.format(
                    promocion.precio
                  )} MXN</p>
                  <p class="text-sm">
                    Promoción válida apartir del ${diaInicio} de ${mesInicio} hasta el ${diaFin} de ${mesFin} de ${anioFin}
                  </p>
                  <div class="mb-3 d-flex mx-1">
                    <a style="cursor:pointer;" data-tabla="promociones" class="editButton btn btn-link text-success text-gradient px-3 mb-0" data-id="${
                      promocion.id
                    }" data-imagen="${promocion.imagen}" data-nombre="${
              promocion.nombre
            }" data-descripcion="${promocion.descripcion}" data-precio="${
              promocion.precio
            }" data-inicio="${promocion.fecha_inicio}" data-fin="${
              promocion.fecha_fin
            }"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
                    <a style="cursor:pointer;" data-tabla="promociones" class="deleteButton btn btn-link text-danger px-3 mb-0" data-id="${
                      promocion.id
                    }" ><i class="far fa-trash-alt me-2"></i>Eliminar</a>
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                    <button type="button" class="enviarPromo btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modalEnviarPromo" data-nombre="${
                      promocion.nombre
                    }">Enviar</button>
                    <div class="avatar-group">
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                        <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                        <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                        <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                      </a>
                      <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                        <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            `;

            carrousel += `
              <div class="carousel-item active">
                <img src="../public/img/promociones/${promocion.imagen}" class="d-block w-100" alt="">
              </div>
            `;
          });

          $("#bodyPromociones").empty();
          $("#bodyPromociones").append(
            cardContenido +
              `
              <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div style="cursor: pointer;" class="addButton card h-100 card-plain border" data-tabla="promociones" data-bs-toggle="modal" data-bs-target="#modalAgregarEditarPromociones">
                  <div class="card-body d-flex flex-column justify-content-center text-center">
                    <a href="javascript:;">
                      <i class="fa fa-plus text-secondary mb-3"></i>
                      <h5 class=" text-secondary"> Nueva Promoción </h5>
                    </a>
                  </div>
                </div>
              </div>
            `
          );

          $("#carrouselPromociones").empty();
          $("#carrouselPromociones").append(carrousel);
          setInterval(() => {
            location.reload();
          }, 2000);
        }
      }
    },
    error: function (err, exception) {
      console.log(err);
    },
  });
});

function generate() {
  let firstname = [
    "Rocio",
    "Javier",
    "Paola",
    "Litzzy",
    "Itzel",
    "Alejandra",
    "Keren",
    "Mariela",
    "Jaqueline",
    "Cristian",
    "Gerardo",
    "David",
    "Axel",
    "Jalil",
    "Adrian",
    "Alberto",
    "Emmanuel",
    "Tirzo",
    "Alonso",
    "Rocio",
    "Paola",
    "Litzzy",
    "Itzel",
    "Alejandra",
    "Keren",
    "Mariela",
    "Jaqueline",
    "Javier",
    "Cristian",
    "Gerardo",
    "David",
    "Axel",
    "Jalil",
    "Adrian",
    "Alberto",
    "Emmanuel",
    "Tirzo",
    "Alonso",
    "Rocio",
    "Paola",
    "Litzzy",
    "Itzel",
    "Alejandra",
    "Keren",
    "Mariela",
    "Jaqueline",
    "Javier",
    "Cristian",
    "Gerardo",
    "David",
    "Axel",
    "Jalil",
    "Adrian",
    "Alberto",
    "Emmanuel",
    "Tirzo",
    "Alonso",
  ];
  let lastname = [
    "Castrellón",
    "Salazar",
    "Rosales",
    "Pacheco",
    "Escamilla",
    "Barbosa",
    "Corral",
    "Hernandez",
    "Medina",
    "Rodríguez",
    "Ceseñas",
    "Álvarez",
    "Gurrola",
    "Lopez",
    "Soria",
    "Campos",
    "Gutierrez",
    "Bonilla",
    "Aragón",
    "Castrellón",
    "Salazar",
    "Rosales",
    "Pacheco",
    "Escamilla",
    "Barbosa",
    "Corral",
    "Hernandez",
    "Medina",
    "Rodríguez",
    "Ceseñas",
    "Álvarez",
    "Gurrola",
    "Lopez",
    "Soria",
    "Campos",
    "Gutierrez",
    "Bonilla",
    "Aragón",
    "Castrellón",
    "Salazar",
    "Rosales",
    "Pacheco",
    "Escamilla",
    "Barbosa",
    "Corral",
    "Hernandez",
    "Medina",
    "Rodríguez",
    "Ceseñas",
    "Álvarez",
    "Gurrola",
    "Lopez",
    "Soria",
    "Campos",
    "Gutierrez",
    "Bonilla",
    "Aragón",
  ];

  let nombres = [];
  for (let i = 0; i < 5; i++) {
    let rand_first = Math.floor(Math.random() * firstname.length);
    let rand_last = Math.floor(Math.random() * lastname.length);
    nombres.push(firstname[rand_first] + " " + lastname[rand_last]);
  }

  return nombres;
}

$(document).on("click", ".enviarPromo", function (e) {
  let formModalEnviar = document.getElementById("formModalEnviar");
  formModalEnviar.reset();

  e.preventDefault();
  var nombrePromo = $(this).data("nombre");

  let response = generate();

  $("#nombrePromocion").text(nombrePromo);
  $("#list-group").empty();

  response.map((nombres) => {
    $("#list-group").append(`<li class="list-group-item">${nombres}</li>`);
  });

  $(document).on("click", "#btnEnviarPromociones", function (e) {
    $("#modalEnviarPromo").modal("hide");
    e.preventDefault();
    Swal.fire({
      icon: "success",
      title: "Promoción enviada",
      text: "La promoción se ha enviado correctamente a los usuarios listados",
      confirmButtonText: "Aceptar",
      confirmButtonColor: "#344767",
    });
  });
});
