<?php
/**
 * Index Controller
 */
class ListaCarroController extends Controller
{
    /**
     * Process
     */
    public function process(){

		$Route = $this->getVariable("Route");
		
		$Marca = Controller::model("Marca");	
			
		if (isset($Route->params->marca)) {
		$Marca->select($Route->params->marca);
		$Carros = Controller::model("Carros");
    $Carros->where("marca", "=", $Marca->get("nome"))
			     ->orderBy("ultima_atualizacao_api","DESC")
           ->fetchData();

    $QtdCarros = $Carros->getTotalCount();
      
		if ($QtdCarros == "0") {
				$this->listarCarros();
		} else {
			
				$Marcas = Controller::model("Marcas");
        $Marcas->orderBy("nome","ASC")
           ->fetchData();
	
			
					foreach($Carros->getDataAs("Carro") as  $a){
				$cor[] = array(
				 "cor" => $a->get("cor")
				);
			
				$modelo[] = array(
				 "modelo" => $a->get("tipo_carro")
				);
			
				$combustivel[] = array(
				 "combustivel" => $a->get("combustivel")
				);
			
         $acessorios = explode(",", $a->get("acessorios"));
	
						
			}
	     asort($acessorios);
		
			$ArrayCor = array_unique($cor, SORT_REGULAR);
			$ArrayModelo = array_unique($modelo, SORT_REGULAR);
			$ArrayCombustivel = array_unique($combustivel, SORT_REGULAR);
	
     $fav = 0;
     $this->setVariable("Carros", $Carros);
     $this->setVariable("QtdCarros", $QtdCarros);
		 $this->setVariable("ArrayCor", $ArrayCor);
		 $this->setVariable("ArrayModelo", $ArrayModelo);
		 $this->setVariable("ArrayCombustivel", $ArrayCombustivel);
		 $this->setVariable("acessorios", $acessorios);
		 $this->setVariable("Marcas", $Marcas);
		 $this->setVariable("fav", $fav);	
	
		}
	
	} else {
				$this->listarCarros();
		} 
			
			
    if (Input::post("action") == "listarCarros") {
            $this->listarCarros();
    } else if (Input::post("action") == "buscaCarros") {
            $this->buscaCarros();
    } else if (Input::post("action") == "favorite") {
            $this->favorite();
    } else if (Input::post("action") == "filtro") {
            $this->filtro();
    } else if (Input::post("action") == "pesquisar") {
            $this->pesquisar();
    } else if (Input::post("action") == "marcaBusca") {
            $this->marcaBusca();
    } else if (Input::post("action") == "buscaFavorito") {
            $this->buscaFavorito();
    } else if (Input::post("action") == "filtromais") {
            $this->filtromais();
    } else if (Input::post("action") == "populares") {
            $this->populares();
    } else if (Input::post("action") == "premium") {
            $this->premium();
    } else if (Input::post("action") == "filtroJS") {
            $this->filtroJS();
    } else if (Input::post("action") == "buscaInicial") {
            $this->buscaInicial();		
    }
			
     $this->view("lista-carros");
      
    }
	
			private function buscaInicial()
    {
			
		 $this->resp->result = 0;			
		 $valor =	Input::post("palavraChave");	

				
			$Carros = Controller::model("Carros");
    	$Carros->where(DB::raw("marca LIKE '%$valor%' OR nome LIKE '%$valor%' "))
             ->fetchData();	
				
    	$QtdCarros = $Carros->getTotalCount();
				
   foreach($Carros->getDataAs("Carro") as  $a){
				$cor[] = array(
				 "cor" => $a->get("cor")
				);
			
				$Modelo[] = array(
				 "modelo" => $a->get("tipo_carro")
				);
			
				$combustivel[] = array(
				 "combustivel" => $a->get("combustivel")
				);
		 
			
         $acessorios = explode(",",$a->get("acessorios"));       			  
			}
		 	 asort($acessorios);
			 
			$ArrayCor = array_unique($cor, SORT_REGULAR);
			$ArrayModelo = array_unique($Modelo, SORT_REGULAR);
			$ArrayCombustivel = array_unique($combustivel, SORT_REGULAR);
	
     $fav = 0;			
     $this->setVariable("Carros", $Carros);
			
     $this->setVariable("QtdCarros", $QtdCarros);
		 $this->setVariable("ArrayCor", $ArrayCor);
		 $this->setVariable("ArrayModelo", $ArrayModelo);
		 $this->setVariable("ArrayCombustivel", $ArrayCombustivel);
		 $this->setVariable("acessorios", $acessorios);			 
		 $this->setVariable("fav", $fav);
		 $this->resp->result = 1;			
		 $this->jsonecho();	
		}
	
