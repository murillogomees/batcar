<?php 
	/**
	 * Option Model
	 *
	 * @version 1.0
	 * @author Onelab <hello@onelab.co> 
	 * 
	 */
	
	class CarroModel extends DataEntry
	{	
		/**
		 * Extend parents constructor and select entry
		 * @param mixed $uniqid Value of the unique identifier
		 */
	    public function __construct($uniqid=0, $col = "id")
	    {
	        parent::__construct();
	        $this->select($uniqid, $col = "id");
	    }



	     /**
	     * Select entry with uniqid
	     * @param  int|string $uniqid Value of the any unique field
	     * @return self       
	     */
	    public function select($uniqid, $col = "id")
	    {	    	
	    	if ($col) {
		    	$query = DB::table(TABLE_PREFIX.TABLE_CARROS)
			    	      ->where($col, "=", $uniqid)
			    	      ->limit(1)
			    	      ->select("*");
		    	if ($query->count() == 1) {
		    		$resp = $query->get();
		    		$r = $resp[0];

		    		foreach ($r as $field => $value)
		    			$this->set($field, $value);

		    		$this->is_available = true;
		    	} else {
		    		$this->data = array();
		    		$this->is_available = false;
		    	}
	    	}

	    	return $this;
	    }


	    /**
	     * Extend default values
	     * @return self
	     */
	    public function extendDefaults()
	    {
	    	$defaults = array(
					"id" => null,
	    		"id_carro" => "",
	    		"nome" => "",
					"categoria" => "",
	    		"descricao" => "",
					"acessorios" => "",
	    		"marca" => "",
					"modelo" => "indefinido",
	    		"ano_lancamento" => "",
					"ano_fabricacao" => "",
	    		"condicao" => "",
					"km_rodados" => "",
	    		"combustivel" => "",
					"tipo_marcha" => "",
	    		"motor" => "",
					"placa" => "",
	    		"portas" => "",
					"cor" => "",
	    		"vendedor" => "",
					"telefone_vendedor" => "",
	    		"pais" => "",
					"estado" => "",
	    		"cidade" => "",
					"cep" => "",
					"endereco" => "",
	    		"fipe" => "",
					"destaque" => "",
	    		"valor_venda" => "",
					"preco_promocao" => "",
	    		"tipo_carro" => "",
					"potencia" => "",
	    		"base_modelo" => "",
					"ultima_atualizacao" => "",
	    		"ultima_atualizacao_api" => "",
					"fotos_url" => "",
					"foto_capa" => "",
					"foto_unica" => ""
	    	);


	    	foreach ($defaults as $field => $value) {
	    		if (is_null($this->get($field)))
	    			$this->set($field, $value);
	    	}
	    }


	    /**
	     * Insert Data as new entry
	     */
	    public function insert()
	    {
	    	if ($this->isAvailable())
	    		return false;

	    	$this->extendDefaults();

	    	$id = DB::table(TABLE_PREFIX.TABLE_CARROS)
		    	->insert(array(
		    		"id" => null,
		    		"id_carro" => $this->get("id_carro"),
						"nome" => $this->get("nome"),
						"categoria" => $this->get("categoria"),
						"descricao" => $this->get("descricao"),
						"acessorios" => $this->get("acessorios"),
						"marca" => $this->get("marca"),
						"modelo" => $this->get("modelo"),
						"ano_lancamento" => $this->get("ano_lancamento"),
						"ano_fabricacao" => $this->get("ano_fabricacao"),
						"condicao" => $this->get("condicao"),
						"km_rodados" => $this->get("km_rodados"),
						"combustivel" => $this->get("combustivel"),
						"tipo_marcha" => $this->get("tipo_marcha"),
						"motor" => $this->get("motor"),
						"placa" => $this->get("placa"),
						"portas" => $this->get("portas"),
						"cor" => $this->get("cor"),
						"vendedor" => $this->get("vendedor"),
						"telefone_vendedor" => $this->get("telefone_vendedor"),
						"pais" => $this->get("pais"),
						"estado" => $this->get("estado"),
						"cidade" => $this->get("cidade"),
						"cep" => $this->get("cep"),
						"endereco" => $this->get("endereco"),
						"fipe" => $this->get("fipe"),
						"destaque" => $this->get("destaque"),
						"valor_venda" => $this->get("valor_venda"),
						"preco_promocao" => $this->get("preco_promocao"),
						"tipo_carro" => $this->get("tipo_carro"),
						"potencia" => $this->get("potencia"),
						"base_modelo" => $this->get("base_modelo"),
						"ultima_atualizacao_api" => $this->get("ultima_atualizacao_api"),
						"ultima_atualizacao" => $this->get("ultima_atualizacao"),
		    	  "fotos_url" => $this->get("fotos_url"),
						"foto_capa" => $this->get("foto_capa"),
						"foto_unica" => $this->get("foto_unica")
					));

	    	$this->set("id", $id);
	    	$this->markAsAvailable();
	    	return $this->get("id");
	    }


	    /**
	     * Update selected entry with Data
	     */
	    public function update()
	    {
	    	if (!$this->isAvailable())
	    		return false;

	    	$this->extendDefaults();

	    	$id = DB::table(TABLE_PREFIX.TABLE_CARROS)
	    		->where("id", "=", $this->get("id"))
		    	->update(array(
		    	  "id_carro" => $this->get("id_carro"),
						"nome" => $this->get("nome"),
						"categoria" => $this->get("categoria"),
						"descricao" => $this->get("descricao"),
						"acessorios" => $this->get("acessorios"),
						"marca" => $this->get("marca"),
						"modelo" => $this->get("modelo"),
						"ano_lancamento" => $this->get("ano_lancamento"),
						"ano_fabricacao" => $this->get("ano_fabricacao"),
						"condicao" => $this->get("condicao"),
						"km_rodados" => $this->get("km_rodados"),
						"combustivel" => $this->get("combustivel"),
						"tipo_marcha" => $this->get("tipo_marcha"),
						"motor" => $this->get("motor"),
						"placa" => $this->get("placa"),
						"portas" => $this->get("portas"),
						"cor" => $this->get("cor"),
						"vendedor" => $this->get("vendedor"),
						"telefone_vendedor" => $this->get("telefone_vendedor"),
						"pais" => $this->get("pais"),
						"estado" => $this->get("estado"),
						"cidade" => $this->get("cidade"),
						"cep" => $this->get("cep"),
						"endereco" => $this->get("endereco"),
						"fipe" => $this->get("fipe"),
						"destaque" => $this->get("destaque"),
						"valor_venda" => $this->get("valor_venda"),
						"preco_promocao" => $this->get("preco_promocao"),
						"tipo_carro" => $this->get("tipo_carro"),
						"potencia" => $this->get("potencia"),
						"base_modelo" => $this->get("base_modelo"),
						"ultima_atualizacao" => $this->get("ultima_atualizacao"),
						"ultima_atualizacao_api" => $this->get("ultima_atualizacao_api"),
						"fotos_url" => $this->get("fotos_url"),
						"foto_capa" => $this->get("foto_capa"),
						"foto_unica" => $this->get("foto_unica")
		    	));

	    	return $this;
	    }


	    /**
		 * Remove selected entry from database
		 */
	    public function delete()
	    {
	    	if(!$this->isAvailable())
	    		return false;

	    	DB::table(TABLE_PREFIX.TABLE_CARROS)->where("id", "=", $this->get("id"))->delete();
	    	$this->is_available = false;
	    	return true;
	    }
	}
?>