<?php
/**
 * Index Controller
 */
class DetalhesCarrosController extends Controller
{
    /**
     * Process
     */
    public function process()  {
      
       $Route = $this->getVariable("Route");
      
       $Carro = Controller::model("Carro");
      
       if (isset($Route->params->id)) {
            $Carro->select($Route->params->id, "id_carro");

         if (!$Carro->isAvailable()) {
                header("Location: ".APPURL);
                exit;
            }
        }
			
	  $Marcas = Controller::model("Carros");
    $Marcas->orderBy("id","ASC")
           ->fetchData();
	  foreach($Marcas->getDataAs("Carro") as  $a){
				$marca[] = array(
				 "nome" => $a->get("marca")
				);
			}
		 $ArrayMarcas = array_unique($marca, SORT_REGULAR);
     $this->setVariable("ArrayMarcas", $ArrayMarcas);
			
			
      
      if (Input::post("action") == "formveiculo") {
          $this->formveiculo();
     }
      
        $acessorios = explode(",", $Carro->get("acessorios"));
        $this->setVariable("acessorios", $acessorios);
        $this->setVariable("Carro", $Carro);  
        
      if(Input::post("action") == "favorite") {
            $this->favorite();
     } 
			
				$QtdCarros = 1;
       	$this->setVariable("QtdCarros", $QtdCarros);
        $this->view("detalhes-carros");
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
  
  
   private function formveiculo(){
    $this->resp->result = 0; 
				
    $lgpd = "Cliente não concorda com os termos";
		 
    if(Input::post("lgpd") == 'on') {
      $lgpd = "Cliente concorda com os termos";
    }

       if (Input::post("mensagem") == '')
      {
       $this->jsonecho();
      }

      if (!filter_var(Input::post("mensagem"), FILTER_VALIDATE_URL))
      {
      $this->jsonecho();
      }
      
      $url = preg_match("[a-zA-Z0-9-_\.]+\.(jpg|gif|png)", "exemplo/minha_imagem.png");
      
		  if ($url) {
			 $this->jsonecho();
		  }

    	$send = \Email::sendNotification("veiculo", ["nome" => Input::post("nome"), 
                                     "email" => Input::post("email"),
                                     "telefone" => Input::post("telefone"), 
                                     "dadosVeiculo" => Input::post("dadosVeiculo"),
																		 "url" => Input::post("urlE"),
																		 "modelo" => Input::post("carroModelo"),
                                     "mensagem" => Input::post("mensagem"),
                                     "lgpd" => $lgpd                                                 
                                    ]);

				
			 $this->resp->result = 1;
       $this->jsonecho();
        
      }
  
  
}