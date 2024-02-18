<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Recuperar Cuenta</title>
            <style>
                body {
                    font-family: Source Serif Pro, sans-serif;
                    background-color: #f2f2f2;
                    margin: 0;
                    padding: 0;
                }
        
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 5px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }
        
                .header {
                    background-color: #EB8600;
                    color: #fff;
                    text-align: center;
                    padding: 20px;
                }
        
                .content {
                    padding: 20px;
                }
        
                .button {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #EB8600;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 5px;
                }
        
                .button:hover {
                    background-color: #0056b3;
                }
        
                .footer {
                    text-align: center;
                    padding-top: 20px;
                }
            </style>
        </head>
        
        <body>
            <div class="container">
                <div class="header">
                    <h1>Recuperar Cuenta</h1>
                </div>
                <div class="content">
                    <p>Estimado/a Usuario,</p>
                    <p>Recibes este correo porque solicitaste recuperar tu cuenta en Literagiando</p>
                    <p>Estamos aquí para ayudarte a restablecer tu acceso. A continuación, encontrarás un enlace seguro para cambiar tu contraseña:
                    </p>
                    <a href="http://localhost/Literagiando/Views/Login/reset_password.php?email_consulta='. $email_consulta .'" class="button">Recuperar Cuenta</a>
                    <p>Por favor, haz clic en el enlace anterior y sigue las instrucciones para crear una nueva contraseña. Asegúrate de utilizar una contraseña segura que contenga al menos 8 caracteres, incluyendo letras mayúsculas, letras minúsculas, números y símbolos.</p>
                    <p>Si no solicitaste esta recuperación de cuenta o no reconoces esta solicitud, te recomendamos que ignores este correo electrónico y tomes medidas adicionales para proteger tu cuenta. </p>
                    </div>
                <div class="footer">
                    <p>Gracias por confiar en Literagiando.</p>
                </div>
            </div>
        </body>
        
        </html>
        