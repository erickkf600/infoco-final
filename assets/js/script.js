/**	
	Custom JS
	1. BARRA DE PESQUISA
	2. SIDE BAR
	3. CLIENT SLIDE	
	4. SCROLL TOP BUTTON 
	6. PRELOADER 
	8. BUSCA CEP 
**/


$(document).ready(function() {
	/* ----------------------------------------------------------- */
	/*  1. BARRA DE PESQUISA
	/* ----------------------------------------------------------- */ 

	$('.pesq-icon').click(function(){
      $(".search-area").toggleClass("exibir");
      $("#navbar").toggleClass("sumir");
      $(".logo").toggleClass("up");
      $(".pesq-icon").toggleClass("close");
    });

    /* ----------------------------------------------------------- */
	/*  2. SIDE BAR
	/* ----------------------------------------------------------- */ 
	$('.menu').click(function () {
	  $('#nav').toggleClass('show'); 
	});
	$('#fechar').click(function () { 
	  $('#nav').toggleClass('show');
	});

	/* ----------------------------------------------------------- */
	/*  3. CAROUSEL
	/* ----------------------------------------------------------- */ 
	$('.carousel').carousel({
  		interval: 5000
	});

	/* ----------------------------------------------------------- */
	/*  4. SCROLL TOP BUTTON 
	/* ----------------------------------------------------------- */ 
	height = $(window).height() * 1/5;
	$('.scrollToTop').hide();

	$(window).scroll(function(){
		if($(this).scrollTop() > height){
			$('.scrollToTop').fadeIn();
			$('#header').addClass('down');
		}else{
			$('.scrollToTop').fadeOut();
			$('#header').removeClass('down');
		}
	});
	$('.scrollToTop').click(function(){
		$('html, body').animate({
			scrollTop: 0
		}, 500);
	});

/*---------------------------FIM-----------------------------------------*/	
});