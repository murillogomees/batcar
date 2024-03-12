<?php 
/**
 * Users model
 *
 * @version 1.0
 * @author Onelab <hello@onelab.co> 
 * 
 */
class CarrosModel extends DataList
{	
	/**
	 * Initialize
	 */
	public function __construct()
	{
		$this->setQuery(DB::table(TABLE_PREFIX.TABLE_CARROS));        
	}

    public function search($search_query)
    {
        parent::search($search_query);
        $search_query = $this->getSearchQuery();

        if (!$search_query) {
            return $this;
        }

        $query = $this->getQuery();
        $search_strings = array_unique((explode(" ", $search_query)));
        foreach ($search_strings as $sq) {
            $sq = trim($sq);

            if (!$sq) {
                continue;
            }

            $query->where(function($q) use($sq) {
                $q->where(TABLE_PREFIX.TABLE_CARROS.".id_carro", "LIKE", $sq."%");
								$q->orWhere(TABLE_PREFIX.TABLE_CARROS.".marca", "LIKE", "%". $sq."%");
								$q->orWhere(TABLE_PREFIX.TABLE_CARROS.".modelo", "LIKE", "%". $sq."%");	
								$q->orWhere(TABLE_PREFIX.TABLE_CARROS.".categoria", "LIKE", "%". $sq."%");	
								$q->orWhere(TABLE_PREFIX.TABLE_CARROS.".tipo_carro", "LIKE", "%". $sq."%");	
                $q->orWhere(TABLE_PREFIX.TABLE_CARROS.".nome", "LIKE", "%". $sq ."%");
							  $q->orWhere(TABLE_PREFIX.TABLE_CARROS.".ano_fabricacao", "LIKE",  $sq ."%");
							  $q->orWhere(TABLE_PREFIX.TABLE_CARROS.".ano_lancamento", "LIKE",  $sq ."%");
						  	$q->orWhere(TABLE_PREFIX.TABLE_CARROS.".km_rodados", "LIKE", $sq ."%");
						  	$q->orWhere(TABLE_PREFIX.TABLE_CARROS.".acessorios", "LIKE", "%" . $sq ."%");
							
            });
        }

        return $this;
    }

    public function fetchData()
    {
        $this->paginate();

        $this->getQuery()
             ->select(TABLE_PREFIX.TABLE_CARROS.".*");             
        $this->data = $this->getQuery()->get();
        return $this;
    }
}
