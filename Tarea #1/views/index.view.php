<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/materialize.min.css">
    <title>Registro</title>
</head>
<body>

    <div class="contenedor">    
 
        <form method="POST" action="" class="col s10 m10 l10"> 
            <h1>Register your Information</h1>
            <div class="row">
                <div class="input-field col s5 offset-s1">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" class="validate" validate name="nombre" required>
                    <label for="icon_prefix">First Name</label>
                </div>
                <div class="input-field col s5">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_telephone" type="text" class="validate" validate name="apellido" required>
                    <label for="icon_telephone">Last name</label>
                </div>
                <div class="input-field col s10 offset-s1">
                    <i class="material-icons prefix">mail</i>
                    <input id="icon_telephone" type="email" class="validate" validate name="email" required>
                    <label for="icon_telephone">Email</label>
                </div>
            </div>    
            <button class="btn waves-effect waves-light col" type="submit">Submit
                <i class="material-icons right">send</i>
            </button>  

            <?php if(!empty($errores)):?>
            <div class="errores">
                <ol>
                    <li><?php echo $errores;?></li>
                </ol>
            </div>
            <?php endif;?>
        </form>

        <?php if(!empty($nombre)):?>
        <div class="info">
            <table class="highlight">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                <td><?php echo $nombre;?></td>
                <td><?php echo $apellido;?></td>
                <td><?php echo $correo;?></td>
                </tr>
            </tbody>
            </table>
        </div>
        <?php endif;?>
    </div>
    
    <script src="js/jquery.js"></script>
    <script src="js/materialize.min.js"></script>
</body>
</html>