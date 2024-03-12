function alertaC (posicao , icon, texto ) {
	setTimeout(function() {
   Swal.fire({
		position: posicao,
  	icon: icon,
  	title: texto,
		showConfirmButton: true,
		timer: false
	}) 
}, 3000)
		
}
function sucessoC (posicao , icon, texto, tempo){
setTimeout(function() {
	Swal.fire({
   position: posicao,
   icon: icon,
   title: texto,
   showConfirmButton: false,
   timer: tempo
   })
}, 3000)
}

function confirmacao (img){
Swal.fire({
  width: 300,
  title: '',
  text: 'Mensagem enviada com sucesso!',
  color: '#FFF',
  imageUrl: img,
  imageWidth: 150,
  imageHeight: 150,
  background: '#1D232B',
  confirmButtonText: 'Voltar',
  confirmButtonColor: '#FCB200',
  imageAlt: 'Enviado com sucesso',
})
}


//format cpf/cnpj
function formatField(fieldText) {
    if (fieldText.value.length < 14) {
        fieldText.value = maskCpf(fieldText.value);
    } else {
        fieldText.value = maskCnpj(fieldText.value);
    }
}
function cleanFormat(fieldText) {
    fieldText.value = fieldText.value.replace(/[^0-9]/gi,'');
}
function maskCpf(valor) {
    return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
}
function maskCnpj(valor) {
    return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
}


//format phone
function formatTel(fieldText) {
	
	
	
	if (fieldText.value.length < 11) {
		fieldText.value = maskTel(fieldText.value);
	}	else {
		fieldText.value = maskCel(fieldText.value);
	}	
}

function maskTel(valor) {
	return valor.replace(/(\d{2})(\d{4})(\d{4})/g,"(\$1) \$2-\$3");
	}
function maskCel(valor) {
	return valor.replace(/(\d{2})(\d{1})(\d{4})(\d{4})/g,"(\$1) \$2 \$3-\$4");
}

function formatCep(fieldText) {
    if (fieldText.value.length <= 8) {
        fieldText.value = maskCep(fieldText.value);
       }
}

function maskCep(valor) {
	return valor.replace(/(\d{2})(\d{3})(\d{3})/g,"\$1.\$2-\$3");
}

//format taxa/porcento
function formatPer(fieldText) {
	if (fieldText.value.length <= 3) {
		fieldText.value = maskPer(fieldText.value);
	}	else {
		//alert("Não utilize caracteres especiais");
	}	
}

function maskPer(valor) {
	return valor.replace(/(\d{1})(\d{2})/g,"\$1.\$2%");
	}




function sleep(seconds){
    var waitUntil = new Date().getTime() + seconds*1000;
    while(new Date().getTime() < waitUntil) true;
}

function onlynumber(evt) {
	 var theEvent = evt || window.event;
	 var key = theEvent.keyCode || theEvent.which;
	 key = String.fromCharCode( key );

	 //var regex = /^[0-9.,]+$/;
	 var regex = /^[0-9.]+$/;
	 if( !regex.test(key) ) {
			theEvent.returnValue = false;
			if(theEvent.preventDefault) theEvent.preventDefault();
	 }              
}

function onlynumberfull(evt) {
	 var theEvent = evt || window.event;
	 var key = theEvent.keyCode || theEvent.which;
	 key = String.fromCharCode( key );

	 //var regex = /^[0-9.,]+$/;
	 var regex = /^[0-9,.]+$/;
	 if( !regex.test(key) ) {
			theEvent.returnValue = false;
			if(theEvent.preventDefault) theEvent.preventDefault();
	 }              
}

function onlynumberrealy(evt) {
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




function contato(){
	
 	var url = document.baseURI;	
  var nome = $("#nome").val();
	var email = $("#email").val();
  var telefone = $("#telefone").val();
  var assunto = $("#assunto").val();
  var mensagem = $("#mensagem").val();
	
	
	if(nome == "" || email == "" || telefone == "" || mensagem == "" || assunto == "" ){
		alertaC("center","error","Verifique se todos os campos foram preenchidos!");
		return false;
	}
	
  
  $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "contato",
              nome: nome,
						  email: email,
              telefone: telefone,
              assunto: assunto,
              mensagem: mensagem
            
          },
          error: function(resp) {
             console.log(resp);  
						console.log("deu erro");  
          },
          success: function(resp) {
                    confirmacao("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='448' height='448' viewBox='0 0 448 448'%3E%3Cg style='font-style:normal;font-variant:normal;font-weight:400;font-size:13.8125px;line-height:125%25;font-family:Calibri;text-align:start;letter-spacing:0;word-spacing:0;text-anchor:start' transform='translate(-1463.923 -17599.681) scale(22.11728)'/%3E%3Cpath d='m0 844.362 176 176 272-336-48-48-224 288-128-128z' transform='translate(0 -604.362)' stroke-linecap='round' stroke-width='4' stroke='rgb(252, 177, 0)' fill='rgb(252, 177, 0)' /%3E%3C/svg%3E");    

          $("#nome").val(''); 
          $("#email").val(''); 
          $("#telefone").val('');  
          $("#assunto").val('');
          $("#mensagem").val('');
     
          }
      });
 
}
