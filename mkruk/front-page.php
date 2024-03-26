<?php get_header(); ?>

<h2 class="selected-works">Selected works</h2>
	<div class="works" id="lightgallery">
	

		<?php 
		$images = get_field('gallery');
		if($images):
			foreach($images as $image): ?>
				    <a href="<?php echo $image['sizes']['1536x1536']; ?>">
				        <img class="lazy" data-src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>"/>
				    </a>
		    <?php endforeach;
		endif; ?>

	</div>



<?php get_footer(); ?>