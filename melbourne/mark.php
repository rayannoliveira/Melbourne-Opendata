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
    <title>Custom Markers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBLssRAx8ZUNFjM9FS7tKcbY0JeLmQHhk&callback=initMap">
    </script>
  </body>
</html>