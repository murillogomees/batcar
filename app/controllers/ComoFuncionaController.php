<?php
/**
 * Index Controller
 */
class ComoFuncionaController extends Controller
{
    /**
     * Process
     */
    public function process()    {          

        // Set variables
        $this->setVariable("Settings", Controller::model("GeneralData", "settings"));    

        $this->view("como-funciona");
    }
}