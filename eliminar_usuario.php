<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="css/eliminar_usuario.css">
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
        <form>
            <!-- Mensaje -->
            <div class="message-container">
                <?php
                include 'database.php';
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id = $_POST['id'];

                    $sql = "DELETE FROM usuarios WHERE id=$id";
                    if ($conn->query($sql) === TRUE) {
                        echo "
                            <div class='eliminar'>
                                <h2>Usuario con ID '$id' eliminado exitosamente.</h2>
                            </div>
                        ";
                    } else {
                        echo "Error al eliminar Usuario con ID '$id'.";
                    }
                    $conn->close();
                }
                ?>
            </div>

            <div class="submit-container">
                <a href="crud.php"><button type="button">Volver</button></a>
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