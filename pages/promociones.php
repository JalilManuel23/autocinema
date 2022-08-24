<?php
// Conexión a BD
include("../php/conexion.php");
include("./partials/head.php");

$activo = "Promociones";
include("./partials/navbarvertical.php");

include("./partials/scripts.php");

$consulta_promociones = mysqli_query($conn, "SELECT * FROM promociones");
$consulta_imagenes = mysqli_query($conn, "SELECT imagen FROM promociones");

date_default_timezone_set('America/Mexico_city');
setlocale(LC_ALL, '');

?>
<!DOCTYPE html>
<html lang="en">

  <title>Promociones | Autocinema</title>

  <script>
    const dfLayerOptions = {
      installationId: 'ffa12f78-cce0-404a-9dbf-53c293854165',
      zone: 'us1'
    };

    

    (function (l, a, y, e, r, s) {
      r = l.createElement(a); r.onload = e; r.async = 1; r.src = y;
      s = l.getElementsByTagName(a)[0]; s.parentNode.insertBefore(r, s);
    })(document, 'script', 'https://cdn.doofinder.com/livelayer/1/js/loader.min.js', function () {
      doofinderLoader.load(dfLayerOptions);
    });
  </script>

  <script src="//cdn.doofinder.com/recommendations/js/doofinderRecommendation.min.js"></script>
  <df-recommendations
    hashid="be4d4670c7cc5aacc2b07b704a221135"
    total-products="10"
    region="us1"
  ></df-recommendations>
