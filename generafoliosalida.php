<?php 



require("../../db.php");
$ruta2index = "../../../";
$tablapedidos="";
$folioSalida="SAOP602208261234";

$queryselec="SELECT * FROM tbl_SalidasOptica WHERE st_FolioSalida='".$folioSalida."'";
$res=mssql_query($queryselec);

$i=0;
$arraypedidos=mssql_fetch_array($res);
$folios=$arraypedidos['st_FoliosPedidos'];


$foliosexplo=explode(",",$folios);




    


    
    






?>


<div class="card1 text-center">
            <div class="card title"><strong><h3>Resumen de salida</h3></strong></div>

           <table class='table'>
            <p><h6>Folio de salida:<?= $folioSalida?></h6></p>
                <thead>
                    <?php 
                    foreach($foliosexplo as $keyfolio){ ?>
                <tr>
                <th scope='col'><?= $keyfolio ?></th>
                </tr>
                    <?php }?>    
               
   
                <th scope='col'>Imprimir orden de salida</th>
                </tr>
                </thead>
            <?= $tablapedidos ?>
            </table>
        </div>
    </div>
        </div>
        
    </div>
