var $ =jQuery.noConflict();


jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

  function full_height(){
    var window_h = $(window).height();
    $('.home.page .panel#home').css({'height':window_h});
  }

  $(window).load(full_height);
$(window).resize(full_height);

  //Let's do something awesome!

  //Intended to unwrap h2's when they are used in a cutom WYSIWYG
  $('.content h2').find('p').contents().unwrap();
  //-----------------------------------------------------

  //Adds the content of the links in the initial Wordpress nav as classes
  //so that they can be hooked into for styling

  $('.menu li').each(function(){
  	var text = $(this).find('a').text();
  	var lower = text.toLowerCase();
  	//console.log(lower);
  	$(this).addClass(lower);
  })

  //-----------------------------------------------------

  //Homepage parallax


  $('.panel').each(function(i){
      i = i++;
      $(this).parallax("50%", .05);
    });   

  //-----------------------------------------------------

  //Show/hide 
  $('.ctc_form').hide().removeClass('hide');

  $('.gateway #advisor, .ctc_advisor').click(function(e){
    e.preventDefault();
    $('.ctc_form').fadeIn(300);
  });

  $('.ctc_form .close').click(function(){
    $('.ctc_form').fadeOut(300);
    $('#contact')[0].reset();
  });

  //-----------------------------------------------------
  
  //Smooth page scroll
  $(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          //'top-50' is custom.  limits the offset to top of window plus 50px
          scrollTop: (target.offset().top-50)
        }, 800);
        return false;
      }
    }
  });
});

 //-----------------------------------------------------

  //Equal height divs

  /* Thanks to CSS Tricks for pointing out this bit of jQuery
  http://css-tricks.com/equal-height-blocks-in-rows/
  It's been modified into a function called at page load and then each time the page is resized. One large modification was to remove the set height before each new calculation. */

  function equalheight (container){

  var currentTallest = 0,
       currentRowStart = 0,
       rowDivs = new Array(),
       $el,
       topPosition = 0;
   $(container).each(function() {

     $el = $(this);
     $($el).height('auto')
     topPostion = $el.position().top;

     if (currentRowStart != topPostion) {
       for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
         rowDivs[currentDiv].height(currentTallest);
       }
       rowDivs.length = 0; // empty the array
       currentRowStart = topPostion;
       currentTallest = $el.height();
       rowDivs.push($el);
     } else {
       rowDivs.push($el);
       currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
    }
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
   });
  }

  // $(window).load(function() {
  //   equalheight('.c_body .six.columns .eh'); //.c_foot .six.columns .content,
  // });


  // $(window).resize(function(){
  //   equalheight('.c_body .six.columns .eh'); //.c_foot .six.columns .content,
  // });

  // $(window).load(function() {
  //   equalheight('.results .mix .title');
  // });

  // $(window).resize(function(){
  //   equalheight('.results .results_card');
  // });

  // $(window).load(function() {
  //   equalheight('.results .results_card');
  //   //console.log(equalheight);
  // });
  // $(window).resize(function(){
  //   equalheight('.results .mix .title');
  // });

  $(window).load(function() {
    equalheight('.results .mix .half');
    //console.log(equalheight);
  });


  $(window).resize(function(){
    equalheight('.results .mix .half');
  });

  $(window).load(function() {
    equalheight('.job_sum');
    //console.log(equalheight);
  });


  $(window).resize(function(){
    equalheight('.job_sum');
  });

  $(window).load(function() {
    equalheight('.nav_btn .button.xl');
    //console.log(equalheight);
  });


  $(window).resize(function(){
    equalheight('.nav_btn .button.xl');
  });

  // $(window).load(function() {
  //   equalheight('.results .mix .r_field.train p');
  // });


  // $(window).resize(function(){
  //   equalheight('.results .mix .r_field.train p');
  // });
  // $(window).load(function() {
  //   equalheight('.results .mix .t_time');
  // });


  // $(window).resize(function(){
  //   equalheight('.results .mix .t_time');
  // });

  // $(window).load(function() {
  //   equalheight('.rel_grid .job_sum');
  // });


  // $(window).resize(function(){
  //   equalheight('.rel_grid .job_sum');
  // });
  
  //-----------------------------------------------------


