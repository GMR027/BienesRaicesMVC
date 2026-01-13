
<main class="contenedor seccion contanido-centrado">
  <h1>Login de usuario</h1>
  <?php foreach($errores as $alertas):?>
    <div class="alerta error">
      <?php echo $alertas; ?>
    </div>
  <?php endforeach; ?>
  <form action="/login" class="formulario" method="POST">
    <fielset>
      <legend>Email y password</legend>

      <label for="email">E-mail</label>
      <input type="email" placeholder="Tu e-mail" id="email" name="email">

      <label for="password">Password</label>
      <input type="password" placeholder="*****" id="password" name="pasword">

    </fielset>
    <input type="submit" value="Iniciar Sesion"  class="boton-verde">
  </form>
  </main>