		private function filtroJS()
    {
			
		 $this->resp->result = 0;			
		 $ArrayFiltro =	Input::post("filtroJS");	
		 $Ordenacao =	Input::post("ordenacao");	
		 $acessoriosF = Input::post("ValoresAcessoriosJS");		
		 $linha = 1;
		 $query = "";
		 $query2 = "";
	
			
			
		 foreach($ArrayFiltro as $af){
			 
			 $valor = $af['valor'];
			 $coluna = $af['coluna']; 
			 $predefinicao = $af['predefinicao'];
			 
			 if($valor == null){
				 continue;
			 }
			 
			 if($coluna == "acessorios"){
				 continue;
			 }
			 

			 if ($linha == 1){
				 
				if ($coluna == "nome"){
					$query .= "(marca LIKE '%$valor%' OR nome LIKE '%$valor%')";
				} else if ($coluna == "ano_lancamento" || $coluna == "valor_venda" || $coluna == "km_rodados"){
					$valor = preg_replace("/[^0-9]/", "", $valor);
					if ($predefinicao == "de") {
						$query .= "$coluna >= '$valor'";
						$query2 .= "preco_promocao >= '$valor'";
					} else if ($predefinicao == "ate") {
						$query .= "$coluna <= '$valor'";
						$query2 .= "preco_promocao <= '$valor'";
					}
				} else {
					$query .= "$coluna = '$valor'";
				}		
			 }
			 
			 if($linha >= 2 ){
			if ($coluna == "ano_lancamento" || $coluna == "valor_venda" || $coluna == "km_rodados"){
			   $valor = preg_replace("/[^0-9]/", "", $valor);
					if ($predefinicao == "de") {
						$query .= " AND $coluna >= '$valor'";
						$query2 .= "AND preco_promocao >= '$valor'";
					} else if($predefinicao == "ate") {
						$query .= " AND $coluna <= '$valor'";
						$query2 .= " AND preco_promocao <= '$valor'";
					}
				} else if ($coluna == "modelo") {
					$query .= " AND $coluna LIKE '%$valor%'";
				} else {
					$query .= " AND $coluna = '$valor'";
				}			 
				
			 }
			 
			 $linha++;			 
		 }
			
		foreach($acessoriosF as $a){
		$valorA = $a['acessorios'];
		if($query == "") {
					$query .= " (acessorios LIKE '%$valorA%' )";
		} else {
			$query .= " AND (acessorios LIKE '%$valorA%' )";
	  } 	
			
			
		}
			
			
			
		 if ($Ordenacao == "menor_preco") {
			 $ord = "valor_venda";
			 $dir = "ASC";
		 } else if ($Ordenacao == "maior_preco"){
			 $ord = "valor_venda";
			 $dir = "DESC";
		 } else if ($Ordenacao == "recentes"){
			 $ord = "ultima_atualizacao_api";
			 $dir = "DESC";
		 } else if ($Ordenacao == "km"){
			 $ord = "km_rodados";
			 $dir = "ASC";
		 } else {
			 $ord = "ano_lancamento";
			 $dir = "DESC";
		 } 
			
		 $Busca = Controller::model("Carros");	
			
		 if ($query == null){
			$Busca->orderBy($ord, $dir)
						->fetchData();
		 } else {
			 
			$Busca->where(DB::raw("$query"));
			 
			 if($query2 != null){
			$Busca->where(DB::raw("preco_promocao = '0'"));
			 $query2 .=  " AND preco_promocao <> '0'";
			$Busca->orwhere(DB::raw("$query2"));
			 }
			 
			$Busca->orderBy($ord, $dir);
			$Busca->fetchData();
		 }			
			
		 $this->resp->quantidade = $Busca->getTotalCount();		
			
		 foreach($Busca->getDataAs("Carro") as $b){
			 
			 
			$ValorVenda = number_format($b->get("valor_venda"),2,",","."); 
			$ValorPromocao = number_format($b->get("preco_promocao"),2,",",".");
			 
			$Carros[] = [
				"id" => $b->get("id"),
				"id_carro" => $b->get("id_carro"),
				"nome" => $b->get("nome"),
				"cor" => $b->get("cor"),
				"foto_capa" => $b->get("foto_capa"),
				"km_rodados" => $b->get("km_rodados"),
				"ano_fabricacao" => $b->get("ano_fabricacao"),
				"ano_lancamento" => $b->get("ano_lancamento"),
				"descricao" => $b->get("descricao"),
				"combustivel" => $b->get("combustivel"),
				"valor_venda" => $ValorVenda,
				"preco_promocao" => $ValorPromocao
			];
		 }			
			
		 $this->resp->carros = $Carros;	
		 $this->resp->result = 1;	
		 $this->resp->query = $query;		
		 $this->jsonecho();	
			
		}
  
