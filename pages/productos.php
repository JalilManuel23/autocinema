<?php
// Conexión a BD
include("../php/conexion.php");
$activo = "productos";

$consulta_comida = mysqli_query($conn, "SELECT * FROM comida");
$consulta_boletos = mysqli_query($conn, "SELECT * FROM boletos");
$consulta_cartelera = mysqli_query($conn, "SELECT * FROM cartelera");
?>
<!DOCTYPE html>
<html lang="es">

  <title>Productos | Autocinema</title>
  <?php include("./partials/head.php"); ?>

<body class="g-sidenav-show bg-gray-100">

  <?php include("./partials/navbarvertical.php"); ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php
    include("./partials/navbarhorizontal.php");
    ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
              <h6>Comida</h6>
              <button class="addButton btn btn-primary" data-tabla="comida" data-bs-toggle="modal" data-bs-target="#modalAgregarEditarComida"><i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar comida</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Precio
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="bodyComida">
                    <?php foreach ($consulta_comida as $comida) { ?>
                      <tr class="align-middle">
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="../assets/img/popcorn.png" class="avatar avatar-sm me-3" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"><?php echo $comida['nombre'] ?></h6>
                              <p class="text-xs text-secondary mb-0"><?php echo $comida['descripcion'] ?></p>
                            </div>
                          </div>
                        </td>                        
                        <td>
                          <p class="text-xs font-weight-bold mb-0">$<?php echo number_format($comida['precio'], 2) ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <?php if ($comida['stock'] > 0) { ?>
                            <span class="badge badge-sm bg-gradient-success">Disponible</span>
                          <?php } else { ?>
                            <span class="badge badge-sm bg-gradient-secondary">Sin stock</span>
                          <?php } ?>
                        </td>
                        <td class="text-xs align-middle">
                          <i style="cursor:pointer;" class="editButton fas fa-edit me-sm-1 fs-5 text-success" data-tabla="comida" data-id="<?php echo $comida['id'] ?>" data-nombre="<?php echo $comida['nombre'] ?>" data-descripcion="<?php echo $comida['descripcion'] ?>" data-precio="<?php echo $comida['precio'] ?>" data-stock="<?php echo $comida['stock'] ?>"></i>
                          <i style="cursor:pointer;" class="deleteButton fas fa-trash me-sm-1 fs-5 text-danger" data-tabla="comida" data-id="<?php echo $comida['id'] ?>"></i>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
              <h6>Boletos</h6>
              <button class="addButton btn btn-primary" data-tabla="boletos" data-bs-toggle="modal" data-bs-target="#modalAgregarEditarBoletos"><i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar boletos</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Horario
                      </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="bodyBoletos">
                    <?php 
                    
                      foreach ($consulta_boletos as $boletos) { 
                        $id_cartelera = $boletos['id_cartelera'];
                        $peliculas = mysqli_query($conn, "SELECT * FROM cartelera WHERE id_cartelera = $id_cartelera");

                        foreach ($peliculas as $pelicula) { 
                      
                    ?>                      
                          <tr class="align-middle">
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div>
                                  <img src="../assets/img/entradas.png" class="avatar avatar-sm me-3" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">Boleto | <?php echo $pelicula['nombre'] ?></h6>
                                  <p class="text-xs text-secondary mb-0">Costo: $<?php echo number_format($boletos['precio'], 2) ?></p>
                                </div>
                              </div>
                            </td>
                            <td class="text-center">
                              <p class="text-xs font-weight-bold mb-0"><?php echo strftime('%d de %B a las %I:%M %p', strtotime($boletos['fecha_hora'])) ?></p>                              
                            </td>
                            <td class="align-middle text-center text-sm">
                              <?php 

                                $fechaBoletos = strtotime($boletos['fecha_hora']);
                                $fechaActual = strtotime("now");
                                if ($boletos['stock'] <= 0 || $fechaBoletos < $fechaActual) { 
                              ?>
                                <span class="badge badge-sm bg-gradient-secondary">Sin stock</span>
                              <?php } else { ?>
                                <span class="badge badge-sm bg-gradient-success">Disponible</span>
                              <?php } ?>
                            </td>
                            <td class="text-xs align-middle">
                              <i style="cursor:pointer;" class="editButton fas fa-edit me-sm-1 fs-5 text-success" data-tabla="boletos" data-id="<?php echo $boletos['id'] ?>" data-funcion="<?php echo $boletos['id_cartelera'] ?>" data-precio="<?php echo $boletos['precio'] ?>" data-stock="<?php echo $boletos['stock'] ?>" data-fecha="<?php echo $boletos['fecha_hora'] ?>"></i>
                              <i style="cursor:pointer;" class="deleteButton fas fa-trash me-sm-1 fs-5 text-danger" data-tabla="boletos" data-id="<?php echo $boletos['id'] ?>"></i>
                            </td>
                          </tr> 
                    <?php } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Modal para comida -->
  <div class="modal fade" id="modalAgregarEditarComida" tabindex="-1" aria-labelledby="staticBackdropLabelComida" aria-hidden="true"  style="position: absolute !importanr; z-index: 999999999999 !important">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tituloModalComida">Agregar comida</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formModalComida" method="POST">
          <div class="modal-body">
              <input type="hidden" id="idInputComida" name="id">
              <div class="row">
                <div class="col-12 mb-3">
                  <label for="nombreInputComida" class="form-label">Nombre del producto</label>
                  <input type="text" class="form-control" id="nombreInputComida" aria-describedby="Nombre del producto" name="nombre" required>
                </div>
                <div class="col-12 mb-3">
                  <label for="descripcionInputComida" class="form-label">Descripción del producto</label>
                  <textarea class="form-control" id="descripcionInputComida" name="descripcion" rows="5" required></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-12 mb-3">
                  <label for="precioInputComida" class="form-label">Precio</label>
                  <input type="number" class="form-control" id="precioInputComida" aria-describedby="precio de los productos" name="precio" required>
                </div>
                <div class="col-md-6 col-12 mb-3">
                  <label for="stockInputComida" class="form-label">Stock</label>
                  <input type="number" class="form-control" id="stockInputComida" aria-describedby="Stock de los productos" name="stock" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnSubmitComida" class="btn btn-primary btn-sm mb-0">Agregar</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal para boletos -->
  <div class="modal fade" id="modalAgregarEditarBoletos" tabindex="-1" aria-labelledby="staticBackdropLabelBoletos" aria-hidden="true" style="position: absolute !importanr; z-index: 999999999999 !important">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tituloModalBoletos">Agregar boleto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formModalBoletos" method="POST">
          <div class="modal-body">
            <input type="hidden" id="idInputBoletos" name="id">
            <div class="row">
              <div class="col-md-6 col-12 mb-3">
                <label for="funcionInputBoletos" class="form-label">Función</label>
                <select id="funcionInputBoletos" class="form-control" name="id_cartelera" required>
                  <option id="seleccionada" selected>Selecciona...</option>
                  <?php foreach ($consulta_cartelera as $cartelera) { ?>
                    <option value="<?php echo $cartelera['id_cartelera'] ?>"><?php echo $cartelera['nombre'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-6 col-12 mb-3">
                <label for="fecha_horaInputBoletos" class="form-label">Fecha y hora de la función</label>
                <input type="datetime-local" class="form-control" id="fecha_horaInputBoletos" aria-describedby="fecha/hora de los productos" name="fecha_hora" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-12 mb-3">
                <label for="precioInputBoletos" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precioInputBoletos" aria-describedby="precio de los productos" name="precio" required>
              </div>
              <div class="col-md-6 col-12 mb-3">
                <label for="stockInputBoletos" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stockInputBoletos" aria-describedby="Stock de los productos" name="stock" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" id="btnSubmitBoletos" class="btn btn-primary btn-sm mb-0">Agregar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php 
    include ('./partials/personalizacion.php'); 
    include("./partials/scripts.php");
  ?>
  <script src="../js/modulos/productos.js"></script>  
</body>
</html>
