<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Helper\ModuleHelper;

$app   = Factory::getApplication();
$params = $this->params;
//Basic Params
// Theme Selection
$theme = $this->params->get('theme');
//Logo and Favicon
if ($this->params->get('logoFavicon')){
    $favicon = Uri::root(false) . htmlspecialchars($this->params->get('logoFavicon'), ENT_QUOTES);
}
$rotatelogoFile = $params->get('rotatelogofile');

// Brandname and Slogan
$slogan = $params->get('slogan');
$brandname_ = $params->get('brandname_');
$linesbrandname = count(json_decode(json_encode($brandname_), true));

// Logo file or site title param
if ($this->params->get('logoFile')) {
    $logo = HTMLHelper::_('image', 
            Uri::root(false) . htmlspecialchars($this->params->get('logoFile'), ENT_QUOTES),
            $sitename, 
            ['loading' => 'eager', 'decoding' => 'async', 'class' => 'brand__logo'],
            false,
            0);
} elseif ($brandname_) {
    $logo = '';
    foreach($brandname_ as $line){
                    $logo .= '<p>'. $line->line .'</p>';
                    }
} else {
    $logo .= '<p>No Logo</p>';
}

include_once 'themes/' . $theme . '/error.php';

?>