		private function pesquisar()
    {
    
		$this->resp->result = 0;
			
    $Carros = Controller::model("Carros");
			
    $Carros->orderBy("valor_venda","ASC")
			     ->search(Input::post("pesquisar") )
           ->fetchData();
			
    $QtdCarros = $Carros->getTotalCount();
		
		if($QtdCarros == 0){
			echo "<script>
							setTimeout(function() {
					Swal.fire({
						position: 'center',
						icon: 'error',
						title: 'Nenhum veiculo encontrado com os dados informados!',
						showConfirmButton: false,
						timer: 3000
					});
					}, 2000)
        </script>";   
			return false;
		}	
	
		foreach($Carros->getDataAs("Carro") as  $a){
				$cor[] = array(
				 "cor" => $a->get("cor")
				);
			
				$modelo[] = array(
				 "modelo" => $a->get("tipo_carro")
				);
			
				$combustivel[] = array(
				 "combustivel" => $a->get("combustivel")
				);
			
         $acessorios = explode(",",$a->get("acessorios"));       			  
			}
		  
		  asort($acessorios);
		
			$ArrayCor = array_unique($cor, SORT_REGULAR);
			$ArrayModelo = array_unique($modelo, SORT_REGULAR);
			$ArrayCombustivel = array_unique($combustivel, SORT_REGULAR);
	
     $fav = 0;
     $this->setVariable("Carros", $Carros);
     $this->setVariable("QtdCarros", $QtdCarros);
		 $this->setVariable("ArrayCor", $ArrayCor);
		 $this->setVariable("ArrayModelo", $ArrayModelo);
		 $this->setVariable("ArrayCombustivel", $ArrayCombustivel);
		 $this->setVariable("acessorios", $acessorios);		
		 $this->setVariable("filt", 1);

			
			
		
// 			$this->resp->qtdCarro = $QtdCarros ;
// 			$this->resp->carros = $arrayPesquisa  ;
// 			$this->resp->result = 1;
// 			$this->jsonecho(); 
   
			
    }
	
	
	
