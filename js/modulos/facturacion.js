$(document).ready(function () {
    let acc = "";
    let url = "";

    // Función para obtener todas las tarjetas y maquetarlas en su lugar
    function getTarjetas() {
        $.get({
            url: '../php/facturacion/getTarjetas.php',
            success: function (html) {
                $("#contTarjetas").empty();
                $("#contTarjetas").html(html);
            },
            error: function (res) {
                console.log(res);
            }
        });

    }

    // Función para obtener toda la información de facturación y maquetarla en su lugar
    function getDatosFacturacion() {
        $.get({
            url: '../php/facturacion/getDatosFacturacion.php',
            success: function (html) {
                $("#contDatosFacturacion").empty();
                $("#contDatosFacturacion").html(html);
            },
            error: function (res) {
                console.log(res);
            }
        });

    }

    // Función para obtener todas las transacciones y maquetarlas en su lugar
    function getTransacciones() {
        $.get({
            url: '../php/facturacion/getTransacciones.php',
            success: function (html) {
                $("#contTransacciones").empty();
                $("#contTransacciones").html(html);
            },
            error: function (res) {
                console.log(res);
            }
        });

    }

    // Función para obtener todas las facturas y maquetarlas en su lugar
    function getFacturas() {
        $.get({
            url: '../php/facturacion/getFacturas.php',
            success: function (html) {
                $("#contFacturas").empty();
                $("#contFacturas").html(html);
            },
            error: function (res) {
                console.log(res);
            }
        });

    }

    // Si no se ha seleccionado un cliente, el switch no se mostrará
    if (!$("#clienteSelect").val()) {
        $("#contSwitch").hide();
    }

    // Evento que evalúa si el usuario eligió un cliente, para mostrar o no el switch cada que este modifique el selector
    $("#clienteSelect").change(function () {
        if ($("#clienteSelect").val()) {
            $("#contSwitch").show();
        } else {
            $("#contSwitch").hide();
        }
    });

    // Si el usuario enciende el switch, el nombre del usuario elegido se pondrá como titular
    $("#switchTitular").change(function () {
        if ($("#switchTitular").prop("checked") == true) {
            $("#titularInput").val($("#clienteSelect option:selected").text());
        } else {
            $("#titularInput").val("");
        }
    });

    // Evento on submit para las tarjetas
    $("#tarjetaForm").on("submit", function (e) {
        e.preventDefault();
        $.post({
            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                console.log(res);
                $("#tarjetaModal").modal("hide");
                $("#tarjetaForm")[0].reset();
                if (acc == "new") {
                    Swal.fire({
                        icon: "success",
                        title: 'Tarjeta añadida',
                        text: 'La tarjeta ha sido añadida correctamente',
                        confirmButtonText: 'Aceptar'
                    });
                } else if (acc == "edit") {
                    Swal.fire({
                        icon: "success",
                        title: 'Tarjeta actualizada',
                        text: 'La tarjeta ha sido actualizada correctamente',
                        confirmButtonText: 'Aceptar',
                    });
                }
                getTarjetas();

            },
            error: function (e) {
                Swal.fire({
                    icon: "error",
                    title: 'Error al añadir la tarjeta',
                    text: 'Lo sentimos, hubo un error al añadir la tarjeta',
                    confirmButtonText: 'Aceptar',
                });
            },
        });
    });

    // Evento para agregar una nueva tarjeta
    $(document).on("click", "#agregarTarjeta", function () {
        $("#tarjetaForm")[0].reset();
        acc = "new";
        $("#tarjetaForm").attr("action", "../php/facturacion/agregarTarjeta.php");
        $("#idInput").val("");

        $("#clienteSelect").prop("disabled", false);
        $("#titularInput").prop("readonly", false);
        $("#numeroInput").prop("readonly", false);
        $("#fechaExpiracionInput").prop("readonly", false);
        $("#tarjetaHabienteSelect").prop("disabled", false);


        $("#titleModalTarjeta").text("Añadir tarjeta");
        $("#btnSubmitTarjeta").text("Añadir tarjeta");
        $("#alertTarjetaText").text("Por favor, ingresa todos los datos a continuación:");

        $("#alertTarjeta").show();
        $("#btnSubmitTarjeta").show();
        $("#btnCancel").text("Cancelar");
    });

    // Evento para ver una tarjeta existente
    $(document).on("click", ".verTarjeta", function () {

        var numerotarjeta = $(this).data("numero");
        var titular = $(this).data("titular");
        var expiracion = $(this).data("expiracion");
        var tarjetahabiente = $(this).data("tarjetahabiente");
        var clienteid = $(this).data("clienteid");

        $("#titleModalTarjeta").text(`Vista previa de la tarjeta de: ${titular}`);
        $("#tarjetaModal").modal("show");

        $("#clienteSelect").val(clienteid);
        $("#clienteSelect").prop("disabled", true);

        $("#titularInput").val(titular);
        $("#titularInput").prop("readonly", true);

        $("#numeroInput").val(numerotarjeta);
        $("#numeroInput").prop("readonly", true);

        $("#fechaExpiracionInput").val(expiracion);
        $("#fechaExpiracionInput").prop("readonly", true);

        $("#tarjetaHabienteSelect").val(tarjetahabiente);
        $("#tarjetaHabienteSelect").prop("disabled", true);

        $("#contSwitch").hide();
        $("#btnSubmitTarjeta").hide();
        $("#alertTarjeta").hide();
        $("#btnCancel").text("Cerrar vista previa");
    });

    // Evento para ver editar una tarjeta
    $(document).on("click", ".editTarjeta", function () {
        acc = "edit";

        var id = $(this).data("id");
        var numerotarjeta = $(this).data("numero");
        var titular = $(this).data("titular");
        var expiracion = $(this).data("expiracion");
        var tarjetahabiente = $(this).data("tarjetahabiente");
        var clienteid = $(this).data("clienteid");

        $("#tarjetaForm").attr("action", "../php/facturacion/editarTarjeta.php");

        $("#titleModalTarjeta").text(`Actualizar la de la tarjeta de: ${titular}`);
        $("#tarjetaModal").modal("show");

        $("#idInput").val(id);

        $("#clienteSelect").val(clienteid);
        $("#clienteSelect").prop("disabled", false);

        $("#titularInput").val(titular);
        $("#titularInput").prop("readonly", false);

        $("#numeroInput").val(numerotarjeta);
        $("#numeroInput").prop("readonly", false);

        $("#fechaExpiracionInput").val(expiracion);
        $("#fechaExpiracionInput").prop("readonly", false);

        $("#tarjetaHabienteSelect").val(tarjetahabiente);
        $("#tarjetaHabienteSelect").prop("disabled", false);

        $("#titleModalTarjeta").text("Añadir tarjeta");
        $("#btnSubmitTarjeta").text("Añadir tarjeta");
        $("#alertTarjetaText").text("Actualiza los datos de esta tarjeta:");
        $("#alertTarjeta").show();
        $("#btnSubmitTarjeta").show();
        $("#btnCancel").text("Cancelar");
    });

    // Evento para eliminar una tarjeta
    $(document).on("click", ".eliminarTarjeta", function () {
        var id = $(this).data("id");
        var conf;

        Swal.fire({
            icon: "warning",
            title: 'Eliminar tarjeta',
            text: '¿Estás seguro de eliminar esta tarjeta? esta opción no se puede deshacer',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                $.post("../php/facturacion/eliminarTarjeta.php", {
                    id: id
                }, function () {
                    Swal.fire({
                        icon: "success",
                        title: 'Tarjeta eliminada',
                        text: 'La tarjeta se ha eliminado correctamente',
                        confirmButtonText: 'Aceptar',
                    });

                    getTarjetas();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: 'Cancelado',
                    text: 'La tarjeta no se ha eliminado',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });

    // Evento on submit para la información de facturación
    $("#datoFacturacionForm").on("submit", function (e) {
        e.preventDefault();
        $.post({
            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                console.log(res);
                $("#datoFacturacionModal").modal("hide");
                $("#datoFacturacionForm")[0].reset();
                if (acc == "new") {
                    Swal.fire({
                        icon: "success",
                        title: 'Información de facturación añadida',
                        text: 'La información de facturación ha sido añadida correctamente',
                        confirmButtonText: 'Aceptar'
                    });
                } else if (acc == "edit") {
                    Swal.fire({
                        icon: "success",
                        title: 'Información de facturación actualizada',
                        text: 'La información de facturación ha sido actualizada correctamente',
                        confirmButtonText: 'Aceptar',
                    });
                }
                getDatosFacturacion();

            },
            error: function (e) {
                Swal.fire({
                    icon: "error",
                    title: 'Error al añadir la información de facturación',
                    text: 'Lo sentimos, hubo un error al añadir la información de facturación',
                    confirmButtonText: 'Aceptar',
                });
            },
        });
    });

    // Evento para agregar una nueva información de facturación
    $(document).on("click", "#agregarDatoFacturacion", function () {
        $("#datoFacturacionForm")[0].reset();
        acc = "new";
        $("#datoFacturacionForm").attr("action", "../php/facturacion/agregarDatoFacturacion.php");
        $("#idInput").val("");

        $("#clienteSelect").prop("disabled", false);
        $("#correoElectronicoInput").prop("readonly", false);
        $("#claveInput").prop("readonly", false);


        $("#titleModalDatoFacturacion").text("Añadir información de facturación");
        $("#btnSubmitDatoFacturacion").text("Añadir información de facturación");
        $("#alertDatoFacturacionText").text("Por favor, ingresa todos los datos a continuación:");

        $("#alertDatoFacturacion").show();
        $("#btnSubmitDatoFacturacion").show();
        $("#btnCancel").text("Cancelar");
    });

    // Evento para ver información de facturación existente
    $(document).on("click", ".verDatoFacturacion", function () {

        var correoelectronico = $(this).data("correoelectronico");
        var clave = $(this).data("clave");
        var clienteid = $(this).data("clienteid");

        $("#titleModalDatoFacturacion").text(`Vista previa de la informacion de facturación`);
        $("#datoFacturacionModal").modal("show");

        $("#clienteSelect2").val(clienteid);
        $("#clienteSelect2").prop("disabled", true);

        $("#correoElectronicoInput").val(correoelectronico);
        $("#correoElectronicoInput").prop("readonly", true);

        $("#claveInput").val(clave);
        $("#claveInput").prop("readonly", true);

        $("#btnSubmitDatoFacturacion").hide();
        $("#alertDatoFacturacion").hide();
        $("#btnCancel").text("Cerrar vista previa");
    });

    // Evento para ver editar información de facturación
    $(document).on("click", ".editarDatoFacturacion", function () {
        acc = "edit";

        var id = $(this).data("id");
        var correoelectronico = $(this).data("correoelectronico");
        var clave = $(this).data("clave");
        var clienteid = $(this).data("clienteid");

        $("#datoFacturacionForm").attr("action", "../php/facturacion/editarDatoFacturacion.php");

        $("#titleModalDatoFacturacion").text(`Actualizar la información de facturación`);
        $("#datoFacturacionModal").modal("show");

        $("#idInput2").val(id);

        $("#clienteSelect2").val(clienteid);
        $("#clienteSelect2").prop("disabled", false);

        $("#correoElectronicoInput").val(correoelectronico);
        $("#correoElectronicoInput").prop("readonly", false);

        $("#claveInput").val(clave);
        $("#claveInput").prop("readonly", false);

        $("#btnSubmitDatoFacturacion").text("Añadir información de facturación");
        $("#alertDatoFacturacionText").text("Actualiza la información de facturación:");
        $("#alertDatoFacturacion").show();
        $("#btnSubmitDatoFacturacion").show();
        $("#btnCancel").text("Cancelar");
    });

    // Evento para eliminar información de facturación
    $(document).on("click", ".eliminarDatoFacturacion", function () {
        var id = $(this).data("id");
        var conf;

        Swal.fire({
            icon: "warning",
            title: 'Eliminar información de facturación',
            text: '¿Estás seguro de eliminar esta información de facturación? esta opción no se puede deshacer',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                $.post("../php/facturacion/eliminarDatoFacturacion.php", {
                    id: id
                }, function () {
                    Swal.fire({
                        icon: "success",
                        title: 'Información de facturación eliminada',
                        text: 'La información de facturación se ha eliminado correctamente',
                        confirmButtonText: 'Aceptar',
                    });

                    getDatosFacturacion();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: 'Cancelado',
                    text: 'La información de facturación no se ha eliminado',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });

    // Evento on submit para la transacción
    $("#transaccionForm").on("submit", function (e) {
        e.preventDefault();
        $.post({
            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                $("#transaccionModal").modal("hide");
                $("#transaccionForm")[0].reset();
                if (acc == "new") {
                    Swal.fire({
                        icon: "success",
                        title: 'Transacción añadida',
                        text: 'La transacción ha sido añadida correctamente',
                        confirmButtonText: 'Aceptar'
                    });
                } else if (acc == "edit") {
                    Swal.fire({
                        icon: "success",
                        title: 'Transacción actualizada',
                        text: 'La transacción ha sido actualizada correctamente',
                        confirmButtonText: 'Aceptar',
                    });
                }
                getTransacciones();

            },
            error: function (e) {
                Swal.fire({
                    icon: "error",
                    title: 'Error al añadir la transacción',
                    text: 'Lo sentimos, hubo un error al añadir la transacción',
                    confirmButtonText: 'Aceptar',
                });
            },
        });
    });

    // Evento para agregar una nueva transacción
    $(document).on("click", "#agregarTransaccion", function () {
        $("#transaccionForm")[0].reset();
        acc = "new";
        $("#transaccionForm").attr("action", "../php/facturacion/agregarTransaccion.php");
        $("#idInput").val("");

        $("#clienteSelect").prop("disabled", false);
        $("#descripcionInput").prop("readonly", false);
        $("#cantidadInput").prop("readonly", false);


        $("#titleModalTransaccion").text("Añadir transacción");
        $("#btnSubmitTransaccion").text("Añadir transacción");
        $("#alertTransaccionText").text("Por favor, ingresa todos los datos a continuación:");

        $("#alertTransaccion").show();
        $("#btnSubmitTransaccion").show();
        $("#btnCancel").text("Cancelar");
    });

    // Evento para ver editar una transacción
    $(document).on("click", ".editarTransaccion", function () {
        acc = "edit";

        var id = $(this).data("id");
        var descripcion = $(this).data("descripcion");
        var cantidad = $(this).data("cantidad");
        var clienteid = $(this).data("clienteid");

        $("#transaccionForm").attr("action", "../php/facturacion/editarTransaccion.php");

        $("#titleModalTransaccion").text(`Actualizar la transacción`);
        $("#transaccionModal").modal("show");

        $("#idInput3").val(id);

        $("#clienteSelect3").val(clienteid);
        $("#clienteSelect3").prop("disabled", false);

        $("#descripcionInput").val(descripcion);
        $("#descripcionInput").prop("readonly", false);

        $("#cantidadInput").val(cantidad);
        $("#cantidadInput").prop("readonly", false);

        $("#btnSubmitTransaccion").text("Actualizar transacción");
        $("#alertTransaccionText").text("Actualiza la transacción:");
        $("#alertTransaccion").show();
        $("#btnSubmitTransaccion").show();
        $("#btnCancel").text("Cancelar");
    });

    // Evento para eliminar una transacción
    $(document).on("click", ".eliminarTransaccion", function () {
        var id = $(this).data("id");
        console.log(id);

        Swal.fire({
            icon: "warning",
            title: 'Eliminar transacción',
            text: '¿Estás seguro de eliminar esta transacción? esta opción no se puede deshacer',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                $.post("../php/facturacion/eliminarTransaccion.php", {
                    id: id
                }, function (res) {
                    console.log(res)
                    Swal.fire({
                        icon: "success",
                        title: 'Transacción eliminada',
                        text: 'La transacción se ha eliminado correctamente',
                        confirmButtonText: 'Aceptar',
                    });

                    getTransacciones();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: 'Cancelado',
                    text: 'La transacción no se ha eliminado',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });

    // Evento on submit para la factura
    $("#facturaForm").on("submit", function (e) {
        e.preventDefault();
        $.post({
            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (res) {
                $("#facturaModal").modal("hide");
                $("#facturaForm")[0].reset();
                if (acc == "new") {
                    Swal.fire({
                        icon: "success",
                        title: 'Factura añadida',
                        text: 'La factura ha sido añadida correctamente',
                        confirmButtonText: 'Aceptar'
                    });
                } else if (acc == "edit") {
                    Swal.fire({
                        icon: "success",
                        title: 'Factura actualizada',
                        text: 'La factura ha sido actualizada correctamente',
                        confirmButtonText: 'Aceptar',
                    });
                }
                getFacturas();

            },
            error: function (e) {
                Swal.fire({
                    icon: "error",
                    title: 'Error al añadir la factura',
                    text: 'Lo sentimos, hubo un error al añadir la factura',
                    confirmButtonText: 'Aceptar',
                });
            },
        });
    });

    // Evento para agregar una nueva factura
    $(document).on("click", "#agregarFactura", function () {
        $("#facturaForm")[0].reset();
        acc = "new";
        $("#facturaForm").attr("action", "../php/facturacion/agregarFactura.php");
        $("#idInput").val("");

        $("#transaccionIdInput").prop("disabled", false);
        $("#datosTransaccionIdInput").prop("disabled", false);


        $("#titleModalFactura").text("Añadir factura");
        $("#btnSubmitFactura").text("Añadir factura");
        $("#alertFacturaText").text("Por favor, ingresa todos los datos a continuación:");

        $("#alertFactura").show();
        $("#btnSubmitFactura").show();
        $("#btnCancel").text("Cancelar");
    });

    // Evento para ver editar una factura
    $(document).on("click", ".editarFactura", function () {
        acc = "edit";

        var id = $(this).data("id");
        var datofacturacionid = $(this).data("datofacturacionid");
        var transaccionid = $(this).data("transaccionid");

        $("#facturaForm").attr("action", "../php/facturacion/editarFactura.php");

        $("#titleModalFactura").text(`Actualizar la factura`);
        $("#facturaModal").modal("show");

        $("#idInput4").val(id);

        $("#transaccionIdInput").val(transaccionid);
        $("#transaccionIdInput").prop("disabled", false);

        $("#datosTransaccionIdInput").val(datofacturacionid);
        $("#datosTransaccionIdInput").prop("disabled", false);

        $("#btnSubmitFactura").text("Actualizar factura");
        $("#alertFacturaText").text("Actualiza la factura:");
        $("#alertFactura").show();
        $("#btnSubmitFactura").show();
        $("#btnCancel").text("Cancelar");
    });

    // Evento para eliminar una factura
    $(document).on("click", ".eliminarFactura", function () {
        var id = $(this).data("id");

        Swal.fire({
            icon: "warning",
            title: 'Eliminar factura',
            text: '¿Estás seguro de eliminar esta factura? esta opción no se puede deshacer',
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                $.post("../php/facturacion/eliminarFactura.php", {
                    id: id
                }, function (res) {
                    Swal.fire({
                        icon: "success",
                        title: 'Factura eliminada',
                        text: 'La factura se ha eliminado correctamente',
                        confirmButtonText: 'Aceptar',
                    });

                    getFacturas();
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: 'Cancelado',
                    text: 'La factura no se ha eliminado',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });

});