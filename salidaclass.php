<?php


class SalidaOptica {


    function getpedidosPUE(){

        $tablapedidos="";

            /*$query1="SELECT t1.st_folio, t3.st_Nombre  FROM tbl_pedidosOpticaProveedor t1
            INNER JOIN tbl_EvVentaOptica t2   
            ON t2.id_VentaOptica = t1.id_PedidoOpticaProveedor
            INNER JOIN cat_SucursalClinica t3
            ON t3.id_SucursalClinica = t2.id_Sucursal
            WHERE t1.id_Status=11  AND i_flagSalida=1 
            ORDER BY st_Nombre
             ";*/


            $query1="
            SELECT t1.st_folio, t3.st_Nombre FROM tbl_pedidosOpticaProveedor t1
            INNER JOIN tbl_EvVentaOptica t2   
            ON t2.id_VentaOptica = t1.id_PedidoOpticaProveedor
            INNER JOIN cat_SucursalClinica t3
            ON t3.id_SucursalClinica = t2.id_Sucursal
            WHERE t1.id_Status=11  AND i_flagSalida=1 


            EXCEPT 
            
            SELECT  t1.st_folio, t3.st_Nombre  FROM tbl_pedidosOpticaProveedor t1
            INNER JOIN tbl_EvVentaOptica t2   
            ON t2.id_VentaOptica = t1.id_PedidoOpticaProveedor
            INNER JOIN cat_SucursalClinica t3
            ON t3.id_SucursalClinica = t2.id_Sucursal
            WHERE t1.id_Status=11   AND i_flagSalida=0   AND   i_FlagSalioPedido=0
            ORDER BY st_Nombre ";
            



            $resq1=mssql_query($query1);
            while($arrayquery=mssql_fetch_array($resq1)){
    

            $tablapedidos.="<tbody>";
            $tablapedidos.="<tr>";
            $tablapedidos.=" <th id='folio[]' name='folio' value='".$arrayquery['st_folio']."' scope='row'>".$arrayquery['st_folio']."</th>";
            $tablapedidos.=" <input  type='hidden' name='folio[]' value='".$arrayquery['st_folio']."'></input>";
            $tablapedidos.="<td>".utf8_encode( $arrayquery['st_Nombre'])."</td>";
            $tablapedidos.="<td><input type='checkbox' name='' id='' checked ></td>";
            $tablapedidos.= "</td>";
            $tablapedidos.="</tbody>";
            //echo $query1;
            }return $tablapedidos;
        }


        function getfoliosalida($folioSalida){
            $tablapedidos="";
            
            /*$queryselec="SELECT * FROM tbl_SalidasOptica WHERE st_FolioSalida='".$folioSalida."'";
            $res=mssql_query($queryselec);*/

            if(isset($folioSalida)){

                $folio2 ="'".$folioSalida."'";
$tablapedidos.="<tbody>";
$tablapedidos.="<tr>";
$tablapedidos.=" <th id='folio' name='folio' value='' scope='row'>$folioSalida</th>";
$tablapedidos.='<td><a href="javascript:imprimirOrden('.$folio2.') "><img src="static/img/descargar.svg" style="width: 50px;    height: 40px;" alt=""> </a></td>';
$tablapedidos.="</tbody>";
            



              

                


            
            
            }return $tablapedidos;

        }

}  /*END CLASS */





?>



