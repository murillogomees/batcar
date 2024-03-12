<?php if (!defined('APP_VERSION')) die("Yo, what's up?"); ?>
<!DOCTYPE html>
<html class="no-js" lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <meta name="theme-color" content="#fff">

        <meta name="description" content="<?= site_settings("site_description") ?>">
        <meta name="keywords" content="<?= site_settings("site_keywords") ?>">

        <link rel="icon" href="<?= site_settings("logomark") ? site_settings("logomark") : active_theme_url() . "/assets/images/favicon.png"?>" type="image/x-icon">
        <link rel="shortcut icon" href="<?= site_settings("logomark") ? site_settings("logomark") : active_theme_url() . "/assets/images/favicon.png"?>" type="image/x-icon">
        
        
        <link rel="stylesheet" type="text/css" href="<?= active_theme_url() . "/assets/styles/main.css?v=neptun010002" . VERSION ?>">

        <title><?= site_settings("site_name") ?></title>
    </head>

    <body>
       
        <?php $action = \Input::post("action"); ?>
        <section id="signin">        
          
            <div class="page-holder clearfix">            
             
                <div class="signin side float-left flex flex-center flex-middle" data-active="<?= $action == "login" ? "true" : ($action=="signup" || $Route->target == "Signup" ? "false" : "") ?>">    
                    
                    <div class="signin-form">
                      <div style="width:100%">
                            <div class="image-horus mb-20">                              
                        </div>
                        </div>
                        <form action="<?= APPURL."/login" ?>" method="POST" autocomplete="off">
                            <input type="hidden" name="action" value="login">
                            <?php if (Input::post("action") == "login"): ?>
                                <div class="form-result">
                                    <div class="color-danger">
                                        <span class="mdi mdi-close"></span>
                                        </br>
                                        <?= __("Usuário e/ou senha incorretos!") ?>
                                    </div>
                                </div>
                            <?php endif; ?> 
                            <div class="form">                             
                                <div class="form-element">                                  
                                    <div class="input-wrapper material-style">
                                        <input type="text" 
                                               class="input-style" 
                                               id="username" 
                                               name="username"
                                               placeholder="E-mail"
                                               value="<?= htmlchars(Input::Post("username")) ?>">                                      
                                    </div>
                                </div>
                                <div class="form-element">
                                    <div class="input-wrapper  material-style">
                                        <input 
                                        type="password"
                                        class="input-style"
                                        id="password"
                                        placeholder="Senha"
                                        name="password"
                                        >                                       
                                    </div>
                                </div>
                                <div class="form-element submit">
                                    <button class="button-style purple" type="submit">
                                        <?= __('Acessar') ?>
                                    </button> 
                                
                                </div>
                               <div class="form-element submit">
                                    
                                  <input class="form-control" type="checkbox" id="remember-me" name="remember">
                                        <label for="remember-me">Lembrar Login</label>
                                </div>
                                <div class="reset-pass">
                                    <a href="<?= APPURL."/recovery" ?>"><?= __("Forgot your password?") ?></a>
                                </div>
<!--                               <div class="cadastre">
                                    <a href="#cadastro"><?= __("Cadastre-se agora!") ?></a>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
                
<!--                 <div class="signup side float-left flex flex-start flex-middle" data-active="<?= $action == "signup" || $Route->target == "signup" ? "true" : ($action=="login" ? "false" : "") ?>">
                    <div class="details">
                        <div class="heading-title">
                            <h6> <?= __("Cadastre-se") ?></h6>
                        </div>
                        <div class='extra'>
                            <div class="desc-text">
                                <p><?= __("Rapido e simples!<br> Não dura nem 30 segundos.") ?></p>
                            </div>                        
                            <a href="<?= APPURL."/signup" ?>" class="sign-up button-style"><?= __("Comece Agora") ?></a>
                        </div>
                    </div>

                    <div id="cadastro" class="signup-form">
                        <div class="form-holder">                            
                            <div class="form">
                                <form action="<?= APPURL."/signup" ?>" method="POST" autocomplete="off">
                                <input type="hidden" name="action" value="signup">
                                <?php if (!empty($FormErrors)): ?>
                                    <div class="form-result">
                                        <?php foreach ($FormErrors as $error): ?>
                                            <div class="color-danger">
                                                <span class="mdi mdi-close"></span>
                                                <?= $error ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="form-element">
                                    <div class="input-wrapper material-style">
                                        <input type="text" class="input-style <?= Input::Post("firstname") ? "has-value" : "" ?>" name="firstname" placeholder="Razão Social" value="<?= htmlchars(Input::Post("firstname")) ?>">
                                    </div>
                                </div>                                
                                  <div class="form-element">
                                    <div class="input-wrapper  material-style">
                                        <input type="text" name="cpf/cnpj" class="input-style <?= Input::Post("cpf/cnpj") ? "has-value" : "" ?>" placeholder="CNPJ" value="<?= htmlchars(Input::Post("cpf/cnpj")) ?>" value="<?= htmlchars(Input::Post("cpf/cnpj")) ?>">
                                    </div>
                                </div>
                                <div class="form-element">
                                    <div class="input-wrapper  material-style">
                                        <input type="email" name="email" class="input-style <?= Input::Post("email") ? "has-value" : ""  ?>" placeholder=" E-mail" value="<?= htmlchars(Input::Post("email")) ?>" value="<?= htmlchars(Input::Post("email")) ?>">
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
                                <div class="form-element submit">
                                    <button class="button-style purple" type="submit">
                                        <?= __("Conecte-se agora") ?>
                                    </button>
                                </div>
                            </form>
                            </div>
                            <div class="agreement">                               
                               <div style="color:#fff">                                     
                                 <a style="font-weight:700;" href="<?= APPURL."/login" ?>"><?= __("Já possui uma conta? Acesse aqui!") ?></a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
        <link rel="stylesheet" type="text/css" href="<?= active_theme_url() . "/assets/styles/vendor.css?v=neptun010002" . VERSION ?>">
        <script type="text/javascript" src="<?= active_theme_url() . "/assets/scripts/vendor.js?v=neptun010002" . VERSION?>"></script>
        <script type="text/javascript" src="<?= active_theme_url() . "/assets/scripts/main.js?v=neptun010002" . VERSION?>"></script>
       
        <?php require_once APPPATH . '/views/fragments/google-analytics.fragment.php';?>     
    </body>
</html>