$('.sector span a.manufacturing').attr('href', '/')

//Show/hide nav_hover on nav hover

//--Clone contents of programmed version of the "programs" container, and add it to a sub ul in the navigation in the "Training Programs" section
$('.nav_hover.program').clone().appendTo('.main-navigation li.programs').wrap('<ul class="hover"><li>');//.css({'left':'0'});
//--Clone contents of programmed version of the "programs" container, and add it to a sub ul in the navigaion in the "Potential Jobs" section
$('.nav_hover.jobs').clone().appendTo('.main-navigation li.jobs').wrap('<ul class="hover"><li>');

var rel_job = $('.rel_grid .job_sum').size();

if(rel_job == 1){
  $('.rel_grid div').removeClass('six columns job_sum').addClass('job_sum_single');
}

//-----------------------------------------------------

//--Resize nav hover boxes

function navHoverResize (){
  var w_width = $(window).width();
  var h_width = $('header').width();
  var c_width = w_width - h_width;
  //Calculate 2/3 of available window width, when the width of the header has been removed
  var nh_width = (c_width/3)*2;

  if(w_width >= 1000){

    $('.main-navigation .nav_hover').css({'width':c_width-50});

  } 
}

$(window).load(navHoverResize);
$(window).resize(navHoverResize);

//-----------------------------------------------------

//Filter panels functionality

$('.adv_filter').click(function(e){
  e.preventDefault();
	$('.filter_pane').slideToggle(400);
  $('.filter_overlay').addClass('hide').css({'display':'none'});
  $('.filter_overlay.location').slideDown(600).removeClass('hide');

   $('ul.filters li a').removeClass('filter_active');
  $('ul.filters li#loc a').addClass('filter_active');
})

$('ul.filters li#loc a').click(function(e){
  e.preventDefault();
	$('ul.filters li a').removeClass('filter_active');
	$('ul.filters li#loc a').addClass('filter_active');
	
	//$('.filter_type_block').slideDown(7000);
	$('.filter_overlay.location').removeClass('hide').css({'display':'block'});
	$('.filter_overlay.skills').addClass('hide').css({'display':'none'});
	$('.filter_overlay.training').addClass('hide').css({'display':'none'});
	$('.filter_overlay.salary').addClass('hide').css({'display':'none'});
	//$('.vis_select').css({borderTop:"2px solid #898230"})
});

$('ul.filters li#time a').click(function(e){
  e.preventDefault();
	$('ul.filters li a').removeClass('filter_active');
	$('ul.filters li#time a').addClass('filter_active');
	//$('.filter_type_block').slideDown(200);
	$('.filter_overlay.training').removeClass('hide').css({'display':'block'});
	$('.filter_overlay.location').addClass('hide').css({'display':'none'});
	$('.filter_overlay.skills').addClass('hide').css({'display':'none'});
	$('.filter_overlay.salary').addClass('hide').css({'display':'none'});
});

$('ul.filters li#sal a').click(function(e){
  e.preventDefault();
	$('ul.filters li a').removeClass('filter_active');
	$('ul.filters li#sal a').addClass('filter_active');
	//$('.filter_type_block').slideDown(200);
	$('.filter_overlay.salary').removeClass('hide').css({'display':'block'});
	$('.filter_overlay.skills').addClass('hide').css({'display':'none'});
	$('.filter_overlay.training').addClass('hide').css({'display':'none'});
	$('.filter_overlay.location').addClass('hide').css({'display':'none'});
});

$('ul.filters li#skill a').click(function(e){
  e.preventDefault();
	$('ul.filters li a').removeClass('filter_active');
	$('ul.filters li#skill a').addClass('filter_active');
	
	//$('.filter_type_block').slideDown(200);
	$('.filter_overlay.skills').removeClass('hide').css({'display':'block'});
	$('.filter_overlay.location').addClass('hide').css({'display':'none'});
	$('.filter_overlay.training').addClass('hide').css({'display':'none'});
	$('.filter_overlay.salary').addClass('hide').css({'display':'none'});
});

