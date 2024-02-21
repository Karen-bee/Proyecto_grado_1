<?php

    require_once (__DIR__ .'/../../App/Controllers/Login/RegisterController.php');
    
    $userController = new RegisterController();

    $documents = $userController->ObtenerDocumentsController();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" type="text/css" href="/Literagiando/Resources/css/RegisterLog.css">

    <!------Links Bootstrap ----->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!----links Icons---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
</head>
<body>

    <div class="container-login">
        <div class="content-section">
            <div class="row">
            <div class="title-login">
                <img src="/Literagiando/Resources/img/perfil.png" alt="">
                <strong>Registrate</strong>
            </div>
            <form method="POST" action="/Literagiando/Routes/UserRouter.php">
            <input required type="text" name="accion" value="nuevo" hidden>
                <div class="col">
                    <label for="idtipodedocumento"><i class="bi bi-file-person"></i> Tipo/Documento</label>
                    <select required name="idtipodedocumento" id="idtipodedocumento"  class="form-control">
                        <option value="">---Seleccióne----</option>
                        <?php foreach ($documents['documents'] as $row): ?>
                        <option value="<?php echo $row['idtipodocumento']; ?>"><?php echo $row['nombre_documento'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col">
                    <label for="documento_usuario"><i class="bi bi-fingerprint"></i> N°. Documento</label>
                    <input required type="number" name="documento_usuario" id="documento_usuario" class="form-control">
                </div>

                <div class="col">
                    <label for="nombrecompleto_usuario"><i class="bi bi-person"></i> Nombre Completo</label>
                    <input required type="text" name="nombrecompleto_usuario" id="nombrecompleto_usuario" class="form-control">
                </div>
                <div class="col">
                    <label for="direccion_usuario"><i class="bi bi-geo-alt-fill"></i> Dirección</label>
                    <input required type="text" name="direccion_usuario" id="direccion_usuario" class="form-control">
                </div>

                <div class="col">
                    <label for="telefono_usuario"><i class="bi bi-telephone"></i> Telefono</label>
                    <input required type="number" name="telefono_usuario" id="telefono_usuario" class="form-control">
                </div>

                <div class="col">
                    <label for="username"><i class="bi bi-person-bounding-box"></i> Nombre/Usuario</label>
                    <input required type="text" name="username" id="username" class="form-control">
                </div>

                <div class="col">
                    <label for="correo_usuario"><i class="bi bi-envelope-at"></i> E-mail</label>
                    <input required type="email" name="correo_usuario" id="correo_usuario" class="form-control">
                </div>

                <div class="col">
                    <label for="password"><i class="bi bi-key"></i> Contraseña</label>
                    <input required type="password" name="password" id="password" class="form-control">
                    <span  id="message" class="error"></span><br>
                </div>

                <div class="col">
                    <label for="password"><i class="bi bi-key"></i> Repetir Contraseña</label>
                    <input required type="password" id="password2" class="form-control">
                    <span  id="message2" class="error"></span><br>
                </div>

                <div class="btn-registre">
                    <div class="g-recaptcha" data-sitekey="6LcXNP0nAAAAAP0UrrYUU1ep2flKR8EZbPIWccLj"></div>

                    <button type="submit" class="btn btn-warning">Registrar</button>
                </div>
            </form>
            </div>
        </div>
    </div> 
    <script async src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>

<script>
  $('#password').on('change', function () {
    var password = $(this).val();
    var regexLowercase = /[a-z]/;
    var regexUppercase = /[A-Z]/;
    var regexDigit = /\d/;
    var regexSpecialChar = /[@#$%^&+=!]/;
    var minLength = 8;

    var isValid = true;
    var message = '';

    if (!regexLowercase.test(password)) {
      isValid = false;
      message += 'Debe contener al menos una letra minúscula.\n';
    }

    if (!regexUppercase.test(password)) {
      isValid = false;
      message += 'Debe contener al menos una letra mayúscula.\n';
    }

    if (!regexDigit.test(password)) {
      isValid = false;
      message += 'Debe contener al menos un dígito.\n';
    }

    if (!regexSpecialChar.test(password)) {
      isValid = false;
      message += 'Debe contener al menos un carácter especial (@#$%^&+=!).\n';
    }

    if (password.length < minLength) {
      isValid = false;
      message += 'Debe tener una longitud mínima de ' + minLength + ' caracteres.\n';
    }

    if (isValid) {
      $('#message').text('Contraseña válida').css('color', 'green');
    } else {
      $('#message').text(message).css('color', 'red');
    }
  });

  $('#password2').on('change', function () {
    var password = $(this).val();
    var password2 = $('#password').val();


    var isValid = true;
    var message = '';

    if (password2 != password) {
      isValid = false;
      message += 'Las contraseñas no coinciden.\n';
    }
    console.log(password, password2);

    if (isValid) {
      $('#message2').text('').css('color', 'green');
    } else {
      $('#message2').text(message).css('color', 'red');
    }
  });
</script>


