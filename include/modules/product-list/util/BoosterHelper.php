<?php  

namespace modules\product_list\util;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class BoosterHelper{

	const GBP = "GBP";
	const USD = "USD";
	const EURO = "EURO";
	const AUD = "AUD";
	const CAD = "CAD";

	private $regularPrice = '_' . 'wcj_' . 'price_by_country' . '_regular_price_' . 'local' . '_';
	private $salesPrice = '_' . 'wcj_' . 'price_by_country' . '_sale_price_' . 'local' . '_';

	private $currencyMap = array(
	                             BoosterHelper::GBP => 0,
	                             BoosterHelper::USD => 1,
	                             BoosterHelper::EURO => 2,
	                             BoosterHelper::AUD => 3,
	                             BoosterHelper::CAD => 4);
	
	public function getPrice($id, $currency, $sales=false){
		
		if($sales == true){

			$result = get_post_meta($id, $this->salesPrice . $this->currencyMap[$currency]);
			var_dump($result);

			return ($result !== "") ? $result : "0";
		}else{

			$result = get_post_meta($id, $this->regularPrice . $this->currencyMap[$currency]);
			var_dump($result);

			return ($result !== "") ? $result : "0";
		}
	}

	public function updatePrice($id, $price, $currency, $sales=false){

		if($sales == true){

			update_post_meta($id, $this->salesPrice . $this->currencyMap[$currency], $price);
		}else{

			update_post_meta($id, $this->regularPrice . $this->currencyMap[$currency], $price);
		}
		
	}
}

?>