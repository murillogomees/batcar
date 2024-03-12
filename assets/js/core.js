 /**
 * NextPost Namespace
 */
var NextPost = {};


$(function() {	
    NextPost.General();
    NextPost.Skeleton();
    NextPost.ContextMenu();
    NextPost.Tooltip();
    NextPost.Tabs();
    NextPost.Forms();
    NextPost.FileManager();
    NextPost.LoadMore();
    NextPost.Popups();    
    NextPost.Brand();
    NextPost.RemoveListItem();
    NextPost.AsideList();
		NextPost.Enter();    
	
	$(".notificacao").on("click", function(){
			if ($(".model-notificacao").val() == 0){
				$(".mensagem").show();
				$(".model-notificacao").val(1);
			} else {
				$(".mensagem").hide();
				$(".model-notificacao").val(0);
			}			
		});
	
	$(".real").on("click", function(){
	$(this).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
	});
				
	
	
	 $(".tab-product").on('click', function(){        
    $(".tab_content").hide();		
    $(".tab-product").removeClass("active");
    $("#"+$(this).attr("id")+ "_tab").show();		
    $(".tab-product").removeClass("active");
    $(this).addClass("active");
    $(".select2").select2({});
  });
});


NextPost.Enter = function () {
   $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
   });
}

/**
 * General
 */
NextPost.General = function() {
    // Mobile menu
    $(".topbar-mobile-menu-icon").on("click", function() {
        $("body").toggleClass('mobile-menu-open');
    });


    // Pop State
    window.onpopstate = function(e) {
        if (e.state) {
            window.location.reload();
        }
    }
}

/**
 * General
 */
NextPost.Users = function() {	
  
    $("#abrirsenha").on("click",function(e){
			console.log("dale");
    $("#BrancoSenha").hide();
    $("#campoSenha").show();
    });
    $("#fecharpw").on("click",function(e){	
    $("#BrancoSenha").show();
    $("#campoSenha").hide();
    });

  
  var url = document.baseURI;	 
  if(url != "https://agendamento.storgetec.com.br/users/new"){


} 
	
	$(".edit-line").on("click", function(){		
		var Status = $(this).data("value");
		var Nome = $(this).data("name");
		var Id = $(this).data("id");
		
		$("#myModal").modal('show');		
			
			if(Nome != "new"){			
				$("#nomeProcedimento").val(Nome);
				$("#Procedimento").val(Nome);
			}			
			$("#statusProcedimento").val(Status);	
		
			setTimeout(function(){	
				$(".select2").select2({});
			}, 250);
		
	});
	
	
	$(".edit-line-pagamento").on("click", function(){		
		var Status = $(this).data("value");
		var Nome = $(this).data("name");
		var Id = $(this).data("id");

		
		$("#pagamentoModal").modal('show');	
    
			
			if(Nome != "new"){			
				$("#nomeProcedimento").val(Nome);
				$("#Procedimento").val(Nome);
			}			
			$("#statusProcedimento").val(Status);	
		
			setTimeout(function(){	
				$(".select2").select2({});
			}, 250);
		
	});
  
    $("#fecharModal").on("click",function(e){	
	$("#pagamentoModal").hide();
  $(".modal-backdrop").hide();
   console.log("oss");
	
});
  	
  
  
	
	$(".delete-line").on("click", function() { 	
				var line = $(this).closest("tr");
        var id = $(this).data("id");
				var value = $(this).data("value");
        var url = document.baseURI;
				
        NextPost.Confirm({
            confirm: function() {						
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'jsonp',
                    data: {
                        action: "remover",		
												value: value,
                        id: id											
                    },error: function() {
										console.log("Erro de Valor");
									},
									success: function(resp) {
									console.log(resp);
									if (resp.result == 1){	
									toastr.options = {

											closeButton: true,

											progressBar: true,

											preventDuplicates: true,

											positionClass: 'toast-top-right',

											onclick: null

										};
										toastr.success('Orçamento excluído com sucesso!');
										
										 line.fadeOut(300, function() {
												line.remove();
										});	  
									} else {
										console.log("entrou");
										toastr.options = {

											closeButton: true,

											progressBar: true,

											preventDuplicates: true,

											positionClass: 'toast-top-right',

											onclick: null

										};
										
										toastr.warning(resp.msg);										
										
										
									}
								}							       
            });
        }		
 			});
    });
 
	
	$(".inserirProcedimento").on("click", function(e){
	e.preventDefault();
	
	var line = $(this).closest("tr");		

	var url = document.baseURI;		
	var nome =	$("#nomeProcedimento").val();
	var status = $("#statusProcedimento").val();
  var valor_padrao = $("#valorPadrao").val();
		
	$("body").addClass("onprogress");
		
		$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "Procedimento",
						nome: nome,
						status: status,
						valor_padrao: valor_padrao
          
				},

				error: function() {
						console.log("ERRO INSERÇÃO DO PROCEDIMENTOa");
				},
				success: function(resp) {
						
						$("body").removeClass("onprogress");
						//console.log(resp);
					
						if (resp.igual == "1"){		
							
						toastr.options = {

							closeButton: true,

							progressBar: true,

							preventDuplicates: true,

							positionClass: 'toast-top-right',

							onclick: null

						};
					
						toastr.error("Procedimento já existe na tabela!");
						return false;
							
						}
					
						if(resp.antigo == "1"){						
						
							
						$("#nomeProcedimento").val(resp.nome);
							
						$("#tbodyProcedimentos").append("<tr><td>" + resp.status + "</td><td>" + resp.nome + "</td><td><a href='javascript:void(0)' data-id='" + resp.nome + "' data-value='" + resp.statusValue + "' class='edit-line icon2'><span style='margin:15px;' class='sli sli-pencil icon2' title='Editar Procedimento.'></span></a><a href='javascript:void(0)' data-id='" + resp.nome + "' class='delete-line'><span class='sli sli-ban icon menu-icon icon3' title='Excluir Proposta' ></span></a></td></tr>");
							
						$("#myModal").modal('hide');
					
						toastr.options = {

							closeButton: true,

							progressBar: true,

							preventDuplicates: true,

							positionClass: 'toast-top-right',

							onclick: null

						};							
						
						line.fadeOut(2000, function() {
							line.remove();
						});		  	
					
						toastr.success("Procedimento editado com sucesso!");
						return false;
					} 
					
					if(resp.resul == "1"){
						
						$("#tbodyProcedimentos").append("<tr><td>" + resp.status + "</td><td>" + resp.nome + "</td><td><a href='javascript:void(0)' data-id='" + resp.nome + "' data-value='" + resp.statusValue + "' class='edit-line icon2'><span style='margin:15px;' class='sli sli-pencil icon2' title='Editar Procedimento.'></span></a><a href='javascript:void(0)' data-id='" + resp.nome + "' class='delete-line'><span class='sli sli-ban icon menu-icon icon3' title='Excluir Proposta' ></span></a></td></tr>");
							
						$("#myModal").modal('hide');
					
						toastr.options = {

							closeButton: true,

							progressBar: true,

							preventDuplicates: true,

							positionClass: 'toast-top-right',

							onclick: null

						};
					
						toastr.success("Procedimento adicionado com sucesso!");
					}
				}
		});
	});
	
}

