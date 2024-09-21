<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/editar_usuario.css">
</head>

<body>
    <?php
    // Capturar los datos del formulario enviados desde index.php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $telefono = $_POST['telefono'];
        $rol = $_POST['rol'];
        $fecha = $_POST['fecha'];
        $salario = $_POST['salario'];
    }
    ?>

    <aside>
        <a href="crud.php">
            <img src="assets/avion.png" alt=" ">
        </a>
        <a href="">
            <img src="assets/redes 1.png" alt=" ">
        </a>
        <a href="">
            <img src="assets/redes 2.png" alt=" ">
        </a>
        <a href="">
            <img src="assets/redes 3.png" alt=" ">
        </a>
    </aside>
    <main>
        <form action="editar_usuario.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="input-container">
                <label for="nombre">Nombre</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 1.png" alt="Icono de usuario" class="input-icon">
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese su Nombre"
                        value="<?php echo $nombre; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <label for="username">Usuario</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 1.png" alt="Icono de usuario" class="input-icon">
                    <input type="text" id="username" name="username" placeholder="Ingrese su Usuario"
                        value="<?php echo $username; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="email" id="email" name="email" placeholder="Ingrese su Correo"
                        value="<?php echo $email; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <label for="password">Contraseña</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="text" id="password" name="password" placeholder="Ingrese su Contraseña"
                        value="<?php echo $password; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <label for="telefono">Teléfono</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="number" id="telefono" name="telefono" placeholder="Ingrese su Teléfono" maxlength="10"
                        value="<?php echo $telefono; ?>" required>
                </div>
            </div>
            <div class="input-container">
                <label for="rol">Rol</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="text" id="rol" name="rol" placeholder="Ingrese su Rol" value="<?php echo $rol; ?>"
                        required>
                </div>
            </div>
            <div class="input-container">
                <label for="fecha">Fecha</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="date" id="fecha" name="fecha" placeholder="Ingrese Fecha" value="<?php echo $fecha; ?>"
                        required>
                </div>
            </div>
            <div class="input-container">
                <label for="salario">Salario</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="number" id="salario" name="salario" placeholder="Ingrese Salario"
                        value="<?php echo $salario; ?>" required>
                </div>
            </div>

            <div class="submit-container">
                <button type="submit" name="submit_update">actualizar</button>
                <a href="crud.php"><button type="button">Cancelar</button></a>
            </div>

            <!-- Mensaje -->
            <div class="message-container">
                <?php
                include 'database.php';
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_update'])) {
                    $id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $telefono = $_POST['telefono'];
                    $rol = $_POST['rol'];
                    $fecha = $_POST['fecha'];
                    $salario = $_POST['salario'];

                    // Verificar si el nombre de usuario ya existe para otro usuario
                    $check_sql = "SELECT * FROM usuarios WHERE username = '$username' AND id != $id";
                    $result = $conn->query($check_sql);

                    if ($result->num_rows > 0) {
                        // Si el usuario ya existe, mostrar un mensaje de error
                        echo "
                            <div class='error'>
                                <h2>El usuario '$username' ya existe. Por favor, elige otro nombre de usuario.</h2>
                            </div>
                        ";
                    } else {
                        // Si el usuario no existe, proceder a actualizar en la base de datos
                        $sql = "UPDATE usuarios SET username='$username', pass='$password', nombre='$nombre', email='$email', telefono='$telefono', rol='$rol', fecha='$fecha', salario='$salario' WHERE id=$id";
                        if ($conn->query($sql) === TRUE) {
                            echo "
                                <div class='editar'>
                                    <h2>Usuario actualizado exitosamente.</h2>
                                </div>
                            ";
                        } else {
                            echo "Error al actualizar el usuario: " . $conn->error;
                        }
                    }
                    $conn->close();
                }
                ?>
            </div>
        </form>

        <div class="imagen">
            <img src="assets/main 2 (foto).png" alt="Imagen principal">
            <div class="logo">
                <img src="assets/LOGO-AVION-ROJO-iSTRATEGY.png" alt="Logo">
            </div>
        </div>
    </main>
</body>

</html>