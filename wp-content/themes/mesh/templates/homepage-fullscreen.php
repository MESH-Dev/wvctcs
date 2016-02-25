<?php /*
* Template Name: Homepage - Fullscreen
*/
get_header(); ?>

<main id="main" class="site-main homepage-fullscreen" role="main">

  <?php if (get_field("callout_headline")): ?>
    <div class="container">
      <div class="row">
        <div class="twelve columns">
          <div class="callout">
            <h1><?php the_field("callout_headline"); ?></h1>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>

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

  <?php if (get_field("callout_description")): ?>
    <div class="container">
      <div class="row">
        <div class="eight columns">
          <p><?php the_field('callout_description'); ?></p>
        </div>
      </div>
    </div>
  <?php endif ?>

</main><!-- #main -->

<?php get_footer(); ?>
