<main class="contenedor seccion">
  <h1>Mas sobre nosotros</h1>
  <div class="iconos-sobreNosotros">
    <?php include 'iconos.php' ?>
  </div>
</main>

<section class="seccion contenedor">
  <h2>Casas y depas en venta</h2>

  <?php 
  include 'listado.php'; 
  ?>

  <div class="alinear-derecha">
    <a href="/propiedades" class="boton-verde">Ver todas</a>
  </div>
</section>

<section class="imagen-contacto">
  <h2 class="h2">Encuentra la casa de tus suenos</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nemo, sit delectus fuga quae beatae nesciunt quibusdam consequuntur ut molestiae expedita odio nobis autem eum illo, ea doloremque modi dolore?</p>
  <a href="/contacto" class="boton-amarillo-corto">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
  <seccion class="blog">
    <h3>Nuestro blog</h3>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog1.webp" type="image/webp">
          <source srcset="build/img/blog1.jpg" type="image/jpg">
          <img src="build/img/blog1.jpg" alt="texto entrada blog" loading="lazy">
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="/blog">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="info-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span> </p>
          <p>Consejos para construir una terraza en el techo de tu casa</p>
        </a>
      </div>
    </article>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog2.webp" type="image/webp">
          <source srcset="build/img/blog2.jpg" type="image/jpg">
          <img src="build/img/blog2.jpg" alt="texto entrada blog" loading="lazy">
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="/blog">
          <h4>Guia para la decoracion de tu hogar</h4>
          <p class="info-meta">Escrito el: <span>23/10/2025</span> por: <span>Admin</span> </p>
          <p>Consejos para decorar tu casa con estillo</p>
        </a>
      </div>
    </article>
  </seccion>
  <section class="testimoniales">
    <h3>Testimoniales</h3>
    <div class="testimonial">
      <blockquote>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum ab quo voluptatem. Provident excepturi at libero maiores dignissimos corrupti quibusdam consectetur odio tempora tempore, rerum, similique, laborum fuga nobis nemo?
      </blockquote>
      <p>Edgar Guzman</p>
    </div>
  </section>
</div> <!--Entrada de blogs-->