//-----------------------------------------------------

//absolute center position for contact form

$(window).load(function()
{
  centerContent();
});

$(window).resize(function()
{
  centerContent();
});

function centerContent()
{
  var container = $('#main');
  var content = $('.ctc_form');
  var _header = $('header');
  var _window = $(window);
  content.css("left", ((container.width()-content.width())/2) + _header.width());
  content.css("top", (_window.height()-content.height())/2);

  if(_window.width() <= 1024){
    content.css("left", ((container.width()-content.width())/2));
  }
}
//-----------------------------------------------------

// MapTooltip


// $('.map .pin').each(function(){
//   var tt_width_b = $(this).find('.tooltip').width();
//   console.log(tt_width_b);
//   $(this).find('.tooltip').css({'width':tt_width_b+10});
// });

$('.map .pin').hover(function(){
  var tt_width = $(this).find('.tooltip').width();

  $(this).find('.tooltip').css({'width':tt_width+20});
  
  var tt_val = $(this).find('.tooltip').text();
  console.log(tt_val + ' is ' + tt_width +'px wide');
  $(this).find('.tooltip').css({'left':-((tt_width/2)+2)});
},function(){
  $(this).find('.tooltip').css({'left':'-9999px'});
});

//-----------------------------------------------------

//Wrap filter checkboxes in column structure "if" there are more than five filter items
//Assists with responsive styling

var cols_loc = $(".filter_overlay.location .row fieldset > .filter_input");
var cols_sal = $(".filter_overlay.salary .row fieldset > .filter_input");
var cols_skill = $(".filter_overlay.skills .row fieldset > .filter_input");
var cols_train = $(".filter_overlay.training .row fieldset > .filter_input");
var fcl = $('.filter_overlay .row');

//Divide col_count by the number of columns you want
var col_count_loc = Math.ceil((cols_loc.length)/3);
var col_count_sal = Math.ceil((cols_sal.length)/3);
var col_count_skill = Math.ceil((cols_skill.length)/3);
var col_count_train = Math.ceil((cols_train.length)/3);

//console.log(cols_loc);

	if (cols_loc.length > 5){
	    for(var i = 0; i < cols_loc.length; i+=col_count_loc) {
	      cols_loc.slice(i, i+col_count_loc).wrapAll("<div class='four columns " + col_count_loc + " '></div>");
	    }
	}

	if (cols_sal.length > 5){
	    for(var isal = 0; isal < cols_sal.length; isal+=col_count_sal) {
	      cols_sal.slice(isal, isal+col_count_sal).wrapAll("<div class='four columns " + col_count_sal + " '></div>");
	    }
	}

	if (cols_skill.length > 5){
	    for(var isk = 0; isk < cols_skill.length; isk+=col_count_skill) {
	      cols_skill.slice(isk, isk+col_count_skill).wrapAll("<div class='four columns " + col_count_skill + " '></div>");
	    }
	}

	if (cols_train.length > 5){
	    for(var itra = 0; itra < cols_train.length; itra+=col_count_train) {
	      cols_train.slice(itra, itra+col_count_train).wrapAll("<div class='four columns " + col_count_train + " '></div>");
	    }
	}

  //-----------------------------------------------------

  // sidr - mobile show/hide nav

  $('.nav_trigger').sidr({
      name: 'sidr-main',
      source: '.main-navigation',
      renaming: false,
    });

   $('.sidr-close').click(
    function(){
      $.sidr('close', 'sidr-main');
       //console.log("Sidr should be closed");
    });

  //================================================

  //external link manager

  // New tabs

  /* ==========
     Variables
   ========== */
   var url = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');

  /* ==========
      Utilities
    ========== */
   function beginsWith(needle, haystack){
     return (haystack.substr(0, needle.length) == needle);
   };


  /* ==========
     Anchors open in new tab/window
   ========== */
   $('a').each(function(){

     if(typeof $(this).attr('href') != "undefined") {
      var test = beginsWith( url, $(this).attr('href') );
      //if it's an external link then open in a new tab
      if( test == false && $(this).attr('href').indexOf('#') == -1){
        $(this).attr('target','_blank').prepend('<span class="sr-only">External link, opens in new window</span>');
      }
     }
   });

   //=============================================================

