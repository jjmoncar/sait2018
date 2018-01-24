<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='icon' type='image/ico' href='production/images/faviconuptp.ico'>

    <title>SAIT</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <img src="production/images/banner.png" style="display: block; margin: auto; margin-top: 6px;">
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form name="frmAcceso" id="frmAcceso" method="POST" action="production/lib/controller/logueo.php">
              <h1>Acceso</h1>
              <div>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required autocomplete="off" />
              </div>
              <div>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña" required autocomplete="off" />
              </div>
              <div>
                <button type="submit" name="enviar" id="enviar" class="btn btn-lg btn-success btn-block">Entrar</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>

                <div>
                  <h1><img src="production/images/sait.png" width="50%" height="50%"></h1>
                  <p>©2018 All Rights Reserved. UPTP "Luis Mariano Rivera. Carúpano - Sucre - Venezuela</p>
                </div>
              </div>
            </form>
          </section>
        </div>
    </div>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery Validator -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

    <script type="text/javascript">
      $("#frmAcceso").validate({
                rules:{
                    usuario:{
                        required: true,
                        minlength: 6,
                        maxlength: 12
                    },
                    pass:{
                        required: true,
                        minlength: 5,
                        maxlength: 12
                    }
                },
                messages:{
                    usuario:{
                        required:"Este campo es requerido",
                        minlength:"Minimo 6 Caracteres",
                        maxlength: "Maximo 12 Caracteres"
                    },
                    pass:{
                        required: "Este campo es requerido",
                        minlength: "Minimo 5 Caracteres",
                        maxlength: "Maximo 12 Caracteres"
                    }
                }
            });
    </script>
  </body>
</html>
