<!doctype html>
<html lang="pt-BR">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?= APPURL . '/assets/img/main/logo-batcar-32x32.png' ?>" type="image/png">
        <title><?= site_settings("site_name") ?></title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/bootstrap.min.css'?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/font-awesome.min.css'?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/icomoon-icon/style.css'?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/themify-icon/themify-icons.css'?>">
 				<link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/owl-carousel/assets/owl.carousel.min.css'?>"
        <!-- Extra Plugin CSS -->

        <!-- main css -->
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/home.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/style.css?v=' . VERSION?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/responsive.css?v=' . VERSION?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/edit.css?v=' . VERSION?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/responsive-1.css?v=' . VERSION?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/footer-1.css' ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/car-list.css?v=' . VERSION?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/car-detail.css?v=' . VERSION?>">
			 <link rel="stylesheet" href="<?= APPURL . '/assets/css/slider.css?v=' . VERSION?>">
			 <link rel="stylesheet" href="<?= APPURL . '/assets/css/magnific-popup.css?v=' . VERSION?>">
			 <meta property="og:type" content="website">
				<meta property="og:title" content="<?= $Carro->get("nome") . " " . $Carro->get("ano_lancamento") . " batcar"?>">
				<meta property="og:description" content="<?= $Carro->get("descricao") ?>">
				<meta property="og:url" content="<?= APPURL . "/detalhes-carros/" . $Carro->get("id_carro") ?>">
				<meta property="og:image" content="<?= $Carro->get("foto_capa") ?>">
			 <?php $FotosCarro = json_decode($Carro->get("fotos_url"))?>
				<?php if($Carro->get("foto_unica") != 1): ?>
                           <?php for($i = 4; $i < 10; $i++):?>
                           <?php if(!empty($FotosCarro->IMAGE_URL_LARGE[$i])):?>
			<meta property="og:image" content="<?= $FotosCarro->IMAGE_URL_LARGE[$i] ?>">
                            <?php endif; ?>
                            <?php endfor; ?>
														<?php endif; ?>
			
			<meta property="product:brand" content="<?= $Carro->get("marca") ?>">		
			<meta property="product:availability" content="in stock">
			<meta property="product:condition" content="used">
			<?php if($Carro->get("preco_promocao") != '0.00'): ?>
			<meta property="product:price:amount" content="<?= $Carro->get("preco_promocao") ?>">
			<?php else: ?>
			<meta property="product:price:amount" content="<?= $Carro->get("valor_venda") ?>">
			<?php endif; ?>
			<meta property="product:price:currency" content="BRL">
			<meta property="product:fb_product_category" content="174">
			<meta property="product:retailer_item_id" content="<?= $Carro->get("id") ?>">
			<meta property="product:item_group_id" content="<?= $Carro->get("marca") . " batcar " . $Carro->get("id") ?>">
						<?php require_once(APPPATH.'/views/fragments/settings/google-analytics.fragment.php'); ?>
<style>
@media (max-width: 600px)
{
  #tamanhomodal
   {
    max-width:100% !important;
   }
}
</style>
        

    </head>
    <body data-scroll-animation="true">
			
			<?php require_once(APPPATH.'/views/fragments/settings/menu.fragment.php'); ?>
			
			<?php require_once(APPPATH.'/views/fragments/settings/custom.fragment.php'); ?>
        
      <?php require_once(APPPATH.'/views/fragments/detalhes-carros.fragment.php'); ?>
			
     	<?php require_once(APPPATH.'/views/fragments/settings/footer.fragment.php'); ?>
        
      
      
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
			 
        <script src="<?= APPURL . "/assets/js/jquery-3.4.1.min.js?v=" . VERSION ?>"></script>
			  <script src="<?= APPURL . "/assets/js/favorito.js?v=" . VERSION ?>"></script>
			  <script src="<?= APPURL . "/assets/js/popper.min.js?v=" . VERSION?>"></script>
        <script src="<?= APPURL ."/assets/js/bootstrap.min.js?v=" . VERSION?>"></script>
				<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="<?= APPURL . '/assets/js/detalhes.js?v=' . VERSION?>"></script>
        <script src="<?= APPURL . "/assets/js/custom.js?v=" . VERSION ?>"></script>

			
        <!-- Extra Plugin js -->
        <script src="<?= APPURL . "/assets/vendors/slick/slick.min.js?v=" . VERSION?>"></script>
        <script src="<?= APPURL ."/assets/vendors/datetimepicker/moment.js?v=" . VERSION?>"></script>
        <script src="<?= APPURL . "/assets/vendors/datetimepicker/tempusdominus-bootstrap-4.min.js?v=" . VERSION?>"></script>
        <script src="<?= APPURL."/assets/vendors/nice-select/js/jquery.nice-select.min.js?v=" . VERSION?>"></script>
        <script src="<?= APPURL. "/assets/vendors/owl-carousel/owl.carousel.min.js?v=" . VERSION?>"></script>
        <script src="<?= APPURL."/assets/vendors/isotope/imagesloaded.pkgd.min.js?v=" . VERSION?>"></script>
        <script src="<?= APPURL."/assets/vendors/isotope/isotope.pkgd.min.js?v=" . VERSION?>"></script>
        <script src="<?= APPURL . "/assets/js/magnific-popup.js?v=" . VERSION?>"></script>
        <script src="<?= APPURL. "/assets/vendors/animate-css/wow.min.js?v=" . VERSION?>"></script>
        <script src="<?= APPURL ."/assets/js/theme-dist.js?v=" . VERSION?>"></script>
			  <script>
$(document).ready(function() {
	$('.zoom-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">batcar</a>';
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});
});
			</script>
			
						<script>
      
      $(function () {
				

        //Check if required fields are filled
        function checkifreqfld() {
                var isFormFilled = true;
                $("#test-form").find(".form-checkfield:visible").each(function () {
                    var value = $.trim($(this).val());
                    if ($(this).prop('required')) {
                        if (value.length < 1) {
                          $(this).closest(".field-wrapper").addClass("field-error");
                          isFormFilled = false;
                        } else {
                          $(this).closest(".field-wrapper").removeClass("field-error");
                        }
                    } else {
                        $(this).closest(".field-wrapper").removeClass("field-error");
                    }
                });
                return isFormFilled;
          }


        //Show/Hide Message
        function showHideMsg(message,type){
          if(type == "success"){
            $("#message-wrap").addClass("success-msg").removeClass("error-msg");
          }else if(type == "error"){
            $("#message-wrap").removeClass("success-msg").addClass("error-msg");
          }

          $("#message-wrap").stop()
          .slideDown()
          .html(message)
          .delay(1500)
          .slideUp();
        }


        //Google Style InputFields
        $(".field-wrapper .field-placeholder").on("click", function () {
          $(this).closest(".field-wrapper").find("input").focus();
        });
				
        $(".field-wrapper input").on("keyup", function () {
          var value = $.trim($(this).val());
            if (value) {
              $(this).closest(".field-wrapper").addClass("hasValue");
            } else {
              $(this).closest(".field-wrapper").removeClass("hasValue");
            }
        });
      });
			</script>
			
    </body>
</html>
