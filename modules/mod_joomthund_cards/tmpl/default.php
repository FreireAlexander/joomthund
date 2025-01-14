<?php

defined('_JEXEC') or die;
// Include the syndicate functions only once

use Joomla\CMS\Factory;

$document = Factory::getDocument();
$basePath = JUri::base();


$css = '
    .container_'. $unique .'{
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        width: 100%;
        
        padding-top:' . $container_settings['padding_top'] . ' ;
        padding-bottom:' . $container_settings['padding_bottom'] . ' ;
        padding-left:' . $container_settings['padding_left'] . ' ;
        padding-right:' . $container_settings['padding_right'] . ' ;
        row-gap: ' . $container_settings['row_gap'] . ';
        background-color: ' . $container_settings['background_color'] . ';
    }
            
    .row_'. $unique .'{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: ' . $container_settings['row_gap'] . ';
    }
    

    .card_'. $unique .'{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: ' . $card_settings['width'] . ';
        height: fit-content;
        padding-top:' .     $card_settings['padding_top'] . ' ;
        padding-bottom:' .  $card_settings['padding_bottom'] . ' ;
        padding-left:' .    $card_settings['padding_left'] . ' ;
        padding-right:' .   $card_settings['padding_right'] . ' ;
        
        border-width: ' .   $card_settings['border_width'] . ' ;
        border-style: ' .   $card_settings['border_style'] . ' ;
        border-radius: ' .  $card_settings['border_radius'] . ' ;
        border-color: ' .   $card_settings['border_color'] . ' ;
        
        background-color: ' .   $card_settings['background_color'] . ' ;
    }
    
    .card_'. $unique .':hover{
        background-color: ' .   $card_settings['background_color__hover'] . ' ;
    }

    .card_image_'. $unique .'{
        width:  calc(0.667 * ' . $card_settings['width'] . ');
        height: calc(0.667 * ' . $card_settings['width'] . ');
        
        border-width: ' .   $image_settings['border_width'] . ' ;
        border-style: ' .   $image_settings['border_style'] . ' ;
        border-radius: ' .  $image_settings['border_radius'] . ' ;
        border-color: ' .   $image_settings['border_color'] . ' ;
        
        object-fit: ' .   $image_settings['object_fit'] . ' ;
        
        transform: ' .   $image_settings['transform'] . ' ;
        
        transition: ease-out 600ms;
    }
    
    .card_'. $unique .':hover figure .card_image_'. $unique .'{
        transform: ' .   $image_settings['transform__hover'] . ' ;
        border-color: ' .   $image_settings['border_color__hover'] . ' ;
        transition: ease-in 600ms;
    }
    
    
    .card_title_'. $unique .'::-webkit-scrollbar {
        display: none;
    }
    
    
    
    .card_title_'. $unique .' {
        display: flex;
        align-items: ' .  $title['align_items'] . ' ;
        justify-content: ' .   $title['justify_content'] . ' ;
        width: 100%;
        line-height: 100%;
        
        height:  ' .   $title['height'] . ' ;
        padding-top: ' .   $title['padding_top'] . ' ;
        padding-bottom: ' .   $title['padding_bottom'] . ' ;
        padding-left: ' .   $title['padding_left'] . ' ;
        padding-right: ' .   $title['padding_left'] . ' ;
        
        font-size: ' .   $title['font_size'] . ' ;
        font-weight: ' .   $title['font_weight'] . ' ;
        text-align: ' .   $title['text_align'] . ' ;
        overflow-y: ' .   $title['overflow'] . ' ;
        text-overflow: clip;
        text-wrap: ' .   $title['text_wrap'] . ' ;
        vertical-align: middle;
        
        color: ' .  $title['font_color'] . ' ;
    }
    
    .card_'. $unique .':hover .card_title_'. $unique .'{
        color: ' .   $title['font_color__hover'] . ' ;
    }
    
    .card_description_'. $unique .'::-webkit-scrollbar {
        display: none;
    }
    
    .card_description_'. $unique .' {
        display: flex;
        align-items: ' .        $description['align_items'] . ' ;
        justify-content: ' .    $description['justify_content'] . ' ;
        width: 100%;
        line-height: 100%;
        
        height:  ' .    $description['height'] . ' ;
        padding-top: ' .        $description['padding_top'] . ' ;
        padding-bottom: ' .     $description['padding_bottom'] . ' ;
        padding-left: ' .       $description['padding_left'] . ' ;
        padding-right: ' .      $description['padding_left'] . ' ;
        
        font-size: ' .      $description['font_size'] . ' ;
        font-weight: ' .    $description['font_weight'] . ' ;
        text-align: ' .     $description['text_align'] . ' ;
        overflow-y: ' .     $description['overflow'] . ' ;
        text-overflow: clip;
        text-wrap: ' .     $description['text_wrap'] . ' ;
        vertical-align: middle;
        
        color: ' .   $description['font_color'] . ' ;
    }
    
    .card_'. $unique .':hover .card_description_'. $unique .'{
        color: ' .   $description['font_color__hover'] . ' ;
    }


    ';

$document->addStyleDeclaration($css);

?>



<?php

echo '<div class="container_' . $unique . '">';
$counter = 0;
echo '<div class="row_' . $unique . '">';
foreach ($cards as $card) {
    echo '<a href="' . (($card['href']!='#') ? JRoute::_("index.php?Itemid={$card['href']}") : 'javascript:void(0)')  . '" class="card_'. $unique .'">
        <figure>
            <img class="card_image_'. $unique .'" src="'. $card['image'] . '" alt="' . $card['title'] . '" ">
        </figure>
        <h1 class="card_title_'. $unique .'" > ' . $card['title']  .  '</h1>
        <p class="card_description_'. $unique .'" > ' . $card['description']  .  '</p>
         </a>';
    $counter++;
    if ($counter % $columns == 0) {
        echo "</div>";
        if ($counter != count($cards)) {
            echo '<div class="row_' . $unique . '">';
        }
    }
}

if ($counter % $columns != 0) {
    echo "</div>";
}
echo '</div>';
?>
