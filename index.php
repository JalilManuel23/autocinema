<?php

  include_once 'php/conexion.php';

  session_start();

  if(isset($_SESSION)){
    // session_unset();
    session_destroy();
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $us = $_POST['usuario'];
    $ps = $_POST['pass'];

    require_once("php/conexion.php");

    $consul="SELECT usuario, pass FROM usuarios WHERE usuario='$us' AND pass='$ps'";
    $query=mysqli_query($conn,$consul) or die ("Ocurrio un error, intentalo mas tarde");

    if($clm=mysqli_fetch_array($query))
    {
      $priv=$clm['priv'];
    }

    if(mysqli_num_rows($query)>0)
    {
      session_start();
      $_SESSION['usuario']=$us;
      $_SESSION['pass']=$ps;

      if($priv=="")
      $_SESSION['priv']="";{
          header('location:pages/cliente.php');
      }
    }
    else{
        echo "<script>alert('Correo y/o Usuario Incorrectos, Intentelo de nuevo porfavor')</script>";
    }

  }

  



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>Inicio de Sesión | Auto cinema</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">¡Bienvenido!</h3>
                  <p class="mb-0">Ingrese su correo electrónico y contraseña para iniciar sesión</p>
                </div>
                <div class="card-body">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="POST">
                    <label>Nombre de Usuario: </label>
                    <div class="mb-3">
                      <input name="usuario" class="form-control" placeholder="Nombre de usuario" aria-label="Usuario" aria-describedby="usuario-addon">
                    </div>
                    <label>Contraseña: </label>
                    <div class="mb-3">
                      <input type="password" name="pass" class="form-control" placeholder="Contraseña" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <!--<div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">Recordarme</label>
                    </div>-->
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0" title="Presione para Iniciar Sesión">Iniciar Sesión</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-5 text-sm mx-auto">
                    ¿Haz olvidado tu contraseña?
                    <a href="javascript:;" class="text-info text-gradient font-weight-bold">Presiona aquí</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('./assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Todos los derechos Reservados © <script>
              document.write(new Date().getFullYear())
            </script> Auto cinema.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="./assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

</html>