<?php
    //Require / Include
    require_once 'models/registro.php';
    $usuario = new registro();
    $errores = []; 
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        // VALIDAR LOS DATOS DEL USUARIO      
        $usuario->sincronizar($_POST);
        $errores = $usuario->validarLogin();
        if(empty($errores)){
            $logged = $usuario->login();
            if($logged){
                header('location: principal.php');
            }
            else{
                $errores[] = "Error al registrar el usuario";
            }
        }
    }
?>

<?php include_once 'templates/_header.php' ?>
<div class="app">
    <?php include_once 'templates/_sidebar.php' ?>
    <div class="contenido contenedor">
        <h1>Registrar Usuario</h1>
        <?php foreach ($errores as $error):?>
            <p class="alerta alerta-error"><?php echo $error; ?></p>
        <?php endforeach; ?>
        <form class="formulario" method="post">
            <div class="form__control">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" 
                    value="<?php echo $usuario->nombre; ?>">
            </div>
            <div class="form__control">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" 
                    value="<?php echo $usuario->email; ?>">
            </div>
            <div class="form__control">
                <label for="telefono">Teléfono:</label>
                <input type="tel" name="telefono" id="telefono" 
                    value="<?php echo $usuario->telefono; ?>">
            </div>
            <div class="form__control">
                <label for="username">Nombre de usuario:</label>
                <input type="text" name="username" id="username" 
                    autocomplete="off" value="<?php echo $usuario->username; ?>">
            </div>
            <div class="form__control">
                 <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">
            </div>
           <input class="boton" type="submit" value="Registrar">
        </form>
    </div>
</div>
<?php include_once 'templates/_footer.php' ?>