NextPost.Profissional = function() {
 $("#fecharModal").on("click",function(e){	
	$("#vinculoModal").hide();
  $(".modal-backdrop").hide();
   
   
   
   console.log("oi");
	
});

  
  $("#abrirsenha").on("click",function(e){	
	$("#BrancoSenha").hide();
	$("#campoSenha").show();
});
$("#fecharpw").on("click",function(e){	
	$("#BrancoSenha").show();
	$("#campoSenha").hide();
});

  var url = document.baseURI;	
  if(url != "https://agendamento.storgetec.com.br/tatuador/new"){

    $(".tab-product").on('click', function(){        
    $(".tab_content").hide();
    $(".tab-product").removeClass("active");
    $("#"+$(this).attr("id")+ "_tab").show();		
    console.log($(this));
    $(".tab-product").removeClass("active");
    $(this).addClass("active");
    $(".select2").select2({});
  });
}
  
  $(".precoBrl").on("blur", function(){
    var valor = parseInt($(this).val());
    valor = valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
    $(this).val(valor);
	});
  
  $(".vincularProcedimento").on("click", function(e){
	e.preventDefault();
		
	var url = document.baseURI;		
	var nome =	$("#qualProcedimento").val();
  var status =	$("#statusProcedimento").val();
	var valor = $("#valorProcedimento").val();
  var tempo = $("#tempoProcedimento").val();
  var id = $("#idVinculo").val();
  
	
	$("body").addClass("onprogress");
		
		$.ajax({
				url: url,
				type: "POST",
				dataType: "jsonp",
				data: {
						action: "vincularProcedimento",
						nome: nome,
						status: status,
            valor: valor,
            tempo: tempo,
            id: id
            
				},

				error: function() {
						console.log("ERRO ");
				},
				success: function(resp) {
          console.log(resp);
 					$("body").removeClass("onprogress");
				}
		});
	});
  
  $(".edit-vinculo").on("click", function(){		
 		var Status = $(this).data("value");
    var Nome = $(this).data("name");
    var Tempo = $(this).data("tempo");
    var Valor = $(this).data("valor");
 		var Id = $(this).data("id");
  
		
		$("#vinculoModal").modal('show');		
			
 			if(Nome != "new"){			
 				$("#nomeProcedimento").val(Nome);
 				$("#Procedimento").val(Nome);
 			}			
 			$("#statusProcedimento").val(Status);	
      $("#qualProcedimento").val(Nome);	
      $("#valorProcedimento").val(Valor);
      $("#tempoProcedimento").val(Tempo);
      $("#idVinculo").val(Id);
		
 			setTimeout(function(){	
 				$(".select2").select2({});
 			}, 350);
		
	});
  
  	$(".delete-line").on("click", function() { 	
				var line = $(this).closest("tr");
        var id = $(this).data("id");
				var value = $(this).data("value");
        var url = document.baseURI;
				
        NextPost.Confirm2({
            confirm: function() {						
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'jsonp',
                    data: {
                        action: "remover",		
												value: value,
                        id: id											
                    },error: function() {
										console.log("Erro de Valor");
									},
									success: function(resp) {
									console.log(resp);
									if (resp.result == 1){	
									toastr.options = {

											closeButton: true,

											progressBar: true,

											preventDuplicates: true,

											positionClass: 'toast-top-right',

											onclick: null

										};
										toastr.success('Orçamento excluído com sucesso!');
										
										 line.fadeOut(300, function() {
												line.remove();
										});	  
									} else {
										console.log("entrou");
										toastr.options = {

											closeButton: true,

											progressBar: true,

											preventDuplicates: true,

											positionClass: 'toast-top-right',

											onclick: null

										};
										
										toastr.warning(resp.msg);										
										
										
									}
								}							       
            });
        }		
 			});
    });
 
  
  
  
  
	
}



/**
 * Main skeleton
 */
NextPost.Skeleton = function() {
    if ($(".skeleton--full").length > 0) {
        var $elems = $(".skeleton--full").find(".skeleton-aside, .skeleton-content");
        $(window).on("resize", function() {
            var h = $(window).height() - $("#topbar").outerHeight();
            $elems.height(h);
        }).trigger("resize");

        $(".skeleton--full").show();
    }
}



/**
 * Context Menu
 */
NextPost.ContextMenu = function() {
    $("body").on("click", ".context-menu-wrapper", function(event) {
        var menu = $(this).find(".context-menu");

        $(".context-menu").not(menu).removeClass('active');
        menu.toggleClass("active");
        event.stopPropagation();
    });

    $(window).on("click", function() {
        $(".context-menu.active").removeClass("active");
    });

    $("body").on("click", ".context-menu", function(event) {
        event.stopPropagation();
    })
}

/**
 * ToolTips
 */
NextPost.Tooltip = function() {
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
}


/**
 * Tabs
 */
NextPost.Tabs = function() {
    $("body").on("click", ".tabheads a", function() {
        var tab = $(this).data("tab");
        var $tabs = $(this).parents(".tabs");
        var $contents = $tabs.find(".tabcontents");
        var $content = $contents.find(">div[data-tab='" + tab + "']");

        if ($content.length != 1 || $(this).hasClass("active")) {
            return true;
        }

        $(this).parents(".tabheads").find("a").removeClass('active');
        $(this).addClass("active");

        $contents.find(">div").removeClass('active');
        $content.addClass('active');
    });
}


/**
 * General form functions
 */
NextPost.Forms = function() {
    $("body").on("input focus", ":input", function() {
        $(this).removeClass("error");
    });

    $("body").on("change", ".fileinp", function() {
        if ($(this).val()) {
            var label = $(this).val().split('/').pop().split('\\').pop();
        } else {
            var label = $(this).data("label")
        }
        $(this).next("div").text(label).attr("title", label);
        $(this).removeClass('error');
    });

    NextPost.DatePicker();
    NextPost.Combobox();
    NextPost.Combobox3();
    NextPost.AjaxForms();
		NextPost.Enter();
}


/**
 * Combobox select 2
 */
NextPost.Combobox = function()
{
     $(".select2").each(function() {
		 	$(".select2").select2({});
		 });
   
}

/**
 * Combobox select 3
 */
NextPost.Combobox3 = function()
{
     $(".select3").each(function() {
		 	$(".select3").select3({});
		 });
   
}

/**
 * Date time pickers
 */
NextPost.DatePicker = function() {
    $(".js-datepicker").each(function() {
        $(this).removeClass("js-datepicker");

        if ($(this).data("min-date")) {
            $(this).data("min-date", new Date($(this).data("min-date")))
        }

        if ($(this).data("start-date")) {
            $(this).data("start-date", new Date($(this).data("start-date")))
        }

        $(this).datepicker({
            language: $("html").attr("lang"),
            dateFormat: "yyyy-mm-dd",
            timeFormat: "hh:ii",
            autoClose: true,
            timepicker: false,
            toggleSelected: false
        });
    })
}


/**
 * Add msg to the $resobj and displays it
 * and scrolls to $resobj
 * @param {$ DOM} $form jQuery ref to form
 * @param {string} type
 * @param {string} msg
 */
var __form_result_timer = null;
NextPost.DisplayFormResult = function($form, type, msg) {
    var $resobj = $form.find(".form-result");
    msg = msg || "";
    type = type || "error";

    if ($resobj.length != 1) {
        return false;
    }


    var $reshtml = "";
    switch (type) {
        case "error":
            $reshtml = "<div class='error'><span class='sli sli-close icon'></span> " + msg + "</div>";
            break;

        case "success":
            $reshtml = "<div class='success'><span class='sli sli-check icon'></span> " + msg + "</div>";
            break;

        case "info":
            $reshtml = "<div class='info'><span class='sli sli-info icon'></span> " + msg + "</div>";
            break;
    }

    $resobj.html($reshtml).stop(true).fadeIn();

    clearTimeout(__form_result_timer);
    __form_result_timer = setTimeout(function() {
        $resobj.stop(true).fadeOut();
    }, 10000);

    var $parent = $("html, body");
    var top = $resobj.offset().top - 85;
    if ($form.parents(".skeleton-content").length == 1) {
        $parent = $form.parents(".skeleton-content");
        top = $resobj.offset().top - $form.offset().top - 20;
    }

    $parent.animate({
        scrollTop: top + "px"
    });
}


