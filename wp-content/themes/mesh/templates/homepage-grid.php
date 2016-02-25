<?php /*
* Template Name: Homepage - Grid
*/
get_header(); ?>

<main id="main" class="site-main homepage-grid" role="main">

  <?php if (have_rows("content_blocks")): ?>
    <div class="container">
      <div class="row">

        <?php while ( have_rows('content_blocks') ) : the_row(); ?>

          <div class="four columns">
            <?php if (get_sub_field('content_block_title')): ?>
              <h3><?php the_sub_field('content_block_title'); ?></h3>
            <?php endif ?>
            <?php if (get_sub_field('content_block_description')): ?>
              <p><?php the_sub_field('content_block_description'); ?></p>
            <?php endif ?>
          </div>

        <?php endwhile; ?>

      </div>
    </div>
  <?php endif ?>

</main><!-- #main -->

<?php get_footer(); ?>
