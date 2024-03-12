
              
         <div class="asidenav subMenuStorge">
           <a href="javascript:void(0)"><div class="title-submenu back-menu" data-value="settings"><span class="sli sli-arrow-left-circle"></span><span class="back-text">FECHAR</span></div></a>
            <div class="title-submenu"><span class="sli sli-settings menu-icon" style="margin-right:10px;"></span><?= __("CONFIGURAÇÃO DO SISTEMA") ?></div>
            <div class="asidenav-group-first">
                <div class="asidenav-title">» <?= __("Configuração") ?></div>
                <ul>
                    <a href="<?= APPURL."/settings/site" ?>"><li class="<?= $page == "site" ? "active" : "" ?>">➥ <?= __("Ajustes do site") ?></li></a>
                    <a href="<?= APPURL."/settings/smtp" ?>"><li class="<?= $page == "smtp" ? "active" : "" ?>">➥ <?= __("SMTP") ?></li></a>
                    <a href="<?= APPURL."/logs" ?>"><li class="<?= $page == "logs" ? "active" : "" ?>">➥ <?= __("Logs do Sistema") ?></li></a>
                </ul>
            </div>            
        </div>
