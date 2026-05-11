$( document ).ready(function() {
	// Propeller form ------------------------------------------------------//

	// paper input
	$(".pp-textfield-focused").remove();
	$(".pp-textfield .form-control").after('<span class="pp-textfield-focused"></span>');
	
	// floating label
	$('.pp-textfield input.form-control').each(function () {
		if($(this).val() != ""){
			$(this).closest('.pp-textfield').addClass("pp-textfield-floating-label-completed");
	  	}
	});
	
	// floating label animation
	$("body").on("focus",".pp-textfield .form-control",function(){
    	$(this).closest('.pp-textfield').addClass("pp-textfield-floating-label-active pp-textfield-floating-label-completed");
    });
	
	// floating change label
	$(".pp-textfield input.form-control").on('change', function(e) {
        if($(this).val() != ""){
            $(this).closest('.pp-textfield').addClass("pp-textfield-floating-label-completed");
        }
    });
	
	// remove floating label animation
	$("body").on("focusout",".pp-textfield .form-control",function(){
    	if($(this).val() === ""){
        	$(this).closest('.pp-textfield').removeClass("pp-textfield-floating-label-completed");
      	}
		$(this).closest('.pp-textfield').removeClass("pp-textfield-floating-label-active");
    });

	// custam check box
	$('.pp-checkbox input').after('<span class="pp-checkbox-label">&nbsp;</span>');
	
	// custam radio box
	$('.pp-radio input').after('<span class="pp-radio-label">&nbsp;</span>');
	
	// Ripple Effect -----------------------------------------------------------------//
	 $(".pp-ripple-effect").on('mousedown touchstart', function(e) {
		var rippler = $(this);
		$('.ink').remove();
		// create .ink element if it doesn't exist
		if(rippler.find(".ink").length == 0) {
			rippler.append("<span class='ink'></span>");
		}
		var ink = rippler.find(".ink");
		// prevent quick double clicks
		ink.removeClass("animate");
		// set .ink diametr
		if(!ink.height() && !ink.width())
		{
			var d = Math.max(rippler.outerWidth(), rippler.outerHeight());
			ink.css({height: d, width: d});
		}
		// get click coordinates
		var x = e.pageX - rippler.offset().left - ink.width()/2;
		var y = e.pageY - rippler.offset().top - ink.height()/2;
		// set .ink position and add class .animate
		ink.css({
		  top: y+'px',
		  left:x+'px'
		}).addClass("animate");
		
		setTimeout(function(){ 
			ink.remove();
		}, 1500);
	})
	
	//-- Checkbox Ripple Effect --//
	$(".pp-checkbox-pp-ripple-effect").on('mousedown', function(e) {
		var rippler = $(this);
		$('.ink').remove();
		// create .ink element if it doesn't exist
		if(rippler.find(".ink").length == 0) {
			rippler.append('<span class="ink"></span>');
		}
		var ink = rippler.find(".ink");
		// prevent quick double clicks
		ink.removeClass("animate");
		// set .ink diametr
		if(!ink.height() && !ink.width())
		{
			var d = Math.max(rippler.outerWidth(), rippler.outerHeight());
			ink.css({height: 20, width: 20});
		}
		// get click coordinates
		var x = e.pageX - rippler.offset().left - ink.width()/2;
		var y = e.pageY - rippler.offset().top - ink.height()/2;
		// set .ink position and add class .animate
		ink.css({
		  top: y+'px',
		  left:x+'px'
		}).addClass("animate");
		setTimeout(function(){ 
			ink.remove();
		}, 1500);
	})
	
	//-- Radio Ripple Effect --//
	$(".pp-radio-pp-ripple-effect").on('mousedown', function(e) {
		var rippler = $(this);
		$('.ink').remove();
		// create .ink element if it doesn't exist
		if(rippler.find(".ink").length == 0) {
			rippler.append('<span class="ink"></span>');
		}

		var ink = rippler.find(".ink");

		// prevent quick double clicks
		ink.removeClass("animate");

		// set .ink diametr
		if(!ink.height() && !ink.width())
		{
			var d = Math.max(rippler.outerWidth(), rippler.outerHeight());
			ink.css({height: 15, width: 15});
		}
		// get click coordinates
		var x = e.pageX - rippler.offset().left - ink.width()/2;
		var y = e.pageY - rippler.offset().top - ink.height()/2;

		// set .ink position and add class .animate
		ink.css({
		  top: y+'px',
		  left:x+'px'
		}).addClass("animate");
		setTimeout(function(){ 
			ink.remove();
		}, 1500);
	})
	
	function reposition() {
		var modal = $(this),
			dialog = modal.find('.modal-dialog');
			modal.css('display', 'block');
			dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
			$(".modal .actions").css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
	}
	
	// Reposition when a modal is shown
	$('.modal').on('show.bs.modal', reposition);
	
	$(window).on('resize', function() {
		$('.modal:visible').each(reposition);
	});
	
	$('.modal').on('shown.bs.modal', function (e) {
		//$('#dctab').dcTab();
	})
	
});