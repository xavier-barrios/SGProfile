<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <script src="../js/code.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Registro</title>
</head>
<body>
<div class="login container" style="margin: 60px auto;">
  <h2 class="login-header">Registrarse</h2>
    <form  action="registro.php" method="POST" onsubmit="return validarFor()">
        <p><input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre..."></p>

        <p><input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido.."></p>

        <p><input type="email" class="form-control" id="email" name="email" placeholder="Email.."></p>

        <p><input type="password" class="form-control validar" id="password" name="password" placeholder="Password.."></p>

        <p><input type="password" class="form-control validar" id="password1" name="password1" placeholder="Repite password.."></p>
        <div id="passwd"></div>
        <input type="submit" class="btn btn-primary" value="Crear Cuenta" name="submit">
  </form>
</div>

  <?php
  if (isset($_POST['submit'])){
    require_once '../model/postsDAO.php';
    $users = new PostsDao();
    $users->insertar();
  }
  ?>

</body>
</html>