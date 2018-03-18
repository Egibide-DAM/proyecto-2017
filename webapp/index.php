<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="resources/img/favicon.ico" type="image/x-icon">

    <title>Photon App</title>

    <!-- Bootstrap core CSS -->
    <link href="resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="resources/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="resources/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="resources/css/landing-page.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="#">Photon App</a>
        <a class="btn btn-primary" href="admin.php">Admin</a>
      </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1>Photon App</h1>
            <h2>Monitorización de datos a tiempo real</h2>
          </div>
        </div>
      </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center" id="last">
      <div class="container">
      	<div class="row">
      		<div class="col-md-12 mb-5">
      			<p class="lead mb-0">Última actualización: <span id="ultima_fecha"></span></p>
      		</div>
      	</div>
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-thermometer-half m-auto text-primary"></i>
              </div>
              <h3>Temperatura</h3>
              <p class="lead mb-0" id="ultima_temperatura"></p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-tint m-auto text-primary"></i>
              </div>
              <h3>Humedad</h3>
              <p class="lead mb-0" id="ultima_humedad"></p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-lightbulb-o m-auto text-primary"></i>
              </div>
              <h3>Luz</h3>
              <p class="lead mb-0" id="ultima_luz"></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div id="temperatura" class="col-lg-6 order-lg-2 text-white showcase-img"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text" style="background: url('resources/img/bg_temperatura.jpg') no-repeat center center;background-size:100%;margin:0 !important;">
            <h2 style="-webkit-text-stroke: 1.5px black;color: #FFF;text-align: right;">Temperatura</h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div id="humedad" class="col-lg-6 text-white showcase-img"></div>
          <div class="col-lg-6 my-auto showcase-text" style="background: url('resources/img/bg_humedad.jpg') no-repeat center center;background-size:100%;margin:0 !important;">
            <h2 style="-webkit-text-stroke: 1.5px black;color: #FFF;text-align: right;">Humedad</h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div id="luz" class="col-lg-6 order-lg-2 text-white showcase-img"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text" style="background: url('resources/img/bg_luz.jpg') no-repeat center center;background-size:100%;margin:0 !important;">
            <h2 style="-webkit-text-stroke: 1.5px black;color: #FFF;text-align: left;">Luz</h2>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="#last">Última actualización</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#temperatura">Temperatura</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#humedad">Humedad</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#luz">Luz</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; <?= date('Y') ?>. Developed by Yeray & Jon. Powered by <a href="https://startbootstrap.com/" target="_blank">Start Bootstrap</a>.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="https://github.com/Romerski/proyecto-2017/" target="_blank">
                  <i class="fa fa-github fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="resources/vendor/jquery/jquery.min.js"></script>
    <script src="resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- MorrisJS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!-- grafica.js -->
    <script type="text/javascript" src="resources/js/grafica.js"></script>

  </body>

</html>