<div class="contenedor-anuncios">
  <?php foreach($propiedades as $propiedad) { ?>
  <div class="anuncio">
    <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" loading="lazy">
    <div class="contenido-anuncio">
      <h3><?php echo $propiedad->titulo; ?></h3>
      <p class="precio">$ <?php echo $propiedad->precio; ?></p>


      <ul class="iconos-caracteristicas">
        <li>
          <img src="build/img/icono_wc.svg" alt="wc" loading="lazy">
          <p><?php echo $propiedad->wc; ?></p>
        </li>
        <li>
          <img src="build/img/icono_estacionamiento.svg" alt="estacionamiento" loading="lazy">
          <p><?php echo $propiedad->estacionamiento; ?></p>
        </li>
        <li>
          <img src="build/img/icono_dormitorio.svg" alt="dormitorio" loading="lazy">
          <p><?php echo $propiedad->habitaciones; ?></p>
        </li>
      </ul>

      <a href="/anuncio.php?idPropiedad=<?php echo $propiedad->id; ?>" class="boton boton-amarillo"> Ver propiedad</a>
    </div>
  </div><!--Anuncio-->
  <?php } ?>
</div><!--Contenedor de anuncios-->