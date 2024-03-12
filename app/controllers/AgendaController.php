<?php
/**
 * Index Controller
 */
class AgendaController extends Controller
{
    /**
     * Process
     */
    public function process()    {          

       $this->setVariable("Settings", Controller::model("GeneralData", "settings"));    

       $this->view("agenda");
    }
}