/**
 * Ajax forms
 */
NextPost.AjaxForms = function() {
    var $form;
    var $result;
    var result_timer = 0;

    $("body").on("submit", ".js-ajax-form", function() {
        $form = $(this);
        $result = $form.find(".form-result")
        submitable = true;

        $form.find(":input.js-required").not(":disabled").each(function() {
            if (!$(this).val()) {
                $(this).addClass("error");
                submitable = false;
            }
        });

        if (submitable) {
            $("body").addClass("onprogress");

            $.ajax({
                url: $form.attr("action"),
                type: $form.attr("method"),
                dataType: 'jsonp',
                data: $form.serialize(),
                error: function() {
                    $("body").removeClass("onprogress");
                    NextPost.DisplayFormResult($form, "error", __("Oops! An error occured. Please try again later!"));
                },

                success: function(resp) {
                    if (typeof resp.redirect === "string") {
                        window.location.href = resp.redirect;
                    } else if (typeof resp.msg === "string") {
                        var result = resp.result || 0;
                        var reset = resp.reset || 0;
                        switch (result) {
                            case 1: //
                                NextPost.DisplayFormResult($form, "success", resp.msg);
                                if (reset) {
                                    $form[0].reset();
                                }
                                setTimeout(function(){ window.location.reload(); }, 2000);
                                break;

                            case 2: //
                                NextPost.DisplayFormResult($form, "info", resp.msg);
                                break;

                            default:
                                NextPost.DisplayFormResult($form, "error", resp.msg);
                                break;
                        }
                        $("body").removeClass("onprogress");
                    } else {
                        $("body").removeClass("onprogress");
                        NextPost.DisplayFormResult($form, "error", __("Oops! An error occured. Please try again later!"));
                    }
                }
            });
        } else {
            NextPost.DisplayFormResult($form, "error", __("Fill required fields"));
        }

        return false;

    });
}



/**
 * Load More
 * @var window.loadmore Global object to hold callbacks etc.
 */
window.loadmore = {}
NextPost.LoadMore = function() {
    $("body").on("click", ".js-loadmore-btn", function() {
        var _this = $(this);
        var _parent = _this.parents(".loadmore");
        var id = _this.data("loadmore-id");

        if (!_parent.hasClass("onprogress")) {
            _parent.addClass("onprogress");

            $.ajax({
                url: _this.attr("href"),
                dataType: 'html',
                error: function() {
                    _parent.fadeOut(200);

                    if (typeof window.loadmore.error === "function") {
                        window.loadmore.error(); // Error callback
                    }
                },
                success: function(Response) {
                    var resp = $(Response);
                    var $wrp = resp.find(".js-loadmore-content[data-loadmore-id='" + id + "']");

                    if ($wrp.length > 0) {
                        var wrp = $(".js-loadmore-content[data-loadmore-id='" + id + "']");
                        wrp.append($wrp.html());

                        if (typeof window.loadmore.success === "function") {
                            window.loadmore.success(); // Success callback
                        }
                    }

                    if (resp.find(".js-loadmore-btn[data-loadmore-id='" + id + "']").length == 1) {
                        _this.attr("href", resp.find(".js-loadmore-btn[data-loadmore-id='" + id + "']").attr("href"));
                        _parent.removeClass('onprogress none');
                    } else {
                        _parent.hide();
                    }
                }
            });
        }

        return false;
    });

    $(".js-loadmore-btn.js-autoloadmore-btn").trigger("click");
}


/**
 * Popups
 */
NextPost.Popups = function() {
    var w = scrollbarWidth();

    $(window).on("resize", function() {
        $('#popupstyles').remove();

        if ($("body").outerHeight() > $(window).height()) {
            $("head").append(
                "<style id='popupstyles'>" +
                "body.js-popup-opened { padding-right:" + w + "px; overflow:hidden; }" +
                ".js-popup { overflow-y:scroll; }" +
                "</style>"
            );
        }
    }).trigger("resize");

    $("body").on("click", ".js-open-popup", function() {
        var $popup = $($(this).data("popup"));

        if ($popup.length != 1) {
            return true;
        }

        $("body").addClass('js-popup-opened');
        $popup.removeClass('none');

        return false;
    });

    $("body").on("click", ".js-close-popup", function() {
        $("body").removeClass('js-popup-opened');
        $(this).parents(".js-popup").addClass("none");
    });
}


/**
 * Remove List Item (Data entry)
 *
 * Sends remove request to the backend
 * for selected list item (data entry)
 */
NextPost.RemoveListItem = function() {
    $("body").on("click", "a.js-remove-list-item", function() {
        var item = $(this).parents(".js-list-item");
        var id = $(this).data("id");
        var url = $(this).data("url");

        NextPost.Confirm({
            confirm: function() {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'jsonp',
                    data: {
                        action: "remove",
                        id: id
                    }
                });

                item.fadeOut(500, function() {
                    item.remove();
                });
            }
        })
    });
  
      $("body").on("click", "a.delete-procedimento", function() {
        var item = $(this).parents(".js-list-item");
        var id = $(this).data("id");
        var url = $(this).data("url");
        console.log(id);
        console.log(url);

        NextPost.ConfirmProcedimento({
            confirm: function() {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'jsonp',
                    data: {
                        action: "removeProcedimento",
                        id: id
                    }
                });

                item.fadeOut(500, function() {
                    item.remove();
                });
            }
        })
    });
  
        $("body").on("click", "a.delete-pagamento", function() {
        var item = $(this).parents(".js-list-item");
        var id = $(this).data("id");
        var url = $(this).data("url");
        console.log(id);
        console.log(url);

        NextPost.ConfirmProcedimento({
            confirm: function() {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'jsonp',
                    data: {
                        action: "removePagamento",
                        id: id
                    }
                });

                item.fadeOut(500, function() {
                    item.remove();
                });
            }
        })
    });
  
  
  
  
}






/**
 * Actions related to aside list items
 */
NextPost.AsideList = function() {
    // Load content for selected aside list item
    $(".skeleton-aside").on("click", ".js-ajaxload-content", function() {
        var item = $(this).parents(".aside-list-item");
        var url = $(this).attr("href");

        if (!item.hasClass('active')) {
            $(".aside-list-item").removeClass("active");
            item.addClass("active");

            $(".skeleton-aside").addClass('hide-on-medium-and-down');

            $(".skeleton-content")
                .addClass("onprogress")
                .removeClass("hide-on-medium-and-down")
                .load(url + " .skeleton-content>", function() {
                    $(".skeleton-content").removeClass('onprogress');
                });
					
            window.history.pushState({}, $("title").text(), url);			

        }
				
        return false;
    });
		
    NextPost.AsideListSearch();
		
}


/**
 * Search aside list items
 */
