<?php 
  require_once "MercadoPago/lib/mercadopago.php";
  require_once "PagamentoMP.php";
  include "../../banco.php";
  $get = base64_decode($_GET['infocopag']);
  $pagar = new PagamentoMP;

  $query =  "select * from  fichaadesao where ref = '$get'";
  $result = mysqli_query($con , $query);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-eqiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InFoco Pagamento</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="../../icon.png">
  <meta name="robots" content="noindex">

</head>
<body>
  <header><img src="../../intro.png" width="20%"></header>
  <div class='container'>
    <div class='row' style='padding-top:25px; padding-bottom:25px;'>
        <div class="col-md-8 col-md-offset-2">
          <h2 style="text-align: center;">Precisamos que você confirme os valores</h2>
        <hr/>
        <a href="#" class="btn btn-info btn-block" >Retornar ao site</a>
        <hr/>
          <div class="panel panel-default">
           <div class="panel-heading">
            <h4 class="panel-title">Verifique se esta tudo certo</h4>
         </div>
          <div class="panel-body">
            <div class="col-md-9">
              <?php 
          while ($p = mysqli_fetch_array($result)) {
            $id = $p['id']; 
            $nome = $p['nome']; 
            $cnpj = $p['cnpj'];  
            $cep = $p['cep']; 
            $plano = $p['plano'];
            $valor = $p['valor'];
            $total = $valor + 200;
            $url = 'https://infocomn.com.br/adesao';
            $btn = $pagar->PagarMP($id, $nome, $plano, (float)$total, $url);
        ?>
             <table class="table table-striped">
              <tr>
               <td colspan="2">
                <b>Infomações de pagamento</b>
              </td>
            </tr>
            <tr>
             <td>
              <ul>
               <li>Plano <?php echo$plano ?></li>
               <hr>
               <li>Taxa de Adesão*</li>
             </ul>
           </td>
           <td>
            <ul style="list-style: none;">
              <li><b>R$ <?php echo number_format($valor, 2, ',','.') ?></b></li>
              <hr>
              <li><b>R$ 200,00</b></li>
            </ul>
            
           </td>
        </tr>
      </table>
  <?php } ?>
    </div>
    <div class="col-md-3">
     <div style="text-align: center;">
      <h3>Valor Total</h3>
      <h3><span style="color:green;">R$ <?php echo number_format($total, 2, ',','.'); ?></span></h3>
    </div>
  </div>
</div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <?php echo $btn;?>
</div>
</div>
<footer>
  <img src="../../img/mpag.png">
  <img src="../../img/selo.png">
  <img src="../../intro.png" width="300px">
</footer>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>