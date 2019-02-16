<section>
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src='https://infocomn.com.br/img/banners/med.jpg' width='100%' alt='Medisim' title="parceiro infoco medisim">
        <a href="http://medisim.com.br/" target="_blank" title="visitar parceiro infoco medisim" class="btn link-carousel">VISITAR</a>
      </div>

      <div class="carousel-item">
        <img src='https://infocomn.com.br/img/banners/as.jpg' width='100%' alt='A.S Calvete Contabilidade' title="parceiro infoco A.S Calvete Contabilidade">
        <a href="https://www.instagram.com/ascalvetecontabilidade/?hl=pt-br" target="_blank" title="visitar parceiro infoco A.S Calvete Contabilidade" class="btn link-carousel" id="asc">VISITAR</a>
      </div>
      <div class="carousel-item">
        <img src='https://infocomn.com.br/img/banners/nsa.jpg' width='100%' alt='Mercado NSA' title="Infoco parceiro Mercado NSA">
        <a href="https://www.facebook.com/Mercado-NSA-267212664194794/" target="_blank" class="btn link-carousel" id="nsa" title="visitar parceiro infoco mercado nsa">VISITAR</a>
      </div>

      <div class="carousel-item">
        <img src='https://infocomn.com.br/img/banners/ccaa.jpg' width='100%' alt='Curso CCAA' title="Infoco parceiro CCAA">
        <div class="buttons">
          <a href="https://www.facebook.com/ccaaaustin/" class="btn" target="_blank" title="Visitar infoco parcerio CCAA Austin">Visite a Página de Austin</a>
          <a href="https://www.facebook.com/CCAA-Queimados-142498819274804/" target="_blank" class="btn" title="Visitar infoco parcerio CCAA Queimados">Visite a Página de Queimados</a>
        </div>
      </div>
      <?php 
      $i = 0;
      while ( $i < 5) { 
        $i++;
        echo "<div class='carousel-item'>
        <img src='https://infocomn.com.br/img/banners/$i.jpg' width='100%' alt='BANNER INFOCO PARCEIROS' title='Banner de Parceiros Infoco'>
        </div>";
      }
      ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="proximo"><i class="far fa-caret-square-left fa-3x"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="voltar"><i class="far fa-caret-square-right fa-3x"></i></span>
    </a>
    <div class="scrolldown">
      <a class="scroll-icon smoothscroll" title="Veja mais da infoco">    
        Role para Baixo       
        <i class="fas fa-arrow-right"></i>
      </a>
    </div>
  </div>
</section>