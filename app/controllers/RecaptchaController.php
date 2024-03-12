<?php
/**
 * Index Controller
 */
class RecaptchaController extends Controller
{
    /**
     * Process
     */
    public function process()    { 
      
      
    if (Input::post("action") == "recaptcha") {
       $this->recaptcha();
     }

    }
  
    	 private function recaptcha()
    {
     $this->resp->result = 0;
     
		$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null;
 
      if(!is_null($captcha)){
        $res = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcrFasiAAAAAP0gF1x1usFrWiw5GpXsZd4GULe&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']));
        if($res->success === true){
          //CAPTCHA validado!!!
          $retorno = 1;
          echo 'Tudo certo =)';
          
        } else{
          $retorno = 2;
          echo 'Erro ao validar o captcha!!!';
        }
      }
      else{
        $retorno = 3;
        echo 'Captcha não preenchido!';
      }
         
         
         
			$this->resp->retorno = $retorno;
			$this->resp->result = 1;
			$this->jsonecho(); 
   
    
	
	}
  
  
}