<?php

defined('_JEXEC') or die;
// Include the syndicate functions only once

use Joomla\CMS\Factory;

$document = Factory::getDocument();
$basePath = JUri::base();

$AddStyle = '$document->addStyleDeclaration(\' '. $css .' \');';
eval($AddStyle);

?>



<?php
    $AddJS = 'echo \'<script>' . $js . '</script>\';';
    $AddHTML = 'echo \'' . $html . '\';';  
    eval($AddHTML);
    eval($AddJS);
?>
