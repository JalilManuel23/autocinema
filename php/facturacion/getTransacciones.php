<?php
	include "../conexion.php";

    $html = "";

    $sql = mysqli_query($conn, "SELECT * FROM transaccion");

    while ($row = mysqli_fetch_assoc($sql)) {
        $id_cliente = $row["cliente_id"];
        $sql_cliente = mysqli_query($conn, "SELECT * FROM clientes WHERE id = '$id_cliente'");
        $row_cliente = mysqli_fetch_array($sql_cliente);


        $idTransaccion = $row["id"];
        $descripcionTransaccion = $row["descripcion"];
        $fechaHoraTransaccion = $row["fecha_hora"];
        $cantidadTransaccion = $row["cantidad"];
        $clienteTransaccion = $row["cliente_id"];
        $nombreCliente = $row_cliente["nombre"] . " " . $row_cliente["ape_paterno"] . " " . $row_cliente["ape_materno"];

        if ($cantidadTransaccion < 0) {
            $html .= '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
    <button
        class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
            class="fas fa-arrow-down"></i></button>
    <div class="d-flex flex-column">
        <h6 class="mb-1 text-dark text-sm">' . $descripcionTransaccion . '</h6>
        <span class="text-xs">' . $fechaHoraTransaccion . '</span>
        <div class="d-flex">
        <a style="cursor: pointer;" data-id="' . $idTransaccion . '" data-descripcion="' . $descripcionTransaccion . '" data-cantidad="' . $cantidadTransaccion . '" data-clienteid="' . $clienteTransaccion . '" class="text-xs editarTransaccion me-2">Editar</a>
        <a style="cursor: pointer;" data-id="' . $idTransaccion . '" class="text-xs eliminarTransaccion">Eliminar</a>
        </div>
    </div>
    </div>
    <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
        $' . $cantidadTransaccion . '
    </div>
    </li>';
        } else {
            $html .= '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
            <div class="d-flex align-items-center">
            <button
            class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
              class="fas fa-arrow-up"></i></button>
    <div class="d-flex flex-column">
        <h6 class="mb-1 text-dark text-sm">' . $descripcionTransaccion . '</h6>
        <span class="text-xs">' . $fechaHoraTransaccion . '</span>
        <div class="d-flex">
        <a style="cursor: pointer;" data-id="' . $idTransaccion . '" data-descripcion="' . $descripcionTransaccion . '" data-cantidad="' . $cantidadTransaccion . '" data-clienteid="' . $clienteTransaccion . '" class="text-xs editarTransaccion me-2">Editar</a>
        <a style="cursor: pointer;" data-id="' . $idTransaccion . '" class="text-xs eliminarTransaccion">Eliminar</a>
        </div>
    </div>
    </div>
    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
        $' . $cantidadTransaccion . '
    </div>
    </li>';
        }
}

echo $html;