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
// Cards
$cards = ModJoomthundCards::getCards($params);
$title = ModJoomthundCards::getTitle($params);
$description = ModJoomthundCards::getDescription($params);
$columns = $params['columns'];

// Container variables
$container_settings = ModJoomthundCards::getContainerSettings($params);

//Card Variables
$card_settings = ModJoomthundCards::getCardSettings($params);

//Card Image Variables
$image_settings = ModJoomthundCards::getImageSettings($params);

require ModuleHelper::getLayoutPath('mod_joomthund_cards', $params->get('layout', 'default'));
?>



