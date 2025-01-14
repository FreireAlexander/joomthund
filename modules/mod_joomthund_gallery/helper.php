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



class ModJoomthundGallery
{
    /**
     * Retrieves the hello message
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     */    
    public static function getImages($params)
    {   
        $array = json_decode(json_encode($params['images_']), true);
        return $array;
    }
    public static function getFolder($folderPath)
    {   
        $fullpath = JPATH_SITE . '/images/' . $folderPath;
        $relativepath = 'images/' . $folderPath;
        $filter = '\.webp$|\.jpg$|\.jpeg$|\.png$|\.gif$|\.bmp$';
        $files = JFolder::files($fullpath, $filter);
        $filessrc = [];
        foreach($files as $file){
            $filessrc[] .= $relativepath . '/' . $file;
        }

        return $filessrc;
    }
    public static function getContainer($params)
    {   
        $array = json_decode(json_encode($params['container_']), true);
        return $array;
    }
    
    public static function getImagesSettings($params)
    {   
        $array = json_decode(json_encode($params['imagesSettings_']), true);
        return $array;
    }
    

}
