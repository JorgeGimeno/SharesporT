<?php

require_once('header.php');

?>

  <header class="masthead text-center text-white">
    <div class="masthead-content">
      <div class="container">
        <h1>Inicio de sesion</h1>
        <input type="text" class="form-control w-50 mx-auto" placeholder="Nombre de usuario" 
                    aria-label="Nombre de usuario" aria-describedby="basic-addon1">
        <input type="text" class="form-control mt-2 w-50 mx-auto" placeholder="Contraseña" 
                    aria-label="Contraseña" aria-describedby="basic-addon1">
        <button class="btn btn-primary btn-xl rounded-pill mt-5">Iniciar Sesion</button>
      </div>
    </div>
  </header>

<?php
    require_once('footer.php');
    require_once('scripts.php');
?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
