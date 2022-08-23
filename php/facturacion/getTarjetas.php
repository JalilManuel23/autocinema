<?php
	include "../conexion.php";

    $html = "";

    $sql_tarjetaprincipal = mysqli_query($conn, "SELECT id FROM tarjeta WHERE tarjetahabiente = 'empresa' ORDER BY id DESC");
    $row_tarjetaprincipal = mysqli_fetch_array($sql_tarjetaprincipal);

    $id_tarjetaprincipal = $row_tarjetaprincipal["id"];

    $sql = mysqli_query($conn, "SELECT * FROM tarjeta WHERE NOT id = '$id_tarjetaprincipal'");

    while ($row = mysqli_fetch_assoc($sql)) {
        $idTarjeta = $row["id"];
        $numeroTarjeta = $row["numerotarjeta"];
        $titularTarjeta = $row["titular"];
        $expiracionTarjeta = $row["expiracion"];
        $tarjetaHabienteTarjeta = $row["tarjetahabiente"];
        $clienteTarjeta = $row["cliente_id"];

        $html.= '<div class="col-md-6 mb-md-0 mb-4">
        <div
          class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row mb-3">
          <img class="w-10 me-3 mb-0" src="../assets/img/logos/mastercard.png" alt="logo">
          <div class="d-flex justify-content-between w-100">
            <h6 class="mb-0">' . $numeroTarjeta . '</h6>
            <div class="d flex justify-content-between">
              <i class="fas fa-eye ms-auto text-dark cursor-pointer verTarjeta me-2"
                data-bs-toggle="tooltip" data-bs-placement="top" data-id="' . $idTarjeta . '"
                data-clienteid="' . $clienteTarjeta . '"
                data-numero="' . $numeroTarjeta . '"
                data-titular="' . $titularTarjeta . '"
                data-expiracion="' . $expiracionTarjeta . '"
                data-tarjetahabiente="' . $tarjetaHabienteTarjeta . '" title="Ver tarjeta"></i>
              <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer editTarjeta me-2"
                data-bs-toggle="tooltip" data-bs-placement="top" data-id="' . $idTarjeta . '"
                data-clienteid="' . $clienteTarjeta . '"
                data-numero="' . $numeroTarjeta . '"
                data-titular="' . $titularTarjeta . '"
                data-expiracion="' . $expiracionTarjeta . '"
                data-tarjetahabiente="' . $tarjetaHabienteTarjeta . '"  title="Editar tarjeta"></i>
              <i class="fas fa-trash ms-auto text-dark cursor-pointer eliminarTarjeta"
                data-bs-toggle="tooltip" data-bs-placement="top" data-id="' . $idTarjeta . '"
                title="Eliminar tarjeta"></i>
            </div>
          </div>
        </div>
      </div>';
    }

    echo $html;