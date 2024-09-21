<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Usuario</title>
    <link rel="stylesheet" href="css/info_usuario.css">
</head>

<body>
    <header>
        <div class="fondo">
            <img src="assets/portada.jpg" alt="Portada">
            <div class="perfil">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $nombre = $_POST['nombre'];
                    $rol = $_POST['rol'];
                    if ($username == 'wsosa') {
                        echo "<img src='assets/wsosa.jpg' alt='Foto de Perfil'>";
                    } else {
                        echo "<img src='assets/foto.jpg' alt='Foto de Perfil'>";
                    }
                    ?>
                </div>
                <nav>
                    <ul>
                        <?php
                        echo "<li><span>$username</span></li>";
                        ?>
                        <li><img src="assets/escritura.png" alt=" "></li>
                        <li><img src="assets/check.png" alt=" "></li>
                        <li><a href="">Verificado</a></li>
                        <li><a href="">Inicio</a></li>
                        <li><a href="">Galería</a></li>
                        <li><a href="">Novedades</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <div class="head">
                <div id="logo-icono">
                    <a href="crud.php"><img src="assets/avion.png" alt=" "></a>
                </div>
                <div class="head-texto">
                    <b>Bienvenido a tu perfil</b>
                    <p>Para tener un mayor alcance de tu perfil no olvides actualizarlo continuamente.</p>
                </div>
                <div id="logo">
                    <a href="crud.php"><img src="assets/LOGO-AVION-ROJO-iSTRATEGY.png" alt=" "></a>
                </div>
            </div>
            <div class="content">
                <b>Sobre mi...</b>
                <p>Soy <b><?php echo $nombre; ?></b>, un <?php echo $rol; } ?> con 6 años de experiencia en la creación de
                identidad para empresas. Me destaco por mi liderazgo y organización, y estoy comprometido con mi empresa para
                ayudar a nuestros clientes a conseguir su identidad visual. Actualmente, busco mantenerme al día en
                cuanto a tendencias digitales para que pueda contribuir con mi experiencia y habilidades dentro de
                iStrategy.</p>
            <div class="datos">
                <div class="lista">
                    <li>Vista General</li>
                    <li>Trabajo</li>
                    <li>Educación</li>
                    <li>Contacto</li>
                    <li>Habilidades</li>
                </div>
                <div class="lista-datos">
                    <b>Vista General</b>
                    <div class="exp-datos">
                        <img src="assets/check.png" alt=" ">
                        <p>Diseñador UX/UI en <b>BlueYonder</b>, Becario de Diseño UX/UI en <b>BlueYonder</b></p>
                        <a>Editar Información</a>
                    </div>
                    <div class="exp-datos">
                        <img src="assets/check.png" alt=" ">
                        <p>Ingeniería en Informática en <b>UNAM</b>, Cursado desde 2018 hasta 2024</p>
                        <a>Editar Información</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>