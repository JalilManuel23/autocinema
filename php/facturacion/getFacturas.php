<?php
include "../conexion.php";

$html = "";

$sql = mysqli_query($conn, "SELECT * FROM factura");

while ($row = mysqli_fetch_assoc($sql)) {
    $idFactura = $row["id"];
    $transaccion_id = $row["transaccion_id"];
    $datofacturacion_id = $row["datofacturacion_id"];

    $sqltransaccion = mysqli_query($conn, "SELECT * FROM transaccion WHERE id = '$transaccion_id'");
    $rowtransaccion = mysqli_fetch_array($sqltransaccion);

    $sqldatofacturacion = mysqli_query($conn, "SELECT * FROM dato_facturacion WHERE id = '$datofacturacion_id'");
    $rowdatofacturacion = mysqli_fetch_array($sqldatofacturacion);

    $html .= '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
    <div class="d-flex flex-column">
      <h6 class="mb-1 text-dark font-weight-bold text-sm">' . $rowtransaccion['fecha_hora'] . '</h6>
      <span class="text-xs">#' . $rowdatofacturacion['clave'] . '</span>
    </div>
    <div class="d-flex align-items-center text-sm">
      $' . $rowtransaccion['cantidad'] . '</div></li>';
}

echo $html;
