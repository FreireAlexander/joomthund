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
        flex-wrap: nowrap;
        width: 100%; 
    }
    
    .hero_'. $unique .' {
        width: 100%;
        aspect-ratio: 16/9;
        max-height: '. $height .';
        min-height: calc('. $height .' / 2);
        position: relative;
        box-sizing: border-box;
    }
    
    .hero__background_'. $unique .' {
        width: 100%;
        height: 100%;
        /* Add the blur effect */
        filter: blur(5px);
        -webkit-filter: blur(5px);
        /* Center and scale the image nicely */
        background-size: cover;
        background-repeat: no-repeat;
    }
    
    .hero__container_'. $unique .' {
        box-sizing: border-box;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: nowrap;
        opacity: 1;
        
    }
    
    .hero__title-container_'. $unique .' {
        display: flex;
        align-items:     '.$titleSettings['align_items'].';
        justify-content: '.$titleSettings['justify_content'].';
        min-width: 45%;
        aspect-ratio: 16/9;
        height: '.$max_height.'%;
        max-height: calc( ' . $height . '  - ( ' . $height . ' * '. $max_height .' / 100 ));
        
        padding-inline: 5%;
        border-width: '.$borderSetting['border_width'].';
        border-top-left-radius: '.$borderSetting['border_radius'].' ;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: '.$borderSetting['border_radius'].' ;
        border-style: '.$borderSetting['border_style'].';
        border-color: '.$borderSetting['border_color'].';
        
        padding-top:    '.$titleSettings['padding_top'].';
        padding-bottom: '.$titleSettings['padding_bottom'].';
        padding-left:   '.$titleSettings['padding_left'].';
        padding-right:  '.$titleSettings['padding_right'].';
        background-color: '.$titleSettings['background_color'].';
    }
    
    .hero__title_'. $unique .'{
        color: '.$titleSettings['font_color'].';
        font-size: clamp(1.5rem, 0.289rem + 3.377vw, 5rem);
        line-height: 100%;
        font-weight: '.$titleSettings['font_weight'].';
        text-align: '.$titleSettintgs['text_align'].';
        text-wrap: '.$titleSettings['text_wrap'].';
    }
    
    .hero__figure_'. $unique .'{
        margin: 0;
        aspect-ratio: 1/1;
        height: '. $max_height .'%;
        max-height: calc( ' . $height . '  - ( ' . $height . ' * '. $max_height .' / 100 ));
        border-width: '.$borderSetting['border_width'].';
        border-top-left-radius: 0;
        border-top-right-radius: '.$borderSetting['border_radius'].' ;
        border-bottom-right-radius: '.$borderSetting['border_radius'].' ;
        border-bottom-left-radius: 0;
        border-style: '.$borderSetting['border_style'].';
        border-color: '.$borderSetting['border_color'].';
        background-color: '.$imagesSettings['background_color'].';
    }
    
    .hero__img_'. $unique .' {
        width: 100%;
        height: 100%;
        border-top-left-radius: 0;
        border-top-right-radius: '.$borderSetting['border_radius'].' ;
        border-bottom-right-radius: '.$borderSetting['border_radius'].' ;
        border-bottom-left-radius: 0;
        object-fit: '.$imagesSettings['object_fit'].';
        transition: 400ms ease-out;
    }
    
    @media only screen and (max-width: 900px)  {
        .hero__title-container_'. $unique .' {
            aspect-ratio: 1/1;
        }
        .hero__title_'. $unique .'{
            text-align: center;
        }
    }
    
    @media only screen and (min-width: 901px)  {
        .hero__title-container_'. $unique .' {
            min-width: 60%;
        }
    }


    ';

$document->addStyleDeclaration($css);

?>



<?php
echo '
    <div class="hero_'. $unique .'">
            <div class="hero__background_'. $unique .'" style="background-image: url('.$image.');"></div>
            <div class="hero__container_'. $unique .'">
                <div class="hero__title-container_'. $unique .'">
                    <h1 class="hero__title_'. $unique .'">
                        '. $title .'
                    </h1>
            </div>
            <figure class="hero__figure_'. $unique .'">
                <img class="hero__img_'. $unique .'" src="'.$image.'" alt="" >
            </figure>
        </div>
    </div>';
?>
