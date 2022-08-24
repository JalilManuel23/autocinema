<?php
// Conexión a BD
include("../php/conexion.php");
include("./partials/head.php");

$activo = "Facturación";
include("./partials/navbarvertical.php");

include("./partials/scripts.php");
?>
<!DOCTYPE html>
<html lang="en">

<title>Facturación | Autocinema</title>

<body class="g-sidenav-show bg-gray-100">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php
    include("./partials/navbarhorizontal.php");
    ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <?php
            $sql_tarjetaprincipal = mysqli_query($conn, "SELECT * FROM tarjeta WHERE tarjetahabiente = 'empresa' ORDER BY id DESC");
            $row_tarjetaprincipal = mysqli_fetch_array($sql_tarjetaprincipal);
            ?>
            <h5>Tarjeta de la empresa</h5>
            <div class="col-xl-6 mb-xl-0 mb-4">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl"
                  style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                  <span class="mask bg-gradient-dark"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="fas fa-wifi text-white p-2"></i>
                    <h5 class="text-white mt-4 mb-5 pb-2">
                      <?php echo $row_tarjetaprincipal["numerotarjeta"]; ?></h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Titular</p>
                          <h6 class="text-white mb-0"><?php echo $row_tarjetaprincipal["titular"]; ?></h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Expira en</p>
                          <h6 class="text-white mb-0">1<?php echo $row_tarjetaprincipal["expiracion"]; ?></h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src="../assets/img/logos/mastercard.png" alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fas fa-plus opacity-10"></i>
                      </div>
                    </div>
                    <?php 
                    $sql = mysqli_query($conn, "SELECT SUM(cantidad) AS total FROM transaccion WHERE cantidad > 0");
                    $row = mysqli_fetch_array($sql);
                    ?>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Ingresos</h6>
                      <span class="text-xs">Ingresos actuales</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">+$<?php echo $row["total"]; ?></h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fas fa-minus opacity-10"></i>
                      </div>
                    </div>
                    <?php 
                    $sql = mysqli_query($conn, "SELECT SUM(cantidad) AS total FROM transaccion WHERE cantidad < 0");
                    $row = mysqli_fetch_array($sql);
                    ?>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Gastos</h6>
                      <span class="text-xs">Gastos totales</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">-$<?php echo $row["total"]; ?></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Métodos de pago</h6>
                    </div>
                    <div class="col-6 text-end">
                      <a id="agregarTarjeta" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                        data-bs-target="#tarjetaModal" href=""><i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar
                        tarjeta</a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <?php
                  $sql_tarjetaprincipal = mysqli_query($conn, "SELECT id FROM tarjeta WHERE tarjetahabiente = 'empresa' ORDER BY id DESC");
                  $row_tarjetaprincipal = mysqli_fetch_array($sql_tarjetaprincipal);

                  $id_tarjetaprincipal = $row_tarjetaprincipal["id"];

                  $sql = mysqli_query($conn, "SELECT * FROM tarjeta WHERE NOT id = '$id_tarjetaprincipal'");
                  ?>
                  <div id="contTarjetas" class="row">
                    <?php while ($row = mysqli_fetch_assoc($sql)) {  ?>
                    <div class="col-md-6 mb-md-0 mb-4">
                      <div
                        class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row mb-3">
                        <img class="w-10 me-3 mb-0" src="../assets/img/logos/mastercard.png" alt="logo">
                        <div class="d-flex justify-content-between w-100">
                          <h6 class="mb-0"><?php echo $row["numerotarjeta"]; ?></h6>
                          <div class="d flex justify-content-between">
                            <i class="fas fa-eye ms-auto text-dark cursor-pointer verTarjeta me-2"
                              data-bs-toggle="tooltip" data-bs-placement="top" data-id="<?php echo $row["id"]; ?>"
                              data-clienteid="<?php echo $row["cliente_id"]; ?>"
                              data-numero="<?php echo $row["numerotarjeta"]; ?>"
                              data-titular="<?php echo $row["titular"]; ?>"
                              data-expiracion="<?php echo $row["expiracion"]; ?>"
                              data-tarjetahabiente="<?php echo $row["tarjetahabiente"]; ?>" title="Ver tarjeta"></i>
                            <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer editTarjeta me-2"
                              data-bs-toggle="tooltip" data-bs-placement="top" data-id="<?php echo $row["id"]; ?>"
                              data-clienteid="<?php echo $row["cliente_id"]; ?>"
                              data-numero="<?php echo $row["numerotarjeta"]; ?>"
                              data-titular="<?php echo $row["titular"]; ?>"
                              data-expiracion="<?php echo $row["expiracion"]; ?>"
                              data-tarjetahabiente="<?php echo $row["tarjetahabiente"]; ?>" title="Editar tarjeta"></i>
                            <i class="fas fa-trash ms-auto text-dark cursor-pointer eliminarTarjeta"
                              data-bs-toggle="tooltip" data-bs-placement="top" data-id="<?php echo $row["id"]; ?>"
                              title="Eliminar tarjeta"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Facturas</h6>
                </div>
                <div class="col-6 text-end">
                  <button id="agregarFactura" class="btn btn-outline-primary btn-sm mb-0 p-2" data-bs-toggle="modal"
                    data-bs-target="#facturaModal">Agregar factura</button>
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-0">
              <ul class="list-group">
                <div id="contFacturas">
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM factura");

                while ($row = mysqli_fetch_assoc($sql)) { 
                  $idFactura = $row["id"];
                  $transaccion_id = $row["transaccion_id"];
                  $datofacturacion_id = $row["datofacturacion_id"];
              
                  $sqltransaccion = mysqli_query($conn, "SELECT * FROM transaccion WHERE id = '$transaccion_id'");
                  $rowtransaccion = mysqli_fetch_array($sqltransaccion);
              
                  $sqldatofacturacion = mysqli_query($conn, "SELECT * FROM dato_facturacion WHERE id = '$datofacturacion_id'");
                  $rowdatofacturacion = mysqli_fetch_array($sqldatofacturacion);
                  ?>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark font-weight-bold text-sm"><?php echo $rowtransaccion['fecha_hora']; ?></h6>
                    <span class="text-xs">#<?php echo $rowdatofacturacion['clave']; ?></span>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                  $<?php echo $rowtransaccion['cantidad']; ?>
                  </div>
                </li>
                <?php } ?>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Información de facturación</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <a id="agregarDatoFacturacion" class="btn bg-gradient-dark mb-4 mt-0" data-bs-toggle="modal"
                data-bs-target="#datoFacturacionModal" href=""><i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar
                datos de facturación</a>
              <ul class="list-group">
                <div id="contDatosFacturacion">
                  <?php  
                $sql = mysqli_query($conn, "SELECT * FROM dato_facturacion");
                
                while ($row = mysqli_fetch_assoc($sql)) { 
                  $id_cliente = $row["cliente_id"];
                  $sql_cliente = mysqli_query($conn, "SELECT * FROM clientes WHERE id = '$id_cliente'");
                  $row_cliente = mysqli_fetch_array($sql_cliente);
                ?>
                  <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column">
                      <h6 class="mb-3 text-sm">
                        <?php echo $row_cliente["nombre"] . " " . $row_cliente["ape_paterno"] . " " . $row_cliente["ape_materno"]; ?>
                      </h6>
                      <span class="mb-2 text-xs">Correo electrónico: <span
                          class="text-dark ms-sm-2 font-weight-bold"><?php echo $row["correo_electronico"]; ?></span></span>
                      <span class="text-xs">Clave: <span
                          class="text-dark ms-sm-2 font-weight-bold"><?php echo $row["clave"]; ?></span></span>
                    </div>
                    <div class="ms-auto text-end">
                      <a class="btn btn-link text-danger text-gradient px-3 mb-0 eliminarDatoFacturacion"
                        data-id="<?php echo $row["id"]; ?>"><i class="far fa-trash-alt me-2"></i>Eliminar</a>
                      <a class="btn btn-link text-dark px-3 mb-0 editarDatoFacturacion"
                        data-id="<?php echo $row["id"]; ?>"
                        data-correoelectronico="<?php echo $row["correo_electronico"]; ?>"
                        data-clienteid="<?php echo $row["cliente_id"]; ?>" data-clave="<?php echo $row["clave"] ?>"><i
                          class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
                    </div>
                  </li>
                  <?php }?>
                </div>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Transacciones recientes</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                  <i class="far fa-calendar-alt me-2"></i>
                  <small></small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              <a id="agregarTransaccion" class="btn bg-gradient-dark mb-0 mt-0 align-right" data-bs-toggle="modal"
                data-bs-target="#transaccionModal" href=""><i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar
                transaccion</a>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-3 mb-3">Más recientes</h6>
              <ul class="list-group">
                <div id="contTransacciones">
                  <?php 
                $sql = mysqli_query($conn, "SELECT * FROM transaccion");

                while ($row = mysqli_fetch_assoc($sql)) { 
                ?>
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <?php if ($row["cantidad"] < 0) { ?>
                      <button
                        class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                          class="fas fa-arrow-down"></i></button>
                      <?php } else { ?>
                      <button
                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                          class="fas fa-arrow-up"></i></button>
                      <?php }  ?>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm"><?php echo $row["descripcion"] ?></h6>
                        <span class="text-xs"><?php echo $row["fecha_hora"] ?></span>
                        <div class="d-flex">
                          <a style="cursor: pointer;" data-id="<?php echo $row["id"] ?>"
                            data-descripcion="<?php echo $row["descripcion"] ?>"
                            data-cantidad="<?php echo $row["cantidad"] ?>"
                            data-clienteid="<?php echo $row["cliente_id"] ?>"
                            class="text-xs editarTransaccion me-2">Editar</a>
                          <a style="cursor: pointer;" data-id="<?php echo $row["id"] ?>"
                            class="text-xs eliminarTransaccion">Eliminar</a>
                        </div>
                      </div>
                    </div>
                    <?php if ($row["cantidad"] < 0) { ?>
                    <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                      $<?php echo $row["cantidad"]; ?>
                    </div>
                    <?php } else { ?>
                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                      $<?php echo $row["cantidad"]; ?>
                    </div>
                    <?php }  ?>
                  </li>
                  <?php } ?>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php
      include './partials/footer.php';
      ?>
    </div>
  </main>
  <?php
  include './partials/personalizacion.php';
  include './partials/modal_facturacion.php';
  ?>

  <!-- Scripts de los módulos -->
  <script src="../js/modulos/facturacion.js"></script>
</body>

</html>