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
    $result = $conn->query("SELECT * FROM comentarios");
    // mysqli_free_result($result)
    while ($row = $result->fetch_assoc()) {
      ?>
       <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Jaqueline Medina </h6>
                    <span class="mb-2 text-xs"><?php
                    
                    printf ($row['comentarios']);
                    if ($row['respuesta']){
                      ?>
                      <div class="card-body pt-4 p-3">
                      <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                          <div class="d-flex flex-column">
                            <h6 class="mb-3 text-sm">Autocinema </h6>
                            <span class="mb-2 text-xs">

                            <?php
                      printf('Gracias por tu comentario. Si tienes alguna queja, puedes comunicarte al numero 55478654');
                      ?>

                      </span>

                      </div>
</li>
</ul>
</div>
<?php


                      

                    }


?>
<span class="text-dark font-weight-bold ms-sm-2"></span></span>
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
            <?php

  }
  ?>



    
    
    

</HEAD> <BODY>

                 
 </main>
  <?php
  include './partials/personalizacion.php';
  ?>
</body>
</html>