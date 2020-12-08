<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <title>Login</title>
  <script src="../js/code.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <br><br>
<div class="container">
    
  <h2 class="login-header">Iniciar Sesion</h2>
  <!--Creamos el formulario del login, que nos servirá para recoger variables para el userDAO y la funcion del login -->
    <form class="form-group" action="../controller/loginController.php" method="POST">
        <br>
        <p><input type="email" class="form-control" id="email" name="email" placeholder="Email"></p>
    
        <p><input type="password" class="form-control" name="password" placeholder="Contraseña"></p>
  
        <input  class="btn btn-primary"  type="submit" value="Iniciar Sesión">
        <a href="registro.php" class="btn btn-primary">Registrarse</a>
         
      </form>
    </div>
</body>
</html>