<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">

    <title>Registrar</title>
    
</head>
<body>
    <h1>Registrar nuevos datos</h1>
    <form method="POST" action="../personas/ControladorPersonas.php">

       
        <center>
        <tr>
        <td>first name:<td><input type="text" name="first_name"></td>
    </tr>
    <tr>
        <td>last first name:<td><input type="text" name="first_name"></td></td>
    </tr>
    <tr>
        <td>DNI:<td><input type="text" name="first_name"></td></td>
    </tr>
        
        
        <input type="hidden" name="operacion" value="guardar">

        <input type="submit" value="Cargar datos">
        <input type="reset" name="limpiar" value="Limpiar datos"></center>
      
    </form>
      <br><center><a id="boton" href="../personas/index.php"> Inicio </a></center>
</body>
</html>