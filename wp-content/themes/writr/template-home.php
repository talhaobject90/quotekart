<?php
/*
 Template Name: Home page
 */



get_header('home'); ?>

 <div class="home_login_widget"> 
 
<?php  echo do_shortcode('[ajax_login]')?>


</div>
<div id="primary" class="home_area" >

		<main id="main" class="site-main" role="main">

		<ul>
		<li>1. Type what you want</li>
		<li>2. Get the quote </li>
		<li>Compare ,and checkout </li>
		
		</ul>
		
		<form action="my-panel">
		<input type="text" > Get a Quote
		<input type="submit">
		</form>
			<?php while ( have_posts() ) : the_post(); ?>
			
			

				<?php the_content();?>

				 

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer('home'); ?>