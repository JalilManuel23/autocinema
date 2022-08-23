<?php
// Conexión a BD
include("../php/conexion.php");
include("./partials/head.php");

$activo = "observaciones";
include("./partials/navbarvertical.php");

?>
<!DOCTYPE html>
<html lang="en">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <title>Respuestas | Autocinema</title>

<body class="g-sidenav-show bg-gray-100">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php
    include("./partials/navbarhorizontal.php");
    ?>
    <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Jaqueline Medina</h6>
                    <span class="mb-2 text-xs">Es muy facil e intuitivo de utilizar, ademas de que aqui estan mis peliculas favoritas <span class="text-dark font-weight-bold ms-sm-2"></span></span>
                    <HEAD> <script LANGUAGE="JavaScript">
function agregar(){
if ((navigator.appName=="Microsoft Internet Explorer") && (parseInt(navigator.appVersion)>=4)) {
var url="http://www.TuSitio.com/";
var titulo=" Descripcion de mi sitio web";
window.external.AddFavorite(url,titulo);
}
else {
if(navigator.appName == "Netscape")
swal ("¿Seguro que desea agregar a favoritos?", {
  buttons: ["Si", "No"]
});
}
}
</script>

</HEAD> <BODY>
<img src="../assets/img/thumbs-up.png" class="avatar avatar-sm me-3" alt="user1" onclick="agregar()" href="javascript:agregar()">

                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
                    <input type="text" name="responder">

                    <button onclick="responder()">Responder</button>
                    <script type="text/javascript">
                      function responder() {
                        swal ('Respuesta Enviada', 'Respuesta enviada al cliente', 'success');

                      }

                    </script>

                    
                    
                    <style type="text/css">
  .boton_personalizado{
    text-decoration: none;
    padding: 5px;
    font-weight: 60;
    font-size: 14px;
    color: #ffffff;
    background-color: #64c27b;
    border-radius: 6px;
  }
</style>
                  </div>
                </li>
               
            </div>

            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Alexa Liras</h6>
                    <span class="mb-2 text-xs">Que buen servicio la verdad, desde comprar los boletos. <span class="text-dark font-weight-bold ms-sm-2"></span></span>
                    <HEAD> <script LANGUAGE="JavaScript">
function agregar(){
if ((navigator.appName=="Microsoft Internet Explorer") && (parseInt(navigator.appVersion)>=4)) {
var url="http://www.TuSitio.com/";
var titulo=" Descripcion de mi sitio web";
window.external.AddFavorite(url,titulo);
}
else {
if(navigator.appName == "Netscape")
swal ("¿Seguro que desea agregar a favoritos?", {
  buttons: ["Si", "No"]
});
}
}
</script>

</HEAD> <BODY>
<img src="../assets/img/thumbs-up.png" class="avatar avatar-sm me-3" alt="user1" onclick="agregar()" href="javascript:agregar()">
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
                    <input type="text" name="responder">                    
                    <button onclick="responder()">Responder</button>
                    <script type="text/javascript">
                      function responder() {
                        swal ('Respuesta Enviada', 'Respuesta enviada al cliente', 'success');

                      }

                    </script>

                  </div>
                </li>
               
            </div>

            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Laurent Perrier</h6>
                    <span class="mb-2 text-xs">Me gustaria saber, ¿Cada cuanto hacen cambios en las peliculas?.<span class="text-dark font-weight-bold ms-sm-2"></span></span>
                    <HEAD> <script LANGUAGE="JavaScript">
function agregar(){
if ((navigator.appName=="Microsoft Internet Explorer") && (parseInt(navigator.appVersion)>=4)) {
var url="http://www.TuSitio.com/";
var titulo=" Descripcion de mi sitio web";
window.external.AddFavorite(url,titulo);
}
else {
if(navigator.appName == "Netscape")
swal ("¿Seguro que desea agregar a favoritos?", {
  buttons: ["Si", "No"]
});
}
}
</script>

</HEAD> <BODY>
<img src="../assets/img/thumbs-up.png" class="avatar avatar-sm me-3" alt="user1" onclick="agregar()" href="javascript:agregar()">
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
                    <input type="text" name="responder">
                    <button onclick="responder()">Responder</button>
                    <script type="text/javascript">
                      function responder() {
                        swal ('Respuesta Enviada', 'Respuesta enviada al cliente', 'success');

                      }

                    </script>


                  </div>
                </li>
               
            </div>

            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Michael Levi</h6>
                    <span class="mb-2 text-xs">La verdad, tuve una excelente experiencia buscando mis peliculas favoritas<span class="text-dark font-weight-bold ms-sm-2"></span></span>
                    <HEAD> <script LANGUAGE="JavaScript">
function agregar(){
if ((navigator.appName=="Microsoft Internet Explorer") && (parseInt(navigator.appVersion)>=4)) {
var url="http://www.TuSitio.com/";
var titulo=" Descripcion de mi sitio web";
window.external.AddFavorite(url,titulo);
}
else {
if(navigator.appName == "Netscape")
swal ("¿Seguro que desea agregar a favoritos?", {
  buttons: ["Si", "No"]
});
}
}
</script>

</HEAD> <BODY>

<img src="../assets/img/thumbs-up.png" class="avatar avatar-sm me-3" alt="user1" onclick="agregar()" href="javascript:agregar()">
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Editar</a>
                    <input type="text" name="responder">            
                    <button onclick="responder()">Responder</button>
                    <script type="text/javascript">
                      function responder() {
                        swal ('Respuesta Enviada', 'Respuesta enviada al cliente', 'success');

                      }

                    </script>
      
                  </div>
                </li>
               
            </div>
 </main>
  <?php
  include './partials/personalizacion.php';
  ?>
</body>
</html>