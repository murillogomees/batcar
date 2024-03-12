$(".tabsFaq").on("click", function(){  
	var id = $(this).attr("id");
  $(".tabsFaq").css({
		'background': '#1D232B',
    'border': '2px solid #FCB200',
		'color':'#FCB200',
    //... and so on
});
	$("#divVendas").hide();
	$("#divCompras").hide();
  $(this).css({
    'background': '#FCB200',
    'border': '2px solid #FCB200',
		'color': '#1D232B',
    //... and so on
});
	$("#div"+id).show();		
  
 });