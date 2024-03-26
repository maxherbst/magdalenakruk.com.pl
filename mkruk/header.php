<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no" />

    <meta name="description" content="<?php if(is_single()){single_post_title('',true);}else{bloginfo('description');} ?>" />
    <title><?php echo get_bloginfo('name'); if(!is_front_page()): echo ' | '; if(is_search()): echo 'Wyniki dla '.$s; elseif(is_category()): single_cat_title(); elseif(is_tax() || is_tag()): echo get_queried_object()->name; else: the_title(); endif; endif; ?></title>
    <?php wp_head(); ?>

	<meta property="og:title" content="Magdalena Kruk" />
	<meta property="og:image" content="https://magdalenakruk.com.pl/wp-content/uploads/2023/08/lawa.jpg" />
	<meta property="og:description" content="Digital painting is my intimate medium of personal expression. Every stroke on the digital canvas contains the essence of my emotions and feelings." />
	
	
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <div id="mkruk">
        <div id="content" class="<?php if(is_front_page()): echo 'home'; elseif(is_single()): echo 'single'; elseif(is_404()): echo 'error-page'; else: echo str_replace('.php','',esc_html(get_page_template_slug($post->ID))); endif; if(!is_user_logged_in()){ echo ' logged-out'; } ?>">

            <header> 

                <a class="logo" href="<?php bloginfo('url'); ?>">Magdalena Kruk</a>

                 <menu>
                    <a class="about-link" href ="#about">About</a>
                    <a class="works-link" href="#works">Works</a>
                    <a class="contact-link" href="mailto:lena.kruk@gmail.com">Contact</a>
                    <a class="insta" target="_blank" href='https://www.instagram.com/magdalenakruk_contempo/'><img class="lazy" data-src="<?php bloginfo('template_url'); ?>/assets/img/insta.svg"></a>
                 </menu>

            </header>


            <div class="about">
				<div class="about-inner">
                <h2>About</h2>
                <?php the_field('about_text',2); ?>
					
				<?php
				$imageData = get_field('about_image',2);
				$imageAlt =  $imageData['alt'];
				$imageUrl = $imageData['sizes']['medium']; ?>
				<img class="lazy" data-src="<?php echo $imageUrl; ?>" alt="<?php echo $imageAlt; ?>" />

				</div>
            </div>
<div class="contact">
    <p>FOR COMMISSION REQUEST CONTACT ME BY EMAIL</p>
    <a href="mailto:lena.kruk@gmail.com">lena.kruk@gmail.com</a>
    <a href="#" class="close">
    </a>
</div>
