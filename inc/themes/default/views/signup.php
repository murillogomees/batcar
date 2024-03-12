<?php if (!defined('APP_VERSION')) die("Yo, what's up?"); ?>
<!DOCTYPE html>
<html class="no-js" lang="<?= ACTIVE_LANG ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <meta name="theme-color" content="#fff">

        <meta name="description" content="<?= site_settings("site_description") ?>">
        <meta name="keywords" content="<?= site_settings("site_keywords") ?>">

        <link rel="icon" href="<?= site_settings("logomark") ? site_settings("logomark") : active_theme_url() . "/assets/images/favicon.png"?>" type="image/x-icon">
        <link rel="shortcut icon" href="<?= site_settings("logomark") ? site_settings("logomark") : active_theme_url() . "/assets/images/favicon.png"?>" type="image/x-icon">
        
        <link rel="stylesheet" type="text/css" href="<?= active_theme_url() . "/assets/styles/vendor.css?v=neptun010002" . VERSION ?>">
        <link rel="stylesheet" type="text/css" href="<?= active_theme_url() . "/assets/styles/main.css?v=neptun010002" . VERSION ?>">


        <title><?= __("Cadastro de Usuário") ?></title>
    </head>

    <body>
        <section id="signin">
            <div class="page-holder clearfix">              
               <div class="signup side flex flex-center flex-middle" style="left:0px !important">
               </div>             
            </div>
                
            
            <div class="signup-form pos-signup">
               <div class="form-holder">
                 <div class="form">
                   <h2 style="color:#5a5a5a; text-align:center;">
                     CADASTRO
                   </h2>
                    <form action="<?= APPURL."/signup" ?>" method="POST" autocomplete="off">
                       <input type="hidden" name="action" value="signup">
           
                                <div class="form-element">
                                    <div class="input-wrapper material-style">
                                        <input type="text" class="input-style <?= Input::Post("firstname") ? "has-value" : "" ?>" name="firstname" placeholder="Razão Social" value="<?= htmlchars(Input::Post("firstname")) ?>">
                                       
                                    </div>
                                </div>                                
                                  
                                  <div class="form-element">
                                    <div class="input-wrapper  material-style">
                                        <input type="text" name="cpf/cnpj" class="input-style <?= Input::Post("cpf") ? "has-value" : "" ?>" placeholder="CNPJ" value="<?= htmlchars(Input::Post("cpf/cnpj")) ?>">
                                    </div>
                                </div>

                                <div class="form-element">
                                    <div class="input-wrapper  material-style">
                                        <input type="email" name="email" class="input-style <?= Input::Post("email") ? "has-value" : ""  ?>" placeholder=" E-mail" value="<?= htmlchars(Input::Post("email")) ?>">
                                    </div>
                                </div>
                                
                                <div class="form-element">
                                    <div class="input-wrapper material-style">
                                        <input type="tel" class="input-style <?= Input::Post("phone") ? "has-value" : "" ?>" name="phone" placeholder="Celular com DDD" value="<?= htmlchars(Input::Post("phone")) ?>">
                                    </div>
                                </div>

                                <div class="form-element">
                                    <div class="input-wrapper  material-style">
                                        <input type="password" class="input-style" name="password" placeholder="Senha">
                                    </div>
                                </div>

                                <div class="form-element">
                                    <div class="input-wrapper  material-style">
                                        <input type="password" class="input-style" placeholder ="Confirme a senha" name="password-confirm">
                                    </div>
                                </div>
                                 <small style="font-style:italic; color:#f33c6c; margin-bottom: 20px;">* Seus dados são totalmente confidenciais e não são compartilhados com terceiros.</small>
                                

                                <div class="form-element submit" style="margin-top: 30px; text-align: center;">
                                    <button class="button-style" type="submit">
                                        <?= __("Cadastrar") ?>
                                    </button>                                   
                                </div>
                                 <center>
                                   <a href="<?= APPURL . "/login"?>"><small style="font-style:italic; margin-bottom: 20px;top: -10px">Já tem um usuário? Acesse agora.</small></a>
                                 </center>
                            </form>
                            </div>
               </div>
            </div>
            
        </section>

        <script type="text/javascript" src="<?= active_theme_url() . "/assets/scripts/vendor.js?v=neptun010002" . VERSION?>"></script>
        <script type="text/javascript" src="<?= active_theme_url() . "/assets/scripts/main.js?v=neptun010002" . VERSION?>"></script>
        <script type="text/javascript" charset="utf-8">
        </script>
        <?php require_once APPPATH . '/views/fragments/google-analytics.fragment.php';?>
    </body>
</html>