<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | Social Gallery</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/code.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/3c4c2142b0.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php
include '../controller/sessionController.php';
?>
<body>
    <!--Menu de navegación-->
    <ul>
        <div class="div2">
        <li><a href="./homeAdmin.php"><?php echo $_SESSION['user']->getEmail() ?></a></li>
        <li><a onclick="openModal()">+</a></li>
        <li><a href="adminUsers.php">Administrar Usuarios</a></li>
        <li><a href="../view/login.php">logout</a></li>
        </div>
    </ul>
        <?php
            require_once '../model/postsDAO.php';
            $posts = new PostsDao();
            $posts->mostrarUsuarios();
        ?>
</body>

</html>