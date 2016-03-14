<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 12:03
 */

namespace modules\product_list;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

use modules\library\PluginSettings;

class Setting extends PluginSettings{

    public function init(){

        $this->superInit();
    }

}