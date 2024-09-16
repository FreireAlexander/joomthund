<?php

defined('_JEXEC') or die;
// Include the syndicate functions only once

use Joomla\CMS\Factory;

$document = Factory::getDocument();
$basePath = JUri::base();

$min_columns = (float) $min_columns;
$max_columns = (float) $max_columns;

$value1 = 300 / ($min_columns + 1);
$value2 = 1400 / ($max_columns + 1);
if($value1>=$value2){
    $max_width = $value1;
    $min_width = $value2;
}else{
    $max_width = $value2;
    $min_width = $value1;
}
$css = '
    .container_'. $unique .'{
        display: flex;
        flex-wrap:         ' . $container['flex_wrap'] . ' ;
        align-items: ' . $container['align_items'] . ' ;
        justify-content: ' . $container['justify_content'] . ' ;
        width: 100%;       ' . $container['flex_wrap'] . ' ;
                          
        padding-top:       ' . $container['padding_top'] . ' ;    
        padding-bottom:    ' . $container['padding_bottom'] . ' ;    
        padding-left:      ' . $container['padding_left'] . ' ;    
        padding-right:     ' . $container['padding_right'] . ' ;    
        row-gap:           ' . $container['row_gap'] . ' ;
        column-gap:        ' . $container['column_gap'] . ' ;
        border-radius:       ' . $container['border_radius'] . ' ; 
        background-color:  ' . $container['background_color'] . ' ;        
    }
    .img_'. $unique .'{
        width: calc(100% / ('.$max_columns.' + 1));
        min-width: ' . $min_width . 'px ; 
        max-width: ' . $max_width . 'px ; 
        aspect-ratio: 1/1;
        padding: ' . $imagesSettings['padding'] . ' ; 
        border-width: ' . $imagesSettings['border_width'] . ' ; 
        border-style: ' . $imagesSettings['border_style'] . ' ; 
        border-radius: ' . $imagesSettings['border_radius'] . ' ;
        border-color: ' . $imagesSettings['border_color'] . ' ; 
        object-fit: ' . $imagesSettings['object_fit'] . ' ; 
    }       
    

    ';

$document->addStyleDeclaration($css);

?>



<?php

echo '<div class="container_' . $unique . '">';
if($options == '1'){
   foreach($images as $image){
        echo '<img class="img_'. $unique .'" src="' . $image['image'] . '" alt="">';
    } 
}else{
    foreach($folderlist as $image){
        echo '<img class="img_'. $unique .'" src="' . $image . '" alt="">';
    }
}

echo '</div>';
?>
