$(document).ready(function() {
    $('.select2').select2();
}); 

function changeFav() {
	$(".list a").off('click').click(function (event){
     event.preventDefault(); 
		
	var url = document.baseURI;
  var ID = $(this).text();
	var classe = "#list"+ID;
	var classea = classe + " a";
	var idCarro = $("#idcarro"+ID).val();
	var Cokkie = $("#cookie"+ID).val();

	console.log(Cokkie);
  $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "favorite",
              idCarro: idCarro,
						  Cokkie: Cokkie

          },
          error: function(resp) {
					console.log("deu erro");  
          },
          success: function(resp) { 	console.log(resp.retorno);
			var containerIMG = document.querySelector(classe);
			var img = document.querySelector(classea);
			    containerIMG.removeChild(img);
					 $( classea ).empty();
		 	if(resp == 0){
					 	$('<a style="font-size: 0px;" class="favorito'+ ID +'" >'+ ID +'<img class="icon_heart_pos" src=' + window.location.origin  + '/assets/img/main/icon_heart_favorite_m.png></a> ').appendTo("#list"+ID);
						setTimeout(function() {
			var containerIMG = document.querySelector(classe);
			var img = document.querySelector(classea);
						containerIMG.removeChild(img);
						$( classea ).empty();
		
						 	$('<a onMouseOver="changeFav()"  style="font-size: 0px;" class="favorito'+ ID +'" >'+ ID +'<img class="icon_heart_pos" src=' + window.location.origin  + '/assets/img/main/icon_heart_favorite.png></a> ').appendTo("#list"+ID);			
							  }, 250);
						} else {
							$('<a   style="font-size: 0px;" class="favorito'+ ID +'">'+ ID +'<img class="icon_heart_pos" src=' + window.location.origin  + '/assets/img/main/icon_heart_favorite_m.png></a> ').appendTo("#list"+ID);
							 setTimeout(function() {
			  var containerIMG = document.querySelector(classe);
			  var img = document.querySelector(classea);
							containerIMG.removeChild(img);
							$( classea ).empty();
						 	$('<a onMouseOver="changeFav()"  style="font-size: 0px;" class="favorito'+ ID +'" >'+ ID +'<img class="icon_heart_pos" src=' + window.location.origin  + '/assets/img/main/icon_heart_favorite_p.png></a> ').appendTo("#list"+ID);			
							  }, 250);
						}  
          }
      });	
	  });
	 return false;
}



//  function FocusFiltro() {
	 
// 	var url = document.baseURI;
	 
// 	 	var anoDe = $("#anode").val();
// 	  var anoAte = $("#anoate").val();
// 	 	var precoDe = $("#precode").val();
// 	  var precoAte = $("#precoate").val();
// 	 	var kmDe = $("#kmde").val();
// 	  var kmAte = $("#kmate").val();
// 		var cambio = $("#cambio").val();
// 		var combustivel = $("#combustivel").val();
// 		var cor = $("#cor").val();
// 		var categoria = $("#categoria").val();
// 	  var acessorio1 = $("#acessorio1").val();
// 	  var acessorio2 = $("#acessorio2").val();
	 
//     $.each($("input[type='checkbox']"), function(id , val){
//       if($(val).is(":checked")){
//         globalThis.opcional = $(val).val();
//       }
//     });
	 
	 
//   $.ajax({
//           url: url,
//           type: "POST",
//           dataType: "jsonp",
//           data: {
//               action: "filtro",
//               anoDe: anoDe,
// 						  anoAte: anoAte,
// 						  precoDe: precoDe,
// 						  precoAte: precoAte,
// 						  kmDe: kmDe,
// 						  kmAte: kmAte,
// 						  cambio: cambio,
// 						  combustivel: combustivel,
// 						  cor: cor,
// 						  categoria: categoria,
// 						  acessorio1: acessorio1,
// 						  acessorio2: acessorio2

//           },
//           error: function(resp) {
// 					console.log("deu erro");  
//           },
//           success: function(resp) {
//   		console.log(resp); 
//           }
//       });	
	

// }