<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** $templateParams me ayuda a trar las variables de mi template */
$templateParams = JFactory::getApplication()->getTemplate(true)->params;
$miParametro = $templateParams->get('theme');

$menu = JFactory::getApplication()->getMenu();
$items = $menu->getItems('menutype', $params->get('menutype')); // Cambia 'mainmenu' por el nombre de tu menú
$parent_id = (int) $params->get('startLevel');

$app = JFactory::getApplication();
$params = $app->getTemplate(true)->params;

$slogan = $params->get('slogan');
$brandname_ = $params->get('brandname_');

// Obtener el valor del parámetro 'logoFile'
$logoFile = $params->get('logoFile');

$logo = HTMLHelper::_('image', 
            Uri::root(false) . htmlspecialchars($logoFile, ENT_QUOTES),
            $sitename, 
            ['loading' => 'eager', 'decoding' => 'async', 'class' => 'brand__logo'],
            false,
            0);

// Utilizar el valor del parámetro como desees

// Imprimir el menú
?>

<input type="checkbox" name="side-active" id="side-active">
<label class="sidebar__button" for="side-active">
                    <div class="bar"></div>
                    <div class="bar bar-center"></div>
                    <div class="bar"></div>
</label>
<label class="side-overlay" for="side-active"></label>
<?php
echo '<div class="sidebar">';
echo '<a class="brand" href="/">
                <figure class="brand__figure">
                    ' . $logo . '
                </figure>
                <div>';
                foreach($brandname_ as $line){
                    echo '<p class="brand__name">'. $line->line .'</p>';
                }
                    
echo                '<p class="brand__slogan">' . $slogan . ' </p>
                </div>
    </a>
    <div class="sidebar__separator"></div>';
echo '<ul class="sidebar__menu">';
foreach ($items as $item) {
    if ($item->parent_id == 1 && ($item->home != 1) ) { // Cambia 1 por el ID del menú principal si es diferente
        echo '<li class="sidebar__link">';
        echo '<input class="sidebar__submenu--check" type="checkbox" name="" id="sidebar__submenu--'.$item->title.'">';
        echo '<div class="sidebar__ref-flex">';
        echo '<div class="sidebar__ref-container">';
        echo '<a class="sidebar__ref" href="' . JRoute::_($item->link) . '">' . $item->title . '</a>';
        echo '<span class="sideborder__bottom"></span>';
        echo '</div>';
        $subItems = $menu->getItems('parent_id', $item->id);
        if (!empty($subItems)) {
            echo '  <label for="sidebar__submenu--'.$item->title.'">
                        <span class="icon-expand material-symbols-outlined">
                            expand_more
                        </span>
                    </label>
                    </div>';
            echo '<ul class="sidebar__submenu">';
            foreach ($subItems as $subItem) {
                echo '<li class="sidebar__submenu--link">';
                echo '<a class="sidebar__submenu--ref" href="' . JRoute::_($subItem->link) . '">' . $subItem->title . '</a></li>';
            }
            echo '</ul>';
        }
        
        echo '</li>';
    }
}
echo '</ul>';
echo '</div>';
/** echo $logo; */
?>

<?php
echo '<ul class="navbar__menu">';
foreach ($items as $item) {
    if ($item->parent_id == 1 && ($item->home != 1) ) { // Cambia 1 por el ID del menú principal si es diferente
        echo '<li class="navbar__link">';
        $subItems = $menu->getItems('parent_id', $item->id);
        if (!empty($subItems)) {
            echo '<ul class="navbar__menu navbar__menu--sub">';
            foreach ($subItems as $subItem) {
                echo '<li class="navbar__link navbar__link--sub">';
                echo '<a class="navbar__ref navbar__ref--sub" href="' . JRoute::_($subItem->link) . '">' . $subItem->title . '</a></li>';
            }
            echo '</ul>';
        }
        echo '<a class="navbar__ref" href="' . JRoute::_($item->link) . '">' . $item->title . '</a>';
        echo '<span class="border__bottom"></span>';
        echo '</li>';
    }
}
echo '</ul>';
/** echo $logo; */
?>


