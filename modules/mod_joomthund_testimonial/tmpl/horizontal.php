<?php

defined('_JEXEC') or die;
// Include the syndicate functions only once

use Joomla\CMS\Factory;

$document = Factory::getDocument();
$basePath = JUri::base();


$css = '
    
    .container_'. $unique .'{
        position: relative;
        display: flex;
        flex-wrap: nowrap;
        width: 100%;
        overflow: hidden;
    }
    #slider_'. $unique .'{
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        width: 100%;
        will-change: transform;
        transform: translateX(-100%); 
        
    }

    .slide_'. $unique .'{
        flex-grow: 1;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        /** Variables for container */
        padding-top: '. $container['padding_top'] .';
        padding-bottom: '. $container['padding_bottom'] .';
        padding-left: '. $container['padding_left'] .';
        padding-right: '. $container['padding_right'] .';
        background-color: '. $container['background_color'] .';
    }

    .slide__card_'. $unique .'{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        width: 100%;

        /** Variables for card */
        height: '. $card['height'] .';
        max-width: '. $card['max_width'] .';
        min-width: '. $card['min_width'] .';
        
        
        padding-top: '. $card['padding_top'] .';
        padding-bottom: '. $card['padding_bottom'] .';
        padding-left: '. $card['padding_left'] .';
        padding-right: '. $card['padding_right'] .';
        border-width: '. $card['border_width'] .';
        border-style: '. $card['border_style'] .';
        border-radius: '. $card['border_radius'] .';
        border-color: '. $card['border_color'] .';

        background-color: '. $card['background_color'] .';
        
    }


    .button__container_'. $unique .'{
        position: absolute;
        display: grid;
        place-items: center;
        transform: translate(50%, 0%);
        
        height: 100%;
        z-index: 49;
    }
      
    .button_'. $unique .' {
        text-align: center;
        z-index: 50;
        line-height: 100%;
        cursor: pointer;
        /** Variables */
        width: '. $buttons['size'] .';
        height: '. $buttons['size'] .';
        
        font-size: '. $buttons['font_size'] .';
       
        
        
        border-width: '. $buttons['border_width'] .';
        border-style:'. $buttons['border_style'] .';
        border-radius: '. $buttons['border_radius'] .';
        border-color: '. $buttons['border_color'] .';
        

        background-color: '. $buttons['background_color'] .';
        
    }

    .button_'. $unique .':hover {
        /** Variable Hover */
        background-color: '. $buttons['background_color__hover'] .';
    }

    .button__container_'. $unique .'.button_right_'. $unique .'{
        top: 45%;
        right: 40%;
        
        
    }
    .button__container_'. $unique .'.button_left_'. $unique .'{
        top: 45%;
        left: 40%;
        
    } 

    .testimonnial_'. $unique .'{
        
        display: flex;

        height: '. $comments_height .';
    }

    .testimonnial_'. $unique .' > p:nth-child(2) {
        text-wrap: balance;
        line-height: 100%;
        /** Variables Comment */
        text-align: '. $comment['text_align'] .';
        color: '. $comment['font_color'] .';
        font-size: '. $comment['font_size'] .';
        font-weight: '. $comment['font_weight'] .';
        font-style: '. $comment['font_style'] .';
        padding-top: '. $comment['padding_top'] .';
        padding-bottom: '. $comment['padding_bottom'] .';
        padding-left: '. $comment['padding_left'] .';
        padding-right: '. $comment['padding_right'] .';

    }
    .testimonnial_'. $unique .' > p:nth-child(1),
    .testimonnial_'. $unique .' > p:nth-child(3) {
        line-height: 100%;
        font-size: 5rem;
        font-family: \'Arial\';
        /** Same color as child 2 */
        color: '. $comment['font_color'] .';
    }
    .testimonnial_'. $unique .' > p:nth-child(3) {
        
        align-self: flex-end;
    }

    .client_'. $unique .'{
        align-self: flex-end;
        display: flex;
        flex-direction: column;
        
        align-items: center;
        justify-content: center;
        
        gap: 0;
        /**Variables*/
        height: '. $info_height .';
    }

    .client_'. $unique .' > p {
        width: 100%;
        line-height: 100%;
    }

    .client_'. $unique .' > p:nth-child(1){
        text-align: '. $name['text_align'] .';
        color: '. $name['font_color'] .';
        font-size: '. $name['font_size'] .';
        font-weight: '. $name['font_weight'] .';
        font-style: '. $name['font_style'] .';
        padding-top: '. $name['padding_top'] .';
        padding-bottom: '. $name['padding_bottom'] .';
        padding-left: '. $name['padding_left'] .';
        padding-right: '. $name['padding_right'] .';
    }
    .client_'. $unique .' > p:nth-child(2){
        text-align: '. $role['text_align'] .';
        color: '. $role['font_color'] .';
        font-size: '. $role['font_size'] .';
        font-weight: '. $role['font_weight'] .';
        font-style: '. $role['font_style'] .';
        padding-top: '. $role['padding_top'] .';
        padding-bottom: '. $role['padding_bottom'] .';
        padding-left: '. $role['padding_left'] .';
        padding-right: '. $role['padding_right'] .';
    }
    .client_'. $unique .' > p:nth-child(3){
        text-align: '. $company['text_align'] .';
        color: '. $company['font_color'] .';
        font-size: '. $company['font_size'] .';
        font-weight: '. $company['font_weight'] .';
        font-style: '. $company['font_style'] .';
        padding-top: '. $company['padding_top'] .';
        padding-bottom: '. $company['padding_bottom'] .';
        padding-left: '. $company['padding_left'] .';
        padding-right: '. $company['padding_right'] .';
    }
    
    .icon_'. $unique .'{
       
        width: '. $logo['size'] .';
        height: '. $logo['size'] .';

        align-self: '. $logo['align_self'] .';
        
    }

    .icon_'. $unique .' img{
        width: 100%;
        aspect-ratio: 1/1;
        object-fit: scale-down;
    }


    ';

