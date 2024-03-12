<style>.results_car_list_options_icons li {
font-family: inherit;
	}
</style>
<!--================Product Area =================-->
        <section class="main_product_area p_20 main_product_area_bg">
        	<div class="container">
        		<div class="row main_product_inner flex-row-reverse main_product_inner_shopcar_mb">
        			<div class="col-lg-12">
        				<div class="car_found d-flex justify-content-between border-none">
        					<div class="car_list_filter_section">
                    </div>
                    <div class="car_list_filter_box col-xl-12 col-lg-12 col-sm-12">
                      <div class="car_list_filter_icons">
												<?php if($fav != 1): ?>
												<form action="<?=APPURL . "/lista-carros"?>" method="POST">
                            <input type="hidden" name="action" value="buscaFavorito">
                            <div class="car_list_filter_arrow">
                                  <div class="input-group-append">
                                  <button style="font-family:auto;" class="btn btn_search_filter" type="submit" id="button-addon2"><i class="icon-heart1"></i></button>
                                </div>
                            </div>   
												</form>
												<?php else: ?>
												<form class="" action="<?=APPURL . "/lista-carros"?>" method="POST">
                            <input type="hidden" name="action" value="listarCarros">
                        <div class="car_list_filter_arrow">
                              <div class="input-group-append">
										          <button style="font-family:auto;" class="btn btn_search_filter" type="submit" id="button-addon2"><i class="icon-heart"></i></button>
									          </div>
                        </div>   
											</form>
												<?php endif; ?>
												
                      </div>
                      <div class="car_list_filter_line">
                        <span></span>         
                      </div>
                      <div class="car_list_filter_results_box">
                        <div class="car_list_filter_results_number" id="qntCarros">
                          <b style="font-family:'Gotham Light', sans-serif;"><?= $QtdCarros ?></b>
                        </div>
                        <div class="car_list_filter_msg_box">
                        <text style="font-family:'Gotham Light', system-ui;">Veículos Encontrados</text>
                        </div>
                         <div class="search_car_box">
													<form id="buscaCarros" action="<?=APPURL . "/lista-carros"?>" method="POST">
                            <input type="hidden" name="action" value="pesquisar">
                          <div class="search_car_box_content input-group">
                            <input style="font-family:'Gotham Light', system-ui; z-index:9;" name="pesquisar" id="pesquisar" class="form-control filtroJS" data-target="nome" placeholder="Digite o que deseja buscar" >
                            <div class="input-group-append">
									          </div>
                          </div>
														</form>
                        </div>
                      </div>
                     </div>
										<div class="car_list_section_ordenation">
												<div class="menu-container">
													<ul class="vertical-nav open-button">
														<input type="hidden" name="ordenacao" class="ordenacao" id="inputOrdenacao" value="recentes">
														<li>
															<a onclick="menufiltro()"  style="display:inline-block;font-size:14px" href="javascript:void(0)"><span id="orderPrincipal"><?= $filt != null ? "Menor Preço" : "Mais Recentes" ?></span><i style="position:relative; left:5px !important;" ><img src="<?= APPURL. "/assets/img/main/icon-arrow-down.png" ?>"></i></a>
															<div class="hover-menu"> 
																<ul>
																<li>																														
																	<button id="orderMenorPreco" data-taget="valor_venda" class=" botaoOrdenacao" data-name="Menor Preço" data-value="menor_preco" style="font-size:13px;border:none; background-color:transparent; color:#fff">
																		Menor Preço
																	</button>																	
																	</li>
																	<li>																																
																		<button id="orderMaiorPreco" data-taget="valor_venda" class=" botaoOrdenacao" data-name="Maior Preço" data-value="maior_preco" style="font-size:13px;border:none; background-color:transparent; color:#fff">
																			Maior Preço
																		</button>																		
																	</li>	
																	<li>																																	
																		<button id="orderRecentes" data-taget="ultima_altualizacao_api" class="filtroJS botaoOrdenacao" data-name="Mais Recentes" data-value="recentes"  style="font-size:13px;border:none; background-color:transparent; color:#fff">
																			Mais Recentes
																		</button>
																	</li>																	
																	<li>																															
																		<button id="orderKm" data-taget="km_rodados" class="filtroJS botaoOrdenacao" data-name="Menor KM" data-value="km" style="font-size:13px;border:none; background-color:transparent; color:#fff">
																			Menor KM
																		</button>																		
																	</li>
																	<li>																																		
																		<button id="orderAno" data-taget="ano_lancamento" class="filtroJS botaoOrdenacao" data-name="Ano mais novo" data-value="ano" style="font-size:13px;border:none; background-color:transparent; color:#fff">
																			Ano mais novo
																		 </button>																
																	</li>		
																</ul>
															</div>
														</li>
													</ul>
												</div>
										</div>
									
									
              <div class="col-lg-12 hidden_show " style="margin-top: -40px; padding-left:0px; padding-right:0px;position:relative;top:-35px;">
              <button onClick="menu2()" id="lojas2"  style="z-index:9" class="list_filter_btn_box list_filter_mobile col-lg-2 col-sm-2 lojas" type="button" data-id="0" >
                <div class="list_filter_btn_content">
                  <img src="<?= APPURL. '/assets/icon/icon-loja.svg'?>">
                  <text>Lojas</text>
                </div>
                  
               </button>
              
              <!--   lojas             -->
                  <div  class="header_lojas_area lojadiv2"   id="enderecosLoja" style=" position: absolute;inset: 0px auto auto 0px;margin: 0px;
                                                                       transform:translate(0px, 20.75px);background: #1d232b; display: flex;
                                                                        flex-direction: column;border-radius:10px; padding: 10px; display:none;z-index:9;" >
                    <div class="header_lojas_content" style="margin-bottom:10px;color:white;">
                      <div class="" style="display:block;">
                        <span style="font-family:'Gotham Bold',system-ui;font-size:18px;">Loja SIA</span>
                       
                      </div>
                      <div class="header_lojas_text" style="display:block;line-height:16px;">  
                         <text style="font-size:15px;display:block;font-weight:300">Sia - Trecho 1, Lote 10/20 - Posto EPTG</text>
                         <text style="margin-bottom:0;font-size:13px;display:block;font-weight:300">Segunda a Sexta: 8h30 às 19:00</text>
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
                         <text style="margin-bottom:0;font-size:13px;display:block;font-weight:300">Segunda a Sexta: 8h30 às 19:00</text>
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
              
              <div class="shopcar_midia_mobile col-sm-3">
                <a class="pixelWhats" href="https://wa.me/+556140428000"><img src="<?= APPURL. '/assets/img/main/social/wpp-mobile.svg'?>"></a>
                <a href="https://www.facebook.com/Batcar-109849878303156"><img src="<?= APPURL. '/assets/img/main/social/facebook-mobile.svg'?>"></a>
                <a href="https://www.instagram.com/batcar/"><img src="<?= APPURL. '/assets/img/main/social/instagram-mobile.svg'?>"></a>
                <a href="https://www.youtube.com/channel/UCtvKlI_Cnedbhmm4o2XM2mA/featured"><img src="<?= APPURL. '/assets/img/main/social/youtube-mobile.svg'?>"></a>
              </div>
          </div>
                  </div>
        				</div>
                     <div class="row col-12 col-lg-12 col-md-12 col-sm-12" style="padding-left: 0;">
                       <div class="col col-lg-3 col-sm-12 col-xl-3">
									      <form class="" id="form_filtro" action="<?=APPURL . "/lista-carros"?>" method="POST">
                            <input type="hidden" name="action" value="filtro">
											      <div class="filtrosD">
                              <div class="first_filter_mobile" id="first_filter">
															 <div class="clearfix mb-20 filter_left_mobile">
																 
																 		<div class="row" style="margin-bottom: -20px;">
																			 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                  	
																				 <div class="filtro filtro_mobile">
                                           <div OnClick="reset();" class="btn-filtros" style="margin-top:10px;display:block;">
                                             <a href="javascript:void(0)" id="resetFilter">X Limpar fitros</a>
                                           </div>
																						<label style="color:#fff">Marca</label>
																				       <select style="width:100%" id="marca" name="marca" class="filtroJS" data-target="marca">
                                                <option class="form-control" value="" selected>Selecione</option>
				                                      <?php foreach($Marcas->getDataAs("Marca") as $m): ?>
                                                 <option value="<?= $m->get("nome") ?>"><?= ucfirst(strtolower($m->get("nome"))) ?></option> 
                                               <?php endforeach; ?> 
                                               </select> 
																				  </div>
																			   </div>
                                      </div>		
																      <div class="row" style="margin-bottom: -20px;">
																			 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																				 <div class="filtro filtro_mobile">
																						<label style="color:#fff;margin-top:21px;">Modelo</label>
																				       <select style="width:100%" id="modelo" name="modelo" class="filtroJS" data-target="modelo">
                                                <option class="form-control" value="" selected>Selecione</option>
                                               </select> 
																				  </div>
																			   </div>
                                      </div>
                                </div>
                                <div class="extra_filter_mobile" id="extra_filter">
																		 <div class="row" style="margin-bottom: -20px;">
																			 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																				 <div class="filtro filtro_mobile">
																						<label class="label-block" style="color:#fff;margin-top:21px;">Ano</label>
																				       <select  style="margin-right:2.5px;" id="anode" name="anode" class="form-inline filtroJS" data-target="ano_lancamento" data-value="de">                                                
																								<option class="form-control" value="" selected>De</option>
																							 	<option class="form-control" value="2006">2006</option>
																								<option class="form-control" value="2007">2007</option>
																								<option class="form-control" value="2008">2008</option>
																								<option class="form-control" value="2009">2009</option>
																								<option class="form-control" value="2010">2010</option>
																								<option class="form-control" value="2011">2011</option>
																								<option class="form-control" value="2012">2012</option>
																								<option class="form-control" value="2013">2013</option>
																								<option class="form-control" value="2014">2014</option>
																								<option class="form-control" value="2015">2015</option>
																								<option class="form-control" value="2016">2016</option>
																								<option class="form-control" value="2017">2017</option>
																								<option class="form-control" value="2018">2018</option>
																								<option class="form-control" value="2019">2019</option>
																								<option class="form-control" value="2020">2020</option>
																								<option class="form-control" value="2021">2021</option>
																								<option class="form-control" value="2022">2022</option> 
																								<option class="form-control" value="2023">2023</option>
                                               </select> 
                                               <span class="form-line"></span>
                                               <select style="margin-left:2.5px;" id="anoate" name="anoate" class="form-inline filtroJS" data-target="ano_lancamento" data-value="ate">
                                                
																								<option class="form-control" value="" selected>Até</option>
                                                <option class="form-control" value="2006">2006</option>
																								<option class="form-control" value="2007">2007</option>
																								<option class="form-control" value="2008">2008</option>
																								<option class="form-control" value="2009">2009</option>
																								<option class="form-control" value="2010">2010</option>
																								<option class="form-control" value="2011">2011</option>
																								<option class="form-control" value="2012">2012</option>
																								<option class="form-control" value="2013">2013</option>
																								<option class="form-control" value="2014">2014</option>
																								<option class="form-control" value="2015">2015</option>
																								<option class="form-control" value="2016">2016</option>
																								<option class="form-control" value="2017">2017</option>
																								<option class="form-control" value="2018">2018</option>
																								<option class="form-control" value="2019">2019</option>
																								<option class="form-control" value="2020">2020</option>
																								<option class="form-control" value="2021">2021</option>
																								<option class="form-control" value="2022">2022</option> 
																								<option class="form-control" value="2023">2023</option>
																						    </select> 
																				  </div>
																			   </div>
                                      </div>
                                      
																 		 <div class="row">
																			 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																				 <div style="margin-top:20px;"class="filtro filtro_mobile">
																						<label class="label-block" style="color:#fff">Preço</label>
														               	<input style="margin-right:2.5px;font-size: 12px;padding: none !important" value="" placeholder="De" type="text" onkeyup="onlynumberfull()" class="real form-control form-inline filtroJS" id="precode" name="precode" data-target="valor_venda" data-value="de"> 
                                            <span class="form-line"></span>
															              <input style="margin-left:2.5px;font-size: 12px;padding: none !important" value="" placeholder="Até"  type="text"onkeyup="onlynumberfull()" class="real form-control form-inline filtroJS" id="precoate" name="precoate" data-target="valor_venda" data-value="ate">
                                         </div>
																			   </div>
                                       </div>

																   		 <div class="row">
																			  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																				 <div class="filtro filtro_mobile">
																						<label class="label-block" style="color:#fff">Km</label>
														               	<input style="margin-right:2.5px;" onkeypress="numberWithCommas();" placeholder="De" type="text" class="form-control form-inline filtroJS" id="kmde" name="kmde" data-target="km_rodados" data-value="de">
                                           <span class="form-line"></span>
                                           <input style="margin-left:2.5px;" onkeypress="numberWithCommas();" placeholder="Até" type="text" class="form-control form-inline filtroJS" id="kmate" name="kmate" data-target="km_rodados" data-value="ate">
																				  </div>
																			  </div>
                                       </div>

																   		 <div class="row">
																			 <div class="col-xl-12 col-lg12 col-md-12 col-sm-12 col-12">
																				 <div class="filtro filtro_mobile">
																						<label style="color:#fff">Câmbio</label>
																				       <select style="width:100%" id="cambio" name="cambio" class="filtroJS" data-target="tipo_marcha" >
                                                <option class="form-control" value="" selected>Selecione</option>
																								<option class="form-control" value="" >Todos</option>
																								<option class="form-control" value="automatica"  >Automática</option>
																								<option class="form-control" value="manual"  >Manual</option>
																								<option class="form-control" value="cvt"  >Cvt</option>
                                               </select> 
																				  </div>
																			   </div>
																			 </div>
																       <div class="row">
																			 <div class="col-xl-12 col-lg12 col-md-12 col-sm-12 col-12">
																				 <div class="filtro filtro_mobile">
																						<label style="color:#fff">Combustível</label>
																				       <select style="width:100%" id="combustivel" name="combustivel" class="filtroJS" data-target="combustivel"> 
                                                <option class="form-control" value="" selected>Selecione</option>]
																								 <option class="form-control" value="" >Todos</option>
															                  <?php foreach($ArrayCombustivel as $combustivel): ?>
																								 <option class="form-control" value="<?= $combustivel['combustivel'] ?>"  ><?= ucfirst(strtolower($combustivel['combustivel'])) ?></option>
																								 <?php endforeach; ?>
                                               </select> 
																				  </div>
																			   </div>
																			 </div>
																       <div class="row">
																			 <div class="col-xl-12 col-lg12 col-md-12 col-sm-12 col-12">
																				 <div class="filtro filtro_mobile">
																						<label style="color:#fff">Cor</label>
																				       <select style="width:100%" id="cor" name="cor" class="filtroJS" data-target="cor">
                                                <option class="form-control" value="" selected>Selecione</option>
																								<option class="form-control" value="" >Todas</option>
																						    <?php foreach($ArrayCor as $cor): ?>
																								 <option class="form-control" value="<?= $cor['cor'] ?>"  ><?= ucfirst(strtolower($cor['cor'])) ?></option>
																								 <?php endforeach; ?>
                                               </select> 
																				  </div>
																			   </div>
																			 </div>
																 		   <div class="row">
																			 <div class="col-xl-12 col-lg12 col-md-12 col-sm-12 col-12">
																				 <div class="filtro filtro_mobile">
																						<label style="color:#fff">Categoria</label>
																				       <select style="width:100%"  id="categoria" name="categoria" class="filtroJS" data-target="tipo_carro">
                                                <option class="form-control" value="" selected hidden disabled>Selecione</option>
																						     <option class="form-control" value="" >Todas</option>
																								 <?php foreach($ArrayModelo as $modelo): ?>
																								 <option class="form-control" value="<?= $modelo['modelo'] ?>"  ><?= ucfirst(strtolower($modelo['modelo'])) ?></option>
																								 <?php endforeach; ?>
                                               </select> 
																				  </div>
																			   </div>
																			 </div>
                                      

																 			  <div class="row">
																			 <div class="col-xl-12 col-lg12 col-md-12 col-sm-12 col-12" style="text-align:left;">
																				 <div class="filtro">
																						<label style="color:#fff">Opcionais</label>
																					  </div>
																					 <div id="filtroscar" class="row">
																					<div class=" custom-checkbox col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																						<text style="color:#fff"><input  style="color:#fff" placeholder="" value="7 lugares" type="checkbox" class="acessorios filtroJS" id="7 lugares"  name="acessorio" data-target="acessorios">
																							   7 Lugares
																						 </text>
																							 </div>																						
																						 <?php $Acessorios = array_slice($acessorios, 0, 5, true); ?>
																						 <?php foreach($Acessorios as $key => $ac): ?>
																					 <div class=" custom-checkbox col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																						 
																						<text style="color:#fff"><input  style="color:#fff" placeholder="Até"  value="<?= $ac ?>" type="checkbox" class="acessorios filtroJS" id="<?= $ac ?>" name="<?= "acessorio"  ?>" data-target="acessorios">
																							   <?= ucfirst($ac) ?> 
																						 </text>
																							 </div>
																						 <?php endforeach; ?>
																					<?php $Acessorios2 = array_slice($acessorios, 5, 150, true); ?>
																					<div class="extra_filter">
																					<?php foreach($Acessorios2 as $key => $a): ?>
																						<?php if($a == "teto solar panoramico"): ?>
																						 																					<div class=" custom-checkbox col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																						<text style="color:#fff"><input  style="color:#fff" placeholder="" value="teto solar" type="checkbox" class="acessorios filtroJS" id="teto solar"  name="acessorio" data-target="acessorios">
																							   Teto Solar
																						 </text>
																							 </div>
																						<?php endif ?>
																   			 <div class=" custom-checkbox col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																						 
																						<text style="color:#fff"><input  style="color:#fff" placeholder="Até"  value="<?= $a ?>" type="checkbox" class="acessorios filtroJS" id="<?= $a ?>" name="<?= "acessorio"  ?>" data-target="acessorios">
																							   <?= ucfirst($a) ?> 
																						 </text>
																							 </div>
																					<?php endforeach; ?>	
																						 </div>	 
																	<div class="btOpcionais">
                                   <div class="btnver btn-filtros" id="btver">
                                      <a href="javascript:void(0)" id="btvermais" onClick="vermais()" style=" color:#1D232B; right:0px; font-size:11px" >Ver mais opcionais</a>
                                    </div>
                                    <div class="btnmenos btn-filtros" id="btmenos">
                                      <a href="javascript:void(0)" id="btvermenos" onClick="vermenos()" style=" color:#1D232B; right:0px; font-size:11px" >Ver menos opcionais</a>
                                    </div>		
                                  </div> 
																					 </div>
																			   </div>
																			 </div>
																	</div>
						                </div>
                              </div>
													   <div class="btnver_mobile btn-filtros" id="btver_mobile">
														<a href="javascript:void(0)" id="btvermais_mobile" onClick="vermaisMobile()" style="color:#1D232B; padding-left:4px;" >Ver mais filtros</a>
													</div>
                          <div class="btnmenos_mobile btn-filtros" id="btmenos_mobile">
														<a href="javascript:void(0)" id="btvermenos_mobile" onClick="vermenosMobile()" style="color:#1D232B; padding-left:4px" >Ver menos filtros</a>
													</div>
											     
                                   
                    
					  				</form>
                   </div>
										<?php if($fav == 1): ?>
										 <div  id="divcarros" class="overflow-auto col-lg-9 col-md-9 col-sm-9 col-xl-9 results_flex">
									<?php foreach($carros as $c): ?>
										<div class="col-lg-4 col-md-4 col-sm-12 margin_full wow animated fadeInUp " style="display:inline-block;" data-wow-delay="0.0s">
											<div class="results_car_list_content">
                        <div style="background:linear-gradient(180deg, rgba(2, 2, 2, 0) 100%, rgba(0, 0, 0, 0.6) 100%), url(<?= $c['foto_capa']  ?>);"  class="results_car_list_content_img">
                          <div class="results_car_list_content_options">
											     <?php $QTD = favorito($c['id_carro'] ,$_COOKIE['PHPSESSID']); ?>
													 <?php if($QTD != 0): ?>
													<div id="<?= "list".$c['id'] ?>" class="list" >
														<a href="javascrip:void(0)" onMouseOver="changeFav()"  style="font-size: 0px;" class="<?= "favorito". $c['id']  ?>"><?= $c['id']  ?><img class="icon_heart_pos" src="<?= APPURL . '/assets/img/main/icon_heart_favorite_p.png'?>"></a>
														<input type="hidden" id="<?= "idcarro".$c['id']  ?>" value="<?= $c['id_carro'] ?>">
														<input type="hidden" id="<?= "cookie".$c['id'] ?>" value="<?= $_COOKIE['PHPSESSID'] ?>">
                          </div>
														<?php else: ?> 
													<div  id="<?= "list".$c['id']  ?>" class="list">
														<a href="javascrip:void(0)" onMouseOver="changeFav()"  style="font-size: 0px;" class="<?= "favorito". $c['id']  ?>"><?= $c['id'] ?><img class="icon_heart_pos" src="<?= APPURL . '/assets/img/main/icon_heart_favorite.png'?>"></a>
														<input type="hidden" id="<?= "idcarro".$c['id'] ?>" value="<?= $c['id_carro']  ?>">
														<input type="hidden" id="<?= "cookie".$c['id'] ?>" value="<?= $_COOKIE['PHPSESSID'] ?>">
														</div>
														<?php endif; ?> 
														<ul class="results_car_list_options_icons">
										  		<?php  if (strpos($c['descricao'], 'ano de garantia') !== false): ?>
                              <li style="background-color:#0094f400" data-toggle="tooltip" data-placement="top" title="1 ano de garantia"><img  height='39' width='39'  src="<?= APPURL. '/assets/img/main/garantia.png'?>"></li>
													<?php endif; ?>
													<?php  if (strpos($c['descricao'], 'garantia de fabrica') !== false): ?>
                              <li style="background-color:#0094f400" data-toggle="tooltip" data-placement="top" title="Garantia de Fábrica"><img  height='39' width='39'  src="<?= APPURL. '/assets/img/main/fabrica.svg'?>"></li>
													<?php endif; ?>	
													<?php  if (strpos($c['descricao'], 'garantia de fabrica') == false && strpos($c['descricao'], 'ano de garantia') == false ): ?>
                              <li style="background-color:#0094f4" data-toggle="tooltip" data-placement="top" title="Veiculo de Procedência"><img height='39' width='39'  src="<?= APPURL. '/assets/img/main/procedencia.svg'?>"></li>
													<?php endif; ?>	
		                       <?php  if (strpos($c['descricao'], 'ipva') !== false): ?>
                              <li  style="background-color:#0094f400" data-toggle="tooltip" data-placement="top" title="IPVA 2023 Grátis"><img  height='39' width='39' src="<?= APPURL. '/assets/img/main/ipva.svg'?>"></li> 
													<?php endif; ?>	
								          <?php  if (strpos($c['descricao'], 'transferencia') !== false): ?>
                              <li  style="background-color:#0094f400" data-toggle="tooltip" data-placement="top" title="Transferência grátis"><img h height='39' width='39'  src="<?= APPURL. '/assets/img/main/transferencia.svg'?>"></li> 
													<?php endif; ?>	
											    <?php  if (strpos($c['combustivel'], 'eletrico') !== false): ?>
                              <li  style="background-color:#0094f400" data-toggle="tooltip" data-placement="top" title="Veículo Elétrico"><img height='39' width='39'   src="<?= APPURL. '/assets/img/main/eletrico.svg'?>"></li> 
													<?php endif; ?>	
                        </ul>		
                            </ul>
														
                          </div>
                        </div>
												  <?php if($c['preco_promocao']  != "0.00"): ?>                   
                        <div  class="results_car_list_info_box">
													<a  target="_blank" href="<?= APPURL. "/detalhes-carros/" .$c['id_carro'] ?>">
                          <div class="car_list_info_title">
                            <h6><?= substr($c['nome'] , 0,25) ?></h6>
                          </div>
															<h6 style="font-size: 11px; color:black; text-decoration: line-through; position:relative; top:-10px;">De:
															<?= "R$: ". number_format($c['valor_venda'] ,2,",",".")?>
															</h6>
													  <h5 style="top:-10px;color: black;position: relative;font-family:'Gotham Bold', sans-serif;margin-bottom:0;font-size:17px" >
													   	<?= "R$: ". number_format($c['preco_promocao'] ,2,",",".")?>
														</h5>	
                          <div style="position:relative; top:0px;" class="car_list_more_info">
                            <text style="order:0"><?= $c['ano_fabricacao'] ."/".$c['ano_lancamento'] ?></text>
                             <div style="order:1"></div>
                            <text style="order:2"><?= $c['km_rodados'] . " Km" ?></text>
                            <div style="order:3"></div>
                            <text style="order:4"><?= ucfirst(strtolower($c['cor'] ))?></text>
                          </div>	
													</a>
                        </div>
												<?php else: ?>
											  <div class="results_car_list_info_box">
												 <a  target="_blank" href="<?= APPURL. "/detalhes-carros/" .$c['id_carro'] ?>">
                          <div class="car_list_info_title">
                            <h6><?= substr($c['nome'] , 0,25) ?></h6>
                          </div>
														
													  <h5 style="top:12px;color: black;position: relative;font-family:'Gotham Bold', sans-serif;margin-bottom:0;font-size:17px;" >
													   	<?= "R$: ". number_format($c['valor_venda'] ,2,",",".")?>
														</h5>	
                          <div style="position:relative; top:22px;" class="car_list_more_info">
                            <text style="order:0"><?= $c['ano_fabricacao'] ."/".$c['ano_lancamento']  ?></text>
                             <div style="order:1"></div>
                             <text style="order:2"><?= $c['km_rodados'] . " Km" ?></text>
                             <div style="order:3"></div>
                            <text style="order:4"><?= ucfirst(strtolower($c['cor'] ))?></text>
                          </div>	
													</a>
                        </div>
												<?php endif; ?>
                      </div>
        						</div>
												
											
										<?php endforeach; ?>
                   </div>
										<?php else: ?>	 
                   <div id="divcarros" style="height:fit-content;" class="col-lg-9 col-md-9 col-sm-9 col-xl-9 results_flex">
									<?php foreach($Carros->getDataAs("Carro") as $c): ?>
										<div class="col-lg-4 col-md-4 col-sm-12 margin_full wow animated fadeInUp " style="display:inline-block;" data-wow-delay="0.2s">
                   <a class="link_car" target="_blank" href="<?= APPURL. "/detalhes-carros/" . $c->get("id_carro") ?>">
											<div class="results_car_list_content">
                        <div style="background:linear-gradient(180deg, rgba(2, 2, 2, 0) 100%, rgba(0, 0, 0, 0.6) 100%), url(<?= $c->get("foto_capa") ?>);"  class="results_car_list_content_img">
                          <div class="results_car_list_content_options">
											     <?php $QTD = favorito($c->get("id_carro") ,$_COOKIE['PHPSESSID']); ?>
													 <?php if($QTD != 0): ?>
													<div id="<?= "list".$c->get("id") ?>" class="list" >
														<a href="javascrip:void(0)" onMouseOver="changeFav()"  style="font-size: 0px;" class="<?= "favorito". $c->get("id") ?>"><?= $c->get("id") ?><img class="icon_heart_pos" src="<?= APPURL . '/assets/img/main/icon_heart_favorite_p.png'?>"></a>
														<input type="hidden" id="<?= "idcarro".$c->get("id") ?>" value="<?= $c->get("id_carro") ?>">
														<input type="hidden" id="<?= "cookie".$c->get("id")?>" value="<?= $_COOKIE['PHPSESSID'] ?>">
                          </div>
														<?php else: ?> 
													<div  id="<?= "list".$c->get("id") ?>" class="list" >
														<a href="javascrip:void(0)" onMouseOver="changeFav()"  style="font-size: 0px;" class="<?= "favorito". $c->get("id") ?>"><?= $c->get("id") ?><img class="icon_heart_pos" src="<?= APPURL . '/assets/img/main/icon_heart_favorite.png'?>"></a>
														<input type="hidden" id="<?= "idcarro".$c->get("id") ?>" value="<?= $c->get("id_carro") ?>">
														<input type="hidden" id="<?= "cookie".$c->get("id")?>" value="<?= $_COOKIE['PHPSESSID'] ?>">
														</div>
														<?php endif; ?> 
														<ul class="results_car_list_options_icons">
										    	<?php  if (strpos($c->get("descricao"), 'ano de garantia') !== false): ?>
                              <li style="background-color:#0094f400" data-toggle="tooltip" data-placement="top" title="1 ano de garantia"><img height='39' width='39'  title="1 ano de garantia" src="<?= APPURL. '/assets/img/main/garantia.png'?>"></li>
													<?php endif; ?>
													<?php  if (strpos($c->get("descricao"), 'garantia de fabrica') !== false): ?>
                              <li style="background-color:#0094f400" data-toggle="tooltip" data-placement="top" title="Garantia de Fábrica"><img  height='39' width='39'  src="<?= APPURL. '/assets/img/main/fabrica.svg'?>"></li>
													<?php endif; ?>	
													<?php  if (strpos($c->get("descricao"), 'garantia de fabrica') == false && strpos($c->get("descricao"), 'ano de garantia') == false ): ?>
                              <li style="background-color:#0094f400" data-toggle="tooltip" data-placement="top" title="Veiculo de Procedência"><img  height='39' width='39'  src="<?= APPURL. '/assets/img/main/procedencia.svg'?>"></li>
													<?php endif; ?>	
											   	<?php  if (strpos($c->get("descricao"), 'ipva') !== false): ?>
                              <li style="background-color:#0094f400" data-toggle="tooltip" data-placement="top" title="IPVA 2023 Grátis"><img  height='39' width='39'  src="<?= APPURL. '/assets/img/main/ipva.svg'?>"></li>
													<?php endif; ?>
													<?php  if (strpos($c->get("descricao"), 'transferencia') !== false): ?>
                              <li style="background-color:#0094f400" data-toggle="tooltip" data-placement="top" title="Transferência gratis"><img  height='39' width='39'  src="<?= APPURL. '/assets/img/main/transferencia.svg'?>"></li>
													<?php endif; ?>		
													 <?php  if (strpos($c->get("combustivel"), 'eletrico') !== false): ?>
                              <li  style="background-color:#0094f400" data-toggle="tooltip" data-placement="top" title="Veículo Elétrico"><img  height='39' width='39'  src="<?= APPURL. '/assets/img/main/eletrico.svg'?>"></li> 
													<?php endif; ?>				
                        </ul>			
                            </ul>
                          </div>
                        </div>
												  <?php if($c->get("preco_promocao") != "0.00"): ?>
										     
                        <div  class="results_car_list_info_box">
												 <a target="_blank" href="<?= APPURL. "/detalhes-carros/" . $c->get("id_carro") ?>">
                          <div class="car_list_info_title">
                            <h6><?= substr($c->get("nome") , 0,25) ?></h6>
                          </div>
															<h6 style="font-size: 11px; color:black; text-decoration: line-through; position:relative; top:-10px;">De:
															<?= "R$: ". number_format($c->get("valor_venda"),2,",",".")?>
															</h6>
                     			</a>
													  <h5 style="top:-10px;color: black;position: relative;font-family:'Gotham Bold', sans-serif;margin-bottom:0;font-size:17px" >
													   	<?= "R$: ". number_format($c->get("preco_promocao"),2,",",".")?>
														</h5>	
                          <div style="position:relative; top:0px;" class="car_list_more_info">
                            <text style="order:0"><?= $c->get("ano_fabricacao")."/".$c->get("ano_lancamento") ?></text>
                             <div style="order:1"></div>
                            <text style="order:2"><?= $c->get("km_rodados"). " Km" ?></text>
                            <div style="order:3"></div>
                            <text style="order:4"><?= ucfirst(strtolower($c->get("cor")))?></text>
                          </div>	
                        </div>
												<?php else: ?>
											  <div  class="results_car_list_info_box">
												 <a target="_blank" href="<?= APPURL. "/detalhes-carros/" . $c->get("id_carro") ?>">
                          <div class="car_list_info_title">
                            <h6><?= substr($c->get("nome") , 0,25) ?></h6>
                          </div>
														
													  <h5 style="top:12px;color: black;position: relative;font-family:'Gotham Bold', sans-serif;margin-bottom:0;font-size:17px" >
													   	<?= "R$: ". number_format($c->get("valor_venda"),2,",",".")?>
														</h5>	
                          <div style="position:relative; top:22px;" class="car_list_more_info">
                            <text style="order:0"><?= $c->get("ano_fabricacao")."/".$c->get("ano_lancamento") ?></text>
                             <div style="order:1"></div>
                            <text style="order:2"><?= $c->get("km_rodados"). " Km" ?></text>
                            <div style="order:3"></div>
                            <text style="order:4"><?= ucfirst(strtolower($c->get("cor")))?></text>
                          </div>	
														</a>
                        </div>
												<?php endif; ?>
                      </div>
														</a>
        						</div>
											
										<?php endforeach; ?>
                   </div>
													<?php endif; ?>	 
        					</div>
                  
        				<nav aria-label="Page navigation example" class="pagination justify-content-center">
<!--         					<ul class="pagination">
        						<a class="page-link" href="#">Carregar mais carros</a>
        					</ul> -->
        				</nav>
        			</div>

        		</div>
        	</div>
						</form>	
        </section>
        <!--================End Product Area =================-->