	private function listarCarros()
    {
    
    $Carros = Controller::model("Carros");
    $Carros->orderBy("ultima_atualizacao_api","DESC")
           ->fetchData();
    $QtdCarros = $Carros->getTotalCount();
		
		$Marcas = Controller::model("Marcas");
    $Marcas->orderBy("nome","ASC")
           ->fetchData();
      
   
	
		foreach($Carros->getDataAs("Carro") as  $a){
				$cor[] = array(
				 "cor" => $a->get("cor")
				);
			
				$modelo[] = array(
				 "modelo" => $a->get("tipo_carro")
				);
			
				$combustivel[] = array(
				 "combustivel" => $a->get("combustivel")
				);
			  $ModeloVeiculo[] = array(
				 "baseModelo" => $a->get("base_modelo")
				);
			

			
         $acessorios = explode(",",$a->get("acessorios"));
			
			}
// 		  echo "<pre>";
// 		print_r($transferencias);
// 		echo "</pre>";
		  asort($acessorios);
		 
	  	$ArrayBaseModelo = array_unique($ModeloVeiculo, SORT_REGULAR);
			$ArrayCor = array_unique($cor, SORT_REGULAR);
			$ArrayModelo = array_unique($modelo, SORT_REGULAR);
			$ArrayCombustivel = array_unique($combustivel, SORT_REGULAR);
	
     $fav = 0;
		 $Botao = 0;
     $this->setVariable("Carros", $Carros);
     $this->setVariable("QtdCarros", $QtdCarros);
		 $this->setVariable("ArrayCor", $ArrayCor);
		 $this->setVariable("ArrayBaseModelo", $ArrayBaseModelo);
		 $this->setVariable("Marcas", $Marcas);
		 $this->setVariable("ArrayModelo", $ArrayModelo);
		 $this->setVariable("ArrayCombustivel", $ArrayCombustivel);
		 $this->setVariable("acessorios", $acessorios);		
	   $this->setVariable("fav", $fav);
		$this->setVariable("ipva", $ipvas);
		$this->setVariable("transferencia", $transferencias);
		 $this->setVariable("Botao", $Botao);
		

    }
  
  	private function buscaCarros()
    {
     $marca = Input::post("marca");
     $modelo = Input::post("modelo");
		 $palavra_chave = Input::post("palavra_chave");	
			
		$Marcas = Controller::model("Marcas");
    $Marcas->orderBy("id","ASC")
           ->fetchData();	
		$Carros = Controller::model("Carros");
	
    $Carros->where(DB::raw("nome LIKE '%$palavra_chave%' OR (marca LIKE '%$marca%' AND base_modelo LIKE '%$modelo%') "))
           ->orderBy("ultima_atualizacao_api","DESC")
           ->fetchData();
      
    $QtdCarros = $Carros->getTotalCount();
			
			
	  $CARROS = Controller::model("Carros");
    $CARROS->orderBy("id","ASC")
           ->fetchData();
   foreach($CARROS->getDataAs("Carro") as  $a){
				$cor[] = array(
				 "cor" => $a->get("cor")
				);
			
				$Modelo[] = array(
				 "modelo" => $a->get("tipo_carro")
				);
			
				$combustivel[] = array(
				 "combustivel" => $a->get("combustivel")
				);
		 
			
         $acessorios = explode(",",$a->get("acessorios"));       			  
			}
			
		 	 asort($acessorios);
			 
			$ArrayCor = array_unique($cor, SORT_REGULAR);
			$ArrayModelo = array_unique($Modelo, SORT_REGULAR);
			$ArrayCombustivel = array_unique($combustivel, SORT_REGULAR);
	
     $fav = 0;
     $this->setVariable("Carros", $Carros);
     $this->setVariable("QtdCarros", $QtdCarros);
		 $this->setVariable("ArrayCor", $ArrayCor);
		 $this->setVariable("ArrayModelo", $ArrayModelo);
		 $this->setVariable("ArrayCombustivel", $ArrayCombustivel);
		 $this->setVariable("acessorios", $acessorios);	
		 $this->setVariable("Marcas", $Marcas);
		 $this->setVariable("fav", $fav);
    
    }
	
	
	 private function favorite()
    {
     $this->resp->result = 0;
     
		 $Id_carro = Input::post("idCarro");
		 $Cookie = Input::post("Cokkie"); 
		 
		$Carros = Controller::model("Favoritos");
    $Carros->where(DB::raw("id_carro = '$Id_carro' AND cookie = '$Cookie'"))
           ->fetchData();	
		$QtdCarros = $Carros->getTotalCount();
		 
		if($QtdCarros == 0){
			
     $Favorito = Controller::model("Favorito");
     $Favorito->set("id_carro", $Id_carro)
		          ->set("cookie", $Cookie);
		 $Favorito->save();
			
     $retorno = "1";  
			
		}else{
		
 	 foreach($Carros->getDataAs("Favorito") as $F){
    $F->delete();
		$retorno = "0"; 
		}
			
		}
			$this->resp = $retorno;
			$this->resp->result = 1;
			$this->jsonecho(); 
   
	}
	
