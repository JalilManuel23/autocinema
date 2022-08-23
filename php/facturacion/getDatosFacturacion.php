<?php
	include "../conexion.php";

    $html = "";

    $sql = mysqli_query($conn, "SELECT * FROM dato_facturacion");

    while ($row = mysqli_fetch_assoc($sql)) {
        $id_cliente = $row["cliente_id"];
        $sql_cliente = mysqli_query($conn, "SELECT * FROM clientes WHERE id = '$id_cliente'");
        $row_cliente = mysqli_fetch_array($sql_cliente);


        $idDato = $row["id"];
        $correoDato = $row["correo_electronico"];
        $claveDato = $row["clave"];
        $clienteDato = $row["cliente_id"];
        $nombreCliente = $row_cliente["nombre"] . " " . $row_cliente["ape_paterno"] . " " . $row_cliente["ape_materno"];


        $html.= '
        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
        <div class="d-flex flex-column">
          <h6 class="mb-3 text-sm">
            ' . $nombreCliente . '
          </h6>
          <span class="mb-2 text-xs">Correo electrónico: <span
              class="text-dark ms-sm-2 font-weight-bold">' . $correoDato . '</span></span>
          <span class="text-xs">Clave: <span
              class="text-dark ms-sm-2 font-weight-bold">' . $claveDato . '</span></span>
        </div>
        <div class="ms-auto text-end">
        <a class="btn btn-link text-danger text-gradient px-3 mb-0 eliminarDatoFacturacion" data-id="' . $idDato . '"><i
    class="far fa-trash-alt me-2"></i>Eliminar</a>
<a class="btn btn-link text-dark px-3 mb-0 editarDatoFacturacion" data-id="' . $idDato . '"
    data-correoelectronico="' . $correoDato . '"
    data-clienteid="' . $clienteDato . '" data-clave="' . $claveDato . '"><i
        class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
</div>
</li>
';
}

echo $html;