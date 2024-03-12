<?php
/**
 * Index Controller
 */
class PoliticaPrivacidadeController extends Controller
{
    /**
     * Process
     */
    public function process()    {          

        // Set variables
        $this->setVariable("Settings", Controller::model("GeneralData", "settings"));    

        $this->view("politica-privacidade");
    }
}