NextPost.AsideListSearch = function() {
    /**
     * Previous search query
     * Don't perform a search if the new search query is
     * same as previous one
     */
    var prev_search_query;

    /**
     * Timer placeholder for the timeout between search requests
     */
    var search_timer;

    /**
     * XMLHttpRequest
     *
     * Handler for XMLHttpRequest. This will be used cancel/abort
     * the ajax requests when needed. This is a workaround for jQuery 3+
     * As of jQuery 3, the ajax method returns a promise
     * without extra methods (like abort). So ajax_handler.abort() is invalid
     * in jQuery 3+
     */
    var search_xhr;

    /**
     * jQuery ref. to the DOM element of the aside search form
     * @type {[type]}
     */
    var $form = $(".skeleton-aside .search-box");


    /**
     * Perform search on keyup on search input
     */
    $form.find(":input[name='q']").on("keyup", function() {
        var _this = $(this);
        var search_query = $.trim(_this.val());

        if (search_query == prev_search_query) {
            return true;
        }

        if (search_xhr) {
            // Abort previous ajax request
            search_xhr.abort();
        }

        if (search_timer) {
            clearTimeout(search_timer);
        }

        prev_search_query = search_query;
        var duration = search_query.length > 0 ? 200 : 0;
        search_timer = setTimeout(function() {
            _this.addClass("onprogress");

            $.ajax({
                url: $form.attr("action"),
                type: $form.attr("method"),
                dataType: 'html',
                data: {
                    q: search_query
                },
                complete: function() {
                    _this.removeClass('onprogress');
                },

                success: function(resp) {
                    $resp = $(resp);

                    if ($resp.find(".skeleton-aside .js-search-results").length == 1) {
                        $(".skeleton-aside .js-search-results")
                            .html($resp.find(".skeleton-aside .js-search-results").html());
                    }

                    if (search_query.length > 0) {
                        $form.addClass("search-performed");
                    } else {
                        $form.removeClass("search-performed");
                    }
                }
            });
        }, duration);
    });


    /**
     * Cancel search
     */
    $form.find(".cancel-icon").on("click", function() {
        $form.find(":input[name='q']")
            .val("")
            .trigger('keyup');
    });
}


/**
 * File Manager
 */
NextPost.FileManager = function() {


    // Device file browser
    $("body").on("click", ".js-fm-filebrowser", function() {

      if(['image/jpeg', 'image/jpg', 'image/png', 'image/gif'].indexOf($("#fileUpload").get(0).files[0].type) == -1) {
       alert('Error : Only JPEG, PNG & GIF allowed');
       return;
   }

      var url = document.baseURI;
      var fileUpload;

      var fileUp = $(this)[0].files[0].name;
      	console.log(fileUp);
      //const fileReader = new FileReader();

    //  fileReader.onloadend = function(){
      //var fileResult = fileReader.result;
      //console.log(fileReader.result);

          $.ajax({
              url: url,
              type: "POST",
              dataType: "jsonp",
              data: {
                  action: "changePhoto",
                  file: fileUp
              },

              error: function() {
                  console.log("erro");
              },
              success: function(resp) {
                  console.log(resp);
              }
          });

    //  }

    //  fileReader.readAsDataURL(file);

    });

    // URL Input form toggler
    $("body").on("click", ".js-fm-urlformtoggler", function() {
        window.filemanager.toggleUrlForm();
    });

    // Google Drive Picker
    //
    // Will be initialized automatically,
    // there is no need to call method here.

    // File Pickers (Browse buttons)
    NextPost.FilePickers();
}


/**
 * File Pickers (Browse buttons)
 */
NextPost.FilePickers = function() {
    var acceptor;

    $("body").on("click", ".js-fm-filepicker", function() {				
        acceptor = $(this).data("fm-acceptor");
        $(".filepicker").stop(true).fadeIn();
    });

    $(".filepicker").find(".js-close").on("click", function() {
        $(".filepicker").stop(true).fadeOut();
    });

    $("body").find(".js-submit").on("click", function() {
        if (acceptor) {
            var selection = window.filemanager.getSelection();
            var file = selection[Object.keys(selection)[0]];
            $(acceptor).val(file.url);
        }
        $(".filepicker").stop(true).fadeOut();
    })
}

NextPost.ConfirmProcedimento = function(data = {}) {
    data = $.extend({}, {
            title: __("Você tem certeza que deseja excluir essa informação?"),
            content: __("Não será possivel recuperar os dados após apagado!"),
            confirmText: __("Excluir"),
            cancelText: __("Cancelar"),
            confirm: function() {},
            cancel: function() {},
        },
        data);


    $.confirm({
        title: data.title,
        content: data.content,
        theme: 'supervan',
        animation: 'opacity',
        closeAnimation: 'opacity',
        buttons: {
            confirm: {
                text: data.confirmText,
                btnClass: "small button button--danger mr-5",
                keys: ['enter'],
                action: typeof data.confirm === 'function' ? data.confirm : function() {}
            },
            cancel: {
                text: data.cancelText,
                btnClass: "small button button--simple",
                keys: ['esc'],
                action: typeof data.cancel === 'function' ? data.cancel : function() {}
            },
        }
    });
}

NextPost.Confirm = function(data = {}) {
    data = $.extend({}, {
            title: __("Você tem certeza que deseja excluir essa informação?"),
            content: __("Não será possivel recuperar os dados após apagado!"),
            confirmText: __("Apagar"),
            cancelText: __("Cancelar"),
            confirm: function() {},
            cancel: function() {},
        },
        data);


    $.confirm({
        title: data.title,
        content: data.content,
        theme: 'supervan',
        animation: 'opacity',
        closeAnimation: 'opacity',
        buttons: {
            confirm: {
                text: data.confirmText,
                btnClass: "small button button--danger mr-5",
                keys: ['enter'],
                action: typeof data.confirm === 'function' ? data.confirm : function() {}
            },
            cancel: {
                text: data.cancelText,
                btnClass: "small button button--simple mr-5",
                keys: ['esc'],
                action: typeof data.cancel === 'function' ? data.cancel : function() {}
            },
        }
    });
}

/**
 * Confirm
 */
NextPost.Confirm2 = function(data = {}) {
    data = $.extend({}, {
            title: __("Deseja realmente excluir o orçamento?"), 
						content: __("Não será possivel recuperar os dados após apagado!"),
            confirmText: __("Excluir"),
            cancelText: __("Cancelar"),
            confirm: function() {},
            cancel: function() {},
        },
        data);


    $.confirm({
        title: data.title,
        content: data.content,
        theme: 'supervan',
        animation: 'opacity',
        closeAnimation: 'opacity',
        buttons: {
            confirm: {
                text: data.confirmText,
                btnClass: "small button button--danger mr-5",
                keys: ['enter'],
                action: typeof data.confirm === 'function' ? data.confirm : function() {}
            },
            cancel: {
                text: data.cancelText,
                btnClass: "small button button--simple",
                keys: ['esc'],
                action: typeof data.cancel === 'function' ? data.cancel : function() {}
            },
        }
    });
}

NextPost.Confirm3 = function(data = {}) {
    data = $.extend({}, {
            title: __("Digite a média de KwH:"),
            content: __("<center><input class='input fielSearchKwP' style='width:500px !important' type='text'></center>"),
            confirmText: __("Utilizar no Orçamento"),
            cancelText: __("Cancelar"),
            confirm: function() {},
            cancel: function() {},
        },
        data);


    $.confirm({
        title: data.title,
        content: data.content,
        theme: 'supervan',
        animation: 'opacity',
        closeAnimation: 'opacity',
        buttons: {
            confirm: {
                text: data.confirmText,
                btnClass: "small button button--simple mr-5",
                keys: ['enter'],
                action: typeof data.confirm === 'function' ? data.confirm : function() {}
            },
            cancel: {
                text: data.cancelText,
                btnClass: "small button button--danger",
                keys: ['esc'],
                action: typeof data.cancel === 'function' ? data.cancel : function() {}
            },
        }
    });
}


/**
 * Alert
 */
NextPost.Alert = function(data = {}) {
    data = $.extend({}, {
        title: __("Error"),
        content: __("Oops! An error occured. Please try again later!"),
        confirmText: __("Close"),
        confirm: function() {},
    }, data);

    $.alert({
        title: data.title,
        content: data.content,
        theme: 'supervan',
        animation: 'opacity',
        closeAnimation: 'opacity',
        buttons: {
            confirm: {
                text: data.confirmText,
                btnClass: "small button button--danger mr-5",
                keys: ['enter'],
                action: typeof data.confirm === 'function' ? data.confirm : function() {}
            },
					cancel: {
                text: data.cancelText,
                btnClass: "small button button--simple",
                keys: ['esc'],
                action: typeof data.cancel === 'function' ? data.cancel : function() {}
            },
        }
    });
}

