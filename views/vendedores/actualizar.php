<?php 

?>

<main class="contenedor seccion">
  <h1>Actualizar</h1>
  <?php foreach($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>
  <?php endforeach; ?>
  <a href="/admin" class="boton boton-verde">Regresar</a>
  <form action="" class="formulario" method="POST">
    <?php include_once __DIR__ . '/formularioVendedores.php'; ?>
    <input type="submit" class="boton boton-verde" value="Actualizar">
  </form>
</main>