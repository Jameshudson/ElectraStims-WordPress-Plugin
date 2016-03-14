<?php

namespace modules\product_list{

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    use modules\library\wrappers\menu\AdminSubMenu as AdminSubMenu;

    class ProductsList{

        private $products;

        public function __construct($menu) {

            $setting = new Setting();

            $page = new \modules\product_list\html\Page();

            $subMenu = new AdminSubMenu();

            $subMenu->setPageTitle("Product List");
            $subMenu->setMenuTitle("Product List");
            $subMenu->setCapability("manage_options");
            $subMenu->setMenuSlug("product_list");
            $subMenu->setCallBack(array($page, "handler"));

            $menu->addSubMenu($subMenu);
        }
    }
}