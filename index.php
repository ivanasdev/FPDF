<?php
//Variables de conexion
require("../../db.php");
$ruta2index = "../../../";

//Se importa clase done estan las tablas del catalago
include("salidaclass.php");

$sucursal=$_GET['idSucursal'];
$folioSalida=$_GET['foliosalida'];
$objsalida = new SalidaOptica();
$table = $objsalida->getpedidosPUE();
$tablasalida=$objsalida->getfoliosalida($folioSalida);

$folio = $_GET['scannerinput'];






//Cada que se escanea un folio se le activa el status i_flagSalida=1 para que aparezaca en la tabla la cual viene de la clase  salidaclass.php
if(isset($folio)){
    $query1="UPDATE tbl_pedidosOpticaProveedor set i_flagSalida=1  WHERE st_folio='".$folio."' ";
    $resq=mssql_query($query1);
    if($resq){
        echo "<meta http-equiv='REFRESH' content='0; url=index.php '>";
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<link href="<?=$ruta2index?>utils/jquery-ui-1.11.0.custom/css/jquery_ui/redmond/jquery-ui-1.10.3.custom.css" rel="stylesheet"/>
	<link href="<?=$ruta2index?>utils/tinybox/style_tiny.css" rel="stylesheet" type="text/css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?=$ruta2index?>utils/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?=$ruta2index?>utils/jquery-ui-1.11.0.custom/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?=$ruta2index?>utils/jquery-ui-1.11.0.custom/jquery.ui.datepicker-es.js"></script>  
	<link href="<?= $ruta2index ?>utils/tinybox/style_tiny.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?= $ruta2index ?>utils/tinybox/tinybox.js"></script>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
    <link rel="stylesheet" href="static/css/styles.css">


    <script  type="text/javascript">
 


    
    function abrirPop(ancho, alto, php) {
      TINY.box.show({
        iframe: php,
        boxid: 'frameless',
        width: ancho,
        height: alto,
        fixed: false,
        maskid: 'graymask',
        maskopacity: 40
      });
    }

    function imprimirOrden(idSalida){
			abrirPop(800,550,'PDFPedidoInsumoSucursal.php?idSalida='+idSalida);
		}



  


    


  
    </script>











</head>
<body>
    

<div class="container-fluid ">

    <div class="card1 text-center" style="margin-top: 9px;">
    <div class="card-title" style="margin-bottom: 6px;"> <img class="img1" src="<?= $ruta2index ?>bionline/securitylayer/images/statistics.gif" width="48" height="48"> <strong>
        <div class="card-title" style="padding-top: 6px; padding-bottom: 6px;"><strong><h3>Generar Folio de Salida de &Oacuteptica</h3></strong></div>

        <div class="card text-center" style="margin-top:9px; margin-bottom:9px;">
            <form id="formscanner">
                <div>
                    <label for="scannerinput">
                        <p><strong>
                                Escanear sobres
                            </strong></p>
                        <input type="text" style="margin-bottom:20px;" name="scannerinput" id="scannercodigo" class="inp" autofocus  >
                    </label>
                </div>

            </form>
        </div>




        <div>
            


        

        <div class="card text-center" id="FoliosPuebla"  >

     <form id="formsalidas" method="POST" action="foliogen.php"  >
           <table class='table'>
                <thead>
                <tr>
                <th scope='col'>Folio</th>
                <th scope='col'>Sucursal</th>
                <th scope='col'>Check</th>
          
                </tr>
                </thead>
                <?= $table ?>
            </table>

            <div class="" style="margin-bottom:9px ;">
                   
      
                <button type="submit" style="margin-bottom:6px;" class="btn btn-dark" id="validsalida" >Validar Salida </button></div>
            </div>

            </form>
        </div>






<div>
            <?php
       
            $banderasalida=$_GET['banderasalida'];
            $folioSalida=$_GET['foliosalida'];



            if($banderasalida == 1){
                include("includes/pedidosalio.php");

                
              
            }
            ?>
</div>

        </div>

</div>

 


<script>


</script>


</div>


</body>
</html>