NextPost.Logs = function() {	
	
		$(".search-logs").on("keyup", function() {	
		var url = document.baseURI;	
  	var logs = $(this).val();
       
    $(this).addClass("onprogress");
			
		 $(".list-logs").each(function() {
			 
				if($(this).text().toUpperCase().indexOf(logs.toUpperCase()) < 0){
   						$(this).css("display", "none");
					} else {
						$(this).css("display", "");
				}					 
      });	
			
		$(this).removeClass("onprogress");
        
    }); 
};

/**
 * Package Form
 */
NextPost.Order = function() {
		
		var $form = $(".js-ajax-form-order");
		var url = document.baseURI;
		var canSave = 0;
		var statusRenew = 0;
	
		$(".search-order").on("keyup", function() {	
		var url = document.baseURI;	
  	var order = $(this).val();
       
    $(this).addClass("onprogress");
			
		 $(".list-order").each(function() {
			 
				if($(this).text().toUpperCase().indexOf(order.toUpperCase()) < 0){
   						$(this).css("display", "none");
					} else {
						$(this).css("display", "");
				}					 
      });	
			
		$(this).removeClass("onprogress");
        
    }); 
	
	$(".precoBrl").on("blur", function(){
		//console.log("eri" + $(this).val);
		$(this).val.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
	});

	 $("body").on("click", ".delete-line", function() { 	
				var line = $(this).closest("tr");
        var id = $(this).data("id");
        var url = document.baseURI;
				
        NextPost.Confirm2({
            confirm: function() {						
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'jsonp',
                    data: {
                        action: "desativar",
                        id: id,
												textExclusao: $(".detalhesExclusao").val()
                    },error: function() {
										console.log("Erro de Valor");
									},
									success: function(resp) {
									//console.log(resp);
									if (resp.result == 1){	
									toastr.options = {

											closeButton: true,

											progressBar: true,

											preventDuplicates: true,

											positionClass: 'toast-top-right',

											onclick: null

										};
										toastr.success('Orçamento excluído com sucesso!');
										
										 line.fadeOut(400, function() {
												line.remove();
										});	  
									} else {
										console.log("entrou");
										toastr.options = {

											closeButton: true,

											progressBar: true,

											preventDuplicates: true,

											positionClass: 'toast-top-right',

											onclick: null

										};
										toastr.warning(resp.msg);
									}
								}							       
            });
        }		
 			});
    });
	


	
}

/**
 * Settings
 */
NextPost.Settings = function() {
    $(".js-settings-menu").on("click", function() {
        $(".asidenav").toggleClass("mobile-visible");
        $(this).toggleClass("mdi-menu-down mdi-menu-up");

        $("html, body").delay(200).animate({
            scrollTop: "0px"
        });
    });


    if ($("#smtp-form").length == 1) {
        $("#smtp-form :input[name='auth']").on("change", function() {
            if ($(this).is(":checked")) {
                $("#smtp-form :input[name='username'], :input[name='password']")
                    .prop("disabled", false);
            } else {
                $("#smtp-form :input[name='username'], :input[name='password']")
                    .prop("disabled", true)
                    .val("");
            }
        }).trigger("change");
    }
 
}


