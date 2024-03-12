<?php
/**
 * Index Controller
 */
class ContatoController extends Controller
{
    /**
     * Process
     */
    public function process()    {          


      if (Input::post("action") == "contato") {
            $this->contato();
     }
      
        $this->view("contato");
    }
  
    private function contato(){

      $this->resp->result = 0;           

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
      

        $send = \Email::sendNotification("contato", ["nome" => Input::post("nome"), 
                                                     "email" => Input::post("email"),
                                                     "telefone" => Input::post("telefone"), 
                                                     "assunto" => Input::post("assunto"),
                                                     "mensagem" => Input::post("mensagem")
                                                    ]);

      
       $this->resp->result = 1;
       $this->jsonecho();
  }
  
  
  
}