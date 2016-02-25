<?php 

get_header(); ?>

<?php //single-program ?>
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

        <!-- <div class="the_content">
          <?php //the_content(); ?>
        </div> -->
      <?php } endwhile; ?>

      <?php 
        $program_name = get_field('program_name');
        $program_desc = get_field('program_description');
      ?>
      <div class="desc">
        <h2><?php echo $program_name; ?></h2>
        <p><?php echo $program_desc; ?></p>
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
            <a href="#">
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
          <div class="t_loc eh" id="widget">
            <h3 class="title">Training Location, Time Investment, and Cost</h3>
            <div class="map_image">
                <?php 

                 $locations_pin = get_the_terms($post->ID, 'location');
                  if($locations_pin){
                   foreach ($locations_pin as $location_pin){ 
                    ?>
                    <div class="pin <?php echo $location_pin->slug; ?>"></div>
                  <?php }} ?>
                </div> <!-- end map -->
            <div class="content">

              <?php if (have_rows('program_locations')): 
                    while (have_rows('program_locations')) : the_row();

                    $college_location = get_sub_field('college_location');
                    $loc_id = $college_location->term_id;
                    $loc_college = get_term_meta($loc_id, 'college', true);
                    $loc_phone = get_term_meta($loc_id, 'phone', true);

                    //var_dump($loc_college);


                    //var_dump($college_location);
              ?>
              <h4 class="college_name"><?php echo $college_location->name; ?>, <span class="college"><?php echo $loc_college ?></span> <div class="phone"></div><?php echo $loc_phone; ?></h4>

              <?php if (have_rows('college_info')):
                    while(have_rows('college_info')):the_row();

                    $time = get_sub_field('time');
                    $cost = get_sub_field('cost');
                    //var_dump($cost);
                    $lm_link = get_sub_field('learn_more');
              ?>
                <p class="t_time"><?php echo $time->name; ?></p>
                <p class="t_cost"><?php echo $cost->name; ?></p>

                <?php if ($lm_link != '') { ?>

                  <div class="link sm">
                    <a href="<?php echo $lm_link; ?>">
                      <div>
                      Learn more about this program
                      </div>
                    </a>
                  </div>

                <?php } ?>

              <?php endwhile; endif; //end college_info loop ?>

            <?php endwhile; endif; //end program_location loop ?>

           <!--  <div class="sector ff_sp">Sector 
              <span>
                <?php 
                // $sectors = get_the_terms($post->ID, 'sector');
                // if($sectors){
                // foreach($sectors as $sector){
                //   echo "<span>$sector->name</span>";
                //   }
                // }
                ?>
              </span>
            </div> -->
            <!-- <div class="training_time ff_sp">
              Training and Tuition Costs
              <div class="time_desc">
                <?php //echo get_field('tt_tc'); ?>
              </div>
            </div> -->
            <?php 
            // $pass_rate = get_field('pass_rate');
            // if ($pass_rate != '')  { 
              ?>
            <!-- <div class="pass ff_sp">Pass Rate <span><?php //echo get_field('pass_rate'); ?></span></div> -->
            <?php //} ?>
            <!-- <div class="transferable_skills ff_sp">
              Transferable Skills
              <p>
                <?php 

                  // $skills = get_the_terms($post->ID, 'transferable_skills');
                  
                  // $separator = ",&nbsp;";
                  // $output = " ";

                  // if($skills){

                  // foreach ($skills as $skill){
                  //   $output .= $skill->name . $separator;
                    
                  // } 

                  // echo rtrim($output, $separator);

                  // }
                ?>
              </p>
              <div class="t_skills">

              </div>
            </div> -->
            <?php //PLA test button may come into play at a later date, for now this is hidden ?>
            <!--  <div class="button lg pr hide">
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
             <div class="fast_facts">
              <h3 class="title">Fast Facts</h3>
              <div class="row">
                <div class=""><!-- five columns -->

                <!--Start map -->
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
            <div class="transferable_skills ff_sp">
              Transferable Skills
              <p>
                <?php 

                  $skills = get_the_terms($post->ID, 'transferable_skills');
                  
                  $separator = ", ";
                  $output = " ";

                  if($skills){

                  foreach ($skills as $skill){
                    $output .= $skill->name . $separator;
                    
                  } 

                  echo rtrim($output, $separator);

                  }
                ?>
              </p>
              <div class="t_skills">

              </div>
            </div>
          <!--   <div class="training_time ff_sp">
              Training and Tuition Costs
              <div class="time_desc">
                <?php //echo get_field('tt_tc'); ?>
              </div>
            </div> -->
                <!-- <div class="map_image">
                <?php 

                 // $locations_pin = get_the_terms($post->ID, 'location');
                 //  if($locations_pin){
                 //   foreach ($locations_pin as $location_pin){ 
                    ?>
                    <div class="pin <?php //echo $location_pin->slug; ?>"></div>
                  <?php //}} ?>
                </div>--> <!-- end map -->
              </div> <!-- end five columns -->
              <!-- <img src="<?php //echo get_template_directory_uri('/'); ?>/img/college_map_full.png"> -->
              <!-- <div class="t_loc_data seven columns">
                <ul>
                <?php 

                //  $locations = get_the_terms($post->ID, 'location');
                 
                //  if($locations){
                //    foreach ($locations as $location){
                    
                //     $location_meta = get_term_meta($location->term_id, 'college', true);
                //     echo "<li><span class='city'>$location->name:</span> <span class='school'>$location_meta</span></li>";
                //    }
                // }

                ?>
                </ul>
                <div class="link xl">
                  <a href="#" class="more">View all training locations</a>
                </div>< end link 
              </div>--> <!-- end t_loc_data --> 
            </div>
            </div><!-- end t_loc -->
          </div>
          </div><!-- end six columns -->
           <div class="six columns">
             <?php //while (have_rows('related_jobs')) : the_row(); 

                  $jobs = get_field('related_jobs'); 
                  if($jobs){
                  ?>
            <div class="related content">
               
              <h3 class="title">Potential related jobs</h3>
              <div class="rel_grid row">
                <?php //while (have_rows('related_jobs')) : the_row(); 
                  //var_dump($jobs);
                  foreach($jobs as $job){
                    $jobID = $job->ID;
                    $jobName = $job->post_title;
                    $link = $job->guid;
                  
                    //setup_postdata($post);
                  
                ?>

                <div class="job_sum six columns">
                  <a href="<?php echo $link; ?>">
                    <h4><?php echo $jobName; ?></h4>
                    
                      
                      <?php 
                      $salaries = get_the_terms($jobID, 'salary');
                      //var_dump ($salaries);
                      if($salaries != ''){

                        foreach($salaries as $salary){?>
                          <p class="p_sal">
                            <span><?php echo $salary->name; ?> Average Salary</span>
                          </p>
                        <?php }} ?>
                    <!-- </p> -->
                  </a>
                </div>
                <?php  }  ?>  

                <?php //endwhile; ?>
              </div>
              
            </div>
            <?php } ?>
          </div>
        </div>
      </div><!-- End Location/Related Row -->
  </div> <!-- end container -->

</main><!-- #main -->

<?php get_footer(); ?>