NextPost.Benefits = function() {
	
	//Descçaramdp voriáveis
  var url = document.baseURI;
  var $form = $(".js-ajax-form-benefits");
	
	
	//Fazendo mudança de aba

  $('body').on('click', ".tab-benefits" ,function(e){
		console.log("#"+$(this).attr("id")+ "_tab");
    $(".tab_content").hide();
    $(".tab-benefits").removeClass("active");
    $("#"+$(this).attr("id")+ "_tab").show();		
    $(this).addClass("active");
  });
	
	
	//Fazendo controle do CheckBox dos Benefits
  $('body').on('change', ".checkBenefit" ,function(e){
  var val =  $(this).is(':checked');
  var name =  $(this).attr("name");
  var completeName =  $(this).data("name");

  if (val == true){
    $("#benefitsRank").sortable();
    var $tag = $("<a></a>");
        $tag.attr({
            "href": "javascript:void(0)",
            "name": completeName ,
            "id": name,
        });
        $tag.addClass("tab-benefits " + name);
        $tag.text(completeName);

        $tag.appendTo($(".af-tab-heads"));

        var $tagRank = $("<span style='margin: 0px 2px 3px 0px;'></span>");
            $tagRank.attr({
                "data-type": "benefitRank",
                "data-id": name ,
                "data-value": completeName,
            });
            $tagRank.addClass("benefitsRank " + name);
            $tagRank.text(completeName);

        $tagRank.appendTo($("#benefitsRank"));
  } else {
    var $taga = $("."+name);

    $taga.remove();
  }

  });
	
	
	//Mostrando conteudo de acordo com escolha
  $('body').on('change', ".tagAbA", function(){
		var val =  $(this).is(':checked');
		
		if (val == true){		
			$(".tagAbA").prop('checked', false);
			$(this).prop('checked', true);
		}
		
		
		$(".apuracaoModTax").hide(); 
		
    $("."+$(this).data("value")+"Apuracao").show(); 
		
		if (val == false){		
		$(".apuracaoModTax").hide(); 
		}
		
		
  });

	
	
	//Monstrando lista de Ncm
  var target_list_popup = $("#target-list-popup");
    $("body").on("click", "a.js-reactions-target-list", function() {

            var target_list_textarea = target_list_popup.find("textarea.target-list");
            var targets_list = target_list_textarea.val();

            target_list_textarea.val("");

            $("body").addClass("onprogress");

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'jsonp',
                data: {
                    action: "insert-ncm",
                    targets_list: targets_list
                },

                error: function() {
                    $("body").removeClass("onprogress");

                    NextPost.Alert({
                        title:  __("Oops..."),
                        content:  __("Um erro aconteceu!"),
                        confirmText: __("Fechar")
                    });
                },

                success: function(resp) {
                    console.log(resp.filtered_targets);
                    if (resp.result == 1) {
                        $("body").removeClass("onprogress");
                        target_list_popup.modal('hide');

                        if (resp.filtered_targets) {
                            var filtered_targets = $.parseJSON(resp.filtered_targets);

                            var target = [];

                            // Get ready tags
                            $(".tag").each(function() {
                                target.push($(this).data("type") + "-" + $(this).data("value"));
                            });

                            $.each(filtered_targets,function(key,value){
                                if (target.indexOf(value.type + "-" + value.value) >= 0) {

                                } else {

                                    var $tag = $("<span style='margin: 0px 2px 3px 0px'></span>");
                                        $tag.addClass("tag ncms pull-left preadd");
                                        $tag.attr({
                                            "data-type": "ncm",
                                            "data-value": value.value,
                                        });

                                        $tag.text("NCM: " +value.value);

                                        $tag.append("<span class='mdi mdi-close remove'></span>");

                                    $tag.appendTo($("#ncm"));

                                    setTimeout(function(){
                                        $tag.removeClass("preadd");
                                    }, 50);

                                    target.push("ncms");
                                }
                            });
                        }
                    } else {
                        $("body").removeClass("onprogress");

                        NextPost.Alert({
                            title: __("Oops..."),
                            content: resp.msg,
                            confirmText: __("Close"),

                            confirm: function() {
                                if (resp.redirect) {
                                    window.location.href = resp.redirect;
                                }
                            }
                        });
                    }
                }
            });

    });

	
   // Monstando Lista de Varios Ncms
   $('body').on('change', ".inputNcm" ,function(){
     var $inputNcm = $(":input[name='ncm']");
     var query;
     var target = [];

     // Get ready tags
     $(".tag").each(function() {
         target.push($(this).data("type") + "-" + $(this).data("value"));
     });

     if (target.indexOf("ncm" + "-" + $inputNcm.val()) >= 0) {
         return false;
     }

     if (target.indexOf("ncm" + "-" + "Todos") >= 0) {
         return false;
     }

     if($inputNcm.val() == "Todos"){
       // Get ready tags
       $(".ncms").each(function() {
           $(this).remove();
       });
     }

     var $tag = $("<span style='margin: 0px 2px 3px 0px'></span>");
         $tag.addClass("tag ncms pull-left preadd");
         $tag.attr({
             "data-type": "ncm",
             "data-value": $inputNcm.val(),
         });

         $tag.text("NCM: " + $inputNcm.val());

         $tag.append("<span class='mdi mdi-close remove'></span>");

         $tag.appendTo($("#ncm"));

         setTimeout(function(){
             $tag.removeClass("preadd");
         }, 50);

         target.push("ncms");

         return false;
   });
	
   //Formando a lista do Tax Profile
    $('body').on('change', ".inputTaxProfile" ,function(){
    var $taxProfile = $(":input[name='taxProfile']");
    var query;
    var target = [];

    // Get ready tags
    $(".tag").each(function() {
        target.push($(this).data("type") + "-" + $(this).data("value"));
    });

    if (target.indexOf("taxProfile" + "-" + $taxProfile.val()) >= 0) {
        return false;
    }

    if (target.indexOf("taxProfile" + "-" + "Todos") >= 0) {
        return false;
    }

    if($taxProfile.val() == "Todos"){
      // Get ready tags
      $(".taxProfile").each(function() {
          $(this).remove();
      });
    }

    var $tag = $("<span style='margin: 0px 2px 3px 0px'></span>");
        $tag.addClass("tag taxProfile pull-left preadd");
        $tag.attr({
            "data-type": "taxProfile",
            "data-value": $taxProfile.val(),
        });

        $tag.text($taxProfile.val());

        $tag.append("<span class='mdi mdi-close remove'></span>");

        $tag.appendTo($("#taxProfile"));

        setTimeout(function(){
          $tag.removeClass("preadd");
        }, 50);

        target.push("taxProfile");

        return false;
    });
	
	
		//Formando a lista do UfDestiny
    $('body').on('change', ".uf-destiny" ,function(){
      var $fieldDestiny = $(":input[name='uf-destiny']");
      var query;
      var target = [];

      // Get ready tags
      $(".tag").each(function() {
          target.push($(this).data("type") + "-" + $(this).data("value"));
      });

      if (target.indexOf("uf" + "-" + $fieldDestiny.val()) >= 0) {
          return false;
      }

      if (target.indexOf("uf" + "-" + "Todos") >= 0) {
          return false;
      }

      if($fieldDestiny.val() == "Todos"){
        // Get ready tags
        $(".ufdestiny").each(function() {
            $(this).remove();
        });
      }

      var $tag = $("<span style='margin: 0px 2px 3px 0px'></span>");
          $tag.addClass("tag uf-destiny pull-left preadd");
          $tag.attr({
              "data-type": "uf",
              "data-value": $fieldDestiny.val(),
          });

          $tag.text($fieldDestiny.val());

          $tag.append("<span class='mdi mdi-close remove'></span>");

          $tag.appendTo($("#uf_destiny"));

          setTimeout(function(){
            $tag.removeClass("preadd");
          }, 50);

          target.push("uf");

          return false;
    });

  // Remove tags
  $("click", ".tag .remove", function() {
      var $tag = $(this).parents(".tag");

      var index = target.indexOf($tag.data("type") + "-" + $tag.data("value"));
      if (index >= 0) {
          target.splice(index, 1);
      }

      $tag.remove();
  });


  // Submit the form
    $form.on("submit", function(e) {
      e.preventDefault();

      $("body").addClass("onprogress");

      var targets = [];
      var benefitsRank = [];
			var AbaApuracao = [];
			var AbaBase = [];
			var AbaNf = [];
			var AbaAliquota= [];
			var taxAjusts = [];

      $form.find(".tags .tag").each(function() {
          var t = {};
              t.type = $(this).data("type");
              t.value = $(this).data("value");

          targets.push(t);
      });

      $form.find(".benefitsRank").each(function() {
          var t = {};
              t.type = $(this).data("type");
							t.id = $(this).data("id");
              t.value = $(this).data("value");

          benefitsRank.push(t);
      });      
			
			$form.find(".tagNF").each(function() {
          var t = {}; 
							t.type = $(this).data("type");
							t.id = $(this).data("value");
              t.value = $(this).is(":checked");

          AbaNf.push(t);
      });   
			
			$form.find(".tagBase").each(function() {
          var t = {}; 
							t.type = $(this).data("type");
							t.id = $(this).data("id");
              t.value = $(this).val();

          AbaBase.push(t);
      });   
			
			$form.find(".tagAliquota").each(function() {
          var t = {}; 
							t.type = $(this).data("type");
							t.id = $(this).data("id");
              t.value = $(this).val();

          AbaAliquota.push(t);
      });  
			
			$form.find(".tagApuracao").each(function() {
          var t = {}; 
							t.type = $(this).data("type");
							t.id = $(this).data("id");
              t.value = $(this).val();

          AbaApuracao.push(t);
      });

      $.ajax({
          url: $form.attr("action"),
          type: $form.attr("method"),
          dataType: "jsonp",
          data: {
              action: "saveJs",
              targets: JSON.stringify(targets),
							taxNF: JSON.stringify(AbaNf),
							taxBase: JSON.stringify(AbaBase),
							taxApuracao: JSON.stringify(AbaApuracao),
							taxAliquota: JSON.stringify(AbaAliquota),
              benefitsRank: JSON.stringify(benefitsRank),						
              is_active: $(":input[name='is_active']").val(),
              ufOrigin: $(":input[name='ufOrigin']").val(),
              description: $(":input[name='description']").val(),
          },
          error: function() {
              $("body").removeClass("onprogress");
              NextPost.DisplayFormResult($form, "error", __("Oops! An error occured. Please try again later!"));
          },

          success: function(resp) {            
              if (resp.result == 1) {
                  NextPost.DisplayFormResult($form, "success", resp.msg);
              } else {
                  NextPost.DisplayFormResult($form, "error", resp.msg);
              }

              $("body").removeClass("onprogress");
          }
      });
      return false;
  });

}



