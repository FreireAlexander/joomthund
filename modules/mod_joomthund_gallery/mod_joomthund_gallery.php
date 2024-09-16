<?php
/**
 * Hello World! Module Entry Point
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @license    GNU/GPL, see LICENSE.php
 * @link       http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * 
 * 
 */

// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\HTML\HTMLHelper;

//Module unique id
$moduleId = $module->id;
$name = $module->name;
$unique = $name . '__' . $moduleId;

$min_columns = $params['min_columns'];
$max_columns = $params['max_columns'];
// Cards
$options = $params['options'];
$images = ModJoomthundGallery::getImages($params);
$folderlist = ModJoomthundGallery::getFolder($params['folder']);

$container = ModJoomthundGallery::getContainer($params);
$imagesSettings = ModJoomthundGallery::getImagesSettings($params);


require ModuleHelper::getLayoutPath('mod_joomthund_gallery', $params->get('layout', 'default'));
?>



