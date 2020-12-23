<?php
    include('Conexion.php');
    session_start();




    if($_POST) {
        $titulo = $_POST['titulo'];

        $descripcion = $_POST['descripcion'];
        $imagen = file_get_contents($_FILES['imagen']['tmp_name']);

        $create = 'INSERT INTO video (titulo,fecha_creacion,descripcion,categoria,id_cuenta,n_vistas,img) VALUES (?,?,?,?,?,?,?)';
        $agregar = $pdo->prepare($create);
        $day = date("Y/m/d");
        $valor = 0;
        $agregar->execute(array($titulo,$day,$descripcion,$_SESSION['Tipo_Persona'],$_SESSION['ID_Cuenta'],$valor,$imagen));



    }


?>






<!DOCTYPE html>
<html>
<head>
<body>
    <center>
        <?php if(isset($_SESSION['ID_Cuenta'])){?>
        <form action = '#' method = "POST" enctype="multipart/form-data">
            <input type="text" REQUIRED name ="titulo" placeholder="Inserte el nombre del video" value=""/></br>
            <input type="text" REQUIRED name ="descripcion" placeholder="Inserte una descripcion" value=""/></br>

            <input type ='file'  name="imagen"/></br>
            <input type="submit" value="Enviar"</br>
        </form>
        <?php
        }
         else{
             echo 'No se ha registrado datos';
        ?>
        <form action="Index.php" method="POST">
            <button type="submit" class="btn btn-primary"><i class="fa fa-user-circle" aria-hidden="true"></i> Devolverse al Inicio</button>
        </form>
        <?php
         }
        ?>
    </center>
</body>
</head>
</html>

