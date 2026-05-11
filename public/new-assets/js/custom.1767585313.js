/*togle menu icon change js*/
$(document).ready(function(){
  // Check if the div content is empty
  if ($('.pagination').text().trim() === '') {
      // If it's empty, hide the div
      $('.pagination').parent('.ps-pagination').hide();
  }
});

$(document).ready(function () {
    $('.c-hamburger--htla').on('click', function () {
        $(this).toggleClass('is-active');
        if ($(window).width() > 768){
          $('body').toggleClass('sidebar-closed');
        }
        else{
          $('body').removeClass('sidebar-closed');
        }

    });

    $('.footer-dashboard-nav').on('click', function () {
      $(this).toggleClass('is-active');
      $('body').removeClass('sidebar-closed');
  });
  if ($(window).width() < 1200){
    if( $('body').find('.verify-toggle-active').length){
        $("body").addClass("top-bar-active");
    }
  }
  $(".verify-toggle").click(function () {
    $("body").toggleClass('top-bar-active');
  });
  $(".close-alet-strip").click(function () {
    $("body").toggleClass('top-bar-active');
  });

  $(function(){
		$('.mobile-footer-nav .mobile-footer-nav-click a').on("click", function () {
      $('.verify-toggle').trigger('click');
      setTimeout(RemoveClass, 500);
		});
		function RemoveClass() {
		  $('body').removeClass("add_padding");
      $('.verify-toggle').trigger('click');
		}
	}); 

  $(function(){
    $('.mobile-footer-nav .outlet-mobile-footer-nav-click a').on("click", function () {
      $('.verify-toggle').trigger('click');
      setTimeout(RemoveClass, 500);
    });
    function RemoveClass() {
      $('body').removeClass("add_padding");
      $('.verify-toggle').trigger('click');
    }
  }); 
  
    
    /*menu sidebar open close */
    $('.menu-toggle').click(function (e) {
        e.preventDefault();
        $('main').toggleClass('sidebar-open');
       $('body').toggleClass('sidebar-open');
        $('.sidebar-overlay').toggleClass('sidebar-overlay-open');
    });
    $('.sidebar-overlay').click(function (e) {
      e.preventDefault();
      $('main').removeClass('sidebar-open');
      if ($(window).width() < 767) {
        $('body').removeClass('sidebar-open');
        $('body').removeClass('sidebar-closed');
        $('.c-hamburger--htla').removeClass('is-active');
      }
      $('.footer-dashboard-nav').removeClass('is-active');
      $('.sidebar-overlay').removeClass('sidebar-overlay-open');
    });

    $('.sidebar-menu .ajax_load_url').click(function (e) {
      e.preventDefault();
      if (!$("body").hasClass("nav_sidebar")) {
        $('body').removeClass('sidebar-open');
      }else{
      }
      $('.c-hamburger--htla').removeClass('is-active');
      $('.footer-dashboard-nav').removeClass('is-active');
      $('.sidebar-overlay').removeClass('sidebar-overlay-open');
    });
    
    /*dropdown slide js*/
    $('.dropdown').on('show.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
    });

    $('.dropdown').on('hide.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
    });
    /*mobile sidebar menu*/
    if ($(window).width() < 768) {
        $('body').addClass('sidebar-closed');
        $('.sidebar-menu .ajax_load_url').click(function (e) {
          e.preventDefault();
          $('body').removeClass('sidebar-open');
          $('body').addClass('mobile-sidebar-open ');
        });
        $(".menu-toggle").click(function () {
          $('body').removeClass('mobile-sidebar-open ');
        });
    } else {
        $('body').removeClass('sidebar-closed');
    }
    if ($(window).width() > 767) {
      $('body').addClass('sidebar-closed');
    } 

    //export dropdwon btn
    $(".content-scrolling-wrapper").scroll(function() {
      if ($(".content-scrolling-wrapper").scrollTop()>150)
      {
          $('.top-header-title-row-card .dropdown-menu').removeClass("show");
      }
      else
      {
        
      }
    });

    //inventory purchase grid drodpown
    $(".content-scrolling-wrapper").scroll(function() {
      if ($(".content-scrolling-wrapper").scrollTop()>100)
      {
          $('.discount-calcul-btn .dropdown-menu').removeClass("show");
      }
      else
      {
        
      }
    });

    var contentHeight = $('.fetr-listing').height();
    if(contentHeight >= '246px') {
      $(this).siblings('.more-details').show();
    } else {
      $(this).siblings('.more-details').hide();
    }

    $('.new-launch-wrap .more-details').click(function(){
      $(this).parent('.card').toggleClass('height-auto');
      $(this).text(function(i, text){
        return text === "More Details" ? "Less Details" : "More Details";
    })
    });
    /*sidebar submenu open*/
        jQuery(function ($) {
            var animationSpeed = 300,
            subMenuSelector = '.sidebar-submenu';
        
          $($).on('click', 'li a', function(e) {
            var $this = $(this);
            var checkElement = $this.next();
        
            if (checkElement.is(subMenuSelector) && checkElement.is(':visible')) {
              checkElement.slideUp(animationSpeed, function() {
                checkElement.removeClass('menu-open');
              });
              checkElement.parent("li").removeClass("active");
            }
        
            //If the menu is not visible
            else if ((checkElement.is(subMenuSelector)) && (!checkElement.is(':visible'))) {
              //Get the parent menu
              var parent = $this.parents('ul').first();
              //Close all open menus within the parent
              var ul = parent.find('ul:visible').slideUp(animationSpeed);
              //Remove the menu-open class from the parent
              ul.removeClass('menu-open');
              //Get the parent li
              var parent_li = $this.parent("li");
        
              //Open the target menu and add the menu-open class
              checkElement.slideDown(animationSpeed, function() {
                //Add the class active to the parent li
                checkElement.addClass('menu-open');
                parent.find('li.active').removeClass('active');
                parent_li.addClass('active');
              });
            }
            //if this isn't a link, prevent the page from being redirected
            if (checkElement.is(subMenuSelector)) {
              e.preventDefault();
            }
          });
            
        $("#close-sidebar").click(function() {
          $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
          $(".page-wrapper").addClass("toggled");
        });

    });

    /* Select 2 Purchase */
    //$('.purchase-list-dropdown').select2();

    // Custom Scroll
    $(".custom-scroller").mCustomScrollbar({
        theme:"dark-thin"
    });