$document->addStyleDeclaration($css);
?>


<?php
echo '
    <div class="container_'. $unique .'">
            <div class="button__container_'. $unique .' button_left_'. $unique .'">
                <button class="button_'. $unique .'" onclick="Prev_'. $unique .'()">
                    <span class="material-symbols-outlined">
                        chevron_left
                    </span>
                </button>
            </div>
            <div id="slider_'. $unique .'">
            ';
            
            foreach($testimonials as $testimonial){
                
                echo '<div class="slide_'. $unique .'">
                
                    <div class="slide__card_'. $unique .'">
                        
                        <div class="testimonnial_'. $unique .'">
                            <p>&ldquo;</p> 
                            <p>
                            '. $testimonial['comment'] .'
                            </p>
                            <p>&rdquo;</p> 
                        </div>
                        
                        <div class="client_'. $unique .'">
                            
                            <p>'. $testimonial['name'] .'</p>
                            <p>'. $testimonial['role'] .'</p>
                            <p><strong>'. $testimonial['company'] .'</strong><br>'. $testimonial['address'] .'</p>
                            <figure class="icon_'. $unique .'">
                                <img src="'. $testimonial['logo'] .'" alt="'. $testimonial['name'] .'">
                            </figure>
                            
                        </div>
                    </div>
                    
                </div>
                ';

            }
                
                
echo '                
                
            </div>

            <div class="button__container_'. $unique .' button_right_'. $unique .'">
                <button class="button_'. $unique .'" onclick="Next_'. $unique .'()">
                    <span class="material-symbols-outlined">
                        chevron_right
                    </span>
                </button>
            </div>
        </div>
        
        
        <script>
        
    const slider_'. $unique .' = document.querySelector("#slider_'. $unique .'");
    let slides_'. $unique .' = document.querySelectorAll(".slide_'. $unique .'");

    let LastSlide_'. $unique .' = slides_'. $unique .'[slides_'. $unique .'.length - 1];

    slider_'. $unique .'.insertAdjacentElement("afterbegin", LastSlide_'. $unique .');

    function Next_'. $unique .'(){
        //La selecciona de nuevo porque el primero cambio
        let FirstSlide_'. $unique .' = document.querySelectorAll(".slide_'. $unique .'")[0];
        slider_'. $unique .'.style.transform = "translateX(-200%)";
        slider_'. $unique .'.style.transition = "transform 500ms ease-in";
        setTimeout(
            function(){
                slider_'. $unique .'.style.transition = "none";
                slider_'. $unique .'.insertAdjacentElement("beforeend", FirstSlide_'. $unique .');
                slider_'. $unique .'.style.transform = "translateX(-100%)";
            }
        , 500);
    };

    function Prev_'. $unique .'(){
        let slides_'. $unique .' = document.querySelectorAll(".slide_'. $unique .'");
        let LastSlide_'. $unique .' = slides_'. $unique .'[slides_'. $unique .'.length - 1];
        slider_'. $unique .'.style.transform = "translateX(0)";
        slider_'. $unique .'.style.transition = "transform 500ms ease-in";
        setTimeout(
            function(){
                slider_'. $unique .'.style.transition = "none";
                slider_'. $unique .'.insertAdjacentElement("afterbegin", LastSlide_'. $unique .');
                slider_'. $unique .'.style.transform = "translateX(-100%)";
            }
        , 500);
    };
    
    setInterval(function(){
        Next_'. $unique .'();
    }, 30000);
    
    
</script>
    
    ';
?>
