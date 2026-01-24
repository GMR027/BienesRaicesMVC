<main class="contenedor seccion">
  <h2>Crear Vendedores</h2>
  <?php foreach($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>
  <?php endforeach;?>

  <form action="/vendedores/crear" class="formulario" method="POST">
  <?php include_once 'formularioVendedores.php' ?>
  <input type="submit" value="Crear vendedor" class="boton boton-verde">
  </form>
</main>