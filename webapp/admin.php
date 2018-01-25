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

    <!-- Slider -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css" rel="stylesheet">

    <!-- Noty -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="resources/css/landing-page.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style type="text/css">
      #temperatura .slider-track-high {
        background: green;
      }

      #temperatura .slider-track-low {
        background: red;
      }

      #temperatura .slider-selection {
        background: yellow;
      }

      .slider.slider-horizontal:hover .tooltip.tooltip-main, .slider.slider-vertical:hover .tooltip.tooltip-main {
        opacity: 1 !important;
      }

      .slider.slider-horizontal:hover .tooltip-inner, .slider.slider-vertical:hover .tooltip-inner {
        font-size: 90%;
        width: auto;
      }
    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Photon App</a>
        <a class="btn btn-primary" href="admin.php">Admin</a>
      </div>
    </nav>

    <div class="jumbotron jumbotron-fluid" style="margin-bottom: 0rem !important">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 style="margin-bottom: 3rem">Configuración</h2>
            <form id="formulario" name="formulario">
                <div class="form-group row">
                  <label for="estado" class="col-2 col-form-label">Estado</label>
                  <div class="col-10">
                    <a class="btn btn-success" id="encender" onclick="cambiarEstado('on');"><i class="fa fa-power-off" style="color: white"></i></a>
                    <a class="btn btn-danger" id="apagar" onclick="cambiarEstado('off');"><i class="fa fa-power-off" style="color: white"></i></a>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="temperatura" class="col-2 col-form-label">Temperatura</label>
                  <div class="col-10">
                    <input id="temperatura" class="form-control" type="text"/>
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="index.php#last">Última actualización</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="index.php#temperatura">Temperatura</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="index.php#humedad">Humedad</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="index.php#luz">Luz</a>
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

	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

    <!-- Slider -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>

    <!-- Noty -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>

    <!-- admin.js -->
    <script type="text/javascript" src="resources/js/admin.js"></script>

  </body>

</html>