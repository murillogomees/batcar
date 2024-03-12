<?php
/**
 * Index Controller
 */
class IndexController extends Controller
{
    /**
     * Process
     */
    public function process()    {
      
     if (Input::post("action") == "marcaBusca") {
            $this->marcaBusca();
     } 
		$Index = 1;
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
     $this->setVariable("Marcas", $Marcas);
		 $this->setVariable("Index", $Index);	

     $this->view("index");
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

  
}