// Browser checking for sidebar custom scroll
var isChromium = window.chrome;
var winNav = window.navigator;
var vendorName = winNav.vendor;
var isOpera = typeof window.opr !== "undefined";
var isIEedge = winNav.userAgent.indexOf("Edge") > -1;
var isIOSChrome = winNav.userAgent.match("CriOS");

if (isIOSChrome) {
   // is Google Chrome on IOS
} else if(
  isChromium !== null &&
  typeof isChromium !== "undefined" &&
  vendorName === "Google Inc." &&
  isOpera === false &&
  isIEedge === false
) {
  // is Google Chrome 
} else { 
  $(".scroll-me-sidebar").mCustomScrollbar({
    theme:"light-2",          
    scrollInertia: 0
  });
} 
	

if ($('.dashboard')[0]) {
  $(document.body).addClass('dashboard-page');
}
if ($('.res-dashboard-wrap')[0]) {
  $(document.body).addClass('dashboard-page');
}

if ($('.running-table-container')[0]) {
  $(document.body).addClass('running-table-container');
}

}); 

/* Date Purchase */
//$(function () {
    //$('.datetime').datetimepicker({
        //locale: 'ru',
        //format: 'LT',
        //viewMode: 'years',
        //format: 'MM/YYYY',
       // daysOfWeekDisabled: [0, 6],
        //inline: true,
        //sideBySide: true\,    
   // });
//});
/* default accordion variable method */
//$('.collapse').on('hidden.bs.collapse', function () {
 // var defaultDiv = $($(this).data("parent")).data("default");
 // $('.collapse').eq(defaultDiv-1).collapse('show');
//});
// window.onload = function () { 
// var custom_reports = window.location.href;
// var custom_reports = window.location.href;
// if (custom_reports.match(/custom_reports/g)) {
//     $("body").addClass("custom_reports");
// }
// }; 
    
