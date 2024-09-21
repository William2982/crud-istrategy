<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <main>
        <img src="assets/LOGO-iSTRATEGY-.png" alt=" ">
        <h1>Iniciar Sesión</h1>
        <b>Ingresa tus datos a continuación</b>
        <form action="login.php" method="post">
            <div class="input-container">
                <p><label for="username">Usuario</label></p>
                <input type="text" id="username" name="username" placeholder="Ingrese Usuario" required>
            </div>
            <div class="input-container">
                <p id="forget-pass">
                    <label for="password">Contraseña</label>
                    <span>¿Olvidaste la Contraseña?</span>
                </p>
                <input type="password" id="password" name="password" placeholder="Introduzca Contraseña" required>
            </div>
            <div class="input-container">
                <input type="checkbox" name="mantener" id="mantener">
                <label for="mantener">Mantenme Conectado</label>
            </div>

            <!-- Mensaje de Error -->
            <div class="message-container">
                <?php
                session_start();
                include 'database.php';

                // Verificar si ya hay una sesión iniciada a través de cookies
                if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
                    $username = $_COOKIE['username'];
                    $password = $_COOKIE['password'];

                    $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE username ='$username' and pass = '$password'");
                    $nr = mysqli_num_rows($query);

                    if ($nr == 1) {
                        header("location:crud.php");
                        exit();
                    }
                }

                // Validar login
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $mantenerConectado = isset($_POST['mantener']);

                    // Verifica si el usuario existe
                    $user_check_query = mysqli_query($conn, "SELECT * FROM usuarios WHERE username = '$username'");
                    $user_exists = mysqli_num_rows($user_check_query);

                    if ($user_exists == 1) {
                        // Si el usuario existe, verifica la contraseña
                        $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE username ='$username' and pass = '$password'");
                        $nr = mysqli_num_rows($query);

                        if ($nr == 1) {
                            $_SESSION['username'] = $username;

                            // Si se seleccionó "Mantenerme Conectado", guardar las credenciales en cookies
                            if ($mantenerConectado) {
                                setcookie('username', $username, time() + (15 * 60), "/"); // Cookie por 15 minutos
                                setcookie('password', $password, time() + (15 * 60), "/");
                            }

                            header("location:crud.php");
                        } else {
                            echo "
                            <div class='error'>
                                <h2>Contraseña incorrecta.</h2>
                            </div>
                            ";
                        }
                    } else {
                        // Si el usuario no existe, muestra un mensaje de error
                        echo "
                        <div class='error'>
                            <h2>El usuario no existe.</h2>
                        </div>
                        ";
                    }
                }
                ?>
            </div>

            <div class="submit-container">
                <button type="submit">Iniciar Sesión</button>
            </div>
        </form>
    </main>

</body>

</html>