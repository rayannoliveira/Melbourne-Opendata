<?php

    //Recupera do Formulário
    //$cep = $_POST["txtcep"];
    //Chamada ao servico REST
    //URL de servico
    //Aqui indicamos a URL que iremos utilizar para acessar o serviço
    $url = "https://data.melbourne.vic.gov.au/resource/ntht-5rk7.json";
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
    <title>vagas</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
   <link rel="stylesheet"  href="assets/css/datatables.min.css"/>
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Melbourne</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <h2 class="text-info">Melborne</h2>
    <h2 class="text-info">Melborne</h2>
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info">Melborne oi</h2>
                 <div class="table-responsive flex-nowrap">
           <form>
            <table id="tabelavagas" class="table">
                <thead>
                    <tr>
                        <th>Bay id</th>
                        <th>Device ID</th>
                        <th>Description 1</th>
                        <th>Description 2</th>
                        <th>Description 3</th>
                        <th>Description 4</th>
                        <th>Description 5</th>
                        <th>Description 6</th>
                        <th>Description 6</th>
                        <th>Description 6</th>
                        <th>Description 6</th>
                    </tr>
                </thead>

                 <tbody>
                    <?php 
                    foreach ($listadevagas as $e) { ?>
              <tr>
                        <td style="background-color: #ffffff;"> <?php echo $e->bayid ; ?></td>  
                        <td style="background-color: #ffffff;"><?php echo $e->deviceid; ?> </td>
                        <td style="background-color: #ffffff;"><?php echo $e->description1; ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $e->disabilityext1; ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $e->duration1; ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $e->effectiveonph1; ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $e->endtime1; ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $e->fromday1; ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $e->starttime1; ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $e->today1; ?> </td>
                        <td style="background-color: #ffffff;"> <?php echo $e->typedesc1; ?> </td>
                        
              </tr>
                <?php
                    }
                ?> 
                </tbody>
                
            </table>
           
            </form>
        </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/jquery.dataTables.min.js""></script>

    
    <script type="text/javascript">
        $(document).ready( function () {
        $('#tabelavagas').DataTable();
        } ); 
    </script>

</body>

</html>