if (typeof number_format === "undefined") {
  function number_format (number, decimals, use_parse_float,dec_point, thousands_sep) {
      number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
      var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      use_parse_float_flag = (typeof use_parse_float === 'undefined') ? '0' : use_parse_float,
      s = '',
      toFixedFix = function (n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
      };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
          /*var x = s[0].toString();
          var lastThree = x.substring(x.length-3);
          var otherNumbers = x.substring(0,x.length-3);
          if(otherNumbers != '') lastThree = sep + lastThree;
          s[0] = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, sep) + lastThree;*/
          s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
          s[1] = s[1] || '';
          s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      if(use_parse_float_flag==1) {
          if(s.length > 1) {
              s[1] = parseFloat('0.'+s[1])+'';
              s[1] = s[1].substr(2);
              if(s[1] == '') s[1] = 0;
              if(s[1] == 0) {
                  if(sep == '') return parseFloat(s[0]);
                  else return s[0];
              }
          }
          if(sep == '') return parseFloat(s.join(dec));
          else return s.join(dec);
      } else {
          return s.join(dec);
      }
  }
}

function currency_symbol(currency_id,with_bracket) {
    if (with_bracket === undefined) {
        return '<span class="currency-icon rs-font-family">'+currency_id+'</span> ';
    } else {
        return ' ('+'<span class="currency-icon rs-font-family">'+currency_id+'</span> '+')'; 
    }
}

function input_floating() {
    $('.pp-textfield input.form-control,.pp-textfield textarea.form-control').each(function () {
        if($(this).val() != ""){
            $(this).closest('.pp-textfield').addClass("pp-textfield-floating-label-completed");
        }
    });
}

function common_fancy_alert(message,page_url='') {
	$("#common_confirm_html").html('');
	var str_data = '<div id="fancy-alert" style="display:none;" class="ps-fancybox new-fancybox-wrapper fancy-sm popup-bg fancy-alert-wrap">';
		str_data += '<div class="new-fancybox-body">';
			str_data += '<p class="ng-title-2 mb-0 fw-500">'+message+'</p>';
		str_data += '</div>';
		str_data += '<div class="popup-footer text-right">';
			str_data += '<button class="ps-btn sm-btn primary-btn" id="close_popup">Ok</button>';
		str_data += '</div>';
	str_data += '</div>';
	
	$("#common_confirm_html").html(str_data);
	$.fancybox.open({
		type : 'html',
		src : str_data,
		width: 'auto',
		height:'auto',
		autoSize: false,
		afterShow: function() {
			$("#fancy-alert").show();
			$('#close_popup').bind('click', function () {
				$.fancybox.close();
        if(page_url != '') {
          window.location.href = page_url;
        }
			});
		}
	});
}

//more filter hide show
  $(document).ready(function() {
  const $showNextBtn = $('.searchbar_more_filters');
      const $hiddenElements = $('.ps-searchbar > div.hidden');
      let isExpanded = false;

      $showNextBtn.on('click', function() {
          if (!isExpanded) {
              $hiddenElements.removeClass('hidden');
              $showNextBtn.text('Hide Filters');
          } else {
              $hiddenElements.addClass('hidden');
              $showNextBtn.text('More Filters');
          }
          isExpanded = !isExpanded;
      });

      
      // Initialize tooltips
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl);
      });
      
  });


var submitBtnDefaultHtml = null;
var submitBtnWidth = null;

function toggleSubmitLoader(isLoading, btn_el) {
    var $submitBtn = btn_el;
    if (!$submitBtn.length) return;

    // Save original HTML once
    if (submitBtnDefaultHtml === null) {
        submitBtnDefaultHtml = $submitBtn.html();
    }

    if (isLoading) {
        // Fix width before replacing HTML
        submitBtnWidth = $submitBtn.outerWidth();
        $submitBtn.css("width", submitBtnWidth + "px");

        $submitBtn.addClass('loading');
        $submitBtn.html('<span class="ps-btn-loader loader"></span>');
        $('body').addClass('bodyOverlay');
    } else {
        // Remove loader + restore original content + remove fixed width
        $submitBtn.removeClass('loading');
        $submitBtn.html(submitBtnDefaultHtml);

        // Reset width
        $submitBtn.css("width", "");
        $('body').removeClass('bodyOverlay');
    }
}
