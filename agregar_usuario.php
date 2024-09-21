<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="css/agregar_usuario.css">
</head>

<body>
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
        <form action="agregar_usuario.php" method="post" enctype="multipart/form-data">
            <div class="input-container">
                <label for="nombre">Nombre</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 1.png" alt="Icono de usuario" class="input-icon">
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese su Usuario" required>
                </div>
            </div>
            <div class="input-container">
                <label for="username">Usuario</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 1.png" alt="Icono de usuario" class="input-icon">
                    <input type="text" id="username" name="username" placeholder="Ingrese su Usuario" required>
                </div>
            </div>
            <div class="input-container">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="email" id="email" name="email" placeholder="Ingrese su Correo" required>
                </div>
            </div>
            <div class="input-container">
                <label for="password">Contraseña</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="password" id="password" name="password" placeholder="Ingrese su Contraseña" required>
                </div>
            </div>
            <div class="input-container">
                <label for="telefono">Teléfono</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="number" id="telefono" name="telefono" placeholder="Ingrese su Teléfono" maxlength="10"
                        required>
                </div>
            </div>
            <div class="input-container">
                <label for="rol">Rol</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="text" id="rol" name="rol" placeholder="Ingrese su Rol" required>
                </div>
            </div>
            <div class="input-container">
                <label for="fecha">Fecha</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="date" id="fecha" name="fecha" placeholder="Ingrese Fecha" required>
                </div>
            </div>
            <div class="input-container">
                <label for="salario">Salario</label>
                <div class="input-wrapper">
                    <img src="assets/ICONO 3.png" alt="Icono de contraseña" class="input-icon">
                    <input type="number" id="salario" name="salario" placeholder="Ingrese Salario" required>
                </div>
            </div>

            <div class="submit-container">
                <button type="submit">Agregar</button>
                <a href="crud.php"><button type="button">Cancelar</button></a>
            </div>

            <!-- Mensaje -->
            <div class="message-container">
                <?php
                include 'database.php';
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nombre = $_POST['nombre'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $telefono = $_POST['telefono'];
                    $rol = $_POST['rol'];
                    $fecha = $_POST['fecha'];
                    $salario = $_POST['salario'];
                    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                
                    // Verificar si el usuario ya existe en la base de datos
                    $check_sql = "SELECT * FROM usuarios WHERE username = '$username'";
                    $result = $conn->query($check_sql);

                    if ($result->num_rows > 0) {
                        // Si el usuario ya existe, mostrar un mensaje de error
                        echo "
                            <div class='error'>
                                <h2>El usuario '$username' ya existe. Por favor, elige otro nombre de usuario.</h2>
                            </div>
                        ";
                    } else {
                        // Si el usuario no existe, proceder a insertarlo en la base de datos
                        $sql = "INSERT INTO usuarios (username, pass, nombre, email, telefono, rol, fecha, salario) VALUES ('$username', '$password', '$nombre', '$email', '$telefono', '$rol', '$fecha', '$salario')";
                        if ($conn->query($sql) === TRUE) {
                            echo "
                                <div class='agregar'>
                                    <h2>Usuario '$username' registrado exitosamente.</h2>
                                </div>
                            ";
                        } else {
                            echo "Error al registrar usuario '$username'.";
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