<?php /*
* Template Name: Text
*/
get_header(); ?>



<main id="main" class="site-main" role="main">

  <?php get_template_part( 'contact'); ?>

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

        $button_lt = get_field('button_link_text');
        $button_l = get_field('button_link');

        $more_lt = get_field('more_link_text');
        $more_l = get_field('more_link_text');

      ?>

        <div class="twelve columns short_banner" style="background-image:url('<?php echo $thumb; ?>')">
          <div class="overlay" aria-hidden="true"></div>
          <!-- <img src="<?php //echo $thumb; ?>" /> -->
          <h1 class="page-title"><?php the_title(); ?></h1>
        </div>

      <?php endif; ?>

    </div>

    <div class="row">
      <div class="wrapper">
      
      <div class="seven columns">

        <?php while ( have_posts() ) : the_post(); ?>

        <div class="the_content">
          <?php the_content(); ?>
        </div>

        <?php if ($more_lt != "") { ?>
        <div class="link xl">
              <a class="more" href="<?php echo $more_l; ?>">
                <?php echo $more_lt ?>
              </a>
        </div>
        <?php } ?>

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

        <?php endwhile; // end of the loop. ?>

      </div>
     <div class="five columns"><!--  -->
        <div class="widget">
          <?php 
              $quote = get_field('alumni_quote');
                if ($quote != ""){?>

          <p class="quote">
              "<?php echo $quote; ?>"
              
            </p>

            <?php } ?>

          <?php 

            $alumni_name = get_field('alumni_name');
              if($alumni_name != ""){
            ?>

          <p class="quote_attrib">
            -<?php  echo $alumni_name; ?>
          </p>
          <?php } ?>
          <?php //get_sidebar(); ?>
        </div>
      </div>
    </div>
    </div>
  </div>

</main><!-- #main -->

<?php get_footer(); ?>