NextPost.Brand = function() {

    $(':input[name="category_brand"]').on('keypress', function(){
      var targetBranca = [];
      var url = document.baseURI;
    	var $form = $("body").find("form");
    	var query;
      var $category_brand = $("body").find(":input[name='category_brand']");

      // Search input
      $category_brand.devbridgeAutocomplete({
          serviceUrl: url,
          type: "POST",
          dataType: "jsonp",
          minChars: 2,
          appendTo: $form,
          forceFixPosition: true,
          paramName: "q",
      		params: {
      			action: "category_brand",
      		},
          onSearchStart: function() {

          $(this).parent().find(".js-search-loading-icon").removeClass('none');
    			$_tags = $(this).parent().parent().find('.category_brand');
    			input = $(this);

          query = $category_brand.val();

          },
          onSearchComplete: function() {
              $(this).parent().find(".js-search-loading-icon").addClass('none');
          },

          transformResult: function(resp) {
              return {
                  suggestions: resp.result == 1 ? resp.items : []
              };
          },

          beforeRender: function (container, suggestions) {
              for (var i = 0; i < suggestions.length; i++) {
                if (suggestions[i].value >= 0) {
                    container.find(".autocomplete-suggestion").eq(i).addClass('none')
                }
              }
          },

          formatResult: function(suggestion, currentValue){
              var pattern = '(' + currentValue.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&") + ')';

              return suggestion.value
                          .replace(new RegExp(pattern, 'gi'), '<strong>form<;\/strong>')
                          .replace(/&/g, '&amp;')
                          .replace(/</g, '&lt;')
                          .replace(/>/g, '&gt;')
                          .replace(/"/g, '&quot;')
                          .replace(/&lt;(\/?strong)&gt;/g, '<form>;');
          },

          onSelect: function(suggestion){

           input.val('');
           var url = document.baseURI;
           var $tag = $("<span style='margin: 0px 2px 3px 0px'></span>");
               $tag.addClass("tag pull-left preadd");
               $tag.attr({
                   "data-value": suggestion.value,
               });

               $tag.text(suggestion.value);

               $tag.append("<span class='mdi mdi-close remove'></span>");

            $tag.appendTo($_tags);

           setTimeout(function(){
               $tag.removeClass("preadd");
           }, 50);


  			   return false;
          }
      });
  	});

    // Remove target
    $('body').on("click", ".tag .remove", function() {
      var target = [];
     
        var $tag = $(this).parents(".tag");

        var index = target.indexOf($tag.data("value"));
        if (index >= 0) {
            target.splice(index, 1);
        }

        $tag.remove();


		return false;
    });


}


NextPost.Client = function() {
  
  $(".selct2 ").select2({});

	$("body").on("blur", ".cnpjField", function() { 
	
	var cnpj = $(this).val();
	var url = document.baseURI;	
		
		 $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "searchCnpj",
							cnpj: cnpj,
          },
          error: function() {
              console.log("Erro Consulta CNPJ");
          },

          success: function(resp) {
						console.log(resp);
						 $(".razaoField").val("");
						 
             $(".razaoField").val(resp.cnpj);
						 
          }
      })
	});
	
	$("body").on("blur", ".cepField", function() { 
	
	var cep = $(this).val();
	var url = document.baseURI;	
		
		 $.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "searchCep",
							cep: cep,
          },
          error: function() {
              console.log("Erro Consulta CNPJ");
          },

          success: function(resp) {
						console.log(resp);
						$(".estadoField").val("");
						$(".logradouroField").val("");
						$(".bairroField").val("");
						$(".localidadeField").val("");
            $(".estadoField").val(resp.uf[0]);
						$(".logradouroField").val(resp.logradouro[0]);
						$(".bairroField").val(resp.bairro[0]);
						$(".localidadeField").val(resp.localidade[0]); 
          }
      })
	});
    
}



/**
 * Check NCM
 */
NextPost.Ncm = function(data = {}) {

  $("body").on("change", ":input[name='select_cod_ncm']", function() {

    var cod_ncm = $(this).children(":selected").attr("id");

    if(!cod_ncm) {
      return false;
    } else {
      console.log(window.location);
      window.location = cod_ncm;
    }

  });

}


/**
 * JS PRODUCT VIEW
 */
NextPost.Product = function() {

  var url = document.baseURI;
  var $form = $(".js-ajax-form");

  $('body').on('click', ".tab-product" ,function(e){
		console.log("#"+$(this).attr("id")+ "_tab");
    $(".tab_content").hide();
    $(".tab-product").removeClass("active");
    $("#"+$(this).attr("id")+ "_tab").show();		
    $(this).addClass("active");
  });
	
	$("body").on("click", ".select2", function() {
        $(this).removeClass("error");
  });
	
	$( ".active-icms" ).change(function() {		
		$( ".table-icms" ).slideToggle( "slow", function() {
			// Animation complete.
		});
	});
	
	$('body').on('keyup', ".priceProduct" ,function(e){		
		
		 $.ajax({
            url: url,
            type: 'POST',
            dataType: 'jsonp',
            data: {
                action: 'priceProduct',							
								cust: $(":input[name='cust']").val(),
                margem_product: $(":input[name='margem_product']").val(),
								cred_cofins: $(":input[name='cred_cofins']").val(),
								deb_cofins: $(":input[name='deb_cofins']").val(),
								cred_pis: $(":input[name='cred_pis']").val(),
								deb_pis: $(":input[name='deb_pis']").val(),	
								ipi: $(":input[name='ipi']").val(),	
								cred_icms: $(":input[name='cred_icms']").val(),
								deb_icms: $(":input[name='deb_icms']").val(),							
								liquid_cust: $(":input[name='liquid_cust']").val()
            },

            error: function() {
               console.log("ERROR");
            },

            success: function(resp) {
									console.log(resp);
									var lCust = $('input[name=liquid_cust]').val(resp.valorCust);	
									var price = $('input[name=price]').val(resp.valorPrice);
									formatCurrency(lCust);
									formatCurrency(price);
            }
        });		
  });	

  $(".select2").select2({});
	
}

/**
 * JS Page Product Segments
 */
NextPost.ProductSegments = function() {
	
		//Descçaramdp voriáveis
  var url = document.baseURI;
  var $form = $(".js-ajax-form");

  $('body').on('click', ".tab-product-segments" ,function(e){
		console.log("#"+$(this).attr("id")+ "_tab");
    $(".tab_content").hide();
    $(".tab-product-segments").removeClass("active");
    $("#"+$(this).attr("id")+ "_tab").show();		
    $(this).addClass("active");
  });
	
	$("body").on("click", ".select2", function() {
        $(this).removeClass("error");
  });
	
	$( ".active-icms" ).change(function() {		
		$( ".table-icms" ).slideToggle( "slow", function() {
			// Animation complete.
		});
	});

    $(".select2").select2({});
}

/**
 * JS Page Product Segments
 */
NextPost.ProductKits = function() {
	
		//Descçaramdp voriáveis
  var url = document.baseURI;
  var $form = $(".js-ajax-form");

  $('body').on('click', ".tab-product-kits" ,function(e){
		console.log("#"+$(this).attr("id")+ "_tab");
    $(".tab_content").hide();
    $(".tab-product-kits").removeClass("active");
    $("#"+$(this).attr("id")+ "_tab").show();		
    $(this).addClass("active");
  });
	
	$("body").on("click", ".select2", function() {
        $(this).removeClass("error");
  });
	
	$( ".active-icms" ).change(function() {		
		$( ".table-icms" ).slideToggle( "slow", function() {
			// Animation complete.
		});
	});

    $(".select2").select2({});
}

/**
 * Profile
 */
NextPost.Profile = function() {
	
		 $(".tab-product").on('click', function(){        
			$(".tab_content").hide();
			$(".tab-product").removeClass("active");
			$("#"+$(this).attr("id")+ "_tab").show();		
			console.log($(this));
			$(".tab-product").removeClass("active");
			$(this).addClass("active");
			$(".select2").select2({});
		});
	
    $(".js-resend-verification-email").on("click", function() {
        var $this = $(this);
        var $alert = $this.parents(".alert");

        if ($alert.hasClass("onprogress")) {
            return;
        }

        $alert.addClass('onprogress');
        $.ajax({
            url: $this.data("url"),
            type: 'POST',
            dataType: 'jsonp',
            data: {
                action: 'resend-email'
            },

            error: function() {
                $this.remove();
                $alert.find(".js-resend-result").html(__("Oops! An error occured. Please try again later!"));
                $alert.removeClass("onprogress");
            },

            success: function(resp) {
                $this.remove();
                $alert.find(".js-resend-result").html(resp.msg);
                $alert.removeClass("onprogress");
            }
        });
    });
	
	 $(".inputFile").on("change", function() {
      $('.inputFile').ajaxForm({
            uploadProgress: function(event, position, total, percentComplete) {
                $('progress').attr('value',percentComplete);
                $('#porcentagem').html(percentComplete+'%');
            },        
            success: function(data) {
                $('progress').attr('value','100');
                $('#porcentagem').html('100%');                
                if(data.sucesso == true){
                    $('#resposta').html('<img src="'+ data.msg +'" />');
                }
                else{
                    $('#resposta').html(data.msg);
                }                
            },
            error : function(){
                $('#resposta').html('Erro ao enviar requisição!!!');
            },
            dataType: 'json',
            url: document.baseURI,
            resetForm: true
        }).submit();
                    $('#formUpload').ajaxForm({
            uploadProgress: function(event, position, total, percentComplete) {
                $('progress').attr('value',percentComplete);
                $('#porcentagem').html(percentComplete+'%');
            },        
            success: function(data) {
                $('progress').attr('value','100');
                $('#porcentagem').html('100%');                
                if(data.sucesso == true){
                    $('#resposta').html('<img src="'+ data.msg +'" />');
                }
                else{
                    $('#resposta').html(data.msg);
                }                
            },
            error : function(){
                $('#resposta').html('Erro ao enviar requisição!!!');
            },
            dataType: 'json',
            url: document.baseURI,
            resetForm: true
        }).submit();
               
    });
	
	
}


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, "")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);  
    
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = "R$ " + left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "R$ " + input_val;    
    
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

