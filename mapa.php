<?php

    //Recupera do Formulário
    //$cep = $_POST["txtcep"];
    //Chamada ao servico REST
    //URL de servico
    //Aqui indicamos a URL que iremos utilizar para acessar o serviço
    $url = "https://data.melbourne.vic.gov.au/resource/vh2v-4nfs.json";
    //Inicializa cURL para uma URL.
    //Prepara o CURL para criar um conexao que será estabelecida entre a nossa aplicação e o nosso serviço
    $ch = curl_init($url);
    //Marca que vai receber string
    //Existem várias opções de setup, aqui será utilizado apenas que iremos receber uma string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //Inicia a conexão
    //Dispara a nossa solicitação, é como se tivessemos dando enter na barra de endereços do navegador
    $resposta = curl_exec($ch);
    //Fecha a conexão
    //Após receber os dados, fechamos a conexao
    curl_close($ch);
    //Usando a decodificação em JSON
    //A forma do PHP trabalhar com JSON é muito simples
    //Ele transforma os dados recebidos em um objeto ou em uma lista de objetos
    $listadeobjetos = json_decode($resposta);

    $listadevagas= $listadeobjetos;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar" style="background-color: rgb(255,255,255);">
        <div class="container"><a class="navbar-brand logo" href="#">Melbourne</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.html">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page landing-page">
        <section class="clean-block clean-info dark" style="background-color: rgb(255,255,255);">
            <div class="container" style="filter: brightness(100%);">
                <div class="block-heading">
                    <h2 class="text-info">Melborne</h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(
            document.getElementById('map'),
            {center: new google.maps.LatLng(-37.808697589247046, 144.97193891371268), zoom: 12});
               // Create markers.
        <?php 
        foreach ($listadevagas as $e) { ?>
              var ponto = new google.maps.LatLng(<?php echo $e->lat; ?>,<?php echo $e->lon; ?>);
              var marker = new google.maps.Marker({
              position: ponto,//seta posição
              map: map,//Objeto mapa
              title:'<?php echo $e->status;?>'//string que será exibida quando passar o mouse no marker
      //icon: caminho_da_imagem
  });
        <?php
            }
        ?> 
      }
      google.maps.event.addListener(marker, 'click',function(){ alert("Hello World!"); });

    </script>
                      <iframe allowfullscreen="" frameborder="0" width="100%" height="400" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDbrzMyacs8Gt3ik9pM1NNqpwsQzOmFpo&callback=initMap">
                        </iframe>

                        </div>
                    </div>
                    <div class="col-md-6" style="padding-bottom: 151px;background-color: #ffffff;">
                        <h3>Data inicial</h3><input class="form-control-lg" type="date">
                        <h3>Data final</h3>
                        <div class="getting-started-info">
                            <p></p>
                        </div><input class="form-control-lg" type="date">
                        <h3></h3><a class="btn btn-outline-primary btn-lg" role="button" href="vagas.html">Join Now</a></div>
                    <div class="col"></div>
                </div>
            </div>
        </section>
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/17472.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">John Smith</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/15686.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Robert Downturn</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2018 Copyright Text</p>
        </div>
    </footer>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDbrzMyacs8Gt3ik9pM1NNqpwsQzOmFpo&callback=initMap">
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>