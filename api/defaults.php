<?
class defaults extends brain{
	function __construct(){
		parent::__construct();

		$query = $this->db->site->findOne(array(
			"type"=>"defaults"
		));

		$query["currency"] = "$";

		if( $query["template"] == "uk"  )
			$query["currency"] = "&pound;";

		if( $query["template"] == "forexbrokers" ){
			$query["template_cdn"] = "https://template.forexbrokers.com";
			$query["cdn"] = "https://cdn2.forexbrokers.com";
		}elseif( $query["template"] == "stocktrader" ){
			$query["template_cdn"] = "https://template.stocktrader.com";
			$query["cdn"] = "https://cdn2.forexbrokers.com";
		}else{
			$query["template_cdn"] = "https://template.stockbrokers.com";
			$query["cdn"] = "https://cdn.stockbrokers.com";
		}

		if( in_array($_GET["language"], ["de","it", "pt"]) ){
			foreach( $query[ $_GET["language"] ] as $k => $v ){
				$query[$k] = $v;
			}
		}

		return $this->defaults = $query;
	}
}