//Job/Program filter functionality

//========= PLUGIN ADD ON FOR MIXITUP =====================
// To keep our code clean and modular, all custom functionality will be contained inside a single object literal called "checkboxFilter".
var checkboxFilter = {

  // Declare any variables we will need as properties of the object

  $filters: null,
  $reset: null,
  groups: [],
  outputArray: [],
  outputString: '',

  // The "init" method will run on document ready and cache any jQuery objects we will need.

  init: function(){
    var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "checkboxFilter" object so that we can share methods and properties between all parts of the object.

    self.$filters = $('#Filters');
    self.$reset = $('');
    self.$container = $('.results');
    //console.log(self.$reset);

    self.$filters.find('fieldset').each(function(){
      self.groups.push({
        $inputs: $(this).find('.filter'),
        active: [],
		    tracker: false
      });
    });

    self.bindHandlers();
  },

  // The "bindHandlers" method will listen for whenever a form value changes.

  bindHandlers: function(){
    var self = this;

    self.$filters.on('change', function(){
      self.parseFilters();
      //$('.six.columns.mix:odd').addClass('visible');
      // var style = $('.six.columns.mix');
      // //console.log(style);
      // if (style.style == "inline-block"){
      // 	$(this).addClass('visible');
      // }
      //$('.six.columns.mix').attr('style')
    });

    self.$reset.on('click', function(e){
      e.preventDefault();
      self.$filters[0].reset();
      self.parseFilters();
    });
  },

  // The parseFilters method checks which filters are active in each group:

  parseFilters: function(){
    var self = this;
    var group_cnt = 0;
    // loop through each filter group and add active filters to arrays

    for(var i = 0, group; group = self.groups[i]; i++){
      group.active = []; // reset arrays
      // group_cnt ++;
      // console.log(i);
      group.$inputs.each(function(){
        $(this).is(':checked') && group.active.push(this.value);
        // var length = $('.six.columns.mix:visible').size();
        // console.log(length);
        //$('.six.columns.mix:odd').css({'marginRight':'0'});
        //$('.six.columns.mix:even').css({'marginRight':'4%'});
        // if (group_cnt % 2 === 0){
        // 	$('.results .six.columns').css({'marginRight':'4%'}).addClass('.results-' + group_cnt);
        // 	console.log(self.groups[i]);
        // }
      });

    //   if (i % 2 === 0){
    // 	$('.results .six.columns').css({'marginRight':'4%'});
    // 	console.log(i);

    // }
	    group.active.length && (group.tracker = 0);
    }

    // if (group.active % 2 === 0){
    // 	$('.results .six.columns').css({'marginRight':'4%'});
    // }
    //console.log(group);
    self.concatenate();
  },

  // The "concatenate" method will crawl through each group, concatenating filters as desired:

  concatenate: function(){
    var self = this,
		  cache = '',
		  crawled = false,
		  checkTrackers = function(){
        var done = 0;

        for(var i = 0, group; group = self.groups[i]; i++){
          (group.tracker === false) && done++;
        }

        return (done < self.groups.length);
      },
      crawl = function(){
        for(var i = 0, group; group = self.groups[i]; i++){
          group.active[group.tracker] && (cache += group.active[group.tracker]);

          if(i === self.groups.length - 1){
            self.outputArray.push(cache);
            cache = '';
            updateTrackers();
          }
        }
      },
      updateTrackers = function(){
        for(var i = self.groups.length - 1; i > -1; i--){
          var group = self.groups[i];

          if(group.active[group.tracker + 1]){
            group.tracker++;
            break;
          } else if(i > 0){
            group.tracker && (group.tracker = 0);
          } else {
            crawled = true;
          }
        }
      };

    self.outputArray = []; // reset output array

	  do{
		  crawl();
	  }
	  while(!crawled && checkTrackers());

    self.outputString = self.outputArray.join();

    // If the output string is empty, show all rather than none:

    !self.outputString.length && (self.outputString = 'all');

    //console.log(self.outputString);

    // ^ we can check the console here to take a look at the filter string that is produced

    // Send the output string to MixItUp via the 'filter' method:

	  if(self.$container.mixItUp('isLoaded')){
    	self.$container.mixItUp('filter', self.outputString);
	  }
  }
};
//=======END FILTER BY CHECKBOX PLUGIN

