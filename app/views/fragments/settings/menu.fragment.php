<!-- <div class="preloader">
	<div class="main-loader">
		<span class="loader1"></span>
		<span class="loader2"></span>
		<span class="loader3"></span>
	</div>
</div>  -->

        <!--================Header Area =================-->
        <header class="header_area menu_two">
           <div class="main_menu">
             <div class="mini_menu_container" style="background:#171b21;height:30px;">
             <div class="container">
              <div class="top_menu_inner d-flex justify-content-between menu_line_container" style="flex-direction:row;height:30px;">
        				<div class="left">
<!--         					<text style="font-size:13px;"><i style="color:white;" class="icon-clock"></i><b> Segunda à Sexta</b> 08:30h - 19:00h</text>
                  <text style="font-size:13px;"><b>/ Sábados:</b> 09:00h - 14:00h</text> -->
        				</div>
        				<div class="right" style="color:white;">
        					<a target="_blank" style="margin-right:15px;font-size:14px;font-weight:700;color:white;" href="https://www.facebook.com/Batcar-109849878303156">
                   <img width="11px" src="<?= APPURL . "/assets/icon/facebook.svg" ?>" >
                  </a>
                  <a target="_blank" style="margin-right:15px;font-size:14px;font-weight:700;color:white;" href="https://www.instagram.com/batcar/">
                   <img width="16px" src="<?= APPURL . "/assets/icon/instagram.svg" ?>" >
                  </a>
                  <a target="_blank" style="margin-right:15px;font-size:14px;font-weight:700;color:white;" href="https://www.youtube.com/channel/UCtvKlI_Cnedbhmm4o2XM2mA/featured">
                   <img width="22px" src="<?= APPURL . "/assets/img/main/social/youtube-mobile.svg" ?>" >
                  </a>
                  <a class="pixelWhats" target="_blank" style="margin-right:15px;font-size:19px;font-weight:700;color:#07e676;position:relative;top:3px;" href="https://wa.me/+556140428000">
                   <i class="fa fa-whatsapp"></i>
                  </a>
        				</div>
        			</div>
             </div>
             </div>
            <div class="container h_container">
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
<!-- 								<?php if(!$Index): ?>
                <a class="only_mobile" href="javascript:history.back()" href="<?= APPURL . '/'?>"><img src="<?=APPURL . '/assets/img/icon/icon-forward.png'?>"  alt="bar"></a>
								<?php endif; ?> -->
                <a class="navbar-brand"  href="<?= APPURL . '/'?>"><img style="padding-left:17px !important" src="<?=APPURL . '/assets/img/main/logo-topbar.svg'?>" srcset="<?=APPURL . '/assets/img/main/logo-topbar.svg'?>" alt="bar"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                </button>
                  <div class="nav_bg">
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="z-index:99;">
                  <ul class="nav navbar-nav menu_nav" style="flex-wrap: inherit;">
                    <li class="dropdown submenu">
                      <a id="sd" class="dropdown-toggle" data-toggle="dropdown" href="<?= APPURL . '/lista-carros'?>" role="button" aria-haspopup="true" aria-expanded="false"><span class="activeline"></span>Comprar</a>
                    </li>
                    <li class="dropdown submenu">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="<?= APPURL . '/como-vender'?>" role="button" aria-haspopup="true" aria-expanded="false"><span class="activeline"></span>Vender</a>
                    </li>
                    <li class="dropdown submenu">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="<?= APPURL . '/como-funciona'?>" role="button" aria-haspopup="true" aria-expanded="false"><span class="activeline"></span>Como Funciona</a>
                    </li>
                    <li class="dropdown submenu">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="<?= APPURL . '/perguntas-frequentes'?>" role="button" aria-haspopup="true" aria-expanded="false"><span class="activeline"></span>Dúvidas</a>
                    </li>
                    <li><a href="<?= APPURL . '/contato'?>"><span class="activeline"></span>Contato</a></li>
                  </ul> 
                  <div class="menu_mobile_atendimento_content">
                   <div class="footer_main_atendimento_card" style="background:transparent;">
                    <div class="main_atendimento_content">
                     <span style="width:max-content;"><img src="<?=APPURL . '/assets/icon/telefone.svg'?>"><p style="display:inline;margin-left: 5px;">Atendimento</p></span>
                     <p style="display:none;"></p>
                     <p>(61) 4042-8000</p>
                     <p>Segunda a sexta, das 8h30 às 18:30h Sábado, das 9h às 14h</p>
                   </div>
                   <div class="main_others_medias" style="align-self: center;">
                    <div class="main_others_media_content">
                      <a class="search" href="#"><img src="<?= APPURL . "/assets/icon/facebook.svg" ?>" ></a>
                      <a class="search" href="#"><img src="<?= APPURL . "/assets/icon/instagram.svg" ?>" ></a>
                      <a class="search" href="#"><img style="width:32px" src="<?= APPURL . "/assets/img/main/social/youtube-mobile.svg" ?>" ></a>
                      <a class="pixelWhats" target="_blank" style="margin-right:15px;font-size:19px;font-weight:700;color:#07e676;position:relative;top:3px;" href="https://wa.me/+556140428000"><i style="font-size:25px;" class="fa fa-whatsapp"></i></a>
                    </div>
                   </div>
                   <div class="main_others_copy">
                    <p>Política de Privacidade e Termos de Uso - 44.285.354/0001-03</p>
                   </div>
                 </div>
                  </div>
                  <ul class="nav navbar-nav navbar-right navbar-right-mobile" style="flex-wrap: inherit;">
                    <li>
                       <button onClick="menu()" style="background:transparent;" id="lojas" class="list_filter_btn_box col-lg-2 col-sm-2 lojas  " type="button" data-id="0" data-element="#enderecosLoja">
                          <div class="list_filter_btn_content">
                            <text >Lojas </br></text>
                          </div>
                         </button>
                    </li>
                     <div class="search_icon box_atendimento_3">
                      <span>
                          <a class="pixelWhats" style="font-size:16px;" href="https://wa.me/+556140428000">(61) 4042-8000</a>
                      </span>
                    </div>
                  </ul>
                  <div  class="header_lojas_area lojadiv"   id="enderecosLoja" style=" position: absolute;inset: 0px auto auto 0px;margin: 0px;
                                                                       transform:translate(815.24px, 90.7647px);background: #1d232b; display: flex;
                                                                        flex-direction: column;border-radius:10px; padding: 10px; display:none;" >
                    <div class="header_lojas_content" style="margin-bottom:10px;color:white;">
                      <div class="" style="display:block;">
                        <span style="font-family:'Gotham Bold',system-ui;font-size:18px;">Loja SIA</span>
                       
                      </div>
                      <div class="header_lojas_text" style="display:block;line-height:16px;">  
                         <text style="font-size:15px;display:block;font-weight:300">Sia - Trecho 1, Lote 10/20 - Posto EPTG</text>
                         <text style="margin-bottom:0;font-size:13px;display:block;font-weight:300">Segunda a Sexta: 8h30 às 18:30</text>
                         <text style="font-size:13px;display:block;font-weight:300">Sábado: 9h às 14h</text>
                      </div>
                      <div class="" style="margin-top: 10px;text-align:center;width:100%">
                        <button class="btn_lojas"> <a href="https://www.google.com/maps/place/Batcar/@-14.1219252,-53.1897433,5z/data=!4m9!1m2!2m1!1sbatcar+veiculos!3m5!1s0x935a312c607beb71:0x9d91f9942f652b1d!8m2!3d-15.808822!4d-47.9522849!15sCg9iYXRjYXIgdmVpY3Vsb3NIvLeBiPe1gIAIWhEiD2JhdGNhciB2ZWljdWxvc2IJCd-Qg4OLi3UCkgEPdXNlZF9jYXJfZGVhbGVy"
                           style="text-align:center;">Google Maps <i style="margin: 0px 5px;" class="icon-map_marker_2"></i></a></button>
                        <button class="btn_lojas"> <a href="https://www.google.com/maps/place/Batcar/@-14.1219252,-53.1897433,5z/data=!4m9!1m2!2m1!1sbatcar+veiculos!3m5!1s0x935a312c607beb71:0x9d91f9942f652b1d!8m2!3d-15.808822!4d-47.9522849!15sCg9iYXRjYXIgdmVpY3Vsb3NIvLeBiPe1gIAIWhEiD2JhdGNhciB2ZWljdWxvc2IJCd-Qg4OLi3UCkgEPdXNlZF9jYXJfZGVhbGVy"
                           style="text-align:center;">Waze <img width="20px" height="20px" src="https://img.icons8.com/windows/32/000000/waze.png"/></a></button>
                      </div>
                    </div>
                     <div class="header_lojas_content" style="margin-bottom:10px;color:white;">
                      <div class="" style="display:block;">
                        <span style="font-family:'Gotham Bold',system-ui;font-size:18px;">Loja Lago Sul</span>
                       
                      </div>
                      <div class="header_lojas_text" style="display:block;line-height:16px;">  
                         <text style="font-size:15px;display:block;font-weight:300">SHIS QI 3 LOTE 03/05, Posto SANTA COMAR VI</text>
                         <text style="margin-bottom:0;font-size:13px;display:block;font-weight:300">Segunda a Sexta: 8h30 às 18:30</text>
                         <text style="font-size:13px;display:block;font-weight:300">Sábado: 9h às 14h</text>
                      </div>
                      <div class="" style="margin-top: 10px;text-align:center;">
                        <button class="btn_lojas"> <a href="https://www.google.com/maps/place/Batcar/@-14.1219252,-53.1897433,5z/data=!4m9!1m2!2m1!1sbatcar+veiculos!3m5!1s0x62ea178eb5e199db:0x73017c581867238a!8m2!3d-15.8581871!4d-47.9118278!15sCg9iYXRjYXIgdmVpY3Vsb3NI9rO-1_a1gIAIWhEiD2JhdGNhciB2ZWljdWxvc2IJCYFetBnayjkdkgEPdXNlZF9jYXJfZGVhbGVymgEkQ2hkRFNVaE5NRzluUzBWSlEwRm5TVU15TVV4SVJWOW5SUkFC"
                           style="text-align:center;">Google Maps <i style="margin: 0px 5px;" class="icon-map_marker_2"></i></a></button>
                        <button class="btn_lojas"> <a href="https://www.google.com/maps/place/Batcar/@-14.1219252,-53.1897433,5z/data=!4m9!1m2!2m1!1sbatcar+veiculos!3m5!1s0x62ea178eb5e199db:0x73017c581867238a!8m2!3d-15.8581871!4d-47.9118278!15sCg9iYXRjYXIgdmVpY3Vsb3NI9rO-1_a1gIAIWhEiD2JhdGNhciB2ZWljdWxvc2IJCYFetBnayjkdkgEPdXNlZF9jYXJfZGVhbGVymgEkQ2hkRFNVaE5NRzluUzBWSlEwRm5TVU15TVV4SVJWOW5SUkFC"
                           style="text-align:center;">Waze <img width="20px" height="20px" src="https://img.icons8.com/windows/32/000000/waze.png"/></a></button>
                      </div>
                    </div>

                  </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </header>
        <!--================End Footer Area =================-->



