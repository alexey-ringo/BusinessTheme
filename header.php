<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site page">
	<header>
        <div class="container">
          	<div class="brand">
          		<?php if (is_front_page() && is_home()) { ?>
          		    <?php if (ot_get_option('logo_upload')) { ?>
          		    <h1 class="brand_name"><img src="<?php echo ot_get_option('logo_upload');  ?>" alt=""></h1>
                    <?php } else { ?>
              		<h1 class="brand_name"><?php bloginfo('name'); ?></h1>
              		<?php } ?>
                <?php } else { ?>
            		<div class="brand_name"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></div>
            	<?php } ?>
            	
            	<?php if (ot_get_option('desc_on_off') != 'off') { ?>
                    <p class="brand_slogan"><?php bloginfo('description'); ?></p>
                <?php } ?>
          	</div>
          	<?php if (ot_get_option('contact_phone')) { ?>
                <a href="callto:<?php echo str_replace(array(" ", "(", ")", "-"), "", ot_get_option('contact_phone'));  ?>" 
                class="fa-phone"><?php echo ot_get_option('contact_phone');  ?></a>
            <?php } ?>
          
            <?php if (ot_get_option('contact_open')) { ?>
                <p><?php echo ot_get_option('contact_open');  ?></p>
            <?php } ?>
            
            <?php if (ot_get_option('header_feedback_on_off') != 'off') { ?>
            <!--Если тумблер "Вкл/выкл обр. звонок" включен - то выводим (через echo) текст (обернутый в ссылку),
                введенный в текстовое поле настроек темы "Заголовок".  
                По факту - это массив в /functions/theme-options.php типа 'text' с id => 'feedback_title'
                Сама ссылка ссылается по href на div ниже, в котором непосредственно выводится модальная форма для контактных данных.
                Ссылку обернули в <p> с целью правого флоатинга-->
                <p><a href="#header-feedback-form" class="feedback-form"><?php echo ot_get_option('feedback_title');  ?></a></p>
            
                <!--div, в котором собственно выводится модальная форма для контактных данных. 
                Классы mfp-hide white-popup-block - Magnific Popup plugin (magnific-popup.css). По умолчанию - display: none -->
                <div id="header-feedback-form" class="mfp-hide white-popup-block">
                <!--Проверяем - заполнено ли поле "Форма обратной связи" в настройках темы - 
                    закладка "Обратная связь" - массив типа 'text' с id => 'feedback_form'-->
                <?php if (ot_get_option('feedback_form')) { ?>
                <!--Если поле заполнено (это шорткод из Contact Form 7), то выводим поля формы-->
                    <?php echo do_shortcode( ot_get_option('feedback_form'));  ?>
                <?php } ?>
                </div>
            
            <?php } ?>
        </div>
        
        <?php
                $args = array(
	                'theme_location'  => '',
	                'menu'            => 'primary', 
	                'container'       => '', 
	                'container_class' => '', 
	                'container_id'    => '',
	                'menu_class'      => 'sf-menu', 
	                'menu_id'         => '',
	                'echo'            => true,
	                'fallback_cb'     => 'wp_page_menu',
	                'before'          => '',
	                'after'           => '',
	                'link_before'     => '',
	                'link_after'      => '',
	                'items_wrap'      => '<ul id="%1$s" data-type="navbar" class="%2$s">%3$s</ul>',
	                'depth'           => 0,
	                'walker'          => '',
                  );

                wp_nav_menu( $args ); 

                ?>
        
        <div id="stuck_container" class="stuck_container">
          	<div class="container">
            	<nav class="nav">
              		<ul data-type="navbar" class="sf-menu">
                		<li class="active"><a href="./">Home</a>
                		</li>
                		<li><a href="index-1.html">About</a>
                  			<ul>
                    			<li><a href="#">Lorem ipsum dolor</a></li>
                    			<li><a href="#">Conse ctetur adipisicing</a></li>
                    			<li><a href="#">Elit sed do eiusmod
                    				<ul>
                          				<li><a href="#">Lorem ipsum</a></li>
                          				<li><a href="#">Conse adipisicing</a></li>
                          				<li><a href="#">Sit amet dolore</a></li>
                        			</ul></a></li>
                    			<li><a href="#">Incididunt ut labore</a></li>
                    			<li><a href="#">Et dolore magna</a></li>
                    			<li><a href="#">Ut enim ad minim</a></li>
                  			</ul>
                		</li>
                		<li><a href="index-2.html">Services</a>
                		</li>
                		<li><a href="index-3.html">FAQS</a>
                		</li>
                		<li><a href="index-4.html">Contacts</a>
                		</li>
              		</ul>
            	</nav>
          	</div>
        </div>
    </header>