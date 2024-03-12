<?php 
/**
 * Email class to send advanced HTML emails
 * 
 * @author Onelab <hello@onelab.co>
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
class Email extends PHPMailer{
    /**
     * Email template html
     * @var string
     */
    public static $template;


    /**
     * Email and notification settings from database
     * @var DataEntry
     */
  public static $emailSettings;


    /**
     * Site settings
     * @var DataEntry
     */
    public static $siteSettings;


    public function __construct(){  
      
    }

  
    /**
     * Send notifications
     * @param  string $type notification type
     * @return [type]       
     */
    public static function sendNotification($type = "cadastro-novo", $data = [])
    {
        switch ($type) { 
            case "como-vender":
                return self::sendComoVenderEmail($data);
                break;
            case "contato":
                return self::sendContato($data);
                break;
           case "veiculo":
                return self::sendVeiculo($data);
                break;
             case "password-recovery":
                return self::sendPasswordRecoveryEmail($data);
                break; 
            case "senha-alterada":
                return self::SendSenhaAlterada($data);
                break; 
              
            
            default:
                break;
        }
    }

     private static function configSmtp($mail)
    {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Username = 'atendimento@batcar.com';
      $mail->Password = 'zulckltdgu';
      $mail->Port = 587;
      $mail->CharSet = "UTF-8"; 
      $mail->setFrom('batcar');
      $mail->FromName = "batcar";
      return $mail;
    }
  
    private static function confirmEmail($mail)
    {
        if(!$mail->send()) {
            return 'Não foi possível enviar a mensagem.<br>';           
        } else {
            return 'Mensagem enviada.';
            $mail->ClearAllRecipients();
            $mail->ClearAttachments();
            $mail->ClearAddresses(); 
        }
      
        
    }
  
    private static function sendComoVenderEmail($data = [])
    {       
        $mail = new PHPMailer();
        $mail = self::configSmtp($mail);        
      
        $mail->Subject = "Formulario Como Vender";        
        
        $mail->addAddress("atendimento@batcar.com", "Como Vender");       
        
        $mail->addCC("murilloggomes@gmail.com", "Conferência");
        $mail->AddCC('134c0995d469@mail.revendamais.com.br', 'Cris');
      
        $mail->isHTML(true);
        $emailbody = "<p>Caro(a) usuário(a), </p>"
                
                   . "<p>Foi realizado um solicitação de avaliação.</p>"
                   . "<p>Informações sobre a solicitação: </p>"
                   . "<p><b>Nome Cliente: ". $data['nome'] ."</b></p>"
                   . "<p><b>Email Cliente: ". $data['email'] ."</b></p>"
                   . "<p><b>Telefone Cliente: ". $data['telefone'] ."</b></p>"
                   . "<p><b>Placa do Veiculo: ". $data['placa'] ."</b></p>"
                   . "<p><b>Marca do Veiculo: ". $data['marca'] ."</b></p>"
                   . "<p><b>Modelo do Veiculo: ". $data['modelo'] ."</b></p>"
                   . "<p><b>Cor do Veiculo: ". $data['cor'] ."</b></p>"
                   . "<p><b>LGPD: ". $data['lgpd'] ."</b></p>"
                  
                   . "<p>E-Mail enviado automaticamente devido preenchimento de formulario.</p>"
                   . "<p>batcar.com</p>";
      
        $mail->Body = $emailbody;   
      
        $mail = self::confirmEmail($mail);
      
        return $mail;
    }
  
  
      private static function sendVeiculo($data = [])
    {       
        $mail = new PHPMailer();
        $mail = self::configSmtp($mail);        
      
        $mail->Subject = "Formulario Detalhes Veiculo";        
        
        $mail->addAddress("atendimento@batcar.com", "Veiculo");       
        
        $mail->addCC("murilloggomes@gmail.com", "Conferência");
        $mail->AddCC('134c0995d469@mail.revendamais.com.br', 'Cris');
      
        $mail->isHTML(true);
        $emailbody = "<p>Caro(a) usuário(a), </p>"
                
                   . "<p>Foi enviado  Mensagem sobre o Veiculo ".$data['modelo']  .".</p>"
                   . "<p>Informações sobre a solicitação: </p>"
                   . "<p><b>Nome Cliente: ". $data['nome'] ."</b></p>"
                   . "<p><b>Email Cliente: ". $data['email'] ."</b></p>"
                   . "<p><b>Telefone Cliente: ". $data['telefone'] ."</b></p>"
                   . "<p><b>Mensagem do Cliente: ". $data['mensagem'] ."</b></p>"
                   . "<p><b>LGPD: ". $data['lgpd'] ."</b></p>"
                   . "<p><a href=". $data['url'] .">Visualizar veículo </a></p>"
                  
                   . "<p>E-Mail enviado automaticamente devido preenchimento de formulario.</p>"
                   . "<p>batcar.com</p>";
      
        $mail->Body = $emailbody;   
      
        $mail = self::confirmEmail($mail);
      
        return $mail;
    }
  
  
      private static function sendContato($data = [])
    {       
        $mail = new PHPMailer();
        $mail = self::configSmtp($mail);        
      
        $mail->Subject = "Formulario Contato";        
        
        $mail->addAddress("atendimento@batcar.com", "Contato");       
        
        $mail->addCC("murilloggomes@gmail.com", "Conferência");
        $mail->AddCC('134c0995d469@mail.revendamais.com.br', 'Cris');
        $mail->isHTML(true);
        $emailbody = "<p>Caro(a) usuário(a), </p>"
                
                   . "<p>Foi enviado contato atraves do formulario de contato.</p>"
                   . "<p>Informações sobre a solicitação: </p>"
                   . "<p><b>Nome Cliente: ". $data['nome'] ."</b></p>"
                   . "<p><b>Email Cliente: ". $data['email'] ."</b></p>"
                   . "<p><b>Telefone Cliente: ". $data['telefone'] ."</b></p>"
                   . "<p><b>Assunto: ". $data['assunto'] ."</b></p>"
                   . "<p><b>Mensagem: ". $data['mensagem'] ."</b></p>"
                 
                   . "<p>E-Mail enviado automaticamente devido preenchimento de formulario.</p>"
                   . "<p>batcar.com</p>";
      
        $mail->Body = $emailbody;   
      
        $mail = self::confirmEmail($mail);
      
        return $mail;
    }
  

    private static function sendPasswordRecoveryEmail($data = [])
    {
        $mail = new PHPMailer();
        $mail = self::configSmtp($mail);        
      
        $mail->Subject = "Recuperação de Senha - batcar"; 
        $user = $data["user"];       

        $hash = sha1(uniqid(readableRandomString(10), true));
        $user->set("data.recoveryhash", $hash)->save();
        $mail->isHTML(true);
        $mail->addAddress($user->get("email"));

        $emailbody = "<p>Caro(a) usuário(a), </p>"
                
                   . "<p>Foi realizado um pedido de mudança de senha vindo do batcar adm" . custom("nome") . ", caso não tenha sido você <a href=".APPURL.">acesse agora o nosso sistema</a> e altere sua senha!</p>"                
                   . "<a style='display: inline-block; background-color: #3b7cff; color: #fff; font-size: 14px; line-height: 24px; text-decoration: none; padding: 6px 12px; border-radius: 4px;' href='".APPURL."/recovery/".$user->get("id").".".$hash."'>".__("Clique aqui para resetar")."</a>"
                    
                   . "<p>E-Mail enviado automaticamente devido cadastro efetuado no batcar.</p>"
                   . "<p>Não utilizar a opção de 'Responder ao Remetente', pois sua mensagem não será lida.</p>"
                   . "<p>batcar.com</p>";


        $mail->Body = $emailbody;   
      
        $mail = self::confirmEmail($mail);
      
        return $mail;
    }
  
        private static function SendSenhaAlterada($data = [])
    {       
        $mail = new PHPMailer();
        $mail = self::configSmtp($mail);        
      
        $mail->Subject = "Alteração de senha - batcar";   
      
        $mail->addAddress($data['email']);
        
        $mail->addCC("murilloggomes@gmail.com", "Conferência ");  
        $mail->AddCC('134c0995d469@mail.revendamais.com.br', 'Cris');  
        $mail->isHTML(true);
        $emailbody = "<p>Olá, " . $data['nome']." </p>"
                
                   . "<p>Foi realizado uma alteração de senha vindo do batcar.com <a href='https://batcar.com' target='_blank'>acesse agora o site.</a> Caso não tenha sido você entre e altere agora mesmo! <a href='https://batcar.com' target='_blank'>acessar.</a> </p>"
                   . "<p> Sua senha foi alterada para: " . $data['pass']." </p>"
                  
                    
                   . "<p>E-Mail enviado automaticamente devido cotação efetuada via batcar.</p>"
                   . "<p>Não utilizar a opção de 'Responder ao Remetente', pois sua mensagem não será lida.</p>"
                   . "<p>batcar.com</p>";
      
        $mail->Body = $emailbody;   
      
        $mail = self::confirmEmail($mail);
      
        return $mail;
    }

    
}