		 private function filtro()
    {
//      $this->resp->result = 0;
     
	 
		 $anoDe = Input::post("anode");
		 $anoAte = Input::post("anoate"); 
		 $precoDe = Input::post("precode");
		 $precoAte = Input::post("precoate"); 
		 $kmDe = Input::post("kmde");
		 $kmAte = Input::post("kmate"); 
		 $cambio = Input::post("cambio");
		 $combustivel = Input::post("combustivel"); 
		 $cor = Input::post("cor");
		 $categoria = Input::post("categoria");
		 $Marca = Input::post("marca");
		 $Base_Modelo = Input::post("modelo");
		 $PrecoDE = preg_replace("/[^0-9]/", "", $precoDe);
		 $PrecoAte = preg_replace("/[^0-9]/", "", $precoAte);
		 $PrecoDE =  substr($PrecoDE, 0, -2);
		 $PrecoAte =  substr($PrecoAte, 0, -2);
		
		$Marcas = Controller::model("Marcas");
    $Marcas->orderBy("id","ASC")
           ->fetchData();	
      

 		$Carros = Controller::model("Carros");
		$Carros->orderBy("valor_venda","ASC");	 
	  	if(Input::post("marca") != ""){
			$Carros->Where('marca', '=',$Marca );
			}	 
			if(Input::post("modelo") != ""){
			$Carros->Where('base_modelo', '=',$Base_Modelo );
			}	 
			if(Input::post("anode") != ""){
			$Carros->Where('ano_fabricacao', '>=',$anoDe );
			}	 
			if(Input::post("anoate") != ""){
			$Carros->Where('ano_fabricacao', '<=',$anoAte );
			}	 
			if(Input::post("precode") != ""){
			$Carros->Where('valor_venda', '>=',$PrecoDE );
			}	 
			if(Input::post("precoate") != ""){
			$Carros->Where('valor_venda', '<=',$PrecoAte );
			}	 
			if(Input::post("kmde") != ""){
			$Carros->Where('km_rodados', '>=',$kmDe );
			}	 
			if(Input::post("kmate") != ""){
			$Carros->Where('km_rodados', '<=',$kmAte );
			}	 
			if(Input::post("cambio") != ""){
			$Carros->Where('tipo_marcha', '=',$cambio );
			}	 
			if(Input::post("combustivel") != ""){
			$Carros->Where('combustivel', '=',$combustivel );
			}	 
			if(Input::post("cor") != ""){
			$Carros->Where('cor', '=',$cor );
			}	 
			if(Input::post("categoria") != ""){
			$Carros->Where('tipo_carro', '=',$categoria );
			}	  
			 
			 $search = "";
			 for ($i = 1; $i <= 36; $i++) {
				 if(Input::post("acessorio$i") != ""){
				 $search .= Input::post("acessorio$i") ." ,";
				 }
      }
			 if($search != ""){
			$Carros->search($search);
			 }
			
         $Carros->fetchData();	
		     $QtdCarros = $Carros->getTotalCount();
		 
					// var_dump($search);exit;

	  $CARROS = Controller::model("Carros");
    $CARROS->orderBy("ultima_atualizacao_api","DESC")
           ->fetchData();
    
		foreach($CARROS->getDataAs("Carro") as  $a){
     
				$Cor[] = array( "cor" => $a->get("cor"));
		 
				$Modelo[] = array( "modelo" => $a->get("tipo_carro"));
			 
				$Combustivel[] = array( "combustivel" => $a->get("combustivel"));
        $acessorios = explode(",", $a->get("acessorios"));       			  

		}
			 
			 	 asort($acessorios);
			 
			$ArrayCor = array_unique($Cor, SORT_REGULAR);
			$ArrayModelo = array_unique($Modelo, SORT_REGULAR);
			$ArrayCombustivel = array_unique($Combustivel, SORT_REGULAR);
	
     $fav = 0;
     $this->setVariable("Carros", $Carros);
     $this->setVariable("QtdCarros", $QtdCarros);
		 $this->setVariable("ArrayCor", $ArrayCor);
		 $this->setVariable("ArrayModelo", $ArrayModelo);
		 $this->setVariable("ArrayCombustivel", $ArrayCombustivel);
		 $this->setVariable("acessorios", $acessorios);
		 $this->setVariable("Marcas", $Marcas);
		 $this->setVariable("fav", $fav);
		 $this->setVariable("filt", 1);
// 			$this->resp = $QtdCarros;
// 			$this->resp->result = 1;
// 			$this->jsonecho(); 

   
	}
	