//Live Search through results based on city
//Activates on "Find Results button"
$(".search_bar .search").click(function(){
    // Retrieve the input field text and reset the count to zero

    $('.results .mix').removeClass('single');

    var filter = $('input#location-search').val();
    //filter = '.'+filter;

    if(filter == ''){
          $('.results .mix').removeClass('result');
        }

    console.log(filter);

    //$('.results').mixItUp('filter', filter, GetActiveString);

    // Loop through grid items
    $(".results .mix").each(function(){

        if (filter != ''){
          // If the list item does not contain the text phrase fade it out
          if ($(this).text().search(new RegExp(filter, "i")) < 0) {
               $(this).fadeOut('slow').removeClass('result');
              //$(this).css({"display":"none"});

          // Show the list item if the phrase matches and increase the count by 1
          } else {
              $(this).fadeIn('slow').addClass('result');
              //$(this).css({"display":"inline-block"});
              if($('.results .mix.result').size() == 1){
                $('.results .mix.result').addClass('single');
              }
          }
        }else{
          $(this).fadeIn('slow');
        }
    });

});

$(".search_bar").keyup(function(event){
    // Retrieve the input field text
    var ret_filter = $('input#location-search').val();

    //ret_filter = '.'+ret_filter;

    var key = event.which;

    if (key===13){

      $('.results .mix').removeClass('single');
      //$('.results .mix').css('')
    // Loop through grid items
      if(ret_filter == ''){
          $('.results .mix').removeClass('result');
          console.log('Search is blank');
        }
    console.log(ret_filter);

    //$('.results').mixItUp('filter', ret_filter, GetActiveString);

    $(".results .mix").each(function(){

        // If the list item does not contain the text phrase fade it out
        if (ret_filter != ''){

            if ($(this).text().search(new RegExp(ret_filter, "i")) < 0) {
                $(this).fadeOut('slow').removeClass('result');
                //$(this).css({"display":"none"});

            // Show the list item if the phrase matches and increase the count by 1
            } else {
               $(this).fadeIn('slow').addClass('result');
              //$(this).css({"display":"inline-block"});
                if($('.results .mix.result').size() == 1){
                  $('.results .mix.result').addClass('single');
                }
                
            } 
        }else{
          $(this).fadeIn('slow');
        }
    });

  }

});

$('input.filter').click(GetActiveString);

$('.filter_overlay .button.sm').click(function(){
  var button_filter= [];

  $('input:checked').each(function(){
    button_filter.push("." + $(this).attr('data-filter'));
  })
  //var button_filter =  $('.filter:checked').attr('data-filter');
  //button_filter = "."+button_filter;

  var button_filtered = button_filter.join(" ");
  console.log(button_filtered); 

if (button_filtered != ''){
   $('.results').mixItUp('filter', button_filtered , GetActiveString);
 }
 else{
  $('.results .mix').css({"display":"inline-block"});
 }

});

$('.filter:checked')

//Update active filters and display
function GetActiveString(){
  var active = [];
  $('input:checked').each(function() {
      var dn = $(this).attr('data-name');
      console.log(dn);
      //var dn_wrap = $(this).attr('data-name').wrap('<span></span>');

      active.push(dn); //data-filter
  });


  var filtered = active.join(', ');
  console.log(filtered);
  if(filtered !== '')
    $('.results_pane span').html(filtered);
      
  else{
    $('.results_pane span').html('All');
  }

}

