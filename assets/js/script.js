/**	
	Custom JS
	1. BARRA DE PESQUISA
	2. SIDE BAR
	3. CAROUSEL	
	4. SCROLL TOP BUTTON 
	5. PRELOADER 
	6. PREÇOS ADESÃO DINAMICO
    7. ADICIONAR CAMPO 
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

    /* ----------------------------------------------------------- */
    /*  5. PRELOADER 
    /* ----------------------------------------------------------- */ 
    $(window).on('load', function(){
        $(".loader").addClass("carregado");
        $(".loader").hide();
        $(".span").fadeOut('slow');
    });
    //FIM JQUERY
});
	/* ----------------------------------------------------------- */
	/*  6. PREÇOS ADESÃO DINAMICO
	/* ----------------------------------------------------------- */ 
	function muda_preco() {
    if ($("#planos").val() == "Básico"){
    	$("#planoValor").show();
    	var preco = 'R$ 200,00';
    	var val = '200';
   		document.getElementById("valor").innerHTML = "" + preco + "";
   		document.getElementById("valorInput").value = val;
    }else{
    	if ($("#planos").val() == "Intermediário") {
    		$("#planoValor").show();
    		var preco = 'R$ 400,00';
    		var val = '400';
   			document.getElementById("valor").innerHTML = "" + preco + "";
   			document.getElementById("valorInput").value = val;	
    	}
    	if ($("#planos").val() == "Avançado") {
    		$("#planoValor").show();
    		var preco = 'R$ 1.500,00';
    		var val = '1500';
   			document.getElementById("valor").innerHTML = "" + preco + "";
   			document.getElementById("valorInput").value = val;	
    	}
    	if ($("#planos").val() == "Super") {
    		$("#planoValor").show();
    		var preco = 'R$ 2.200,00';
    		var val = '2200';
   			document.getElementById("valor").innerHTML = "" + preco + "";
   			document.getElementById("valorInput").value = val;	
    	}

    }

}
$("#planoValor").hide();

    /* ----------------------------------------------------------- */
    /*  7. ADICIONAR CAMPO
    /* ----------------------------------------------------------- */
    function mostra_div() {
        "empresas parceiras" == $("#options").val() ? $("#QualEmpresa").show() : $("#QualEmpresa").hide()
    }
    $("#QualEmpresa").hide();
    /* ----------------------------------------------------------- */
    /*  8. BUSCA CEP
    /* ----------------------------------------------------------- */ 

	function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('municipio').value=("");
            document.getElementById('uf').value=("");

        }

        function meu_callback(conteudo) {
        	if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('municipio').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('endereco').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('municipio').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
/*---------------------------FIM-----------------------------------------*/	