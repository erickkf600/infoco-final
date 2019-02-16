<?php
   $pagina = $_GET['pagina']; 
   $explode = explode('/', $pagina);
   $variavel = $explode[1];
   $quantidade = 12;
   $inicio = ($variavel*$quantidade)-$quantidade;
   $num_pagina = ceil($cadastros/$quantidade);
   $buscar_pg = $conectar->prepare("select * from parceiros limit :inicio, :quantidade");
   $buscar_pg -> bindValue(':inicio', $inicio, PDO::PARAM_INT);
   $buscar_pg -> bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
   $buscar_pg->execute();
?>
<header id="header"><?php require_once "includes/header.php" ?></header>
<main>
   <section id="partners">
      <div class="container">
         <div class="row">
            <div class="items-esquerda col-lg-8 col-md-12 col-sm-12">
               <article class="esquerda">
                  <div  class="row" id="cards">
                     <?php 
                        while ($parceiro=$buscar_pg->fetch(PDO::FETCH_OBJ)){  
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
               </article>
               <div class="btn-group mr-2 paginacao">
                  <?php 
                     $voltar = $variavel - 1;
                     $proximo = $variavel + 1; 
                     
                     if($voltar != 0){
                       echo "<a href='http://localhost/INFOCO%20FINAL/parceiros/$voltar' class='btn paginacao'><span>&laquo;</span></a>";
                     }
                     for($i = 1; $i < $num_pagina + 1; $i++){ 
                       echo "<a href='http://localhost/INFOCO%20FINAL/parceiros/$i' class='btn paginacao'>$i</a>";
                     }
                     if($proximo <= $num_pagina){
                       echo "<a href='http://localhost/INFOCO%20FINAL/parceiros/$proximo' class='btn paginacao'><span>&raquo;</span></a>";
                     }
                     ?>  
               </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-12">
               <aside>
                  <div class="direita">
                     <h2>Buscar Parceiro</h2>
                     <form method="get" action="http://localhost/INFOCO%20FINAL/pesquisa">
                        <input type="text" placeholder="Digite o que Procura..." name="pesq">
                        <button class="btn" type="submit">Buscar</button>
                     </form>
                  </div>
                  <div class="direita">
                     <div class="intagram">
                        <h2>Instagram Posts</h2>
                        <a href="https://www.instagram.com/infocopublicidadepl/" target="_black">seguir</a>
                     </div>
                     <script src="https://snapwidget.com/js/snapwidget.js"></script>
                     <iframe src="https://snapwidget.com/embed/651820" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%; "></iframe>
                  </div>
                  <div id="fb-root"></div>
                  <div class="direita">
                     <h2>Facebook Posts</h2>
                     <div class="fb-page" data-href="https://www.facebook.com/Infoco-Publicidades-2265127690374840" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/Infoco-Publicidades-2265127690374840" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Infoco-Publicidades-2265127690374840">Infoco Publicidades</a></blockquote>
                     </div>
                  </div>
               </aside>
            </div>
         </div>
      </div>
   </section>
</main>
<footer><?php require_once"includes/footer.php" ?></footer>