  	private function marcaBusca()
    {
      $this->resp->result = 0;
     
		 $marca =  Input::post("marca"); 
     $Carros = Controller::model("Carros");
     $Carros->where("marca", "=", $marca )
            ->orderBy("modelo", "ASC")
            ->fetchData();
      
       foreach($Carros->getDataAs("Carro") as $c){
				$baseModelo =	mb_strtolower ($c->get("base_modelo"),"utf-8" );		 
			  $modelo[] = [ 
	      ucfirst ($baseModelo )
      ];
				 
		 }
			
			$Modelo = array_unique($modelo, SORT_REGULAR);
			
			$this->resp->modelo = $Modelo;
      $this->resp->result = 1;
      $this->jsonecho(); 
   
    }
	
	  	private function buscaFavorito()
    {
		$CarrosFavoritos = Controller::model("Favoritos");
    $CarrosFavoritos->where("cookie", "=", $_COOKIE['PHPSESSID'])
           ->orderBy("id","ASC")
           ->fetchData();
		$QtdCarros = $CarrosFavoritos->getTotalCount();
				
			foreach($CarrosFavoritos->getDataAs("Favorito") as $F){
					$arrayID[] = [
						$F->get("id_carro")
					];
				}

    $Carros = Controller::model("Carro", );
				foreach($arrayID as $id){
			 
        $Carros->select($id, "id_carro");
					
					$carros[] = [
						"id" => $Carros->get("id"),
						"id_carro" => $Carros->get("id_carro"),
						"valor_venda" => $Carros->get("valor_venda"),
						"preco_promocao" => $Carros->get("preco_promocao"),
						"ano_lancamento" => $Carros->get("ano_lancamento"),
						"ano_fabricacao" => $Carros->get("ano_fabricacao"),
						"nome" => $Carros->get("nome"),
						"descricao" => $Carros->get("descricao"),
						"combustivel" => $Carros->get("combustivel"),
						"cor" => $Carros->get("cor"),
						"foto_capa" => $Carros->get("foto_capa"),
						"km_rodados" => $Carros->get("km_rodados")

					];
					
				}
				
	  $CARROS = Controller::model("Carros");
    $CARROS->orderBy("id","ASC")
           ->fetchData();
    
		foreach($CARROS->getDataAs("Carro") as  $a){
     
				$Cor[] = array( "cor" => $a->get("cor"));
		 
				$Modelo[] = array( "modelo" => $a->get("tipo_carro"));
			 
				$Combustivel[] = array( "combustivel" => $a->get("combustivel"));
         $acessorios = explode(",", $a->get("acessorios"));       			  

		}
			 
			 	 asort($acessorios);
			 
			$ArrayCor = array_unique($Cor, SORT_REGULAR);
			$ArrayModelo = array_unique($Modelo, SORT_REGULAR);
			$ArrayCombustivel = array_unique($Combustivel, SORT_REGULAR);

     $fav = 1;
		 $this->setVariable("ArrayCor", $ArrayCor);
		 $this->setVariable("ArrayModelo", $ArrayModelo);
		 $this->setVariable("ArrayCombustivel", $ArrayCombustivel);
		 $this->setVariable("acessorios", $acessorios);
	   $this->setVariable("carros", $carros);
     $this->setVariable("arrayID", $arrayID);
		 $this->setVariable("fav", $fav);
	   $this->setVariable("QtdCarros", $QtdCarros);	

    
    }
	
	
	 	private function filtromais()
   {
	
		$Marcas = Controller::model("Marcas");
    $Marcas->orderBy("id","ASC")
           ->fetchData();
			
		$tipoBotao = Input::post("tipoBotao");
    if($tipoBotao == 1){
    $Carros = Controller::model("Carros");
    $Carros->orderBy("valor_venda","ASC")
           ->fetchData();
    $QtdCarros = $Carros->getTotalCount();
		$NomeFiltro = "Maior Preço";	
			
		}  
	 if($tipoBotao == 2){
    $Carros = Controller::model("Carros");
    $Carros->orderBy("valor_venda","ASC")
           ->fetchData();
    $QtdCarros = $Carros->getTotalCount();
		$NomeFiltro = "Menor Preço";	
		
		}  
	  if($tipoBotao == 3){
    $Carros = Controller::model("Carros");
    $Carros->orderBy("km_rodados","ASC")
           ->fetchData();
    $QtdCarros = $Carros->getTotalCount();
	 	$NomeFiltro = "Menor KM";			
		
		} 
	  if($tipoBotao == 4){
    $Carros = Controller::model("Carros");
    $Carros->orderBy("ano_lancamento","DESC")
           ->fetchData();
    $QtdCarros = $Carros->getTotalCount();
		$NomeFiltro = "Ano mais novo";		
		
		}
	 if($tipoBotao == 5){
    $Carros = Controller::model("Carros");
    $Carros->orderBy("ultima_atualizacao_api","DESC")
           ->fetchData();
    $QtdCarros = $Carros->getTotalCount();
		$NomeFiltro = "Mais Recentes";		
		
			
		} 
			
			
    $CARROS = Controller::model("Carros");
    $CARROS->orderBy("id","ASC")
           ->fetchData();
   foreach($CARROS->getDataAs("Carro") as  $a){
				$cor[] = array(
				 "cor" => $a->get("cor")
				);
			
				$Modelo[] = array(
				 "modelo" => $a->get("tipo_carro")
				);
			
				$combustivel[] = array(
				 "combustivel" => $a->get("combustivel")
				);
		 
			
         $acessorios = explode(",",$a->get("acessorios"));       			  
			}
			
		 	 asort($acessorios);
			 
			$ArrayCor = array_unique($cor, SORT_REGULAR);
			$ArrayModelo = array_unique($Modelo, SORT_REGULAR);
			$ArrayCombustivel = array_unique($combustivel, SORT_REGULAR);
	
     $fav = 0;
			
     $this->setVariable("Carros", $Carros);
     $this->setVariable("QtdCarros", $QtdCarros);
		 $this->setVariable("ArrayCor", $ArrayCor);
		 $this->setVariable("ArrayModelo", $ArrayModelo);
		 $this->setVariable("ArrayCombustivel", $ArrayCombustivel);
		 $this->setVariable("acessorios", $acessorios);	
		 $this->setVariable("Marcas", $Marcas);
		 $this->setVariable("fav", $fav);
		 $this->setVariable("NomeFiltro", $NomeFiltro);
    
    }
 
