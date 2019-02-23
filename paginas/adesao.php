<?php session_start(); ?>
<header id="header"><?php require_once "includes/header.php" ?></header>
<main>
	<section id="faq">
		<div class="container col-lg-11 mb-5" id="container-adesao">
			<div class="cabecalho mt-3">
				<h1 class="titulo" title="Ficha de adesão infoco">FICHA DE ADESÃO INFOCO</h1>
				<span class="linha-titulo"></span>
			</div>
			<form class="form-horizontal" method="POST" action="http://localhost/INFOCO%20FINAL/adesao-func">
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
								<label class="col-sm-4 control-label">CNPJ <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="cnpj" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Nome Fantasia <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nomeFantasia" title="nome da sua empresa"  required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Inscrição Municipal <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="inscricaoMunicipal" title="sua inscrição"  required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Inscrição Estadual <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" title="seu nome" name="inscricaoEstadual" title="Inscrição estadual"  required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Segmento Profissional <span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="segmentoProfissional"  required>
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
					<div class="col-lg-6 col-md-12 mt-3" id="contato">
						<div class="painel">
							<div class="painel-header">
								<h2 class="h4 mt-1" title="Informações de contato">Contato</h2>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-4 control-label" for="name">Telefone Fixo <span class="requerido"> *</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="telefone" required maxlength="11">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="name">Celular <span class="requerido"> *</span></label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="celular" required maxlength="11">
									</div>
								</div>
								<div class="form-group">
									<label for="country" class="col-sm-4 control-label">Whastapp?<span class="requerido"> *</span></label>
									<div class="col-sm-8">
										<select name="whastapp" class="form-control" required>
											<option selected disabled value="">Selecione</option>
											<option value="sim">Sim</option>
											<option value="nao">Não</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="name">Email <span class="requerido"> *</span></label>
									<div class="col-sm-8">
										<input type="email" class="form-control" name="email" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="name">Facebook</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="facebook">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="name">Instagram</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="instagram">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="name">Twitter</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="twitter">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="name">Site</label>
									<div class="col-sm-8">
										<input type="url" class="form-control" name="site">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12  planos">
						<div class="painel">
							<div class="painel-header">
								<h2 class="h4 mt-1" title="Selecione o Plano desejado">Plano Desejado</h2>
							</div>
							<div class="form-group">
								<label for="country" class="col-sm-4 control-label">Plano<span class="requerido"> *</span></label>
								<div class="col-sm-8">
									<select name="plano" class="form-control" onchange="muda_preco()" id="planos" required>
										<option selected disabled value="">Selecione um Plano</option>
										<option value="Básico">Básico</option>
										<option value="Intermediário">Intermediário</option>
										<option value="Avançado">Avançado</option>
										<option value="Super">Super</option>
									</select>
								</div>
							</div>
						</div>
						<div id="planoValor">
							<h3>Valores do Plano</h3>
							<p>Mensalidade: <span id="valor"></span></p>
							<p>Taxa de Adesão: <span>R$ 200.00</span></p>
							<input type="hidden" name="valor" id="valorInput" value="valor">
						</div>
					</div>
				</div>
				<div class="form-group text-center">
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
					<button type="submit" id="submit_btn" title="Cadstrar-se na Infoco" class="btn pagamento w-25">EFETUAR PAGAMENTO</button>
				</div>
				<img src="http://localhost/INFOCO%20FINAL/assets/img/mpag.png" class="img-fluid mpag">
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