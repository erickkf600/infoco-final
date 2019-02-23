<?php session_start(); ?>
<header id="header"><?php require_once "includes/header.php" ?></header>
<main>
	<section>
		<div class="container" id="container-adesao">
			<div class="cabecalho mt-3">
				<h1 class="titulo" title="Bem-Vindo a infoco">FICHA DE ADESÃO INFOCO</h1>
				<span class="linha-titulo"></span>
				<p class="premium">Increva-se e receba em sua casa, o nosso cartão fidelidade premium. Com ele você receberá descontos exclusivos de nossos parceiros.</p>
			</div>
			<form class="form-horizontal" method="POST" action="http://localhost/INFOCO%20FINAL/assinatura-func">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="painel">
							<div class="painel-header">
								<h2 class="h4 mt-1" title="Informações pessoais">Informações Pessoais</h2>
							</div>
							<div class="form-group mt-4">
								<label class="col-sm-4">Nome/Razão Social <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nome" title="seu nome" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Email <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="email" title="seu email"  required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Telefone <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="telefone" title="seu telefone"  required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Celular/Whatsapp  <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" title="seu nome" name="celular" title="seu celular"  required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Como chegou aqui?<span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<select name="deOndeVem" class="form-control" required id="options" onchange="mostra_div()">
										<option selected disabled>Selecione</option>
										<option value="facebook">Facebook</option>
										<option value="instagram">Instagram</option>
										<option value="empresas parceiras" id="empresa">Empresas Parceiras</option>
										<option value="indicaçao">Indicação
										</option>
									</select>
									<div id="QualEmpresa" style="margin-top:10px">
										<input type="text" class="form-control" placeholder="Qual Emperesa?" name="nomeParceiro">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="painel">
							<div class="painel-header">
								<h2 class="h4 mt-1" title="Informações de Endereço">Endereço</h2>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">CEP <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="cep" id="cep" maxlength="8" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onblur="pesquisacep(this.value);" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Município <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="municipio" id="municipio" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">UF <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="estado" id="uf" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Endereço <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="endereco" name="endereco" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Bairro <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="bairro" name="bairro" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Número <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="numero" required>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group text-center mt-5">
					<?php 
					if(!empty($_SESSION['sucesso_envio'])){
						echo "<p style='color: #01ad01; font-size: 20px; font-weight: 600'>".$_SESSION['sucesso_envio']."</p>";
						unset($_SESSION['sucesso_envio']);
					}else{
						if(!empty($_SESSION['falha_envio'])){
							echo "<p style='color: #f00>".$_SESSION['falha_envio']."</p>";
							unset($_SESSION['falha_envio']);
						}
					}  
					?>
					<button type="submit" id="submit_btn" title="Cadstrar-se na Infoco" class="btn pagamento">ENVIAR</button>
				</div>
			</form>
			<div class="text-center mt-5">
				<h4 class="text-dark h2">Alguma duvida?</h4>
				<span class="linha-titulo text-center"></span>
			</div>
			<div class="contato-btn mb-4">
			  <a class="btn" href="https://infocomn.com.br/contato" title="Entre em contato com a InFoco">ENTRE EM CONTATO</a>
		   </div>
		</div>
	</section>
</main>
<footer><?php require_once "includes/footer.php" ?></footer>