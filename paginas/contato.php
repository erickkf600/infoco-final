<?php session_start(); ?>
<header id="header"><?php require_once "includes/header.php" ?></header>
<main>
	<section class="contato-form">
		<div class="container">
			<div class="cabecalho mt-3">
				<h1 class="titulo" title="Bem-Vindo a infoco">CONTATO</h1>
				<span class="linha-titulo"></span>
				<p>Duvidas, Sugestões, Reclamações? Fale Conosco.</p>
			</div>

			<form action="http://localhost/INFOCO%20FINAL/mensagem" class="contact-form" method="post">
				<div class="row">
					<div class="col-md-6">
						<?php 
						   if(!empty($_SESSION['nome_vazio'])){
							echo "<small style='color:#f00;'>".$_SESSION['nome_vazio']."</small>";
							unset($_SESSION['nome_vazio']);}?>
						<div class="form-group">
							<input type="text"class="form-control"name="nome"placeholder="Nome" >
						</div>
						<?php 
							if(!empty($_SESSION['email_vazio'])){
	              			echo "<small style='color:#f00;'>".$_SESSION['email_vazio']."</small>";
	              			unset($_SESSION['email_vazio']);}?>
	              		<div class="form-group">
	              			<input type="email"class="form-control"name="email"placeholder="Email">
	            		</div>
	            		<?php 
				            if(!empty($_SESSION['telefone_vazio'])){
				            echo "<small style='color:#f00;'>".$_SESSION['telefone_vazio']."</small>";
				              unset($_SESSION['telefone_vazio']);}?>
				        <div class="form-group">
				            <input type="text"class="form-control"name="telefone"onkeypress="return event.charCode >=48&&event.charCode<= 57"maxlength="11" placeholder="Telefone">
				        </div>  
				        <?php 
				            if(!empty($_SESSION['setor_vazio'])){
				            echo "<small style='color:#f00;'>".$_SESSION['setor_vazio']."</small>";
				              unset($_SESSION['setor_vazio']);
				            }
			            ?>
			            <div class="form-group">
			            <div class="select">
			              <select name="motivo" class="form-control" >
			                <option selected disabled value="">Setor de Contato</option>
			                <option value="comercial" title="Torne-se nosso parceiro para expanção de seus negócios">Comercial</option>
			                <option value="administrativo" title="Duvidas, Sugestões, Criticas e Elogios">Administrativo</option>
			              </select>
			            </div>
			          </div>
					</div>	
					<div class="col-md-6">
						<?php 
            				if(!empty($_SESSION['mensagem_vazio'])){
              				echo "<small style='color:#f00;'>".$_SESSION['mensagem_vazio']."</small>";
              				unset($_SESSION['mensagem_vazio']);
            				}
            			?>
            			<div class="form-group">
            				<textarea class="form-control textarea-contact" rows="5" name="mensagem" placeholder="Digite sua mensagem aqui..." ></textarea>
            			</div>
            			<div class="col-md-6 captcha">
            				<div class="g-recaptcha" data-sitekey="6Le3L4wUAAAAAEnxtpEOtDU4hJtxAuP_zWWV8Jjo"></div>
            				<?php 
       							if(!empty($_SESSION['captcha_vazio'])){
        						echo "<small style='color:#f00;'>".$_SESSION['captcha_vazio']."</small>";
        						unset($_SESSION['captcha_vazio']);
      							}
      						?>
            			</div>
					</div>
						<button class="btn w-50" type="submit" id="enviarMensagem">ENVIAR<i class="fas fa-paper-plane"></i></button>
						<?php 
						if(!empty($_SESSION['email_enviado'])){
							echo "<p style='color: #01ad01; '>".$_SESSION['email_enviado']."</p>";
							unset($_SESSION['email_enviado']);
						}else{
							if(!empty($_SESSION['email_erro'])){
								echo "<p style='color: #f00; '>".$_SESSION['email_erro']."</p>";
								unset($_SESSION['email_erro']);
							}
						}  
						?>
				</div>
			</form>
			<div class="row second-section">
				<div class="col-md-4">
					<div class="box">             
						<div class="icon">
							<div class="image"><i class="fa fa-envelope"></i></div>
							<div class="info">
								<h3 class="title">EMAIL</h3>
								<p> administrativo@incofomn.com.br
								comercial@incofomn.com.br</p>
							</div>
						</div>
					</div> 
				</div>
				<div class="col-md-4">
					<div class="box">             
						<div class="icon">
							<div class="image"><i class="fas fa-phone"></i></div>
							<div class="info">
								<h3 class="title">TELEFONE</h3>
								<p><span><i class="fab fa-whatsapp"></i></span>(21) 98277-2106</p>
							</div>
						</div>
					</div> 
				</div>
				<div class="col-md-4">
					<div class="box">             
						<div class="icon">
							<div class="image"><i class="fas fa-headset"></i></div>
							<div class="info">
								<h3 class="title">ATENDIMENTO</h3>
								<p>
									De 09:00 às 19:00 de segunda à sexta-feira (exceto feriados). 
								</p>
							</div>
						</div>
					</div> 
				</div>        
			</div>
		</div>
	</section>
</main>
<footer><?php include "includes/footer.php"; ?></footer>