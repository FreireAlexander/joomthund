<?php
/**
 * Helper class for Hello World! module
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */



class ModJoomthundHero
{
    /**
     * Retrieves the hello message
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     */    
    public static function getBorderSettings($params)
    {   
        $array = json_decode(json_encode($params['border_']), true);
        return $array;
    }
    public static function getTitleSettings($params)
    {   
        $array = json_decode(json_encode($params['title_']), true);
        return $array;
    }
    public static function getImagesSettings($params)
    {   
        $array = json_decode(json_encode($params['images_']), true);
        return $array;
    }

}
