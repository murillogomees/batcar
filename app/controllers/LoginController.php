<?php
/**
 * Login Controller
 */
class LoginController extends Controller
{
    /**
     * Process
     */
    public function process()
    {
        $AuthUser = $this->getVariable("AuthUser");
        
        if ($AuthUser) {
            header("Location: ".APPURL."/clients");
            exit;
        }    

        if (Input::post("action") == "login") {
            $this->login();
        } 

        $this->view("login", "site");
    }


    /**
     * Login
     * @return void
     */
    private function login()
    {
        $username = Input::post("username");
        $password = Input::post("password");
        $remember = Input::post("remember");

        if ($username && $password) {
            $User = Controller::model("User", $username);

            if ($User->isAvailable() &&         
                password_verify($password, $User->get("password"))) 
            {
                $exp = $remember ? time()+ 18000 : 0;
                setcookie("nplh", $User->get("id").".".md5($User->get("password")), $exp, "/");

                if($remember) {
                    setcookie("nplrmm", "1", $exp, "/");
                } else {
                    setcookie("nplrmm", "1", time() - 18000, "/");
                }
                
                try { 
                $this->logs($User->get("id"), "success","Login","Usuário: <b>" . $User->get('firstname') . "</b> logado com sucesso");  
                } catch (Exception $e){
                $this->logs($User->get("id"), "error","Login","Usuário " . $User->get('firstname') . "não conseguiu realizar o login. <br/> Erro: " .$e);
                }  
              
                header("Location: ".APPURL."/usuarios");
                exit;
            }
        }

        return $this;
    }
}