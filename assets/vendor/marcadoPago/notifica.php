<?php 

 if($_GET['collection_id'] || $_GET['id']){
   
   require_once "MercadoPago/lib/mercadopago.php";
   require_once "PagamentoMP.php";
   include "../../banco.php";         
   
   $pagar = new PagamentoMP;
   
   if(isset($_GET['collection_id'])):
    $id =  $_GET['collection_id'];
   elseif(isset($_GET['id'])):
    $id =  $_GET['id'];
   endif; 
   
   
   $retorno = $pagar->Retorno($id , $con);
   if($retorno){
      // Redirecionar usuario
      header("location: ../../adesao");
   }else{
     // Redirecionar usuario e informar erro ao admin
      header("location: ../../home");
      
      /*
       
       ENVIAR EMAIL AO ADMIN
      
      */
   }
   
 }
 
 


?>