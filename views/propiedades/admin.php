
<main class="contenedor seccion">
  <h1>Administrador de bienes raices</h1> 

  <!-- Generador de alerta de propiedad creada -->
  <?php 
    if($resultado) { 
      $mensaje = mostrarMensajes(intval($resultado));
      if($mensaje) { ?>
        <p class="alerta exito"> <?php echo limpiar($mensaje); ?> </p>
      <?php }
    }
    ?>

  

  <a href="/propiedades/crear" class="boton boton-verde">Nueva propiedad</a>
  <a href="../vendedores/crear" class="boton boton-amarillo-corto">Nuevo vendedor</a>

  <h2>Propiedades</h2>
  <table class="propiedades">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody> <!--Mostrar las propiedades de la base de datos -->
      <?php foreach($propiedades as $propiedad): ?>
      <tr>
        <td><?php echo $propiedad->id; ?></td>
        <td><?php echo $propiedad->titulo; ?></td>
        <td><img src='/imagenes/<?php echo $propiedad->imagen; ?>' alt="imagen" class="imagen-tabla"></td>
        <td>$<?php echo $propiedad->precio; ?></td>
        <td>
          <form action="/propiedades/eliminar" method="POST">
            <input type="hidden" name="idEliminar" value="<?php echo $propiedad->id; ?>">
            <input type="hidden" name="tipo" value="propiedad">
            <input type="submit" value="Eliminar" class="boton-rojo-block">
          </form>
          <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-azul-block">Actualizar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <h2>Vendedores</h2>
  <table class="propiedades">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($vendedores as $vendedor): ?>
      <tr>
        <td><?php echo $vendedor->id ?></td>
        <td><?php echo $vendedor->nombre ?></td>
        <td><?php echo $vendedor->apellido ?></td>
        <td><?php echo $vendedor->telefono ?></td>
        <td>
          <form action="/vendedores/eliminar" method="POST">
            <input type="hidden" name="idEliminar" value="<?php echo $vendedor->id; ?>">
            <input type="hidden" name="tipo" value="vendedor">
            <input type="submit" value="Eliminar" class="boton-rojo-block">
          </form>
          <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-azul-block">Actualizar</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>