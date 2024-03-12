
$(document).ready(function() {

    $('#marca').on('change', function() {
			var url = document.baseURI;
      var marca = this.value;
			console.log(marca);
			  
  $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "marcaBusca",
              marca: marca
          },
          error: function(resp) {
						console.log("deu erro");  
          },
          success: function(resp) {
						var modelo = resp.modelo;
						var newOptions = modelo;
						var $el = $("#modelo");
						$el.empty(); // remove old options
						$el.append($("<option></option>")
								 .attr("value", "").text("Todos"));
						$.each(newOptions, function(key,value) {
							
						console.log(value);
							$el.append($("<option></option>")
								 .attr("value", value).text(value));
 						});
					
						
          }
      });
    });

	
	$(".procurarInicio").on("click", function(e){	
	
		var palavraChave = $("#palavra_chave").val();
		var url = "https://batcar.com/lista-carros";
		
		 $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "buscaInicial",
              palavraChave: palavraChave
          },
          error: function(resp) {
						console.log("deu erro");
          },
          success: function(resp) {
						console.log("funcionou");
 					}
		});
	
});
});


 function menu(){
$(".lojadiv").toggle();
	return false;
 }

 function menu2(){
$(".lojadiv2").toggle();
	console.log("Foi");
	return false;
 }

 function menufiltro(){
$(".hover-menu").toggle();
	return false;
 }



function vermaisMobile() {
   $('#extra_filter').css('display', 'block');
   $('#btver_mobile').css('display', 'none');
   $('#btmenos_mobile').css('display', 'block');
}
function vermenosMobile() {
   $('#extra_filter').css('display', 'none');
   $('#btver_mobile').css('display', 'block');
   $('#btmenos_mobile').css('display', 'none');
}

$('.extra_filter').css('display', 'none');
$('#btmenos').css('display', 'none');
function vermais() {
   $('.extra_filter').css('display', 'block');
   $('#btver').css('display', 'none');
   $('#btmenos').css('display', 'block');
}

function vermenos() {
   $('.extra_filter').css('display', 'none');
   $('#btver').css('display', 'block');
   $('#btmenos').css('display', 'none');
}


function reset() {
  console.log("dale");
  $('#form_filtro').each (function() {
    this.reset()
  });
    $('#buscaCarros').each (function() {
    this.reset()
  });
	

	
	$.ajax({
		url: document.baseURI,
		type: "POST",
		dataType: "jsonp",
		data: {
				action: "filtroJS",

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
				div += '<div class="col-lg-4 col-md-4 col-sm-12 margin_full wow animated fadeInUp " style="display:inline-block;" data-wow-delay="0.0s">';
					div += '<a class="link_car" target="_blank" href="/detalhes-carros/' + value.id +'">';
						div += '<div class="results_car_list_content">';

						div += '<div style="background:linear-gradient(180deg, rgba(2, 2, 2, 0) 100%, rgba(0, 0, 0, 0.6) 100%), url(' + value.foto_capa + ');"  class="results_car_list_content_img">';
						div += '<div class="results_car_list_content_options" style="height:200px !important">';				

						div += '<div class="list">';
						div += '<a href="javascript:void(0)" onMouseOver="changeFav()" style="font-size:0px;>'
						div += '<img class="icon_heart_pos" src="/assets/img/main/icon_heart_favorite.png">'
						div += '</a>'
						div += '</div>';
							div += '<ul class="results_car_list_options_icons">';
							div += '<li><img title="IPVA 2022 Grátis" src="/assets/img/main/icon-carlist-ipva.png"></li>';      
							div += '</ul>';
						div += '</div>';
					div += '</a>';
				div += '</div>';
				
				if(value.preco_promocao != "0,00"){
					div += '<div class="results_car_list_info_box">';
					div += '<a  target="_blank" href="/detalhes-carros/' + value.id + '">';
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
					div += '<a  target="_blank" href="/detalhes-carros/' + value.id + '">';
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
  
  
function abreopcional() {
	  $('#opcionalmais').attr('hidden', false);
	
  var botao = document.querySelector('#btvermais');
	$( "#btvermais" ).remove();
	$('<a href="javascript:void(0)" id="btvermenos" onClick="fecharoptional()"  href="" style=" color:#FCB200; right:0px;" >Ver Menos</a>').appendTo("#btver");

}

function fecharoptional() {
	  $('#opcionalmais').attr('hidden', true);
	
  var botao = document.querySelector('#btvermenos');
	$( "#btvermenos" ).remove();
	$('<a href="javascript:void(0)" id="btvermais" onClick="abreopcional()"  href="" style=" color:#FCB200; right:0px;" >Ver mais</a>').appendTo("#btver");

}

function pesquisar() {
	
	var url = document.baseURI;
	var pesquisa = $("#pesquisar").val();
	$( "#divcarros" ).remove();
	console.log(pesquisa);
	
	  $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "search",
              pesquisa: pesquisa
          },
          error: function(resp) {
						console.log("deu erro");  
          },
          success: function(resp) {
					
						var carro = resp.carros;
						var qtdCarro = resp.qtdCarro;
							console.log(carro);
            	console.log(qtdCarro);	
						console.log(resp);	
          }
      });
	
	
}

function moeda(a, e, r, t) {
            let n = ""
              , h = j = 0
              , u = tamanho2 = 0
              , l = ajd2 = ""
              , o = window.Event ? t.which : t.keyCode;
              a.value = a.value.replace('R$ ','');            
            if (n = String.fromCharCode(o),
            -1 == "0123456789".indexOf(n))
                return !1;
            for (u = a.value.replace('R$ ','').length,
            h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
                ;
            for (l = ""; h < u; h++)
                -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
            if (l += n,
            0 == (u = l.length) && (a.value = ""),
            1 == u && (a.value = "R$ 0" + r + "0" + l),
            2 == u && (a.value = "R$ 0" + r + l),
            u > 2) {
                for (ajd2 = "",
                j = 0,
                h = u - 3; h >= 0; h--)
                    3 == j && (ajd2 += e,
                    j = 0),
                    ajd2 += l.charAt(h),
                    j++;
                for (a.value = "R$ ",
                tamanho2 = ajd2.length,
                h = tamanho2 - 1; h >= 0; h--)
                    a.value += ajd2.charAt(h);
                a.value += r + l.substr(u - 2, u)
            }
            return !1
        }



