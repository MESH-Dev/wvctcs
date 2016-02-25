<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<?php

	if( is_page_template('templates/homepage-fullscreen.php') ) {
		$imageArray = get_field('background_image');
		$imageURL = $imageArray['sizes']['background-fullscreen'];
	}

?>

<html <?php if( is_page_template('templates/homepage-fullscreen.php') ) { ?> style="background: url('<?php echo $imageURL; ?>') no-repeat center center fixed;" class="background-fullscreen" <?php } ?>>

<head>


<head>
	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?></title>

	<!-- Meta / og: tags -->
	<meta name="description" content="">
	<meta name="author" content="">


	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS (* with Edge Inspect Fix)
	================================================== -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="page" class='hfeed site <?php if( is_page_template('templates/homepage-fullscreen.php') && is_front_page() ) { echo "content-fullscreen"; } ?>'>

		<header>
			<div class=""><!-- container -->

				<div class=""><!-- twelve columns -->
					<div class="logo">
						<div class="logo_container">
							<!-- <h1 class="site-title"> -->
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img alt="Tech training for jobs West Virginia" src="<?php echo get_template_directory_uri('/'); ?>/img/ctcs_logo_new.png">
								<!-- Tech<br /><span>training<br /> for jobs</span><br /><span class="wv">West Virginia</span> -->
								</a>
							<!-- </h1> -->
						</div>
					</div>
					<nav class="main-navigation">
						<div class="sidr-close mobile-only">
							Close
						</div>
						<div class="logo_container mobile-only">
							<!-- <h1 class="site-title"> -->
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img alt="Tech training for jobs West Virginia" src="<?php echo get_template_directory_uri('/'); ?>/img/ctcs_logo_new.png">
								<!-- Tech<br /><span>training<br /> for jobs</span><br /><span class="wv">West Virginia</span> -->
								</a>
							<!-- </h1> -->
						</div>
						<?php if(has_nav_menu('main_nav')){
									$defaults = array(
										'theme_location'  => 'main_nav',
										'menu'            => 'main_nav',
										'container'       => false,
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => 'menu',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
									); wp_nav_menu( $defaults );
								}else{
									echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
								} ?>
							<div class="sector_links">
								Learn About the Tech Sectors:
								<ul>
									<li><a href="<?php echo esc_url(home_url('/')); ?>/manufacturing">Manufacturing</a></li>
									<li><a href="<?php echo esc_url(home_url('/')); ?>/energy">Energy</a></li>
									<li><a href="<?php echo esc_url(home_url('/')); ?>/it">Internet Technology</a></li>
								</ul>
							</div>
							<div class="learn_how">
								<a href="<?php echo esc_url(home_url('/')); ?>/how-the-programs-work">Learn how training programs work</a>
							</div>
							<div class="link xl">
								<a href="<?php echo esc_url( home_url( '/program?loc=true' ) ); ?>" class="more">Search for programs<div class="wv_ico" aria-hidden="true"></div> closest to home</a>
							</div>

					</nav>
				</div>

			</div>

		</header>

		<div class="ctc_form lightbox">
				<?php echo do_shortcode('[contact-form-7 id="79" title="Contact Advisor Form"]') ?>
		</div>

		<?php //$post_data = get_the_terms($post->ID, 'sector'); var_dump($post_data); ?>
		<!-- Start Nav_Hovers -->
		<div class="nav_hover program">
			<div class="container ">
				<div class="row">
					<h2>Check out our training programs</h2>
					<div class="four columns">
						<ul>
							<li>Manufacturing</li>

							 <?php //wp_reset_query();
						        $args = array(
							        'post_type'=>'program',
							        'orderby' => 'name',
							        'order' => 'ASC',

							        'tax_query' => array(
										array(
											'taxonomy' => 'sector',
											'field'    => 'slug',
											'terms'    => 'manufacturing',
										),
									),
							   
									'meta_query'=>array(
										array(
											'key'=>'featured',
											'value'=>'1',
											'compare'=>'=',
										)	
									)

						      	);

						       	$program_query = new WP_Query($args);
						     
						        if ( $program_query->have_posts() ) : 
						       	$ctr_p_m = 0;
                  				while ($program_query->have_posts()) : $program_query->the_post();
                  				
                  				 $ctr_p_m++;

			                	if($ctr_p_m <= 5){
						        ?>

						    	<li class="program-<?php echo $ctr_p_m; ?> manufacturing"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?> <?php //echo $ctr_p; ?></a></li>


						    <?php  } 
						    endwhile; endif; wp_reset_query(); ?>
							
						</ul>
						
					</div>
					<div class="four columns">
						<ul>
							<li>Energy</li>
							
							 <?php //wp_reset_query();
						        $args = array(
							        'post_type'=>'program',
							        'orderby' => 'name',
							        'order' => 'ASC',

							        'tax_query' => array(
										array(
											'taxonomy' => 'sector',
											'field'    => 'slug',
											'terms'    => 'energy',
										),
									),
							   
									'meta_query'=>array(
										array(
											'key'=>'featured',
											'value'=>'1',
											'compare'=>'=',
										)	
									)

						      	);

						       	$program_query = new WP_Query($args);
						     
						        if ( $program_query->have_posts() ) : 
						       	$ctr_p_e = 0;
                  				while ($program_query->have_posts()) : $program_query->the_post();
                  				
                  				 $ctr_p_e++;

			                	if($ctr_p_e <= 5){
						        ?>

						    	<li class="program-<?php echo $ctr_p_e; ?> energy"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?> <?php //echo $ctr_p; ?></a></li>


						    <?php  } 
						    endwhile; endif; wp_reset_query(); ?>
							
						</ul>
						
					</div>
					<div class="four columns">
						<ul>
							<li>Information Technology</li>
							
							 <?php //wp_reset_query();
						        $args = array(
							        'post_type'=>'program',
							        'orderby' => 'name',
							        'order' => 'ASC',

							        'tax_query' => array(
										array(
											'taxonomy' => 'sector',
											'field'    => 'slug',
											'terms'    => 'information-technology',
										),
									),
							   
									'meta_query'=>array(
										array(
											'key'=>'featured',
											'value'=>'1',
											'compare'=>'=',
										)	
									)

						      	);

						       	$program_query = new WP_Query($args);
						     
						        if ( $program_query->have_posts() ) : 
						       	$ctr_p_t = 0;
                  				while ($program_query->have_posts()) : $program_query->the_post();
                  				
                  				 $ctr_p_t++;

			                	if($ctr_p_t <= 5){
						        ?>

						    	<li class="program-<?php echo $ctr_p_t; ?> technology"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?> <?php //echo $ctr_p; ?></a></li>


						    <?php  } 
						    endwhile; endif; wp_reset_query(); ?>
						</ul>
						
					</div>
				</div>
				<!--See all buttons -->
				<div class="row">
					<div class="four columns">
						<div class="button xl">
							<a href="<?php echo esc_url( home_url( '/program/?sec=manufacturing' ) ); ?>">
								<div>
									See all Manufacturing programs
								</div>
							</a>
						</div>
					</div>
					<div class="four columns">
						<div class="button xl">
							<a href="<?php echo esc_url( home_url( '/program/?sec=energy' ) ); ?>">
								<div>
									See all Energy programs
								</div>
							</a>
						</div>
					</div>
					<div class="four columns">
						<div class="button xl">
							<a href="<?php echo esc_url( home_url( '/program/?sec=information-technology' ) ); ?>">
								<div>
									See all Information Technology programs
								</div>
							</a>
						</div>
					</div>
				</div>
				<!--End buttons -->
			</div>
		</div>
		<div class="nav_hover jobs">
			<div class="container">
				<div class="row ">
					<h2>Check out our potential jobs</h2>
					<div class="four columns">
						<ul>
							<li>Manufacturing</li>
							 <?php //wp_reset_query();
						        $args = array(
							        'post_type'=>'jobs',
							        'orderby' => 'name',
							        'order' => 'ASC',

							        'tax_query' => array(
										array(
											'taxonomy' => 'sector',
											'field'    => 'slug',
											'terms'    => 'manufacturing',
										),
									),
							   
									'meta_query'=>array(
										array(
											'key'=>'featured',
											'value'=>'1',
											'compare'=>'=',
										)	
									)

						      	);

						       	$program_query = new WP_Query($args);
						     
						        if ( $program_query->have_posts() ) : 
						       	$ctr_j_m = 0;
                  				while ($program_query->have_posts()) : $program_query->the_post();
                  				
                  				 $ctr_j_m++;

			                	if($ctr_j_m <= 5){
						        ?>

						    	<li class="job-<?php echo $ctr_j_m; ?> manufacturing"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?> <?php //echo $ctr_p; ?></a></li>


						    <?php  } 
						    endwhile; endif; wp_reset_query(); ?>
						</ul>

					</div>
					<div class="four columns">
						<ul>
							<li>Energy</li>
							 <?php //wp_reset_query();
						        $args = array(
							        'post_type'=>'jobs',
							        'orderby' => 'name',
							        'order' => 'ASC',

							        'tax_query' => array(
										array(
											'taxonomy' => 'sector',
											'field'    => 'slug',
											'terms'    => 'energy',
										),
									),
							   
									'meta_query'=>array(
										array(
											'key'=>'featured',
											'value'=>'1',
											'compare'=>'=',
										)	
									)

						      	);

						       	$program_query = new WP_Query($args);
						     
						        if ( $program_query->have_posts() ) : 
						       	$ctr_j_e = 0;
                  				while ($program_query->have_posts()) : $program_query->the_post();
                  				
                  				 $ctr_j_e++;

			                	if($ctr_j_e <= 5){
						        ?>

						    	<li class="job-<?php echo $ctr_j_e; ?> energy"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?> <?php //echo $ctr_p; ?></a></li>


						    <?php  } 
						    endwhile; endif; wp_reset_query(); ?>
						</ul>
						
					</div>
					<div class="four columns">
						<ul>
							<li>Information Technology</li>
							 <?php //wp_reset_query();
						        $args = array(
							        'post_type'=>'jobs',
							        'orderby' => 'name',
							        'order' => 'ASC',

							        'tax_query' => array(
										array(
											'taxonomy' => 'sector',
											'field'    => 'slug',
											'terms'    => 'information-technology',
										),
									),
							   
									'meta_query'=>array(
										array(
											'key'=>'featured',
											'value'=>'1',
											'compare'=>'=',
										)	
									)

						      	);

						       	$program_query = new WP_Query($args);
						     
						        if ( $program_query->have_posts() ) : 
						       	$ctr_j_t = 0;
                  				while ($program_query->have_posts()) : $program_query->the_post();
                  				
                  				 $ctr_j_t++;

			                	if($ctr_j_t <= 5){
						        ?>

						    	<li class="job-<?php echo $ctr_j_e; ?> energy"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?> <?php //echo $ctr_p; ?></a></li>


						    <?php  } 
						    endwhile; endif; wp_reset_query(); ?>
						</ul>
						
					</div>
				</div>
				<!--See all buttons -->
				<div class="row">
					<div class="four columns">
						<div class="button xl">
							<a href="<?php echo esc_url( home_url( '/jobs/?sec=manufacturing' ) ); ?>">
								<div>
									See all Manufacturing jobs
								</div>
							</a>
						</div>
					</div>
					<div class="four columns">
						<div class="button xl">
							<a href="<?php echo esc_url( home_url( '/jobs/?sec=energy' ) ); ?>">
								<div>
									See all Energy jobs
								</div>
							</a>
						</div>
					</div>
					<div class="four columns">
						<div class="button xl">
							<a href="<?php echo esc_url( home_url( '/jobs/?sec=information-technology' ) ); ?>">
								<div>
									See all Information Technology jobs
								</div>
							</a>
						</div>
					</div>
				</div>
				<!--End buttons -->
			</div>
		</div>
<!-- End nav hovers -->

		<div class="gateway">
			<div class="home_icon mobile-only">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo get_template_directory_uri('/'); ?>/img/home_icon.png" alt="Back to the homepage">
				</a>
			</div>	
			<div class="nav_trigger mobile-only">
				<img src="<?php echo get_template_directory_uri('/'); ?>/img/nav_trigger.png" alt="Open the navigation for this site">
			</div>	

			<ul>
				<li>
					<a id="advisor" href="#">
						<div class="table">
							<div class="table-cell">
								Contact an advisor
							</div>
						</div>
					</a>
				</li>
				<li>
					<a id="veterans" href="<?php echo esc_url( home_url( '/' ) ); ?>information-for-veterans/">
						<div class="table">
							<div class="table-cell">
								Find<br /> information<br /> for<br /> Veterans
							</div>
						</div>
					</a>
				</li>
				<li>
					<a id="miners" href="<?php echo esc_url( home_url( '/' ) ); ?>information-for-displaced-miners/">
						<div class="table">
							<div class="table-cell">
								Find<br /> Information<br /> for displaced<br /> miners
							</div>
						</div>
					</a>
				</li>
			</ul>
		</div>
