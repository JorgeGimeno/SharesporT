<?php

use App\Kernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request;

<<<<<<< HEAD
require dirname(__DIR__).'/config/bootstrap.php';
=======
?>
<main class="index">
  <header class="masthead text-center text-white">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleControls" data-slide-to="1"></li>
      <li data-target="#carouselExampleControls" data-slide-to="2"></li>
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
>>>>>>> 852dfeec7d71b44412f038e9a7671001382d081c

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts([$trustedHosts]);
}

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
