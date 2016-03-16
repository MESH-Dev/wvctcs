<?php 

get_header(); ?>

<?php //single-jobs?>
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

      ?>

        <div class="twelve columns short_banner" style="background-image:url('<?php echo $thumb; ?>')">
          <div class="overlay" aria-hidden="true"></div>
          <h1><?php the_title(); ?><h1>
        </div>

      <?php endif; ?>

    </div>

    <div class="row">
      <div class="wrapper c_body">
      
      <div class="six columns">
        <div class="eh">
        <?php while ( have_posts() ) : the_post(); {?>

       <!--  <div class="the_content">
          <?php //the_content(); ?>
        </div> -->
      <?php } endwhile; ?>

      <?php 
        $job_name = get_field('job_title');
        $job_desc = get_field('job_description');
      ?>
      <div class="desc">
        <h2><?php echo $job_name; ?></h2>
        <p><?php echo $job_desc; ?></p>

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_sharing_toolbox"></div>
        


      </div>

      <?php 
        $alumni_quote = get_field('alumni_quote');
        $alumni_name = get_field('alumni_name');

        if($alumni_quote != '' || $alumni_name != '') {
      ?>
      <div class="quotes">
          <p class="quote">"<?php echo $alumni_quote; ?>"</p>
          <p class="quote_attrib">- <?php echo $alumni_name; ?></p>
      </div>
      <?php } ?>

        <?php 
        // while (have_rows('button')) : the_row(); 
        //   $button_lt_ovp = get_sub_field('button_link_text');
        //   $button_l_ovp = get_sub_field('button_link');
        ?>
        <?php //if ($button_lt_ovp != '') { ?>
        <div class="button xl">
            <a class="ctc_advisor" href>
              <div>
                Contact an advisor now
                <?php //echo $button_lt_ovp; ?>
              </div>
            </a>
          </div>

          <?php //} ?>

          <?php //endwhile; ?>

          <?php
            // If comments are open or we have at least one comment, load up the comment template
            //if ( comments_open() || get_comments_number() ) :
              //comments_template();
            //endif;
          ?>
        </div>
      </div>
     <div class="six columns">
          <div class="fast_facts eh" id="widget">
            <h3 class="title">Fast Facts</h3>
            <div class="content">
            <div class="sector ff_sp">Sector 
              <span>
                <?php 
                $sectors = get_the_terms($post->ID, 'sector');            

                if($sectors){
                foreach($sectors as $sector){

                $home_url = esc_url(home_url('/'));
                $sector_link = " ";

                    if ($sector->slug == 'manufacturing'){
                      $sector_link =  $home_url . 'manufacturing';
                    }elseif($sector->slug == "energy"){
                      $sector_link =  $home_url . 'energy';
                    }else{
                      $sector_link =  $home_url . 'it';
                    }
                  echo "<a class='$sector->slug' href='$sector_link'>$sector->name</a>";
                  }
                }
                ?>
              </span>
            </div>
            <div class="training_time ff_sp">
              Training and Tuition Costs
              <div class="time_desc">

                <?php if (have_rows ('training_time')) :
                      while (have_rows ('training_time')) : the_row(); 

                      $program_type = get_sub_field('program_type');
                      //var_dump($program_type);

                      $program_time = get_sub_field('program_time');
                      //var_dump($program_time);
                      $program_tuition = get_sub_field('tuition_cost');
                ?>
                <p><?php echo $program_type->name; ?>, <?php echo $program_time->name; ?><br>
                <?php echo $program_tuition->name; ?> per semester.</p>

              <?php endwhile; endif; ?>
                <?php //echo get_field('tt_tc'); ?>
              </div>
            </div>
            <?php 
            // $pass_rate = get_field('pass_rate');
            // if ($pass_rate != '')  { 
              ?>
            <!-- <div class="pass ff_sp">Pass Rate <span><?php //echo get_field('pass_rate'); ?></span></div> -->
            <?php //} ?>
            <div class="transferable_skills ff_sp">
              Transferable Skills
              <p>
                <?php 

                  $skills = get_the_terms($post->ID, 'transferable_skills');
                  
                  $separator = ",&nbsp;";
                  $output = " ";
                  //$output_sal = " ";

                  if($skills){

                  foreach ($skills as $skill){
                    $output .= $skill->name . $separator;
                    
                  } 

                  echo rtrim($output, $separator);

                  }

                  // $salaries = get_the_terms($post->ID, 'salary');
                  // foreach($salaries as $salary){
                  //   $output_sal .= $salary->name . $separator;
                  // }
                  
                ?>
              </p>
              <div class="t_skills">

              </div>
            </div>
            <?php //PLA test button may come into play at a later date, for now this is hidden ?>
             <!-- <div class="button lg pr hide">
              <a href="">
                <div>
                 Take PLA Test
                </div>
              </a>
            </div> -->
          </div>
          </div> <!-- End fast_facts -->

          <?php //get_sidebar(); ?>
        
      </div><!-- end six columns -->

     

      </div> <!-- end wrapper -->
    </div> <!-- end row -->

    <!--Start Location/Related row-->
     <div class="row">
        <div class="wrapper c_foot">
          <div class="six columns">
            <div class="content">
            
             <div class="t_loc">
              <h3 class="title">Training Locations</h3>
              <div class="row">
                <div class="six columns">
                <div class="map_image">
                <?php 

                 $locations_pin = get_the_terms($post->ID, 'location');
                  if($locations_pin){
                   foreach ($locations_pin as $location_pin){ 
                    ?>
                    <div class="pin <?php echo $location_pin->slug; ?>"></div>
                  <?php }} ?>
              </div></div>
              <div class="t_loc_data six columns">
                <div class="content">
                  <ul>
                  <?php 

                   $locations = get_the_terms($post->ID, 'location');
                   if($locations){
                     foreach ($locations as $location){
                      $location_meta = get_term_meta($location->term_id, 'college', true);
                      echo "<li><span class='city'>$location->name:</span> <span class='school'>$location_meta</span></li>";
                     }
                  }
                  ?>
                  </ul>
                  <div class="link xl">
                    <a href="<?php echo esc_url(home_url('/')); ?>/training-centers" class="more">View all training locations</a>
                  </div><!--End link xl -->
                </div> <!-- end content -->
              </div><!-- end t_loc_data -->
            </div>
          </div>
          </div>
        </div>
           <div class="six columns">
             <?php //while (have_rows('related_jobs')) : the_row(); 

                  $programs = get_field('related_program'); 
                  //var_dump($programs);
                  if($programs){
                  ?>
            <div class="related content">
               
              <h3 class="title">Related Programs</h3>
              <div class="rel_grid row">
                <?php //while (have_rows('related_jobs')) : the_row(); 
                  //var_dump($jobs);
                  foreach($programs as $program){
                    $programID = $program->ID;
                    $programName = $program->post_title;

                    $link = $program->guid;
                  
                    setup_postdata($program);
                    //setup_postdata($post);
                    
                ?>

                <div class="job_sum six columns">
                  <a href="<?php echo get_permalink($programID); ?>">
                    <h4><?php echo $programName; ?></h4>
                    
                      
                      <?php 
                      $salaries = get_the_terms($programID, 'salary');
                      //var_dump ($salaries);
                      if($salaries != ''){

                        foreach($salaries as $salary){ ?>
                        <p class="p_sal">
                          <span><?php echo $salary->name; ?> Average Salary</span>
                        </p>

                        <?php }} ?>
                    </p>
                  </a>
                </div>
                <?php  }  ?>  

                <?php //endwhile; ?>
              </div>
              
            </div>
            <?php } wp_reset_postdata();?>
          </div>
        </div>
      </div><!-- End Location/Related Row -->
  </div> <!-- end container -->

</main><!-- #main -->

<?php get_footer(); ?>
