<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>Encriptación</header>
    <main>
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "jardineria"); //verificamos que exista o no la tabla

        $consulta_verificar = mysqli_query($conexion, "SHOW TABLES LIKE 'usuarios'");
        $tabla_existente    = mysqli_num_rows($consulta_verificar) > 0;

        if(!$tabla_existente) {
            $sql = "CREATE TABLE usuarios(
            nombre varchar(50) NOT NULL,
            clave varchar(100) NOT NULL,
            PRIMARY KEY (nombre)
            ) engine=innodb;";
            $consulta = mysqli_query($conexion, $sql);
            if($consulta) {
                print "se ha creado la tabla correctamente";
            }
        } else {
            print "La tabla ya existe";
        }

        $usuarios = ["jardinero" => "jardinero", "cristina" => "cristina", "enrique" => "enrique", "marta" => "marta"];

        foreach($usuarios as $key => $value) {
            $value          = password_hash($value, PASSWORD_DEFAULT);
            $sqlInsert      = "INSERT INTO usuarios (nombre,clave) VALUES ('$key','$value')"; //usar comillas para los valores a ingresar
            $consultaInsert = mysqli_query($conexion, $sqlInsert);
            if($consultaInsert) {
                print "Se añadio corretamente al usuario $key";
            } else {
                print "eeeey";
            }
            print $key . "  " . $value . "<br>";
        }

        /*
        mysqli_stmt_bind_param($stmt, "tipos", $parametro1, $parametro2, ...);

        Los códigos de tipo de dato más comunes en mysqli_stmt_bind_param() son:
            "i": Integer (entero).
            "d": Double (punto flotante).
            "s": String (cadena).
            "b": Blob (datos binarios).




        $contrasena = "miContrasena";
          $hash       = password_hash($contrasena, PASSWORD_DEFAULT);

          // $hash es ahora el hash seguro que deberías almacenar en la base de datos
          print "Hash de contraseña: " . $hash;

          // Verificar si una contraseña ingresada coincide con el hash almacenado
          $contrasena_ingresada = "miContrasena";
          if (password_verify($contrasena_ingresada, $hash)) {
              print "La contraseña es válida.";
          } else {
              print "La contraseña no es válida.";
          }
         */
        ?>
    </main>


</body>
</html>