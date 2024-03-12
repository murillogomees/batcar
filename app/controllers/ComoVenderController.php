<?php
/**
 * Index Controller
 */
class ComoVenderController extends Controller
{
    /**
     * Process
     */
    public function process()    {          

  
     if (Input::post("action") == "comoVender") {
            $this->comoVender();
     } 
     
        $this->view("como-vender");
      
    }
  
  private function comoVender(){
    
    $this->resp->result = 0; 
    
    $lgpd = "Cliente não concorda com os termos";
   
    if(Input::post("lgpd") == 'on'){
         $lgpd = "Cliente concorda com os termos";
    }

    $send = \Email::sendNotification("como-vender", ["nome" => Input::post("nome"), 
                                                     "email" => Input::post("email"),
                                                     "telefone" => Input::post("telefone"), 
                                                     "placa" => Input::post("placa"),
                                                     "marca" => Input::post("marca"),
                                                     "modelo" => Input::post("modelo"),
                                                     "cor" => Input::post("cor"),
                                                     "lgpd" => $lgpd
                                                    ]);
   
    
       $this->resp->result = 1; 
       $this->jsonecho();

  }
  
}