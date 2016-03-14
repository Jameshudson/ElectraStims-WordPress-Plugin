<?php 

namespace modules\product_list\util;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class Products{

	private $args = array('post_type' => array('product', 
	                                   'product_variation', 
	                                   'product_bundles'), 
	'posts_per_page' => -1);
	
	public function getAllProducts($value=''){

		$results = array();
		
		$loop = new \WP_Query( $this->args );

		while ( $loop->have_posts() ) : $loop->the_post();

        	global $product;

        	$meta_id = '_wcj_price_by_country_regular_price_local_' . 1;

            $rowUK = $product->get_price();
            $rowUKSell = $product->get_sale_price();

            //names and sku
            $results["title"] = $product->get_title();
            $results["sku"] = $product->get_sku();

            //prices
            $results["uk"] = ($rowUK) !== "" ? $rowUK : "0";
            $results["uk_sales"] = ($rowUKSell) !== "" ? $rowUKSell : "0";

            $helper = new BoosterHelper();

            //US prices
            $results["us"] = $helper->getPrice($product->id, BoosterHelper::USD);
            $results["us_sales"] = $helper->getPrice($product->id, BoosterHelper::USD, true);

            //EUOR prices
            $results["euro"] = $helper->getPrice($product->id, BoosterHelper::EURO);
            $results["euro_sales"] = $helper->getPrice($product->id, BoosterHelper::EURO, true);

            //AUD prices
            $results["aud"] = $helper->getPrice($product->id, BoosterHelper::AUD);
            $results["aud_sales"] = $helper->getPrice($product->id, BoosterHelper::AUD, true);

            //CAD prices
            $results["cad"] = $helper->getPrice($product->id, BoosterHelper::CAD);
            $results["cad_sales"] = $helper->getPrice($product->id, BoosterHelper::CAD, true);

        endwhile;

        return $results;
	}
}

?>