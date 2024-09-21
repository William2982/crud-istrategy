<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- DATATABLES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="css/crud.css">
    <script src="js/crud.js" defer></script>
</head>

<body>
    <aside>
        <a href="agregar_usuario.php">
            <button type="submit">Agregar Usuario</button>
        </a>
        <form action="logout.php" method="post" enctype="multipart/form-data">
            <button type="submit">Cerrar Sesión</button>
        </form>

        <div class="filtros">
            <p>Trabajo <span>12</span></p>
            <p>Diseño <span>20</span></p>
            <p>Familia <span>2</span></p>
            <p>Amigos <span>10</span></p>
            <p>Oficina <span>2</span></p>
        </div>
        <div class="add-filtro">
            <p>+ Crear Nueva Etiqueta</p>
        </div>
    </aside>
    <main>
        <?php
        include 'database.php';
        // Obtener todos los registros de la tabla "usuarios"
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);
        ?>

        <div class="logo">
            <img src="assets/LOGO-AVION-ROJO-iSTRATEGY.png" alt=" ">
        </div>
        <table id="tabla-usuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>USUARIO</th>
                    <th>CONTRASEÑA</th>
                    <th>EMAIL</th>
                    <th>TELÉFONO</th>
                    <th>ROL</th>
                    <th>FECHA</th>
                    <th>SALARIO</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Iterar sobre los resultados y mostrarlos en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>
                                <form action='info_usuario.php' method='post' enctype='multipart/form-data' id='form-info'>
                                    <input type='hidden' name='username' value='" . $row['username'] . "'>
                                    <input type='hidden' name='nombre' value='" . $row['nombre'] . "'>
                                    <input type='hidden' name='rol' value='" . $row['rol'] . "'>
                                    <button type='submit'>" . $row['id'] . "</button>
                                </form>
                            </td>
                            <td>" . $row['nombre'] . "</td>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['pass'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['telefono'] . "</td>
                            <td>" . $row['rol'] . "</td>
                            <td>" . $row['fecha'] . "</td>
                            <td>$" . $row['salario'] . ".00</td>
                            <td>
                                <form action='editar_usuario.php' method='post' enctype='multipart/form-data' id='form-editar'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <input type='hidden' name='nombre' value='" . $row['nombre'] . "'>
                                    <input type='hidden' name='username' value='" . $row['username'] . "'>
                                    <input type='hidden' name='password' value='" . $row['pass'] . "'>
                                    <input type='hidden' name='email' value='" . $row['email'] . "'>
                                    <input type='hidden' name='telefono' value='" . $row['telefono'] . "'>
                                    <input type='hidden' name='rol' value='" . $row['rol'] . "'>
                                    <input type='hidden' name='fecha' value='" . $row['fecha'] . "'>
                                    <input type='hidden' name='salario' value='" . $row['salario'] . "'>
                                    <button type='submit'>
                                        <img src='assets/icono pluma-8.png' alt=' '>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action='eliminar_usuario.php' method='post' enctype='multipart/form-data' id='form-eliminar' onclick='return confirm(\"¿Estás seguro de eliminar este usuario?\");'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <input type='hidden' name='nombre' value='" . $row['nombre'] . "'>
                                    <input type='hidden' name='username' value='" . $row['username'] . "'>
                                    <input type='hidden' name='password' value='" . $row['pass'] . "'>
                                    <input type='hidden' name='email' value='" . $row['email'] . "'>
                                    <input type='hidden' name='telefono' value='" . $row['telefono'] . "'>
                                    <input type='hidden' name='rol' value='" . $row['rol'] . "'>
                                    <input type='hidden' name='fecha' value='" . $row['fecha'] . "'>
                                    <input type='hidden' name='salario' value='" . $row['salario'] . "'>
                                    <button type='submit'>
                                        <img src='assets/icono basura-8.png' alt=' '>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    ";
                    }
                } else {
                    echo "<tr><td colspan='11'>No hay usuarios registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>