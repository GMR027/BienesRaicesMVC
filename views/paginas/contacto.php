<main class="contenedor seccion">
  <h1>Contacto</h1>
  <picture>
    <source srcset="/build/img/destacada3.webp" type="imgae/webp">
    <source srcset="/build/img/destacada3.jpg" type="image/jpeg">
    <img src="/build/img/destacada3.jpg" alt="contacto" loading="lazy">
  </picture>

  <?php 
    if($mensaje) { ?>
      <p class='alerta exito'><?php echo $mensaje?></p>
    <?php }
  ?>
  

  <h2>Llene el formulario de contacto</h2>
  <form action="/contacto" class="formulario" method="POST">
    <fieldset>
      <legend>Informacion personal</legend>

      <label for="nombre">Nombre</label>
      <input type="text" placeholder="Nombre" id="nombre" name="contacto[nombre]" required>


      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje" placeholder="Tu mensaje"  name="contacto[mensaje]" required></textarea>
    </fieldset> <!--Informacion personal-->

    <fieldset>
      <legend>Informacion de la propiedad</legend>
      <label for="opciones">Vende o compra</label>
      <select  name="contacto[tipo]" id="opciones" required>
        <option value="" disabled selected>--Seleccione--</option>
        <option value="compra">Compra</option>
        <option value="vende">Vende</option>
      </select>

      <label for="presupuesto">Presupuesto o precio</label>
      <input type="number" placeholder="$" id="presupuesto"  name="contacto[precio]" required>
    </fieldset> <!--Informacion de compra venta-->

    <fieldset>
      <legend>Contacto</legend>
      <p>Como desea ser contactado</p>

      <div class="forma-contacto">
        <label for="contactar-telefono">Telefono</label>
        <input type="radio" value="telefono" id="contactar-telefono"  name="contacto[contacto]" required>

        <label for="contactar-email">Email</label>
        <input type="radio" value="email" id="contactar-email"  name="contacto[contacto]" required>
      </div>

      <div id="contacto"></div>

      
    </fieldset> <!--Informacion de contacto fecha y hora-->

    <input type="submit" value="Enviar" class="boton-verde">

  </form>
</main>