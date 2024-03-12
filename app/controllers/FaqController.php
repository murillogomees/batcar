<?php
/**
 * Index Controller
 */
class FaqController extends Controller
{
    /**
     * Process
     */
    public function process()    {          

        // Set variables
        $this->setVariable("Settings", Controller::model("GeneralData", "settings"));    

        $this->view("faq");
    }
}