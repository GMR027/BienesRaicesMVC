<?php 

if(!isset($_SESSION)) {
  session_start();
}

//Revisar en que navegador se encuetra logeado
$ingreso = $_SESSION['login'] ?? false;

if(!isset($inicio)) {
  $inicio = false;
}


?>

<!DOCTYPE php>
<php lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../build/css/app.css">
  <title>Bienes Raices</title>
</head>
<body>
  <header class="header <?php echo $inicio ? 'inicio' : '' ?>"> <!-- Se usa isset para validar la variable y no marcar error -->
    <div class="contenedor contenido-header">
      <div class="barra">
        <a href="/">
          <img src="/build/img/logo.svg" alt="logo">
        </a>

        <div class="mobile-menu">
          <img src="/build/img/barras.svg" alt="barras-responsive">
        </div>

        <div class="derecha">
          <img src="/build/img/dark-mode.svg" alt="darckmod" class="dark-mode-boton">
          <nav class="navegacion">
          <a href="/">Inicio</a>
            <a href="/nosotros">Nosotros</a>
            <a href="/propiedades">Propiedades</a>
            <a href="/blog">Blog</a>
            <a href="/contacto">Contacto</a>
            <?php if($ingreso): ?>
            <a href="/logout">Cerrar sesion</a>
            <?php endif; ?>
          </nav>
        </div>
      </div> <!--Cierre de barra-->
      <h1 class="<?php echo $inicio ? 'visible' : 'oculto' ?>">Venta de casas y depstos de lujo</h1>
    </div>
  </header>

  <?php echo $contenido; ?>

  <footer class="footer seccion">
    <div class="contenedor contenido-footer">
      <nav class="navegacion">
        <a href="nosotros.php">Nosotros</a>
        <a href="anuncios.php">Anuncios</a>
        <a href="blog.php">Blog</a>
        <a href="contacto.php">Contacto</a>
      </nav>
    </div>
    <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?></p>
  </footer>
<script src="../build/js/bundle.min.js"></script>
</body>
</php>