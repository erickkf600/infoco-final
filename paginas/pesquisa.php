<?php 
$pesquisa = $_GET['pesq'];
$explode = explode('/', $pesquisa);
$nome = implode('', $explode);
$pesquisar = $conectar->prepare("select * from parceiros where nome like :pesquisa or tags like :pesquisa");
$pesquisar -> bindValue(':pesquisa', '%'.$nome.'%', PDO::PARAM_STR);
$pesquisar->execute();
$busca = $pesquisar -> rowCount();

?>
<header id="header"><?php require_once "includes/header.php" ?></header>
<?php if ($busca == 0) {?>
  <div class="container text-center">
    <div>
      <h1 title="Sem Categoria" style="padding: 7rem 10rem 5px 10rem">Olá, parace que ainda não temos o que você busca.</h1>
      <p>Mas dê uma volta, quem sabe você encontra algo de seu interesse.</p>
      <span class="linha-titulo" style="margin-bottom: 10rem"></span>
    </div>
  </div> 
<?php }else{ ?>  
  <main>
    <section id="partners">
      <div class="container">
        <?php 
          if($busca > 1){ 
            $res = "Resultados";
          }else{
            $res = "Resultado";
          }
          echo "<h1 class='text-muted h3'>$busca $res para busca '$pesquisa'</h1>"; 
        ?>
        <div class="esquerda">
          <div  class="row col-lg-8 col-md-12 col-sm-12" id="cards">
           <?php 
           while ($parceiro=$pesquisar->fetch(PDO::FETCH_OBJ)){  
            $nome = $parceiro->nome;
            $url = $parceiro->url;
            $img = $parceiro->img;
            ?>
            <div class="col-md-4 col-sm-6 col-6">
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
<?php } ?>
<footer><?php require_once "includes/footer.php" ?></footer>