		 	private function populares()
   {
	
		$Marcas = Controller::model("Marcas");
    $Marcas->orderBy("id","ASC")
           ->fetchData();
			
    $Carros = Controller::model("Carros");
    $Carros->orderBy("valor_venda","ASC")
			     ->where("valor_venda", "<=", 199999)
           ->fetchData();
				
    $QtdCarros = $Carros->getTotalCount();

    $CARROS = Controller::model("Carros");
    $CARROS->orderBy("id","ASC")
           ->fetchData();
   foreach($CARROS->getDataAs("Carro") as  $a){
				$cor[] = array(
				 "cor" => $a->get("cor")
				);
			
				$Modelo[] = array(
				 "modelo" => $a->get("tipo_carro")
				);
			
				$combustivel[] = array(
				 "combustivel" => $a->get("combustivel")
				);
		 
			
         $acessorios = explode(",",$a->get("acessorios"));       			  
			}
		 	 asort($acessorios);
			 
			$ArrayCor = array_unique($cor, SORT_REGULAR);
			$ArrayModelo = array_unique($Modelo, SORT_REGULAR);
			$ArrayCombustivel = array_unique($combustivel, SORT_REGULAR);
	
     $fav = 0;
			
     $this->setVariable("Carros", $Carros);
     $this->setVariable("QtdCarros", $QtdCarros);
		 $this->setVariable("ArrayCor", $ArrayCor);
		 $this->setVariable("ArrayModelo", $ArrayModelo);
		 $this->setVariable("ArrayCombustivel", $ArrayCombustivel);
		 $this->setVariable("acessorios", $acessorios);	
		 $this->setVariable("Marcas", $Marcas);
		 $this->setVariable("fav", $fav);
    
    }
	
