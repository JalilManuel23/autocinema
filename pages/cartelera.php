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
include("../php/conexion/conexion.php");
include("../php/head.php");
include("../php/navbarvertical.php");
include("../php/scripts.php");
?>

<!DOCTYPE html>
<html lang="en">

<title>Cartelera | Autocinema</title>

<body class="g-sidenav-show bg-gray-100">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php
    include("../php/navbarhorizontal.php");
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
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                  <label class="form-check-label" for="inlineCheckbox1">Acción</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                  <label class="form-check-label" for="inlineCheckbox2">Aventura</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                  <label class="form-check-label" for="inlineCheckbox3">Ciencia Ficción</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                                  <label class="form-check-label" for="inlineCheckbox4">Comedia</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option5">
                                  <label class="form-check-label" for="inlineCheckbox5">Documental</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option6">
                                  <label class="form-check-label" for="inlineCheckbox6">Drama</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option7">
                                  <label class="form-check-label" for="inlineCheckbox7">Fantasía</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="option8">
                                  <label class="form-check-label" for="inlineCheckbox8">Musical</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="option9">
                                  <label class="form-check-label" for="inlineCheckbox9">Romance</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox10" value="option10">
                                  <label class="form-check-label" for="inlineCheckbox10">Supenso</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" id="inlineCheckbox11" value="option11">
                                  <label class="form-check-label" for="inlineCheckbox11">Terror</label>
                                </div>
                                <small id="textAyuda" class="text-muted">Seleccione genero (s)</small><br>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                <label for="horarioPelicula" class="form-label">Horario</label>
                                <input type="time" class="form-control" id="horarioPelicula" aria-describedby="Horario Película" name="horarioPelicula" required>
                              </div>
                              <div class="col mb-3">
                                <label for="idiomaPelicula" class="form-label">Idioma</label>
                                <select id="idiomaPelicula" class="form-control" required>
                                  <option selected disabled>Elija idioma</option>
                                  <option value="espanol">Español</option>
                                  <option value="subtitulos">Subtitulos</option>
                                </select>
                              </div>
                              <div class="col mb-3">
                                <label for="duracionPelicula" class="form-label">Duración</label>
                                <input type="number" class="form-control" id="duracionPelicula" aria-describedby="Duracion Película" name="duracionPelicula" required>
                                <small id="textAyuda" class="text-muted">Minutos</small>
                              </div>
                              <div class="col mb-3">
                                <label for="formatoPelicula" class="form-label">Formato</label>
                                <select id="formatoPelicula" class="form-control" required>
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
                              <img src="../assets/img/cartelera/<?php echo $row['imagen']; ?>" alt='<?php echo $row['imagen']; ?>' class='img-fluid shadow border-radius-xl'>
                            </a>
                          </div>
                          <div class="card-body px-1 pb-0">
                            <p class="text-muted mb-2 text-sm"><b>Género: </b> <?php echo $row['genero']; ?> </p>
                            <a href="javascript:;">
                              <h5>
                                <?php echo $row['nombre']; ?>
                              </h5>
                            </a>
                            <div class="row">
                              <div class="col mb-3">
                                <!--<p class="text-muted mb-2 text-sm"><b>Horario: </b></p>-->
                              </div>
                              <div class="col mb-3">
                                <!--<p class="text-muted mb-2 text-sm"></p>-->
                              </div>
                            </div>
                            <div class="row">
                              <div class="col mb-3">
                                  <!--<p class="text-muted mb-2 text-sm"></p>-->
                              </div>
                              <div class="col mb-3">
                                <!--<p class="text-muted mb-2 text-sm"></p>-->
                              </div>
                            </div>
                            <p class="mb-2 text-sm"><b>Sinópsis</b></p>
                            <p class="mb-2 text-sm"><?php echo $row['descripcion']; ?></p>
                            <div class="ms-auto text-end">
                              <a class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="eliminar('<?php echo $row['id_cartelera'] ?>')" ><i class="far fa-trash-alt me-2"></i>Eliminar</a>
                              <a class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#editar<?php echo $row['id_cartelera']; ?>"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Modal para editar películas -->
                      <div class="modal fade" id="editar<?php echo $row['id_cartelera']; ?>" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Editar <?php echo $row['nombre']; ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form id="formEditar" method="POST">
                                <input type="hidden" value="<?php echo $row['id_cartelera'] ?>" name="id">
                                <div class="row">
                                  <div class="col-12 mb-3">
                                    <label for="formFile" class="form-label">Título de la imagen</label>
                                    <input class="form-control" class="form-control" id="tituloPelicula" name="nombre" rows="8" value="<?php echo $row['nombre'] ?>" required>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-12 mb-3 text-center">
                                  <img id="imgPrev_editar" style="width: 300px !important; height: 250px !important;" accept="image/*" id="img_editar_foto" class="card-img-top" src="../assets/img/cartelera/<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre'] ?>">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-12 mb-3">
                                    <label for="formFile" class="form-label">Selecciona una imagen</label>
                                    <input class="form-control" type="file" accept="image/*" id="img_editar" title="Agrega una imagen" name="img" required>
                                    <small id="textAyuda" class="text-muted">(Formato JPG, PNG, JPEG)</small>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-12 mb-3">
                                    <label for="generoPelicula" class="form-label">Genero de la película</label><br>
                                     <small id="textAyuda" class="text-muted">Seleccione genero (s)</small><br>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                      <label class="form-check-label" for="inlineCheckbox1">Acción</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                      <label class="form-check-label" for="inlineCheckbox2">Aventura</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                      <label class="form-check-label" for="inlineCheckbox3">Ciencia Ficción</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                                      <label class="form-check-label" for="inlineCheckbox4">Comedia</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option5">
                                      <label class="form-check-label" for="inlineCheckbox5">Documental</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option6">
                                      <label class="form-check-label" for="inlineCheckbox6">Drama</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option7">
                                      <label class="form-check-label" for="inlineCheckbox7">Fantasía</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="option8">
                                      <label class="form-check-label" for="inlineCheckbox8">Musical</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="option9">
                                      <label class="form-check-label" for="inlineCheckbox9">Romance</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox10" value="option10">
                                      <label class="form-check-label" for="inlineCheckbox10">Supenso</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox11" value="option11">
                                      <label class="form-check-label" for="inlineCheckbox11">Terror</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="horarioPelicula" class="form-label">Horario</label>
                                    <input type="time" class="form-control" id="horarioPelicula" aria-describedby="Horario Película" name="horarioPelicula" required>
                                  </div>
                                  <div class="col mb-3">
                                    <label for="idiomaPelicula" class="form-label">Idioma</label>
                                    <select id="idiomaPelicula" class="form-control" required>
                                      <option selected disabled>Elija idioma</option>
                                      <option value="espanol">Español</option>
                                      <option value="subtitulos">Subtitulos</option>
                                    </select>
                                  </div>
                                  <div class="col mb-3">
                                    <label for="duracionPelicula" class="form-label">Duración</label>
                                    <input type="number" class="form-control" id="duracionPelicula" aria-describedby="Duracion Película" name="duracionPelicula" required>
                                    <small id="textAyuda" class="text-muted">Minutos</small>
                                  </div>
                                  <div class="col mb-3">
                                    <label for="formatoPelicula" class="form-label">Formato</label>
                                    <select id="formatoPelicula" class="form-control" required>
                                      <option selected disabled>Elija formato</option>
                                      <option value="2D">2D</option>
                                      <option value="3D">3D</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-12 mb-3">
                                    <label for="descripcionInput" class="form-label">Sinópsis</label>
                                    <textarea class="form-control" id="descripcionInput" name="descripcion" rows="8"><?php echo $row['descripcion'] ?></textarea>
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
                    }
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      include("../php/footer.php");
      ?>
    </div>
  </main>
  <?php
  include("../php/personalizacion.php");
  ?>

</body>
</html>