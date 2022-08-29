<?php 


require("../../db.php");

$ruta2index = "../../../";



        
///recibe folios
$folio=$_POST['folio'];
$valuesep=implode(",",$folio);
//pack para crear el folio
$a="SAOP";
$b=date("ymd");
$numrand=rand(9, 2187);
$operador=1234;
$foliosalida=$a.$numrand.$b.$operador;

//Inserta los folios que salieron
$query2="INSERT INTO tbl_SalidasOptica(st_FoliosPedidos,st_FolioSalida,id_Operador) VALUES('".$valuesep."','".$foliosalida."',".$operador." ) ";
$reaqu=mssql_query($query2);

//Vuelve a pasar a cero i_flagSalida=0 para que ya no parezacan en la tabla de salidas.
$query="UPDATE tbl_pedidosOpticaProveedor set i_FlagSalioPedido=1 , i_flagSalida=0 WHERE i_flagSalida=1  ";
$resupdate=mssql_query($query);


if($resupdate){
    echo "<meta http-equiv='REFRESH' content='0; url=index.php?banderasalida=1&foliosalida=".$foliosalida." '>";
}
else{
    echo "<meta http-equiv='REFRESH' content='0; url=index.php?banderasalida=0 '>";

}






echo $query2;
echo $query;




?>
