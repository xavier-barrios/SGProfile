<?php
require_once 'posts.php';
class PostsDao{

    public function __construct(){
    }

    public function mostrar(){
        include '../model/connection.php';
        $query = "SELECT * FROM posts";
        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $id=-1;   
        $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach($lista as $posts) {
        echo "<div class='three-column'>";
            if ($id==$posts['id']) {
                $id=-1;
                continue;
        } else {
            echo "<br>";
        }
            $id=$posts['id'];
            if ($posts['user'] == $_SESSION['user']->getId()) {
                echo "<img class='img1' src='../{$posts['path']}'>";
            } else {
                echo "<img src='../{$posts['path']}'>";
            }
            echo "</div>";
        }
    }

    public function insertar(){
        include '../model/connection.php';
        try {
        //Comienza la transacción para crear un usuario
            $pdo->beginTransaction();
            $email=$_POST['email'];
            $select = "SELECT * FROM users WHERE email = '$email'";
            $sentencia1=$pdo->prepare($select);
            $sentencia1->execute();
            if ($sentencia1->rowCount() == 0) {
                $query="INSERT INTO `users` (`id`, `name`, `surname` , `email`, `password`, `status`, `profile`) VALUES (NULL,?,?,?,?,'1','1');";
                $sentencia=$pdo->prepare($query);
                $nom=$_POST['nombre'];
                $ape=$_POST['apellido'];
                $email=$_POST['email']; 
                $pass=md5($_POST['password']);
                $sentencia->bindParam(1,$nom);
                $sentencia->bindParam(2,$ape);
                $sentencia->bindParam(3,$email);
                $sentencia->bindParam(4,$pass);
                $sentencia->execute();
                $pdo->commit();
                header("Location: ../view/login.php");
            } else {
                echo "<div style='text-align: center; margin-top: -30px; background-color: white; width: 50%; margin-left: 330px;'>El email introducido ya existe</div>";
            }

            
        } catch (Exception $ex) {
            // ve que hay un error y no hacer los cambios
            $pdo->rollback();
            echo $ex->getMessage();
        }
    }

    public function mostrarUsuarios(){
        // muesrtra todos los usuarios de la base de datos
        include '../model/connection.php';
        $query = "SELECT * FROM users";
        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $id=-1;   
        $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        // creamos la tabla con los campos
        echo "<table style='width: 100%';>";
            echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Email</th>";
                echo "<th>Perfil</th>";
                echo "<th>Estado</th>";
            echo "</tr>";
        foreach($lista as $usuario) {
        echo "<tr style='text-align: center';>";
            if ($id==$usuario['id']) {
                $id=-1;
                continue;
        } else {
            echo "<br>";
        }
            // mostramos los datos de los usuarios
            $id=$usuario['id'];
            $status=$usuario['status'];
            echo "<td>{$usuario['name']}</td>";
            echo "<td>{$usuario['email']}</td>";
            echo "<td>{$usuario['profile']}</td>";
            if ($usuario['profile'] == 3) {
                // si el profile del usuario es 3 mostrar el candado en cerrado y rojo
                echo "<td><i onclick='cambiarIcon()' id='block' class='fas fa-lock juan'></i></td>";
            }
            else if ($usuario['status'] == 1) {
                // si el estatus del usuario es 1 mostrar el candado en abierto y azul
                echo "<td><a style='text-decoration: none'; 'color: blue';' href='../controller/actualizar.php?id=".$id."&status=".$status."'><i onclick='cambiarIcon()' id='block' class='fas fa-lock-open'></i></a></td>";
            } else if ($usuario['status'] == 0) {
                // si el estatus del usuario es 0 mostrar el candado en cerrado y rojo
                echo "<td><a href='../controller/actualizar.php?id=".$id."&status=".$status."'><i onclick='cambiarIcon()' id='block' class='fas fa-lock'></i></a></td>";
            }
            $id=$usuario['id'];
            $status=$usuario['status'];
            echo "</tr>";
        }
            echo "</table>";
    }

    public function insertarPosts($id){
        require_once '../model/connection.php';
        include '../controller/sessionController.php';
        $id = $_SESSION['user']->getId();
        $title = $_POST['title'];
        $path = 'public/'.$_FILES['img']['name'];
            if (move_uploaded_file($_FILES['img']['tmp_name'], '../'.$path)) {
            //el ID del user se ha de colocar de manera correcta y no de manera hardcodeada 
            $query = "INSERT INTO posts (title, path, user) VALUES(?,?,?)";
            $sentencia = $pdo->prepare($query);
            $sentencia->bindParam(1,$title);
            $sentencia->bindParam(2,$path);
            $sentencia->bindParam(3,$id);
            $sentencia->execute();
            header("Location: ../view/home.php");
        }
    }

    public function actualizar($id, $status){
        // recogemos los datos del usuario que se va a actualizar
        try {
        include '../model/connection.php';
        $pdo->beginTransaction();
            if ($status == 1) {
                // si el usuiario tiene de estatus 1 se lo cambiamos a 0
                $query = "UPDATE users SET `status` = '0' WHERE id = ?";
                $sentencia1=$pdo->prepare($query);
                $sentencia1->bindParam(1,$id);
                $sentencia1->execute();
                $pdo->commit();
                header("Location: ../view/adminUsers.php");
            } else {
                // si no el usuiario tiene de estatus 0 y se lo cambiamos a 1
                $query = "UPDATE users SET `status` = '1' WHERE id = ?";
                $sentencia1=$pdo->prepare($query);
                $sentencia1->bindParam(1,$id);
                $sentencia1->execute();
                $pdo->commit();
                header("Location: ../view/adminUsers.php");
            }
        } catch (Exception $ex) {
            $pdo->rollback();
            echo $ex->getMessage();
        }
    }
}
?>