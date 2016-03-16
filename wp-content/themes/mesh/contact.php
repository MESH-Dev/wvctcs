<div class="ctc_form lightbox hide">
	<div class="container">
		<?php //echo do_shortcode('[contact-form-7 id="79" title="Contact Advisor Form"]') ?>
		<div class="close"></div>
		<h1 class="form_title">Contact a job advisor today</h1>

		<form id="contact" novalidate="novalidate">
			<div class="row">
				<div class="six columns">
					<input type="text" name="fname" id="fname" placeholder="My Name" value="" size="40">
				</div>
				<div class="six columns">
					<input type="email" name="email" placeholder="E-mail" id="email" size="40" >
				</div>
			</div>
			<!-- <input type="text" name="location" id="location" size="40" > -->
			<div class="row">
				<div class="six columns">
					<input type="phone" name="phone" id="phone" placeholder="Phone number">
				</div>

				<div class="six columns">
					<div class="select">
						<select name="location" id="location">
							<option value="" selected>I am located in...</option>
							<?php $locations = get_terms('location');
				                      
				                              foreach($locations as $location){
				                        
				                            ?>
				                <option value="<?php echo $location->name; ?>"><?php echo $location->name; ?></option>
				                <?php } ?>
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="six columns want">
					<p>I want to...</p>
					<fieldset>
					<input class="ctc_select" type="radio" id="center" name="want" value="Come to the closest training center"/>
	                <label for="center" ><span></span>COME TO THE CLOSEST TRAINING CENTER</label>

	                <input class="ctc_select" type="radio" id="meet_advisor" name="want" value="Meet a job advisor"/>
	                <label for="meet_advisor" ><span></span>MEET A JOB ADVISOR</label>

	                <input class="ctc_select" type="radio" id="visit_at_home" name="want" value="Have a job advisor my home" />
	                <label for="visit_at_home"><span></span>HAVE A JOB ADVISOR VISIT MY HOME</label>

	                <input class="ctc_select" type="radio" id="mail" name="want" value="Have information mailed to me" />
	                <label for="mail"><span></span>HAVE INFORMATION MAILED TO ME</label>

	                <input class="ctc_select" type="radio" id="alumni" name="want" value="Speak to an Alumni" />
	                <label for="alumni"><span></span>SPEAK TO AN ALUMNI</label>
	            	</fieldset>
				</div>
			</div>

			<div class="row">
				<div class="six columns omega">
					<input style="float:left;" type="submit" value="Contact a job advisor now"/>
					<img id="contact_ajax" style="float:left; margin:10px; display:none;" src="<?php bloginfo('template_directory');?>/images/ajax-loader.gif"/>
				</div>
			</div>

			<div id="contact_ajax_response"></div>
		</form>
	</div>
</div>