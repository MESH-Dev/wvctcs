<?php 
get_header(); ?>

<?php

  $pb_image = get_field('pb_image', 86);
  $pb_image_URL = $pb_image['sizes']['background-fullscreen'];

?>

<?php //program ?>

<main id="main" class="site-main" role="main" style="background-image:url('<?php echo $pb_image_URL; ?>')">

  <?php get_template_part( 'contact'); ?>

  <div class="container">

    <div class="row">
      <div class="wrapper">

        <h1 class="page_title">Training Programs</h1>

        <div class="filter_toolbar row">
          <div class="filter_type">
              <span>Filter By:</span>
            <!-- <fieldset name="sector"> -->
              <ul>
                <li><a class="filter filter_icon mf" title="Filter by Manufacturing programs" data-filter="manufacturing"><span class="sr-only">Show Manuacturing jobs</span></a></li>
                <li><a class="filter filter_icon en" title="Filter by Energy programs" data-filter="energy"><span class="sr-only">Show Energy jobs</span></a></li>
                <li><a class="filter filter_icon it" title="Filter by Information Technology programs" data-filter="information-technology"><span class="sr-only">Show Technology jobs</span></a></li>
              </ul>
          <!-- </fieldset> -->
          </div>
          <div class="adv_filter">
            Advanced search
          </div>
        </div>

        <div class="filter_pane">
          <div class="results_pane">Results: <span></span> <div id="reset"><a class="reset" href target="_self">Reset</a></div></div>
          <div class="filter_by"><span>Filter by:</span>
            <ul class="filters">
              <li id="loc"><a href >Location</a>
              </li>
              <li id="time"><a href >Training Time</a>
              </li>
              <li id="sal"><a href >Average Salary</a>
              </li>
              <li id="skill"><a href >Transferable Skills</a>
              </li>
            </ul>
          </div><!-- end filter_by -->
          <div class="filter_type_block controls" id="Filters">
              
               <div class="filter_overlay location hide">
                <div class="row">

                  <div class="row vis_select">
                    <div class="map "><!-- six columns -->
                      <div class="content">
                        <div class="title">
                          Select a region
                        </div>
                        <div class="map_image">
                          <fieldset name="location">
                         <?php $locations = get_terms('location');
                      
                              foreach($locations as $location){
                        
                            ?>
                        
                          <div class="pin <?php echo $location->slug ?>">
                            <input class="filter" type="checkbox" id="<?php echo $location->slug; ?>" name="<?php echo $location->slug; ?>" value=".<?php echo $location->slug ?>" data-name="<?php echo $location->name ?>" data-filter="<?php echo $location->slug; ?>" />
                            <label for="<?php echo $location->slug; ?>" data-title="<?php echo $location->name ?>"><span></span><?php //echo $location->name ?></label>
                            <div class="tooltip"><span><?php echo $location->name; ?></span>
                                <div class="tooltip_arrow"><img src="<?php echo get_template_directory_uri('/'); ?>/img/tooltip_arrow.png"></div>
                            </div>
                            <!-- <span class="sr-only"><?php //echo $location->name; ?></span> -->
                          </div>

                          
                         <?php } ?>
                        </fieldset>

                       </div>
                       <div class="row btn">
                         <div class="button sm">
                              <a href="#">
                                <div>
                                 Find Results
                                </div>
                              </a>
                          </div>
                      </div>
                     </div>
                    </div>
                    <!-- <div class="find six columns">
                      <div class="content">
                        <h3 class="title">OR FIND THE TRAINING PROGRAMS CLOSEST TO YOUR HOME:</h3>
                        <input id="location-search-placeholder" placeholder="Type in your address here..."></input>
                         <div class="button sm">
                            <a href="#">
                              <div>
                               Find Results
                              </div>
                            </a>
                        </div>
                      </div>
                    </div> -->
          </div>

                </div><!-- End row -->

                    
                
              </div>

                <div class="filter_overlay training hide">
                  <div class="row">
                    <!-- <form class="controls" id="Filters"> -->
                      <fieldset name="training">
                     <?php $training_times = get_terms('training_time');
                      //var_dump($training_times); 
                      
                      foreach($training_times as $training_time){
                        //var_dump($location);
                    ?>

                        <div class="filter_input">
                          <input class="filter" type="checkbox" id="<?php echo $training_time->slug; ?>" name="<?php echo $training_time->slug; ?>" value=".<?php echo $training_time->slug; ?>" data-name="<?php echo $training_time->name ?>" data-filter="<?php echo $training_time->slug; ?>"/>
                          <label for="<?php echo $training_time->slug; ?>"><span></span><?php echo $training_time->name ?></label>
                        </div>
                       
                    <?php
                        }
                    ?>
                    </fieldset>
                   </div><!-- end row -->
                   <div class="row btn">
                  <div class="button sm">
                        <a href="#">
                          <div>
                           Find Results
                          </div>
                        </a>
                    </div></div><!-- end button -->
                 
                </div><!-- end filter_overlay -->

                <div class="filter_overlay salary hide">
                  <div class="row">
                    <!-- <form class="controls" id="Filters"> -->
                      <fieldset name="salary">
                     <?php $salaries = get_terms('salary');
                      //var_dump($locations); 
                      
                      foreach($salaries as $salary){
                        //var_dump($location);
                    ?>

                        <div class="filter_input">
                          <input class="filter" type="checkbox" id="<?php echo $salary->slug; ?>" name="<?php echo $salary->slug; ?>" value=".<?php echo $salary->slug; ?>" data-name="<?php echo $salary->name ?>" data-filter="<?php echo $salary->slug; ?>"/>
                          <label for="<?php echo $salary->slug; ?>"><span></span><?php echo $salary->name ?></label>
                        </div>
                       
                    <?php
                        }
                    ?>
                        </fieldset>
                      <!-- </form> -->
                    </div><!-- end row -->
                    <div class="row btn">
                      <div class="button sm">
                            <a href="#">
                              <div>
                               Find Results
                              </div>
                            </a>
                        </div><!-- end button -->
                    </div>
                </div><!-- end filter_overlay -->

                <div class="filter_overlay skills hide">
                  <div class="row">
                    <!-- <form class="controls"> -->
                      <fieldset name="skills">
                     <?php $skills = get_terms('transferable_skills');
                      //var_dump($skills); 
                      
                      foreach($skills as $skill){
                        //var_dump($skill);
                    ?>

                        <div class="filter_input">
                          <input class="filter" type="checkbox" id="<?php echo $skill->slug; ?>" name="<?php echo $skill->slug; ?>" value=".<?php echo $skill->slug; ?>" data-name="<?php echo $skill->name ?>" data-filter="<?php echo $skill->slug; ?>"/>
                          <label for="<?php echo $skill->slug; ?>"><span></span><?php echo $skill->name ?></label>
                        </div>
                       
                    <?php
                        }
                    ?>
                      </fieldset>
                  <!--   </form> -->
                   </div><!-- end row -->
                   <div class="row btn">
                    <div class="button sm">
                          <a href="#">
                            <div>
                             Find Results
                            </div>
                          </a>
                      </div><!-- end button -->
                  </div>
            </div><!-- end filter_overlay -->
          </div><!-- End filter_type_block -->

        </div>

        <div class="search_bar">
          <span>Search by: </span><input id="location-search" placeholder=""></input>
          <button class="search">Search now</button>
        </div>
      
      <div class="results">
        <div class="row"> 
          <div class="">
             <div class="fail-message twelve columns hide"><span>No items were found matching the current filters.</span></div>
            <?php //$post_slug = $_POST('program');
                  //$query = $_POST('query');

                  $args = array(
                          'post_type' => 'program',
                          'orderby' => 'name',
                          'order' => 'ASC',
                          'posts_per_page' => -1,
                          'post_status' => 'publish',
                  );

                  $the_query = new WP_Query( $args );
            ?>

            <?php if ( $the_query->have_posts() ) : 

                  $card_ct=0;

                  while ($the_query->have_posts()) : $the_query->the_post();
                  $output = '';
                  $output_sec = '';
                  $output_skill = '';
                  $output_sal = '';
                  $output_loc = '';
                  $output_loc_name = '';
                  $output_time = '';
                  $output_time_list = '';

                  $card_ct++;

                  $separator = ' ';
                  $comma = ', ';
                  $sectors = get_the_terms($post->ID, 'sector');
                  $skills = get_the_terms($post->ID, 'transferable_skills');
                  $sals = get_the_terms($post->ID, 'salary');
                  //var_dump($sals);
                  $locs = get_the_terms($post->ID, 'location');
                  //var_dump($locs);
                  $times = get_the_terms($post->ID, 'training_time');

                  if (!empty($sectors)){
                    foreach($sectors as $sector){

                    $output_sec .= $sector->slug . $separator;
                    $sec_name = $sector->name;
                    }
                  }else{
                    $output_sec = " ";
                    $sec_name = " ";
                  }

                  if(!empty($skills)){
                    foreach($skills as $skill){
                      $output_skill .= $skill->slug . $separator;
                      $skill_name = $skill->name;
                    }
                  }else{
                      $output_skill = " ";
                      $skill_name = " ";
                  }

                  if(!empty($sals)){
                    foreach($sals as $sal){
                      $output_sal .= $sal->slug . $separator;
                      $sal_name = $sal->name;
                      //var_dump($sal_name);
                    }
                  }else{
                      $output_sal = " ";
                      $sal_name = " ";
                  }

                  if(!empty($locs)){
                    foreach($locs as $loc){
                      $output_loc .= $loc->slug . $separator;
                      $loc_name = $loc->name;
                      $output_loc_name .= $loc->name . $comma;
                      //var_dump($output_loc_name);
                    }
                    //$output_loc_name_list = echo rtrim($output_loc_name, $comma);
                  }else{
                      $output_loc = " ";
                      $loc_name = " ";
                      $output_loc_name = " ";
                  }

                  if(!empty($times)){
                    foreach($times as $time){
                      $output_time .= $time->slug . $separator;
                      $time_name = $time->name;
                      $output_time_list .= $time_name . $comma;
                    }
                  }else{
                      $output_time = " ";
                      $time_name = " ";
                      $output_time_list = "&nbsp;";
                  }

                   $jobs = get_field('related_jobs', $post->ID); 
                  //var_dump($jobs);
                    $separator = ", ";
                    $job_name = '';
                  if(!empty($jobs)){
                   //while (have_rows('related_jobs')) : the_row(); 
                  //var_dump($jobs);
                  foreach($jobs as $job){
                    
                    $jobID = $job->ID;
                    //var_dump($job);
                    $jobName = $job->post_title;
                    $jobUrl = $job->guid;
                    //var_dump ($jobUrl);
                    $job_name .= '<a href="' .$jobUrl . '">' . $jobName . '</a>' . $separator;
                    $sal_ex = get_the_terms($jobID, 'salary');
                    //var_dump($jobID);
                    //var_dump($sal_ex);
                  }
                }else{
                    $jobID = " ";
                    $jobName = " ";
                    $jobUrl = " ";
                    $job_name = " ";
                    $sal_ex = " ";
                }

                //$college = get_sub_field('college_location', $post->ID);
                $program_location = get_field('program_locations', $post->ID);
                $program_title = get_field('program_name', $post->ID);
                $college_time_trim = " ";
                $college_time = " ";

                if ($program_location != " "){
                if (have_rows('program_locations', $post->ID)):
                  while(have_rows('program_locations', $post->ID)) : the_row();

                  $college = get_sub_field('college_location');
                  $college_name = $college->name;
                  //var_dump($college_name);

                  if(have_rows('college_info', $post->ID)):
                    while(have_rows('college_info',$post->ID)) : the_row();

                      $time = get_sub_field('time');
                      if($time != ''){
                      $time_name = $time->name;
                      }else{
                        $time_name = '';
                      }

                  endwhile; endif; //end college info loop

                  //$college_time = "";
                  $comma = ", ";
                  $semi = ";  ";
                  $college_time .= $time_name . $comma;
                  // $time_array = explode(", ",$time_name);
                  //var_dump($time_array);
                  // $time_unique = array_unique($time_array);
                  //echo "Unique items" . var_dump($time_unique);
                  // $time_implode = implode(" ",$time_unique);
                  //var_dump($time_implode);
                  //var_dump($time_name);
                  

                  endwhile; endif;
                  //var_dump($college_time);
                   $time_array = explode(", ",$college_time);
                   //var_dump($time_array);
                   $time_unique = array_unique($time_array);
                   //var_dump($time_unique);
                   $time_implode = implode(", ",$time_unique);
                   $college_time_trim = rtrim($time_implode, $comma);

                }

                  // $comma = ", ";
                  // $semi = ";  ";
                  // $college_time .= $college_name . $comma . $time_name . $semi;
                  // $college_time_trim = rtrim($college_time, $semi);
                //$college_term = get_sub_field('time', $post->ID);

                //$college_name = $college->name;
                //var_dump($program_location);

                
            ?>

             <div class="card-<?php echo $card_ct; ?> eh mix  <?php echo $output_sec ?> <?php echo $output_sal ?> <?php echo $output_skill; ?> <?php echo $output_loc ?> <?php echo $output_time ?> "> 
              <div class="results_card">
              <div class="r_type" aria-label="<?php echo $sec_name; ?> sector"><span class="sr-only"><?php echo $sec_name; ?> sector</span></div>
              <div class="card_header">
                <h2 class="title">
                  <a href="<?php echo the_permalink(); ?>"><?php echo $program_title; ?></a>
                </h2>
                <p class="t_time">
                  
                  <?php echo rtrim($output_time_list, $comma); ?>
                  
                </p>
              </div>
              <div class="row">
                <div class="r_field job six half">
                  <div class="label">
                    potential Jobs
                  </div>
                  <p>
                    <?php echo rtrim($job_name, $separator); ?>
                   <!--  Pipefitter -->
                  </p>
                </div>
                <div class="r_field salary half">
                  <div class="label">
                    Average Salary
                  </div>
                  <p>
                    <?php echo $sal_name; ?>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="r_field train">
                  <div class="label">
                    Training Locations
                  </div>
                  <p>
                    <?php echo rtrim($output_loc_name, $comma); ?>
                    <?php //echo rtrim($output_loc_name, $comma); ?>
                  </p>
                  <div class="row">
                    <div class="link sm">
                      <a class="more" href="<?php echo the_permalink(); ?>">
                        Learn More
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php endwhile; endif; ?>

            
          </div>
        </div>  
      </div><!-- End Results -->
  </div> <!-- end container -->

</main><!-- #main -->

<?php get_footer(); ?>
