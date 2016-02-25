<?php /*
* Template Name: Text
*/
get_header(); ?>



<main id="main" class="site-main" role="main">

  <div class="container">

    <div class="row">

      <?php if (get_field('short_banner')) :

        $short_banner = get_field('short_banner');

        // vars
        $url = $short_banner['url'];
        $title = $short_banner['title'];
        $alt = $short_banner['alt'];
        $caption = $short_banner['caption'];

        // thumbnail
        $thumb = $short_banner['sizes']['short-banner'];

        // $button_lt = get_field('button_link_text');
        // $button_l = get_field('button_link');

        // $more_lt = get_field('more_link_text');
        // $more_l = get_field('more_link_text');

      ?>

        <div class="twelve columns short_banner" style="background-image:url('<?php echo $thumb; ?>')">
          <!-- <img src="<?php //echo $thumb; ?>" /> -->
          <h1><?php the_title(); ?><h1>
        </div>

      <?php endif; ?>

    </div>

    <div class="row">
      <div class="wrapper">
      
      <div class="seven columns">

        <?php while ( have_posts() ) : the_post(); {?>

        <div class="the_content">
          <?php the_content(); ?>
        </div>
    	<?php } endwhile; ?>

    	<?php 
    		$program_name = get_field('program_name');
    		$program_desc = get_field('program_description');
    	?>
    	<h2><?php echo $program_name; ?></h2>
    	<div class="p_desc">
    		<p><?php echo $program_desc; ?></p>
    	</div>

        <?php //if (get_field('more_link_text')) :
        	$more_lt = get_field('more_link_text');
        	$more_l = get_field('more_link');
        ?>
        <?php if ($more_lt != "") { ?>
        <div class="link xl">
              <a class="more" href="<?php echo $more_l; ?>">
                <?php echo $more_lt ?>
              </a>
        </div>
        <?php } ?>

        <?php //if (get_field('button_link_text')) :
        	$button_lt = get_field('button_link_text');
        	$button_l = get_field('button_link');
        ?>
        <?php if ($button_lt != '') { ?>
        <div class="button lg">
            <a href="<?php echo $button_l ?>">
              <div>
                <?php echo $button_lt; ?>
              </div>
            </a>
          </div>

          <?php } ?>

          <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;
          ?>

        <?php //endwhile; // end of the loop. ?>

      </div>
     <div class="five columns"><!--  -->
        <div class="widget">

          <p class="quote">"<?php echo get_field('alumni_quote'); ?>"</p>
          <p class="quote_attrib">- <?php echo get_field('alumni_name'); ?></p>
          <?php //get_sidebar(); ?>
        </div>
      </div>
    </div>
    </div>
  </div>

</main><!-- #main -->

<?php get_footer(); ?>
