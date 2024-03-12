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

        <!-- Extra Plugin CSS -->
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/datetimepicker/tempusdominus-bootstrap-4.min.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/nice-select/css/nice-select.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/owl-carousel/assets/owl.carousel.min.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/slick/slick-theme.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/slick/slick.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/animation/animate.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/popup/magnific-popup.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/animate-css/animate.css?v=' . VERSION ?>">
        <!-- main css -->
			  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/home.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/style.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/responsive.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/edit.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/responsive-1.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/footer-1.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/car-list.css?v=' . VERSION ?>">
       		<!--Botão whatsapp-->
				<?php require_once(APPPATH.'/views/fragments/settings/google-analytics.fragment.php'); ?>
				</head>
				<body data-scroll-animation="false">

			<?php require_once(APPPATH.'/views/fragments/settings/menu.fragment.php'); ?>
			
			<?php require_once(APPPATH.'/views/fragments/settings/custom.fragment.php'); ?>
        
      <?php require_once(APPPATH.'/views/fragments/lista-carros.fragment.php'); ?>
			
     	<?php require_once(APPPATH.'/views/fragments/settings/footer.fragment.php'); ?>
        
      
       <script src="<?= APPURL . "/assets/js/jquery-3.4.1.min.js" ?>"></script>
			  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script src="<?= APPURL . "/assets/js/favorito.js" ?>"></script>
		   <script src="<?= APPURL . "/assets/js/custom.js" ?>"></script>
			 <script src="<?= APPURL . "/assets/js/popper.min.js"?>"></script>
        <script src="<?= APPURL ."/assets/js/bootstrap.min.js"?>"></script>
			
        <!-- Extra Plugin js -->
				<script src="https://unpkg.com/@popperjs/core@2"></script>
   			<script src="https://unpkg.com/tippy.js@6"></script>
        <script src="<?= APPURL . '/assets/vendors/slick/slick.min.js?v=' . VERSION ?>"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js"></script>
        <script src="<?= APPURL .'/assets/vendors/datetimepicker/moment.js?v=' . VERSION ?>"></script>
        <script src="<?= APPURL . '/assets/vendors/datetimepicker/tempusdominus-bootstrap-4.min.js?v=' . VERSION ?>"></script>
        <script src="<?= APPURL.'/assets/vendors/nice-select/js/jquery.nice-select.min.js?v=' . VERSION ?>"></script>
        <script src="<?= APPURL. '/assets/vendors/owl-carousel/owl.carousel.min.js?v=' . VERSION ?>"></script>
        <script src="<?= APPURL.'/assets/vendors/isotope/imagesloaded.pkgd.min.js?v=' . VERSION ?>"></script>
        <script src="<?= APPURL.'/assets/vendors/isotope/isotope.pkgd.min.js?v=' . VERSION ?>"></script>
        <script src="<?= APPURL . '/assets/vendors/popup/jquery.magnific-popup.min.js?v=' . VERSION ?>"></script>
        <script src="<?= APPURL. '/assets/vendors/animate-css/wow.min.js?v=' . VERSION ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="<?= APPURL .'/assets/js/theme-dist.js?v=' . VERSION ?>"></script>
				<script src="<?= APPURL .'/assets/js/lista-carros.js?v=' . VERSION ?>"></script>
			
				<script>
					$(function(){
    $(".real").keyup(function(e){
        $(this).val(format($(this).val()));
    });
});
					
					var format = function(num){
    var str = num.toString().replace("R$", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
        if(str[j] != ",") {
            output.push(str[j]);
            if(i%3 == 0 && j < (len - 1)) {
                output.push(",");
            }
            i++;
        }
    }
    formatted = output.reverse().join("");
    return("R$" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};
					if ( window.history.replaceState ) {
							window.history.replaceState( null, null, window.location.href );
					}		


				</script>
			
    </body>
</html>
