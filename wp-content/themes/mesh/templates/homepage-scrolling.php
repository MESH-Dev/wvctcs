<?php /*
* Template Name: Homepage - Scrolling
*/

get_header(); ?>

<main id="main" class="site-main" role="main">

  <div class="container">

    <div class="row">
      <div class=""><!-- twelve columns -->
      	<?php 
      		$tp_background = get_field('tp_background');
      		$tp_background_URL = $tp_background['sizes']['background-fullscreen'];
      		$intro = get_field('intro');
      		$tp_callout = get_field('tp_callout');
      	?>
      	<div class="panel" id="home" style="background-image:url('<?php echo $tp_background_URL; ?>')">
      		<div class="overlay" aria-hidden="true"></div>
	      		<div class="content">
	      			<div class="inner">
		      		<p class="intro"><?php echo $intro ?></p>
		      		<h1><?php echo $tp_callout ?></h1>

		      		<?php if (have_rows('tp_link')) :
		      				while (have_rows('tp_link')) : the_row();

		      				$tp_link_text = get_sub_field('tp_link_text');
		      				$tp_link = get_sub_field('tp_link');
		      		?>
		      			<div class="link xl">
			      			<a class="more" href="<?php echo $tp_link; ?>">
			      				<?php echo $tp_link_text; ?>
			      			</a>
		      			</div>
		      		<?php endwhile; endif; ?>
		      		</div>
		      	</div>
      	</div>

      	<?php if (have_rows('hp_cp')) :

      			$cp_ctr = 0;

      			while (have_rows('hp_cp')) : the_row(); 

      			$cp_ctr ++;
      			$cp_background = get_sub_field('hp_cp_background');
      			$cp_background_URL = $cp_background['sizes']['background-fullscreen'];
      			$cp_callout = get_sub_field('hp_cp_callout');

      	?>

      	<div class="panel" id="pane-<?php echo $cp_ctr; ?>" style="background-image:url('<?php echo $cp_background_URL; ?>')">
      		
      		<div class="overlay" aria-hidden="true"></div>
      			<div class="content">
      				<div class="inner">
		      		<h2><?php echo $cp_callout; ?></h2>

		      		<?php if (have_rows('hp_cp_link')) :
		      				while(have_rows('hp_cp_link')) : the_row();

		      				$cp_link_text = get_sub_field('hp_cp_link_txt');
		      				$cp_link = get_sub_field('hp_cp_link');
		      		?>

		      		<div class="button xl">
						<a href="<?php echo $cp_link; ?>">
							<div>
								<?php echo $cp_link_text; ?>
							</div>
						</a>
					</div>

      		<?php endwhile; endif; //End cp_link loop?>
      				</div>
      			</div>
      	</div><!-- End career panel -->

      	<?php endwhile; endif; //end hp_cp loop?> 
      	<?php //if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      	<?php //the_content() ?>
      <?php //endwhile; endif;?>
	      <div class="panel questions">
	      	<div class="content">
	      		<div class="row">

	      	<h2><?php echo get_field('qb_title'); ?></h2>

	      	<?php if (have_rows ('question_blocks')) :
	      			$qb_ctr = 0; 
	      		while(have_rows('question_blocks')) : the_row();

	      			$qb_ctr++;
	      			$qb_q = get_sub_field('qb_question');
	      			$qb_link_text = get_sub_field('qb_link_text');
	      			$qb_link = get_sub_field('qb_link')

	      	?>
	      		<a href="<?php echo $qb_link; ?>">
	      			<div class="four columns">
			      		<div class="qb grid_block-<?php echo $qb_ctr; ?>">
			      			<h3><?php echo $qb_q; ?></h3>
			      			<p><?php echo $qb_link_text; ?></p>
			      		</div>
		      		</div>
	      		</a>	
	      	<? endwhile; endif; //end question_block loop?>
	      	</div>
	      </div>
	      </div>
      </div><!-- end twelve columns -->

    </div><!-- end row -->

  </div><!-- end container -->

</main><!-- #main -->

<?php get_footer(); ?>
