<section id="parceiros">
	<div class="container">
		<h2 title="Veja os destaques que a infoco oferece">DESTAQUE</h2>
		<span class="linha-titulo"></span>
		<p>Confira também os nossos parceiros em destaque</p>
		<div  class="row" id="cards">
			<?php 
			     $buscar = $conectar->prepare("SELECT * from parceiros where primeiraPagina = :sim and status = :ativo limit 8");
 				$buscar -> bindParam(':sim', $sim, PDO::PARAM_STR, 3);
 				$buscar -> bindParam(':ativo', $ativo, PDO::PARAM_STR, 5);
 				$buscar->execute();
				while ($parceiro=$buscar->fetch(PDO::FETCH_OBJ)){	
					$nome = $parceiro->nome;
					$url = $parceiro->url;
                    $img = $parceiro->img;
			?>
			<div class="col-lg-3 col-md-6 col-6">
				<div class="card">
					<img class="img-fluid" src="assets/img/parceiros/<?php echo$img ?>" width="100%" alt="parceiro-imagem" title="infoco parceiro <?php echo$nome ?>" alt="infoco parceiro <?php echo$nome ?>">
					<div class="card-content">
						<h3 class="card-title" title="infoco parceiro <?php echo$nome ?>"><?php echo$nome ?></h3>
						<a href="<?php echo$url ?>" target="_blank" class="btn btn-block" title="visitar infoco parcerio <?php echo$nome ?>">Visitar</a>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
		<a href="https://infocomn.com.br/parceiros" class="btn ver-mais mt-5" title="Ver mais parceiros da infoco">VER MAIS</a>
	</div>
</section>