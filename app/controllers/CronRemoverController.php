       

<?php
/**
 * Index Controller
 */
class CronRemoverController extends Controller
{
    /**
     * Process
     */
    public function process()    {          

      $url = "http://app.revendamais.com.br/application/index.php/apiGeneratorXml/generator/sitedaloja/c51506a94daa42156152e193dee8b80e7268.xml";
      $xml = simplexml_load_file($url);

      $quantidade = 0;
      
      $Carros = Controller::model("Carros");
      $Carros->fetchData();
      
      foreach($Carros->getDataAs("Carro") as $c){
        
        foreach($xml as $x){
          if($c->get("id_carro") == $x->ID) {
            echo "Carro Nº: " . $x->ID . " ainda cadastrado.</br>";
            $apagou = 0;
            break;
          } else {
            $apagou = 1;
          }  
        }
        
        if ($apagou){
          $quantidade++;
          $c->remove();  
        }
        
      }
      
       echo "Quantidade Total de registros apagados [" . $quantidade . "]! <br>";
    }
}
 