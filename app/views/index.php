<!DOCTYPE html>
<style>
  body {
    background:#1d232b !important;
  }
</style>
<html lang="pt-BR">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			  <link rel="icon" href="<?= APPURL . '/assets/img/main/logo-batcar-32x32.png' ?>" type="image/png">
        <title><?= site_settings("site_name") ?></title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/bootstrap.min.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/font-awesome.min.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/icomoon-icon/style.css?v=' . VERSION ?>">
			  <meta name="google-site-verification" content="FvLK0zpK0XROIjfOKSRTJirUk50wx4xh71YSh_MH0NQ" />
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/datetimepicker/tempusdominus-bootstrap-4.min.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/nice-select/css/nice-select.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/owl-carousel/assets/owl.carousel.min.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/slick/slick-theme.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/slick/slick.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/animation/animate.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/popup/magnific-popup.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/vendors/animate-css/animate.css?v=' . VERSION ?>">
        
        <!-- main css -->
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/normalize.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/home.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/style.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/responsive.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/edit.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/responsive-1.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/car-list.css?v=' . VERSION ?>">
        <link rel="stylesheet" href="<?= APPURL . '/assets/css/footer-1.css?v=' . VERSION ?>">	
				<meta property="og:type" content="website">
				<meta property="og:title" content="batcar - 1ª Startup de intermediação de compra e venda de veículos on-line do Brasil">
				<meta property="og:description" content="A 1ª Startup de intermediação de compra e venda de veículos on-line do Brasil!">
				<meta property="og:url" content="<?= APPURL ?>">
				<meta property="og:image" content="<?= APPURL . '/assets/img/main/logo-batcar-32x32.png?v=' . VERSION ?>">		
				<?php require_once(APPPATH.'/views/fragments/settings/google-analytics.fragment.php'); ?>
    </head>
    <body data-scroll-animation="true" >
			
			<?php require_once(APPPATH.'/views/fragments/settings/menu.fragment.php'); ?>
			
			<?php require_once(APPPATH.'/views/fragments/settings/custom.fragment.php'); ?>
        
      <?php require_once(APPPATH.'/views/fragments/index.fragment.php'); ?>
			
     	<?php require_once(APPPATH.'/views/fragments/settings/footer.fragment.php'); ?>      
      
			<!-- Optional JavaScript -->
			<!-- jQuery first, then Popper.js, then Bootstrap JS -->
			<script src="<?= APPURL . '/assets/js/jquery-3.4.1.min.js?v=' . VERSION ?>"></script>
			<script src="<?= APPURL . '/assets/js/bootstrap.min.js?v=' . VERSION ?>"></script>
			<script src="<?= APPURL . '/assets/js/custom.js?v=' . VERSION ?>" ?>"></script>
			<script src="<?= APPURL . '/assets/js/custom.js?v=' . VERSION ?>"></script>

			<script src="assets/js/theme-dist.js"></script>
			<script>
				$(document).ready(function(){                
				 document.getElementsByClassName("want_buy_area_btns").style.width = "10000px";
				});
			</script>
    </body>
</html>
