<?php
session_start();
include("../Auxiliares/conecta.php");
include("../usuario/requisitosLogin.php");
// Comprobar si hay un mensaje almacenado en la variable de sesión
if (isset($_SESSION["mensaje"])) {
  echo $_SESSION["mensaje"];

  // Eliminar el mensaje de la variable de sesión para que no se muestre nuevamente en futuras visitas a la página
  unset($_SESSION["mensaje"]);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="icon" href="../fotos/logosolo.png">
  <title>Programa de entrenamiento para intermedio</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


  <!-- Nav del logo -->

  <header>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md ">
      <div class="container">
        <div class="col-1 text-left pl-md-0 ">
          <a href="../Inicio.php">
            <img src="../fotos/logosolo.png" width="60" height="60" alt="logo">
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse-3" aria-controls="navbarNav6" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-start col-md-7 navbar-collapse-3">
          <ul class="navbar-nav justify-content-center align-items-md-center text-center">
            <li class="nav-item active">
              <a class="nav-link" href="../Inicio.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Navegacion/Entrenamiento.php">Entrenamiento</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Navegacion/Estadisticas.php">Estadisticas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Navegacion/SobreNosotros.php">Sobre nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Navegacion/Contacto.php">Contacto</a>
            </li>
          </ul>
        </div>
        <div class="collapse navbar-collapse ms-auto justify-content-center col-md-3 navbar-collapse-3">
          <ul class="navbar-nav justify-content-center align-items-center">
            <?php if (isset($_SESSION["nombre"])) { ?>
              <li class="nav-item dropdown me-3">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $nombre ?>
                </a>
                <ul class="dropdown-menu text-bg-dark w-100" aria-labelledby="profileDropdown">
                  <li><a class="dropdown-item text-light" href="../usuario/perfil.php">Perfil</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="../Auxiliares/logout.php" class="text-decoration-none">
                  <button type="button" class="btn btn-sm btn-outline-danger me-2 rounded-3 d-flex align-items-center">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Cerrar sesión
                  </button>
                </a>
              </li>
            <?php } else { ?>
              <li class="nav-item pb-3 ps-2 ps-md-0 pb-md-0 text-center">
                <a href="../formulario/login.php">
                  <button type="button" class="btn btn-sm btn-outline-primary me-2 rounded-3">
                    Iniciar sesión
                  </button>
                </a>
              </li>
              <li class="nav-item pb-3 ps-3 ps-md-0 pb-md-0 text-center">
                <a href="../formulario/register.php">
                  <button type="button" class="btn btn-sm btn-primary me-3 rounded-3">Registrarse</button>
                </a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- Nav del logo -->

  <div class="container-fluid p-5 bg-light">
    <div class="container">
    <table class="table table-hover">
      <thead>
        <tr class="table azul text-light">
          <th>Día</th>
          <th>Entrenamiento</th>
          <th>Ejercicios</th>
          <th>Series</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Array con los nombres de los días de la semana
        $diasSemana = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');

        // Array multidimensional con los entrenamientos, ejercicios y series correspondientes
        $programaEntrenamiento = array(
          array('Entrenamiento de cuerpo completo', 'Sentadillas, Flexiones de brazos, Peso muerto con barra, Plancha', '3x10, 3x10, 3x10, 3x30s'),
          array('Descanso', '', ''),
          array('Entrenamiento de piernas', 'Sentadillas, Peso muerto rumano, Zancadas, Elevaciones de talones', '3x12, 3x12, 3x10, 3x15'),
          array('Entrenamiento de brazos', 'Flexiones de brazos, Curl de bíceps con mancuernas, Tríceps con polea, Flexiones diamante', '3x10, 3x12, 3x12, 3x10'),
          array('Entrenamiento de espalda y hombros', 'Dominadas, Remo con barra, Press militar, Elevaciones laterales', '3x8, 3x10, 3x10, 3x12'),
          array('Entrenamiento de core', 'Plancha, Russian twists, Crunches, Mountain climbers', '3x30s, 3x15, 3x15, 3x20'),
          array('Descanso', '', '')
        );

        // Bucle para generar las filas de la tabla
        for ($i = 0; $i < count($diasSemana); $i++) {
          echo '<tr>';
          echo '<td>' . $diasSemana[$i] . '</td>';
          echo '<td>' . $programaEntrenamiento[$i][0] . '</td>';
          echo '<td>' . $programaEntrenamiento[$i][1] . '</td>';
          echo '<td>' . $programaEntrenamiento[$i][2] . '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
    </div>
  </div>


  <footer class="bg-dark text-white d-flex flex-column align-items-center justify-content-center">

    <div class="container p-1">
      <div class="row my-4">

        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
          <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 130px; height: 130px;">
            <img src="../fotos/logosolo.png" height="100" alt="" loading="lazy" />
          </div>
          <h4 class="text-center">MadoFit</h4>
        </div>

        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4 text-center">Contacto</h5>
          <ul class="list-unstyled text-center">
            <li>
              <p><i class="bi bi-geo-alt-fill pe-2"></i>Melilla</p>
            </li>
            <li>
              <p><i class="bi bi-phone pe-2"></i>651795733</p>
            </li>
            <li>
              <p><i class="bi bi-envelope pe-2 mb-0"></i>aleyrodi@hotmail.es</p>
            </li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container-fluid text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2023 Copyright:
      <a class="text-white" href="https://MadoFit.com/">MadoFit.com</a>
    </div>

  </footer>


</body>

</html>