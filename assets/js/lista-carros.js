
$(document).ready(function() {
	
		$(".botaoOrdenacao").on('click', function(){
			$('#orderPrincipal').text($(this).data('name'));
			$('#inputOrdenacao').val($(this).data('value'));	
			
			filtroJS('click', $(this));
		});
	
		$('.filtroJS').on('change', function() {
			 filtroJS('change', $(this)); 
    });
	
		$('.filtroJS').on('keyup', function() {
			 filtroJS('keyup', $(this)); 
    });
	
});


function filtroJS(acao, elemento)
{
	
	var valor = elemento.val();
	var campo = elemento.attr("id");
	var ordenacao = $('#inputOrdenacao').val();
	
	if (acao != "keyup" && campo == "pesquisar"){
		return false;
	}
	
	var ValoresFiltroJS = [];
	var ValoresAcessoriosJS = [];
	
$('input[type=checkbox]:checked').each(function () { 
  var a = {};
	var acessorios = (this.checked ? $(this).val() : ""); 
  a.acessorios = acessorios;
  ValoresAcessoriosJS.push(a);
	});
console.log(ValoresAcessoriosJS);
	$(".filtroJS").each(function() {
		var f = {};
		
		var id = $(this).attr("id");
		var valor = $(this).val();
		
		
		var coluna = $(this).data("target");
		var predefinicao = $(this).data("value");
		
		f.id = id;	
		f.coluna = coluna;
		f.predefinicao = predefinicao;
		
		
		if (coluna == 'nome' && valor.length <= 1) {			
			f.valor = "";		
		} else {
			f.valor = valor;		
		}
		
		ValoresFiltroJS.push(f);
	});	
	
	$.ajax({
		url: document.baseURI,
		type: "POST",
		dataType: "jsonp",
		data: {
				action: "filtroJS",
				ordenacao: ordenacao,
				filtroJS: ValoresFiltroJS,
			  ValoresAcessoriosJS:ValoresAcessoriosJS
		},
		error: function(resp) {
			console.log(resp);  
		},
		success: function(resp) {			
			$("#divcarros").empty();
			$("#qntCarros").empty();
			
			if (resp.quantidade == "0"){
				$("#divcarros").append('Não foi encontrado nenhum carro com os dados informados.');
			}
			
			var div = "";
			
			$.each(resp.carros, function(index, value){	
let ipva = value.descricao.includes('ipva');
let transferencia = value.descricao.includes('transferencia');
let garantia = value.descricao.includes('ano de garantia');
let fabrica = value.descricao.includes('garantia de fabrica');
				
let eletrico = value.combustivel.includes('eletrico');

				
				$('body').tooltip({
						selector: '[data-toggle="tooltip"]'
				});
				

				div += '<div class="col-lg-4 col-md-4 col-sm-12 margin_full wow animated fadeInUp " style="display:inline-block;" data-wow-delay="0.0s">';
					div += '<a  target="_blank" href="/detalhes-carros/' + value.id_carro +'">';
						div += '<div class="results_car_list_content">';

						div += '<div style="background:linear-gradient(180deg, rgba(2, 2, 2, 0) 100%, rgba(0, 0, 0, 0.6) 100%), url(' + value.foto_capa + ');"  class="results_car_list_content_img">';
						div += '<div class="results_car_list_content_options">';				
						div += '<div class="list" style="position:relative;top:-50px;">';
						div += '<a href="javascrip:void(0)" onMouseOver="changeFav()" style="font-size:0px;">'
						div += '<img class="icon_heart_pos" src="https://batcar.com/assets/img/main/icon_heart_favorite.png">'
						div += '</a>'
						div += '</div>';
							div += '<ul class="results_car_list_options_icons">';
				  if(garantia == true){
							div += '<li data-toggle="tooltip" data-placement="top" title="1 ano de garantia"><img  height="39" width="39"  src="'+ window.location.origin + '/assets/img/main/garantia.png"></li>';      
						 }
					if(fabrica == true){
							div += '<li data-toggle="tooltip" data-placement="top" title="Garantia de Fábrica"><img  height="39" width="39" src="'+ window.location.origin + '/assets/img/main/fabrica.svg"></li>';      
						 }
						if(fabrica == false && garantia == false){
							div += '<li data-toggle="tooltip" data-placement="top" title="Veículo de Procedência"><img  height="39" width="39" src="'+ window.location.origin + '/assets/img/main/procedencia.svg"></li>';      
						 }
				  if(ipva == true){
							div += '<li data-toggle="tooltip" data-placement="top" title="IPVA 2023 Grátis"><img  height="39" width="39" src="'+ window.location.origin + '/assets/img/main/ipva.svg"></li>';      
						 }
					if(transferencia == true){
							div += '<li data-toggle="tooltip" data-placement="top" title="Transferência Gratis"><img  height="39" width="39" src="'+ window.location.origin + '/assets/img/main/transferencia.svg"></li>';      
						 }
					if(eletrico == true){
							div += '<li data-toggle="tooltip" data-placement="top" title="Veículo Elétrico"><img  height="39" width="39" src="'+ window.location.origin + '/assets/img/main/eletrico.svg"></li>';      
						 }
							div += '</ul>';
						div += '</div>';
					div += '</a>';
				div += '</div>';
				
				if(value.preco_promocao != "0,00"){
					div += '<div class="results_car_list_info_box">';
					div += '<a  target="_blank" href="/detalhes-carros/' + value.id_carro + '">';
					div += '<div class="car_list_info_title">';
					div += '<h6>' + value.nome + '</h6>'
					div += '<h6 style="font-size: 11px; color:black; text-decoration: line-through; position:relative; top:-10px;">De: ' + value.valor_venda + '</h6>';
					div += '<h5 style="top:-10px;color: black;position: relative;font-family:\'Gotham Bold\', sans-serif;margin-bottom:0;font-size:17px">R$: ' + value.preco_promocao + '</h5>';
					div += '<div style="position:relative; top:0px;" class="car_list_more_info">';
					div += '<text style="order:0">' + value.ano_fabricacao + '/' + value.ano_lancamento + '</text>';
          div += '<div style="order:1"></div>';
          div += '<text style="order:2">' + value.km_rodados + '</text>';
          div += '<div style="order:3"></div>';
          div += '<text style="order:4">' + value.cor + '</text>';
					div += '</div>';
					div += '</div>';
					div += '</a>';
					div += '</div>';
				} else {
					div += '<div class="results_car_list_info_box">';
					div += '<a  target="_blank" href="/detalhes-carros/' + value.id_carro + '">';
					div += '<div class="car_list_info_title">';
					div += '<h6>' + value.nome + '</h6>'				
					div += '<h5 style="top:12px;color: black;position: relative;font-family:\'Gotham Bold\', sans-serif;margin-bottom:0;font-size:17px">R$: ' + value.valor_venda + '</h5>';
					div += '<div style="position:relative; top:30px;" class="car_list_more_info">';
					div += '<text style="order:0">' + value.ano_fabricacao + '/' + value.ano_lancamento + '</text>';
          div += '<div style="order:1"></div>';
          div += '<text style="order:2">' + value.km_rodados + '</text>';
          div += '<div style="order:3"></div>';
          div += '<text style="order:4">' + value.cor + '</text>';
					div += '</div>';
					div += '</div>';
					div += '</a>';
					div += '</div>';
				}
				
								
				div += '</div>';
				
				div += '</div>';
			});
			
			$("#divcarros").append(div);
			$("#qntCarros").append(resp.quantidade);
			console.log(resp);
			
		}
	});	
	
}

function numberWithCommas(evt) {
	

	 var theEvent = evt || window.event;
	 var key = theEvent.keyCode || theEvent.which;
	 key = String.fromCharCode( key );

	 //var regex = /^[0-9.,]+$/;
	 var regex = /^[0-9]+$/;
	 if( !regex.test(key) ) {
			theEvent.returnValue = false;
			if(theEvent.preventDefault) theEvent.preventDefault();
	 }              
}

    $(".tippy").each(function() {
        var dom = $(this)[0];

        if ($(this).hasClass("js-tooltip-ready")) {
            var tip = $(this).data("tip");
            var popper = tip.getPopperElement(dom);

            tip.update(popper);
        } else {
            var tip = Tippy(dom);
            $(this).addClass("js-tooltip-ready");
            $(this).data("tip", tip);
        }
    });