		private function premium()
   {
	
		$Marcas = Controller::model("Marcas");
    $Marcas->orderBy("id","ASC")
           ->fetchData();
			
    $Carros = Controller::model("Carros");
    $Carros->orderBy("ultima_atualizacao_api","DESC")
			     ->where("valor_venda", ">=", 150000)
           ->fetchData();
				
    $QtdCarros = $Carros->getTotalCount();

    $CARROS = Controller::model("Carros");
    $CARROS->orderBy("id","ASC")
           ->fetchData();
   foreach($CARROS->getDataAs("Carro") as  $a){
				$cor[] = array(
				 "cor" => $a->get("cor")
				);
			
				$Modelo[] = array(
				 "modelo" => $a->get("tipo_carro")
				);
			
				$combustivel[] = array(
				 "combustivel" => $a->get("combustivel")
				);
		 
			
         $acessorios = explode(",",$a->get("acessorios"));       			  
			}
		 	 asort($acessorios);
			 
			$ArrayCor = array_unique($cor, SORT_REGULAR);
			$ArrayModelo = array_unique($Modelo, SORT_REGULAR);
			$ArrayCombustivel = array_unique($combustivel, SORT_REGULAR);
	
     $fav = 0;
			
     $this->setVariable("Carros", $Carros);
     $this->setVariable("QtdCarros", $QtdCarros);
		 $this->setVariable("ArrayCor", $ArrayCor);
		 $this->setVariable("ArrayModelo", $ArrayModelo);
		 $this->setVariable("ArrayCombustivel", $ArrayCombustivel);
		 $this->setVariable("acessorios", $acessorios);	
		 $this->setVariable("Marcas", $Marcas);
		 $this->setVariable("fav", $fav);
    
    }
 
}