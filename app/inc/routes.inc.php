<?php
// Language slug
//
// Will be used theme routes
$langs = [];
foreach (Config::get("applangs") as $l) {
    if (!in_array($l["code"], $langs)) {
        $langs[] = $l["code"];
    }

    if (!in_array($l["shortcode"], $langs)) {
        $langs[] = $l["shortcode"];
    }
}
$langslug = $langs ? "[".implode("|", $langs).":lang]" : "";


App::addRoute("GET|POST", "/", "Index");
App::addRoute("GET|POST", "/lista-carros/?", "ListaCarro");
App::addRoute("GET|POST", "/lista-carros/[a:marca]/?", "ListaCarro");
App::addRoute("GET|POST", "/detalhes-carros", "DetalhesCarros");
App::addRoute("GET|POST", "/detalhes-carros/[i:id]/?", "DetalhesCarros");
App::addRoute("GET|POST", "/contato", "Contato");
App::addRoute("GET|POST", "/como-vender", "ComoVender");
App::addRoute("GET|POST", "/como-funciona", "ComoFunciona");
App::addRoute("GET|POST", "/perguntas-frequentes", "Faq");
App::addRoute("GET|POST", "/agenda", "Agenda");
App::addRoute("GET|POST", "/politica-privacidade", "PoliticaPrivacidade");

App::addRoute("GET|POST", "/".$langslug."?/?", "Login");

// Login
App::addRoute("GET|POST", "/".$langslug."?/login/?", "Login");

// Signup
App::addRoute("GET|POST", "/".$langslug."?/signup/?", "Signup");

// Logout
App::addRoute("GET", "/".$langslug."?/logout/?", "Logout");


$settings_pages = [
  "site", "logotype", "other", "experimental",
  "google-analytics", "google-drive", "dropbox", "onedrive", "paypal", "stripe", "facebook", "recaptcha",
  "proxy",

  "notifications", "smtp"
];

App::addRoute("GET|POST", "/cron/?", "Cron");
App::addRoute("GET|POST", "/cron/remover/?", "CronRemover");
// Configuração
App::addRoute("GET|POST", "/settings/[".implode("|", $settings_pages).":page]?/?", "Settings");



App::addRoute("GET|POST", "/profile/?", "Profile");
App::addRoute("GET|POST", "/recaptcha/?", "Recaptcha");
// Perfil

// Usuario
App::addRoute("GET|POST", "/usuarios/?", "Users");
App::addRoute("GET|POST", "/usuarios/new/?", "User");
App::addRoute("GET|POST", "/usuarios/[i:id]/?", "User");

App::addRoute("GET|POST", "/usuarios/[i:id]/?", "User");

App::addRoute("GET|POST", "/lcfiltro/?", "LCFiltro");
App::addRoute("GET|POST", "/lcfiltro/[i:id]/?", "LCFiltro");
App::addRoute("GET|POST", "/teste/?", "Teste");

// Recovery
App::addRoute("GET|POST", "/".$langslug."?/recovery/?", "Recovery");
App::addRoute("GET|POST", "/".$langslug."?/recovery/[i:id].[a:hash]/?", "PasswordReset");
App::addRoute("GET|POST", "/".$langslug."?/novasenha/?", "NovaSenha");
