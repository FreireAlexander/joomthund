<?php 
defined( '_JEXEC' ) or die( 'Restricted access' );
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Helper\ModuleHelper;

$app   = Factory::getApplication();
$linesbrandname = count(json_decode(json_encode($brandname_), true));
$rotatelogoFile = $params->get('rotatelogofile');
/** Fonts and Links */
$color = $params['color'];
$brandnamecolor = $params['brandnamecolor'];
$slogancolor = $params['slogancolor'];
$coloralternate = $params['coloralternate'];
$link = $params['link']; 
$linkhover = $params['linkhover']; 
$linkactive = $params['linkactive'];
/** Containers */
$background = $params['background'];
$section__withd = $params['section__withd'];
/** Header and Navbar */
$header = $params['header'];
$sidebar = $params['sidebar'];
$sidebaroverlay = $params['sidebaroverlay'];
$submenu = $params['submenu'];
$navbarlinksbackground = $params['navbarlinksbackground'] ;
$navbarlinksbackgroundhover = $params['navbarlinksbackgroundhover'];
$navbarlinkscolor = $params['navbarlinkscolor'];
$navbarlinkshover = $params['navbarlinkshover'];

$sidebar_button__backgroundcolor = $params['sidebar_button__backgroundcolor'];
$sidebar_button__backgroundhover = $params['sidebar_button__backgroundhover'];
$sidebar_button__color = $params['sidebar_button__color'];
$sidebar_button__colorhover = $params['sidebar_button__colorhover'];


$submenubackground = $params['submenubackground'];
$submenubackgroundhover = $params['submenubackgroundhover'];
$submenucolor = $params['submenucolor'];
$submenuhover = $params['submenuhover'];

?>
<!DOCTYPE html>
<html   
    xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" 
    lang="<?php echo $this->language; ?>" 
    >
<head>
    <jdoc:include type="head" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template;?>/themes/default/css/styles.css" type="text/css" media="screen"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo $favicon ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<style>
    /** Here it goes the color palette for Template */
    :root{
        --menu--color: <?php echo $bgcolor .';'?>;
        --menu--color-hover: <?php echo $bghover .';'?>;
        --menu-bg: <?php echo $bgcolor .';'?>;
    }

    :root{
    /** Font */
    --color: <?php echo $color;?>;
    --color-alternate: <?php echo $coloralternate;?> ;
    --link: <?php echo $link;?> ;
    --link-hover: <?php echo $linkhover;?> ;
    --link-active: <?php echo $linkactive;?> ;

    
    --font-size: 1.4rem;
    --sm: 1rem;
    --m: 1.4rem;
    --x: 1.8rem;
    --l: 2rem;
    --xl: 2.2rem;
    --h6: calc(var(--font-size) + 0.2rem ); /* 1.2rem */
    --h5: calc(var(--h6) + 0.2rem ); /* 1.4rem */
    --h4: calc(var(--h5) + 0.2rem ); /* 1.6rem */
    --h3: calc(var(--h4) + 0.2rem ); /* 1.8rem */
    --h2: calc(var(--h3) + 0.2rem ); /* 2rem */
    --h1: calc(var(--h2) + 0.2rem ); /* 2.2rem */
  
    /** Header Variables */
    --header--bg: <?php echo $header;?>;
    --sidebar--bg: <?php echo $sidebar;?>;
    --side-overlay: <?php echo $sidebaroverlay;?>;
        /* navbar variables */
    --navbar__links--fs: clamp(1.2rem, 1rem + 1.6vw, 1.8rem);
    --navbar__links--w: 600;
    --navbar__links--background: <?php echo $navbarlinksbackground;?>;
    --navbar__links--background-hover: <?php echo $navbarlinksbackgroundhover;?>;
    --navbar__links--color: <?php echo $navbarlinkscolor;?>;
    --navbar__links--hover: <?php echo $navbarlinkshover;?>;
    --sidebar_button: <?php echo $sidebar_button__backgroundcolor;?>;
    --sidebar_button--hover: <?php echo $sidebar_button__backgroundhover;?>;
    --sidebar_button__color: <?php echo $sidebar_button__color;?>;
    --sidebar_button__color--hover: <?php echo $sidebar_button__colorhover;?>;
        /* Sub menus variables */
    --sub-menu--bg: <?php echo $submenubackground;?>;
    --sub-menu--bg-hover: <?php echo $submenubackgroundhover;?>;
    --sub-menu--link-color: <?php echo $submenucolor;?>;
    --sub-menu--link-hover: <?php echo $submenuhover;?>;
    
    
    /* Brand Variables */
    --brand--color: <?php echo $brandnamecolor;?>;
    --brand__name--size: clamp(0.5rem, -0.033rem + 4.267vw, 2.1rem);
    --brand__name--weight: 600;
        /* Slogan Variables */
    --slogan--color: <?php echo $slogancolor;?>;
    --slogan--size: clamp(0.25rem, 0.033rem + 1.733vw, 0.9rem);
        /* Logo Variables */
    --logo-size: calc( 1.15 * ( clamp(0.5rem, -0.033rem + 4.267vw, 2.1rem) * <?php echo $linesbrandname; ?> + clamp(0.25rem, 0.033rem + 1.733vw, 0.9rem) ) );
  
}

:root{
    /** Container */
    
    --background: <?php echo $background;?>;
    --width: <?php echo $section__withd;?>;
    user-select: none;
}

/** Special animation for SmartSourcing Latam */
<?php
if($rotatelogoFile=="true"){
echo '
.brand:hover .brand__logo {
    transform: rotate(360deg);
    transition: 1900ms ease-in;
}
';
}
?>

body .calendly-badge-widget {
    bottom: 85px;
}

body .calendly-badge-widget .calendly-badge-content span{
    display: none;
}

</style>
<body>
    <header>
        <nav class="navbar">
            <a class="brand" href="/">

                <figure class="brand__figure">
                    <?php echo $logo; ?>
                </figure>
                <div>
                <?php
                    foreach($brandname_ as $line){
                    echo '<p class="brand__name">'. $line->line .'</p>';
                    }
                ?>
                    <p class="brand__slogan"><?php echo $slogan; ?></p>
                </div>
            </a>
            <div class="flex-container">
                <jdoc:include type="modules" name="navbar-menu" />
                <jdoc:include type="modules" name="navbar-button" />
            </div>
        </nav>
    </header>
    <main>
        <jdoc:include type="component" />
    </main>
    <footer>
        <jdoc:include type="modules" name="footer" />
    </footer>
</body>
</html>