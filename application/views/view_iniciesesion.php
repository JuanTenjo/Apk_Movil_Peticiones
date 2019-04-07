<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="<?php echo base_url(); ?>Jquerymobile/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>Jquerymobile/jquery.mobile.icons-1.4.5.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>Jquerymobile/jquery.mobile.structure-1.4.5.min.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>Jquerymobile/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>Jquerymobile/jquery.mobile-1.4.5.js"></script>
  <meta charset="utf-8">
  <title>Inicie Sesion</title>
</head>
<body>
  <div data-role="page" id="inicie_sesion">
    <div data-role="header">
      <div class="col-12">
        <center>
        <iframe src="https://giphy.com/embed/dGyzYOvRPn21y" width="350" height="326" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
      </center>
      </div>
    </div>
    <div data-role="main" >
      <div class="row">
        <div class="col-12 col-sm-4 col-lg-4">
        </div>
        <div class="col-12 col-sm-4 col-lg-4">
          <center>
            <form action="<?php echo base_url() ?>index.php/inicie_sesion/inicio" method="post" data-ajax="false">
                <label for="text-basic">Usuario</label>
                <input type="text" id="text-basic"  placeholder="ingrese usuario" name="usuario">
                <label for="password">Contraseña</label>
                <input type="password"  id="password" autocomplete="off"  placeholder="Password" name="contrasena">
                <button type="submit" class="ui-btn">Iniciar Sesion</button>
            </form>
            <br> <a href="<?php echo base_url() ?>index.php/inicie_sesion/olvidar_contra">Olvido su contraseña</a>
          </div>
          <div class="col-12 col-sm-4 col-lg-4">
          </div>
        </center>
      </div>
    </div>
  </body>
  </html>
