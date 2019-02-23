<?php 
  $get = $_GET['pagina'];
  $explode = explode('/', $get);
  $variavel = $explode[1];
  $ref = base64_decode($variavel);
  require_once "assets/vendor/mercadoPago/MercadoPago/lib/mercadopago.php";
  require_once "assets/vendor/mercadoPago/PagamentoMP.php";
  $pagar = new PagamentoMP;
  $buscador = $conectar->prepare("SELECT * from fichaadesao where ref=:ref LIMIT 1");
  $buscador -> bindValue(':ref', $ref, PDO::PARAM_STR);
  $buscador->execute();
  $fat = $buscador->fetch(PDO::FETCH_OBJ);
  $nome = $fat->nome;
  $id = $fat->id; 
  $cnpj = $fat->cnpj;  
  $cep = $fat->cep; 
  $plano = $fat->plano;
  $valor = $fat->valor;
  $total = $valor + 200;
  $url = 'https://infocomn.com.br/adesao';
  $btn = $pagar->PagarMP($id, $nome, $plano, (float)$total, $url); 
?>
<header><img src="https://infocomn.com.br/intro.png" width="20%"></header>
<div class='container col-lg-7 col-md-offset-2'>
	<h2 class="text-center text-dark mt-4">Precisamos que você confirme os valores</h2>
	<hr/>
	<a href="#" class="btn btn-info btn-block" >Retornar ao site</a>
	<hr/>
	<div class="card w-100">
		<h4 class="card-header">Verifique se esta tudo certo</h4>
		<div class="card-body row">
			<div class="col-lg-9">
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
			</div>
			<div class="col-lg-3 mt-4">
				<div style="text-align: center;">
					<h3>Valor Total</h3>
					<h3><span style="color:green;">R$ <?php echo number_format($total, 2, ',','.'); ?></span></h3>
				</div>
			</div>
		</div>
	</div>
	<div class="card w-100">
		<div class="card-header">
			<?php echo $btn;?>
		</div>
	</div>
	<footer class="text-center mt-3">
		<img src="http://localhost/INFOCO%20FINAL/assets/img/mpag.png">
		<img src="http://localhost/INFOCO%20FINAL/assets/img/seguro.png">
		<img src="https://infocomn.com.br/intro.png" width="300px">
	</footer>
</div>