<body class="g-sidenav-show bg-gray-100">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php
    include("./partials/navbarhorizontal.php");
    ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner border-radius-xl py-3" id="carrouselPromociones">
              <?php foreach ($consulta_imagenes as $imagenes) { ?>
                <div class="carousel-item active">
                  <img src="../public/img/promociones/<?php echo $imagenes['imagen'] ?>" class="d-block w-100" alt="">
                </div>
              <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">Disfruta del nuevo</p>
                    <h5 class="font-weight-bolder">COMBO PIZZA</h5>
                    <p class="mb-5">Elige entre sabor pepperoni ó hawaiana + Refresco Jumbo + Papas Twister</p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                      Términos y condiciones
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    <img src="../assets/img/shapes/waves-white.svg"
                      class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-100 position-relative z-index-2 pt-4"
                        src="../assets/img/illustrations/imagen1.png" alt="rocket">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
              style="background-image: url('../assets/img/2022622175759448.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2">THOR: AMOR Y TRUENO</h5>
                <p class="text-white">¡La grandeza de THOR: AMOR Y TRUENO de Marvel Studios ha llegado con estos poderosos promocionales!</p>
                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Restricciones
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-5">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
              style="background-image: url('../assets/img/202261518320401.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                <h5 class="text-white font-weight-bolder mb-4 pt-2">MINIONS : NACE UN VILLANO</h5>
                <p class="text-white">¡Vive la aventura de minions: nace un villano con el nuevo Frappé!</p>
                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                  Restricciones
                  <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">PRECIO ESPECIAL</p>
                    <h5 class="font-weight-bolder">ALIMENTOS Y ENTRADAS</h5>
                    <p class="mb-5">Al comprar un combo, una trajeta con beneficios.</p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                      Términos y condiciones
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    <img src="../assets/img/shapes/waves-white.svg"
                      class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-100 position-relative z-index-2 pt-4"
                        src="../assets/img/illustrations/imagen2.png" alt="rocket">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col">
        <div class="card mb-4">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-1">Promociones</h6>
            <p class="text-sm">Crear promociones</p>
          </div>
          <div class="card-body p-3">
            <div class="row" id="bodyPromociones">
              <?php 
                $i = 0;
                foreach ($consulta_promociones as $promocion) { 
                $i++;
              ?>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                  <div class="card card-blog card-plain">
                    <div class="position-relative">
                      <a class="d-block shadow-xl border-radius-xl">
                        <img src="../public/img/promociones/<?php echo $promocion['imagen'] ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                      </a>
                    </div>
                    <div class="card-body px-1 pb-0">
                      <p class="text-gradient text-dark mb-2 text-sm">Promoción #<?php echo $i ?></p>
                      <a href="javascript:;">
                        <h5> <?php echo $promocion['nombre'] ?> </h5>
                      </a>
                      <p class="text-sm mb-1">
                        <?php echo $promocion['descripcion'] ?>
                      </p>
                      <p class="mb-4 text-sm text-secondary">Costo: $<?php echo number_format($promocion['precio'], 2) ?> MXN</p>
                      <p class="text-sm">
                        Promoción válida del <?php echo strftime('%d de %B a las %I:%M %p', strtotime($promocion['fecha_inicio'])) ?> hasta el <?php echo strftime('%d de %B de %Y a las %I:%M %p', strtotime($promocion['fecha_fin'])) ?>
                      </p>
                      <div class="mb-3 d-flex mx-1">
                        <a style="cursor:pointer;" data-tabla="promociones" class="editButton btn btn-link text-success text-gradient px-3 mb-0" data-id="<?php echo $promocion['id'] ?>" data-imagen="<?php echo $promocion['imagen'] ?>" data-nombre="<?php echo $promocion['nombre'] ?>" data-descripcion="<?php echo $promocion['descripcion'] ?>" data-precio="<?php echo $promocion['precio'] ?>" data-inicio="<?php echo $promocion['fecha_inicio'] ?>" data-fin="<?php echo $promocion['fecha_fin'] ?>"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
                        <a style="cursor:pointer;" data-tabla="promociones" class="deleteButton btn btn-link text-danger px-3 mb-0" data-id="<?php echo $promocion['id'] ?>" ><i class="far fa-trash-alt me-2"></i>Eliminar</a>
                      </div>
                      <div class="d-flex align-items-center justify-content-between">
                        <button type="button" class="enviarPromo btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modalEnviarPromo" data-nombre="<?php echo $promocion['nombre'] ?>">Enviar</button>
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
              <?php } ?>
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
            </div>
          </div>
        </div>
        </div>
      </div>
      <?php
      include './partials/footer.php';
      ?>
    </div>

    <!-- Modal para promociones -->
    <div class="modal fade" id="modalAgregarEditarPromociones" tabindex="-1" aria-labelledby="staticBackdropLabelPromociones" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tituloModalPromociones">Agregar promocion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <form id="formModalPromociones" method="POST">
              <div class="modal-body">
                <input type="hidden" id="idInputPromociones" name="id">
                <div class="row">
                  <div class="col-12 mb-3 text-center">
                  <img id="imgPrev_editar" style="width: 500px !important; height: 250px !important;" accept="image/*" id="img_editar_foto" class="card-img-top" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="imagenInputPromociones" class="form-label">Selecciona una imagen</label>
                    <input class="form-control" type="file" accept="image/*" id="imagenInputPromociones" title="Agrega una imagen" name="img" required>
                    <small id="textAyuda" class="text-muted">(Formato JPG, PNG, JPEG)</small>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="nombreInputPromociones" class="form-label">Nombre de la promocion</label>
                    <input type="text" class="form-control" id="nombreInputPromociones" aria-describedby="Nombre de la promocion" name="nombre" required>
                  </div>
                  <div class="col-12 mb-3">
                    <label for="descripcionInputPromociones" class="form-label">Descripción de la promocion</label>
                    <textarea class="form-control" id="descripcionInputPromociones" name="descripcion" rows="5" required></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="precioInputPromociones" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precioInputPromociones" aria-describedby="Precio de la promocion" name="precio" required>
                  </div>                
                </div>
                <div class="row">
                  <div class="col-md-6 col-12 mb-3">
                    <label for="inicioInputPromociones" class="form-label">Inicio de la promoción</label>
                    <input type="datetime-local" class="form-control" id="inicioInputPromociones" aria-describedby="Inicio de la promoción" name="inicio" required>
                  </div>
                  <div class="col-md-6 col-12 mb-3">
                    <label for="finInputPromociones" class="form-label">Fin de la promoción</label>
                    <input type="datetime-local" class="form-control" id="finInputPromociones" aria-describedby="Fin de la promoción" name="fin" required>
                  </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnSubmitPromociones" class="btn btn-primary btn-sm mb-0">Agregar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal para eviar promociones -->
    <div class="modal fade" id="modalEnviarPromo" tabindex="-1" aria-labelledby="staticBackdropLabelPromociones" aria-hidden="true" style="position: absolute !importanr; z-index: 999999999999 !important">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tituloModalPromociones">Enivar promocion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
            <form id="formModalEnviar" method="POST">
              <div class="modal-body">
                <div class="row mb-3">
                  <div class="col-12">
                    <p class="mb-0">
                      Se encontraron a los siguientes usuarios a los cuales les puede interesar esta promoción con base en las estadísticas obtenidas. 
                    </p>
                    <p>                      
                      Envíales un correo electrónico para que conozcan la nueva promoción: <strong>"<span id="nombrePromocion"></span>."</strong>
                    </p>

                  </div>
                  <div class="col-12">
                    <ul class="list-group" id="list-group"></ul>
                  </div>
                </div>                
                <div class="row">                  
                  <div class="col-12 mb-3">
                    <label for="descripcionInputPromociones" class="form-label">Escribe un mensaje</label>
                    <textarea class="form-control" id="descripcionInputPromociones" name="descripcion" rows="5" required></textarea>
                  </div>
                  <div class="col-12 mb-3">
                  </div>
                </div>                
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnEnviarPromociones" class="btn btn-primary btn-sm mb-0">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <?php
  include './partials/personalizacion.php';
  ?>
  <script src="../js/modulos/productos.js"></script>
</body>
</html>
