<?php

require_once('header.php');

?>
<main class="index">
  <header class="masthead text-center text-white">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="../Resources/PlantillaInicio/img/04.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block border border-dark rounded" style="color:black; background-color:rgba(255, 106, 0, 0.5)">
            <h5>Somos la ostia</h5>
            <p>Y lo sabes...</p>
          </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../Resources/PlantillaInicio/img/05.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block border border-dark rounded" style="color:black; background-color:rgba(255, 106, 0, 0.5)">
            <h5>Tu también podrías molar como nosotros</h5>
            <p>Si te unes a Sharesport atraeras todas las miradas</p>
          </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../Resources/PlantillaInicio/img/06.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-md-block border border-dark rounded" style="color:black; background-color:rgba(255, 106, 0, 0.5)">
            <h5>Deja de ser un tipo cualquiera</h5>
            <p>En sharesport conseguiremos que tengas la imagen que mereces.</p>
          </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    
  </header>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="../Resources/PlantillaInicio/img/07.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">Para ti deportista</h2>
            <p>¿Haces deporte y quieres compartir tus logros con una comunidad afin? 
              Unete a SharesporT la red social de referencia en temas deportivos.
              ¡ No lo dudes ! Unete y comparte. </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="../Resources/PlantillaInicio/img/08.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="p-5">
            <h2 class="display-4">Siempre cercanos</h2>
            <p>Nuestro equipo de moderadores y administradores siempre estara a tu disposión para resolver tus problemas y dudas. 
              Ya sea para resolver un problema, obtener información o proponer mejoras en la red comunicate con ellos y resolveremos 
              el asunto con la mayor brevedad posible.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid rounded-circle" src="../Resources/PlantillaInicio/img/09.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-4">Comunidad unida</h2>
            <p>No dejes que tu relacion con SharesporT acabe cuando cierras sesion.Unete a nuestros grupos de runners y descubre rincones o rutas en tu ciudad como nunca habias soñado.
              Descubre caminos lejanos junto a nuestro grupo de trail running o 'quema el asfalto' acompañando al grupo de ciclismo. ¡ El limite lo pones tu !
              SharesporT se ocupa de que puedas enviarlo lo mas lejos posible.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
    require_once('footer.php');
    require_once('scripts.php');
?>



</body>

</html>