/* Functions */

/**
 * Validate Email
 */
function isValidEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

/**
 * Get scrollbar width
 */
function scrollbarWidth() {
    var scrollDiv = document.createElement("div");
    scrollDiv.className = "scrollbar-measure";
    document.body.appendChild(scrollDiv);
    var w = scrollDiv.offsetWidth - scrollDiv.clientWidth;
    document.body.removeChild(scrollDiv);

    return w;
}


/**
 * Validate URL
 */
function isValidUrl(url) {
    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
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


/**
 * Get the position of the caret in the contenteditable element
 * @param  {DOM}  DOM of the input element
 * @return {obj}  start and end position of the caret position (selection)
 */
function getCaretPosition(element) {
    var start = 0;
    var end = 0;
    var doc = element.ownerDocument || element.document;
    var win = doc.defaultView || doc.parentWindow;
    var sel;

    if (typeof win.getSelection != "undefined") {
        sel = win.getSelection();
        if (sel.rangeCount > 0) {
            var range = win.getSelection().getRangeAt(0);
            var preCaretRange = range.cloneRange();
            preCaretRange.selectNodeContents(element);
            preCaretRange.setEnd(range.startContainer, range.startOffset);
            start = preCaretRange.toString().length;
            preCaretRange.setEnd(range.endContainer, range.endOffset);
            end = preCaretRange.toString().length;
        }
    } else if ((sel = doc.selection) && sel.type != "Control") {
        var textRange = sel.createRange();
        var preCaretTextRange = doc.body.createTextRange();
        preCaretTextRange.moveToElementText(element);
        preCaretTextRange.setEndPoint("EndToStart", textRange);
        start = preCaretTextRange.text.length;
        preCaretTextRange.setEndPoint("EndToEnd", textRange);
        end = preCaretTextRange.text.length;
    }
    return { start: start, end: end };
}

function valorTotal(value) {
 	var vunitTotal = 0;						
						var vtotalTotal = 0;
						
						$("#orderTable tr").each(function() {
							
							if ($(this).find("input.unitPrice").val() != null){
								if ($(this).find("input.unitPrice").val()){
									var unittotal = $(this).find("input.unitPrice").val().replace(/[^0-9.,]/g, "");
									unittotal = unittotal.replace(".", "");
									unittotal = unittotal.replace(",", ".");
									vunitTotal += parseFloat(unittotal);				
								} 
							}


							if ($(this).find("input.unitTotal").val() != null){
								if ($(this).find("input.unitTotal").val()){
									var unittotaltotal = $(this).find("input.unitTotal").val().replace(/[^0-9.,]/g, "")
									unittotaltotal = unittotaltotal.replace(".", "");
									unittotaltotal = unittotaltotal.replace(",", ".");
									vtotalTotal += parseFloat(unittotaltotal);				
								} 
							}


						});		

						$("#vuntTotal").val(vunitTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));						
						$("#vtotalTotal").val(vtotalTotal.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}));
		 
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
		alert("Não utilize caracteres especiais");
	}	
}

function maskPer(valor) {
	return valor.replace(/(\d{1})(\d{2})/g,"\$1.\$2%");
	}




function sleep(seconds){
    var waitUntil = new Date().getTime() + seconds*1000;
    while(new Date().getTime() < waitUntil) true;
}

function AddTableRow(seconds){
		
		//Verificar se pode já adicionar Produtos
		var ufClient = $(".inputUF").val();
		var ufBranch = $(".uf-branch").val();
		var typeOrder = $(".type-order").val();		
		var kwp = $("#kwp").val();
		var model = $(".model-select").val();
		var producerKit = $(".producerKit").val();
		var producerInversor = $(".producerInversor").val();
		var frete = $(".frete").val();
		var ufFrete = $(".ufFrete").val();
		var paymentMode = $(".paymentMode").val();
	
		if (ufClient == "" || ufBranch == "" || typeOrder == "" || kwp == "" || model == "" || producerKit == "" || producerInversor == "" || frete == "" || ufFrete == "" || paymentMode == ""){	
		toastr.options = {

					closeButton: true,

					progressBar: true,

					preventDuplicates: true,

					positionClass: 'toast-top-right',

					onclick: null

				};

				toastr.warning('Preencha todos os campos a cima!');
				return false;
		}		
		
		
     var newRow = $("<tr>");	    
		 var cols = "";	
		 var url = document.baseURI;			
		 var linhas = $('#orderTable tr').length;
	
		cols += '<td><select class="select-table selectProduct calcPrice" id="'+linhas+'" onchange="javascript:valorTotal(this)"" style="width:100%" name="order_table"><option value="0" selected hidden>Produto Novo</option>';	
					cols += '</select></td>';
					cols += '<td><input class="input-table-order calcPrice" onchange="javascript:valorTotal(this)"></td>';
					if ($(".tipoConta").val() == "integrador"){
							cols += '<td type="hidden" hidden><input type="hidden" class="input-table-order unitPrice totalUnit" readonly></td>';	
							} else {
							cols += '<td><input class="input-table-order unitPrice totalUnit" readonly></td>';	
					}	
					cols += '<td><input class="input-table-order unitTotal totalUnit" readonly></td>';
					cols += '<td type="hidden" hidden><input type="hidden" class="input-table-order row-total priceLiq" readonly></td>';
					cols += '<td type="hidden" hidden><input class="input-table-order margemTotal totalUnit" readonly></td>';					
					cols += '<td>';
					cols += '<a class="erase-line" onclick="javascript:valorTotal(this)" href="javascript:void(0)"><span class="mdi mdi-eraser" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:#163145;"></span></a>' + '<a class="remove-line" href="javascript:void(0)"><span class="mdi mdi-close" style="font-size: 25px;padding: 2px;position: relative;top:3px;color:red;"></span></a>';
					cols += '</td>';	
    
		//console.log("antes ajax");
		$.ajax({
          url: url,
          type: "POST",
          dataType: "jsonp",
          data: {
              action: "selectProduct",              
          },
          error: function() {
            console.log("Erro de Valor");
          },
          success: function(resp) {	
					console.log(resp);					
						
						$.each(resp.products, function(index, value) {								
								$("#"+linhas).append($("<option></option>").attr("value",value.id).text(value.name));
								$("#"+linhas).select3({});
							});
					}	
		});
		
    newRow.append(cols);
	
		$("#orderTable tbody").append(newRow);	
    return false;
}


function sleep(ms) {
  return new Promise(
    resolve => setTimeout(resolve, ms)
  );
}

 $("#fecharModal").on("click",function(e){	
	$("#myModal").hide();
   $(".modal-backdrop").hide();
});

$("#abrirsenha").on("click",function(e){
    $("#BrancoSenha").hide();
    $("#campoSenha").show();
    });
    $("#fecharpw").on("click",function(e){	
    $("#BrancoSenha").show();
    $("#campoSenha").hide();
    });
