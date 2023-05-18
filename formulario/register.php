<?php
include('../Auxiliares/conecta.php');
include('../Auxiliares/Vali_registro.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../formulario/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>Registrate</title>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <section class="background-image overflow-hidden">
        <div class="container px-5 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 d-none d-lg-block mb-5 mb-lg-0 " id="demoObject" style="z-index: 10">
                    <h1 class="my-2 text-xl-center">
                        <img src="../fotos/logonegroyblanco-removebg-preview.png" class="img-fluid" alt="logo">
                    </h1>
                    <p class="text-light text-center">
                        ¿Quieres conseguir tus objetivos? Este es el lugar, registrate y comienza ahora.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">


                            <form action="../Auxiliares/Vali_registro.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre">
                                        <div class="invalid-feedback">
                                            Este campo es obligatorio.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="apellidos" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos">
                                        <div class="invalid-feedback">
                                            Este campo es obligatorio.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                        <div class="invalid-feedback">
                                            Por favor introduce una dirección de email válida.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        <div class="invalid-feedback">
                                            Este campo es obligatorio.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="repeat-password" class="form-label">Repetir Contraseña</label>
                                        <input type="password" class="form-control" id="repeat-password" name="repeat-password">
                                        <div class="invalid-feedback">
                                            Este campo es obligatorio.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                                        <div class="invalid-feedback">
                                            Este campo es obligatorio.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="peso" class="form-label">Peso</label>
                                        <input type="text" class="form-control" id="peso" name="peso">
                                        <div class="invalid-feedback">
                                            Este campo es obligatorio.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="altura" class="form-label">Altura</label>
                                        <input type="text" class="form-control" id="altura" name="altura">
                                        <div class="invalid-feedback">
                                            Este campo es obligatorio.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="provincia" class="form-label">Provincia</label>
                                            <select class="form-control" id="provincia" name="provincia">
                                                <option value="">Selecciona tu provincia</option>
                                                <option value="Alicante">Alicante</option>
                                                <option value="Almería">Almería</option>
                                                <option value="Asturias">Asturias</option>
                                                <option value="Baleares">Baleares</option>
                                                <option value="Barcelona">Barcelona</option>
                                                <option value="Cádiz">Cádiz</option>
                                                <option value="Ceuta">Ceuta</option>
                                                <option value="Girona">Girona</option>
                                                <option value="Granada">Granada</option>
                                                <option value="Madrid">Madrid</option>
                                                <option value="Málaga">Málaga</option>
                                                <option value="Melilla">Melilla</option>
                                                <option value="Navarra">Navarra</option>
                                                <option value="Sevilla">Sevilla</option>
                                                <option value="Valencia">Valencia</option>
                                                <!-- Agrega todas las provincias que desees -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="poblacion" class="form-label">Población</label>
                                            <select class="form-control" id="poblacion" name="poblacion">
                                                <option value="">Selecciona tu población</option>
                                                <!-- Agrega las poblaciones de la provincia seleccionada mediante JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark btn-block mt-4">Registrarse</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="poblaciones.js"></script>
</body>

</html>