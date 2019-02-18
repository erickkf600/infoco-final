<?php 
	$categ = $_GET['pagina'];
	$explode = explode('/', $categ);
	$variavel = $explode[1];
	$buscar_categ = $conectar->prepare("SELECT * from parceiros where status = :ativo and categoria = :categ");
	$buscar_categ -> bindParam(':ativo', $ativo, PDO::PARAM_STR, 5);
	$buscar_categ -> bindParam(':categ', $variavel, PDO::PARAM_STR, 12);
	$buscar_categ->execute();
	$contador = $buscar_categ -> rowCount();

?>
<header id="header"><?php require_once "includes/header.php" ?></header>
<main>
	<section id="partners" title="Categorias de parceiros da Infoco Publicidades">
		<div class="container">
			<?php 
			if($contador > 1){ 
				$res = "Resultados";
			}else{
				$res = "Resultado";
			}
			echo "<h1 class='text-muted h3'>$contador $res para busca '$variavel'</h1>"; 
			?>

			<div class="esquerda">
          <div  class="row" id="cards">
           <?php 
           while ($parceiro=$buscar_categ->fetch(PDO::FETCH_OBJ)){  
            $nome = $parceiro->nome;
            $url = $parceiro->url;
            $img = $parceiro->img;
            ?>
            <div class="col-md-3 col-sm-6 col-6">
              <div class="card">
               <img class="img-fluid" src="http://localhost/INFOCO%20FINAL/assets/img/parceiros/<?php echo$img ?>" width="100%" alt="parceiro-infoco <?php echo$nome ?>" title="infoco parceiro <?php echo$nome ?>" alt="infoco parceiro <?php echo$nome ?>">
               <div class="card-content">
                <h3 class="card-title text-dark" title="infoco parceiro <?php echo$nome ?>"><?php echo$nome ?></h3>
                <a href="<?php echo$url ?>" target="_blank" class="btn btn-block" title="visitar infoco parcerio <?php echo$nome ?>">Visitar</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
		</div>
	</section>
</main>
<footer><?php require_once "includes/footer.php" ?></footer>