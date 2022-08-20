<!--
=========================================================
Equipo: Cartelera
=========================================================

* Itzel Alejandra Barbosa Cazares.
* Mariela Hernández Flores.
* Jalil Manuel López Ceniceros.
* Paola Elizabeth Rosales Verdín.

=========================================================
-->
<?php
// Conexión a BD
include("../php/conexion.php");
include("./partials/head.php");

$activo = "cartelera";
include("./partials/navbarvertical.php");

include("./partials/scripts.php");
?>

<!DOCTYPE html>
<html lang="en">

<title>Cartelera | Autocinema</title>

<body class="g-sidenav-show bg-gray-100">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php
    include("./partials/navbarhorizontal.php");
    ?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3 d-flex justify-content-between">
              <div>
                <div class="col-12 d-flex align-items-center">
                  <h6 class="mb-0">Películas agregadas recientemente</h6>
                </div>
                <p class="text-sm">Echa un vistazo a los más recientes lanzamientos</p>
              </div>
              <div>
              <a class="btn btn-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#agregarPeli"><i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar película</a>
                <!-- Modal para agregar película -->
                <div class="modal fade" id="agregarPeli" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar película</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#agregarPeli" aria-label="Close"></button>
                        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                      </div>
                      <div class="modal-body">
                        <form id="formAgregar" method="POST">
                          <div class="row">
                            <div class="col-12 mb-3">
                              <label for="tituloPelicula" class="form-label">Título de la película</label>
                              <input type="text" class="form-control" id="tituloPelicula" aria-describedby="Titulo Película" name="tituloPelicula" required>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 mb-3">
                              <label for="imgAñadir" class="form-label">Póster de la Película</label>
                              <input class="form-control" type="file" accept="image/*" id="imgAñadir" data-error="Ingresa un archivo con formato válido." data-success="Válido" name="img" required>
                              <small id="textAyuda" class="text-muted">Imagen a cargar para película. (Formato JPG, PNG, JPEG)</small>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col mb-3">
                              <label for="generoPelicula" class="form-label">Genero de la película</label><br>
                                <small id="textAyuda" class="text-muted">Seleccione genero (s)</small><br>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input check-peli" name="checks[]" type="checkbox" id="inlineCheckbox1" value="Acción">
                                  <label class="form-check-label" for="inlineCheckbox1">Acción</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input check-peli" name="checks[]" type="checkbox" id="inlineCheckbox2" value="Aventura">
                                  <label class="form-check-label" for="inlineCheckbox2">Aventura</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input check-peli" name="checks[]" type="checkbox" id="inlineCheckbox3" value="Ciencia Ficción">
                                  <label class="form-check-label" for="inlineCheckbox3">Ciencia Ficción</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input check-peli" name="checks[]" type="checkbox" id="inlineCheckbox4" value="Comedia">
                                  <label class="form-check-label" for="inlineCheckbox4">Comedia</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input check-peli" name="checks[]" type="checkbox" id="inlineCheckbox5" value="Documental">
                                  <label class="form-check-label" for="inlineCheckbox5">Documental</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input check-peli" name="checks[]" type="checkbox" id="inlineCheckbox6" value="Drama">
                                  <label class="form-check-label" for="inlineCheckbox6">Drama</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input check-peli" name="checks[]" type="checkbox" id="inlineCheckbox7" value="Fantasía">
                                  <label class="form-check-label" for="inlineCheckbox7">Fantasía</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input check-peli" name="checks[]" type="checkbox" id="inlineCheckbox8" value="Musical">
                                  <label class="form-check-label" for="inlineCheckbox8">Musical</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input check-peli" name="checks[]" type="checkbox" id="inlineCheckbox9" value="Romance">
                                  <label class="form-check-label" for="inlineCheckbox9">Romance</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input check-peli" name="checks[]" type="checkbox" id="inlineCheckbox10" value="Supenso">
                                  <label class="form-check-label" for="inlineCheckbox10">Supenso</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input check-peli" name="checks[]" type="checkbox" id="inlineCheckbox11" value="Terror">
                                  <label class="form-check-label" for="inlineCheckbox11">Terror</label>
                                </div>
                                <br><small id="resp" class="text-muted"></small>
                                <input type="hidden" name="generoPelicula" id="generoPelicula">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <label for="horarioPelicula" class="form-label">Horario</label>
                                <input type="time" class="form-control" id="horarioPelicula" aria-describedby="Horario Película" name="horarioPelicula" required>
                              </div>
                              <div class="col mb-3">
                                <label for="idiomaPelicula" class="form-label">Idioma</label>
                                <select name="idiomaPelicula" id="idiomaPelicula" class="form-control" required>
                                  <option selected disabled>Elija idioma</option>
                                  <option value="Español">Español</option>
                                  <option value="Subtitulos">Subtitulos</option>
                                </select>
                              </div>
                              <div class="col mb-3">
                                <label for="duracionPelicula" class="form-label">Duración</label>
                                <input type="number" class="form-control" id="duracionPelicula" aria-describedby="Duracion Película" name="duracionPelicula" required>
                                <small id="textAyuda" class="text-muted">Minutos</small>
                              </div>
                              <div class="col mb-3">
                                <label for="formatoPelicula" class="form-label">Formato</label>
                                <select id="formatoPelicula" class="form-control" name="formatoPelicula" required>
                                  <option selected disabled>Elija formato</option>
                                  <option value="2D">2D</option>
                                  <option value="3D">3D</option>
                                </select>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-12 mb-3">
                                <label for="sinopsisPelicula" class="form-label">Sinópsis</label>
                                <textarea class="form-control" id="sinopsisPelicula" name="descripcion" rows="5" required></textarea>
                              </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Cerrar</button>
                          <button type="submit" id="btnAgregar" class="btn btn-primary btn-sm mb-0">Agregar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--Mostrar películas-->
            <div class="card-body p-3">
              <div class="row">
                <?php
                $sql = "SELECT * FROM cartelera";
                if ($result = mysqli_query($conn, $sql)) {
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                      <div class="col-xl-3 col-md-2 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain shadow p-2">
                          <div class="position-relative">
                            <a class="d-block shadow-xl border-radius-xl">
                              <img src="../public/img/cartelera/<?php echo $row['imagen']; ?>" alt="<?php echo $row['imagen']; ?>" class="img-fluid shadow border-radius-xl">
                            </a>
                          </div>
                          <div class="card-body px-1 pb-0">
                            <div class="row">
                              <div class="col">
                                <p class="text-muted text-sm pb-0 mb-0"><?php echo $row['genero']; ?> </p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <h5 class="ms-2 py-1 mb-0 pb-0"> <?php echo $row['nombre']; ?></h5>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <span class="badge text-bg-light"><?php echo $row['idioma']; ?></span>
                              </div>
                              <div class="col">
                                <span class="badge text-bg-secondary"><?php echo $row['duracion']; ?></span>
                              </div>
                              <div class="col">
                                <span class="badge text-bg-dark"><?php echo $row['formato']; ?></span>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                              <p class="text-muted mb-3 text-sm"><strong class="text-dark">Sinópsis</strong><br> &nbsp;
                              <?php echo $row['descripcion']; ?></p>
                              </div>
                            </div>
                            <div class="ms-auto text-end">
                              <a class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="eliminar('<?php echo $row['id_cartelera'] ?>')" ><i class="far fa-trash-alt me-2"></i>Eliminar</a>
                              <button value="<?php echo $row['id_cartelera']; ?>" onclick="abrirEditar(<?php echo $row['id_cartelera']; ?>)"; class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#editar"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
                            </div>
                          </div>
                        </div>
                      </div>
                <?php
                    }
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal para editar películas -->
      <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tituloEditar">Editar </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="formEditar" method="POST">
                <input type="hidden" id="idEditar" name="id">
                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="formFile" class="form-label">Título de la imagen</label>
                    <input class="form-control" class="form-control" id="tituloPeliculaEditar" name="nombre" rows="8" value="" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mb-3 text-center">
                  <img id="imgPrev_editar" style="width: 300px !important; height: 250px !important;" accept="image/*" id="img_editar_foto" class="card-img-top" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="formFile" class="form-label">Selecciona una imagen</label>
                    <input class="form-control" type="file" accept="image/*" id="img_editar" title="Agrega una imagen" name="img">
                    <small id="textAyuda" class="text-muted">(Formato JPG, PNG, JPEG)</small>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="generoPelicula" class="form-label">Genero de la película</label><br>
                    <small id="textAyuda" class="text-muted">Seleccione genero (s)</small><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input check-peli" name="checksEditar[]" type="checkbox" id="Acción" value="Acción">
                      <label class="form-check-label" for="inlineCheckbox1">Acción</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input check-peli" name="checksEditar[]" type="checkbox" id="Aventura" value="Aventura">
                      <label class="form-check-label" for="inlineCheckbox2">Aventura</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input check-peli" name="checksEditar[]" type="checkbox" id="Ciencia Ficción" value="Ciencia Ficción">
                      <label class="form-check-label" for="inlineCheckbox3">Ciencia Ficción</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input check-peli" name="checksEditar[]" type="checkbox" id="Comedia" value="Comedia">
                      <label class="form-check-label" for="inlineCheckbox4">Comedia</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input check-peli" name="checksEditar[]" type="checkbox" id="Documental" value="Documental">
                      <label class="form-check-label" for="inlineCheckbox5">Documental</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input check-peli" name="checksEditar[]" type="checkbox" id="Drama" value="Drama">
                      <label class="form-check-label" for="inlineCheckbox6">Drama</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input check-peli" name="checksEditar[]" type="checkbox" id="Fantasía" value="Fantasía">
                      <label class="form-check-label" for="inlineCheckbox7">Fantasía</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input check-peli" name="checksEditar[]" type="checkbox" id="Musical" value="Musical">
                      <label class="form-check-label" for="inlineCheckbox8">Musical</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input check-peli" name="checksEditar[]" type="checkbox" id="Romance" value="Romance">
                      <label class="form-check-label" for="inlineCheckbox9">Romance</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input check-peli" name="checksEditar[]" type="checkbox" id="Supenso" value="Supenso">
                      <label class="form-check-label" for="inlineCheckbox10">Supenso</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input check-peli" name="checksEditar[]" type="checkbox" id="Terror" value="Terror">
                      <label class="form-check-label" for="inlineCheckbox11">Terror</label>
                    </div>
                    <br><small id="resp" class="text-muted"></small>
                    <input type="hidden" name="generoPeliculaEditar" id="generoPeliculaEditar">
                  </div>
                </div>
                <div class="row">
                  <div class="col mb-3">
                    <label for="horarioPeliculaEditar" class="form-label">Horario</label>
                    <input type="time" class="form-control" id="horarioPeliculaEditar" aria-describedby="Horario Película" name="horarioPelicula" required>
                  </div>
                  <div class="col mb-3">
                    <label for="idiomaPeliculaEditar" class="form-label">Idioma</label>
                    <select id="idiomaPeliculaEditar" class="form-control" name="idioma" required>
                      <option id="seleccionada" selected></option>
                      <option id="noSeleccionada"></option>              
                    </select>
                  </div>
                  <div class="col mb-3">
                    <label for="duracionPeliculaEditar" class="form-label">Duración</label>
                    <input type="number" class="form-control" id="duracionPeliculaEditar" aria-describedby="Duracion Película" name="duracionPelicula" required>
                    <small id="textAyuda" class="text-muted">Minutos</small>
                  </div>
                  <div class="col mb-3">
                    <label for="formatoPeliculaEditar" class="form-label">Formato</label>
                    <select id="formatoPeliculaEditar" name="formato" class="form-control" required>
                      <option id="seleccionadaFormato" selected></option>
                      <option id="noSeleccionadaFormato"></option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="descripcionInputEditar" class="form-label">Sinópsis</label>
                    <textarea class="form-control" id="descripcionInputEditar" name="descripcion" rows="8"></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnEditar" class="btn btn-primary btn-sm mb-0">Actualizar</button>
              </div>
              </form>
          </div>
      </div>
    </div>
      <?php
      include("./partials/footer.php");
      ?>
    </div>
  </main>
  <?php
  include './partials/personalizacion.php';
  ?>

  <!--   Core JS Files   -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <!-- Scripts de los módulos -->
  <script src="../js/modulos/cartelera.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
  <script src="../js/checkbox.js"></script>
</body>
</html>