function failMessage(){
  $('.fail-message')
    .removeClass('hide')
    .css({"position":"relative"});
}


//checkboxFilter.init();

  // Instantiate MixItUp

  $('.results').mixItUp({
    controls: {
      enable: false // we won't be needing these
    },
    animation: {
      easing: 'cubic-bezier(0.86, 0, 0.07, 1)',
      duration: 600,
      animateResizeContainer: false,
      //animateResizeTargets: true,
      //enable: false,
    },
    callbacks: {
      onMixEnd: GetActiveString,
      onMixFail: failMessage,
      //onMixStart: equalheight('.results .mix .title, .half'),
    }

  });

 var filter = getParameterByName('loc');
 var filter_skill = getParameterByName('skill');
 var filter_sec = getParameterByName('sec');
 var filter_miner = getParameterByName('miner');
 
  //check if url filter is present - initialize mixitup and prefilter 
  if(filter !==''){
    //$("input[value='" + filter + "']").prop('checked', true);
    //$('.results').mixItUp('filter', filter, GetActiveString);
    //$('h1.page_title').css({'color':'purple'});
    console.log(filter);
    $('.filter_pane').slideToggle(400);
    $('.filter_overlay.location').slideDown(600).removeClass('hide');
    $('ul.filters li#loc a').addClass('filter_active');
    //$(".network-filter-status").slideDown();
  }
  if(filter_skill !== ''){
    console.log(filter_skill);

    filter_skill = '.'+filter_skill;
    setTimeout($('.results').mixItUp('filter', filter_skill, GetActiveString), 10000);
    //$('.filter_overlay.skills fieldset .filter_input input[value='+filter_skill+']').attr('checked');

     // $('.results .mix').css({'position':'absolute', 'left':'-9999px'});
     // $('.results .mix'+filter_skill).css({'position':'relative', 'left':''});
    //$('.resluts .mix').not('.administration').css({'display':'none'});
  }
  if(filter_sec !== ''){
    filter_sec = '.'+filter_sec;
    $('.results').mixItUp('filter', filter_sec);
  }

  if (filter_miner !== ''){
     $('.filter_pane').slideToggle(400);
    $('.filter_overlay.skills').slideDown(600).removeClass('hide');
    $('ul.filters li#skill a').addClass('filter_active');
  }
  // if(filter_skill == 'building-and-construction'){
  //   console.log(filter_skill);
  //   $('.results').mixItUp('filter', filter_skill, GetActiveString);
  //   // $('.results .mix').css({'display':'none'});
  //   // $('.results .mix.administration').css({'display':'inline-block'});
  //   //$('.resluts .mix').not('.administration').css({'display':'none'});
  // }
  // if(filter_skill == 'electrical-work'){
  //   console.log(filter_skill);
  //   $('.results').mixItUp('filter', filter_skill, GetActiveString);
  //   // $('.results .mix').css({'display':'none'});
  //   // $('.results .mix.administration').css({'display':'inline-block'});
  //   //$('.resluts .mix').not('.administration').css({'display':'none'});
  // }

  // if()

//change location

//funciton to easily retrieve URL Params
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
  
  
//Filter result cards via filter_by icons
$(".filter_icon").click(function(){
  var icon_filter = $(this).attr('data-filter');
  icon_filter = "."+icon_filter;
  //console.log(icon_filter);

  $('.results').mixItUp('filter', icon_filter, GetActiveString);
});

$('.filter_icon').click(function(){
  $(this).css({"opacity":"1"});
  $('.filter_icon').not(this).css({"opacity":".7"});
});

$('.reset').click(function(e){
  e.preventDefault();
  //equalheight('.results .mix .half');
  //equalheight('.results_card .card_header h2');
  $('.results .mix').css({'display':'inline-block','left':'initial','position':'relative'});
  $('.fail-message').addClass('hide').css({"position":"absolute"});
  $('.results_pane span').text('All');
  $('input:checked').removeAttr('checked');
});

//==================================================================



});
