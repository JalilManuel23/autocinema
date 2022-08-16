<?php
// Conexión a BD
include("../php/conexion.php");
include("./partials/head.php");

$activo = "promociones";
include("./partials/navbarvertical.php");

include("./partials/scripts.php");
?>
<!DOCTYPE html>
<html lang="en">

  <title>Promociones | Autocinema</title>

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
            <div class="carousel-inner border-radius-xl py-3">
              <div class="carousel-item active">
                <img src="../assets/img/202261518320401.jpg" class="d-block w-100" alt="">
              </div>
              <div class="carousel-item">
                <img src="../assets/img/202261518320401.jpg" class="d-block w-100" alt="">
              </div>
              <div class="carousel-item">
                <img src="../assets/img/202261518320401.jpg" class="d-block w-100" alt="">
              </div>
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
            <div class="row">
              <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card card-blog card-plain">
                  <div class="position-relative">
                    <a class="d-block shadow-xl border-radius-xl">
                      <img src="../assets/img/2022615183850328.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                    </a>
                  </div>
                  <div class="card-body px-1 pb-0">
                    <p class="text-gradient text-dark mb-2 text-sm">Promoción #1</p>
                    <a href="javascript:;">
                      <h5>
                        Lightyear
                      </h5>
                    </a>
                    <p class="mb-4 text-sm">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. In faucibus neque non eleifend maximus. Nulla aliquet nunc a urna hendrerit, eu porttitor nisl dictum.
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                      <button type="button" class="btn btn-outline-primary btn-sm mb-0">Enviar</button>
                      <div class="avatar-group mt-2">
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
              <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card card-blog card-plain">
                  <div class="position-relative">
                    <a class="d-block shadow-xl border-radius-xl">
                      <img src="../assets/img/2022615183427601.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                    </a>
                  </div>
                  <div class="card-body px-1 pb-0">
                    <p class="text-gradient text-dark mb-2 text-sm">Promoción #2</p>
                    <a href="javascript:;">
                      <h5>
                        Promo Big
                      </h5>
                    </a>
                    <p class="mb-4 text-sm">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. In faucibus neque non eleifend maximus. Nulla aliquet nunc a urna hendrerit, eu porttitor nisl dictum.
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                      <button type="button" class="btn btn-outline-primary btn-sm mb-0">Enviar</button>
                      <div class="avatar-group mt-2">
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                          <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                          <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                          <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                          <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card card-blog card-plain">
                  <div class="position-relative">
                    <a class="d-block shadow-xl border-radius-xl">
                      <img src="../assets/img/202261518352952.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                    </a>
                  </div>
                  <div class="card-body px-1 pb-0">
                    <p class="text-gradient text-dark mb-2 text-sm">Promoción #3</p>
                    <a href="javascript:;">
                      <h5>
                        Mini costillitas
                      </h5>
                    </a>
                    <p class="mb-4 text-sm">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. In faucibus neque non eleifend maximus. Nulla aliquet nunc a urna hendrerit, eu porttitor nisl dictum.
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                      <button type="button" class="btn btn-outline-primary btn-sm mb-0">Enviar</button>
                      <div class="avatar-group mt-2">
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                          <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                          <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                          <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                        </a>
                        <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                          <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                <div class="card h-100 card-plain border">
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
  </main>
  <?php
  include './partials/personalizacion.php';
  ?>
</body>
</html>
