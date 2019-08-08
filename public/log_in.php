<?php

require_once('header.php');

?>
  <style>
    .contenedor{
      position: relative;
      overflow: hidden;
      padding-top: calc(7rem + 72px);
      padding-bottom: 7rem;
      background: -webkit-gradient(linear, left bottom, left top, from(#ff6a00), to(#ee0979));
      background: linear-gradient(0deg, #ff6a00 0%, #ee0979 100%);
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: scroll;
      background-size: cover;
    }
  </style>
  <main class="text-center text-white contenedor mw-100 h-10">
    <div class="container">
      <h1>Inicio de sesion</h1>
      <input type="text" class="form-control w-50 mx-auto" placeholder="Nombre de usuario" 
            aria-label="Nombre de usuario" aria-describedby="basic-addon1">
      <input type="text" class="form-control mt-2 w-50 mx-auto" placeholder="Contraseña" 
            aria-label="Contraseña" aria-describedby="basic-addon1">
      <button class="btn btn-primary btn-xl rounded-pill mt-5">Iniciar Sesion</button>
    </div>
  </main>
<?php
    require_once('footer.php');
    require_once('scripts.php');
?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
