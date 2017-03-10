//Dance the Blues Javascript
$(document).ready(function(){
	
	$(window).click(function(evt){
		if($(evt.target).closest("#menu-button").length > 0)
			return;
		if($(evt.target).closest(".drop-button").length > 0)
			return;
		$("#menu-vertical").removeClass("menu-opened");
		$("#menu-vertical").addClass("menu-closed");
	});
	
    $("#menu-button").click(function(){
        $("#menu-vertical").toggleClass("menu-opened");
		$("#menu-vertical").toggleClass("menu-closed");
    });

	$(window).resize(debounce(function(){
		if($(window).width() > "1010"){
			$("#menu-vertical").removeClass("menu-opened");
			$("#menu-vertical").addClass("menu-closed");
		}
	}, 250));
	
	$(".drop-button").click(function(evt){
		$(evt.target).parent().toggleClass("dropdown-v-open");
		$(evt.target).parent().toggleClass("dropdown-v-closed");
	});
	
	$(".expandable-trigger").click(function(evt){
		$(evt.target).parentsUntil(".standard-content").each(function(){
			if($(this).hasClass("expandable-open")){
				$(this).removeClass("expandable-open");
				$(this).addClass("expandable-closed");
			} else {
				if($(this).hasClass("expandable-closed")){
					$(".expandable-open").addClass("expandable-closed");
					$(".expandable-open").removeClass("expandable-open");
					$(this).addClass("expandable-open");
					$(this).removeClass("expandable-closed");
					$('html, body').animate({
						scrollTop: $(this).offset().top - 60
					}, 1000);
				}
			}
		});
		/*if($(evt.target).parent().hasClass("expandable-open")){
			$(evt.target).parent().removeClass("expandable-open");
			$(evt.target).parent().addClass("expandable-closed");
		} else {
			$(".expandable-open").addClass("expandable-closed");
			$(".expandable-open").removeClass("expandable-open");
			$(evt.target).parent().addClass("expandable-open");
			$(evt.target).parent().removeClass("expandable-closed");
			$('html, body').animate({
				scrollTop: $(evt.target).offset().top - 60
			}, 1000);
		}*/
	});

	var sticky_footer = function(){
		var windowBotPos = $(window).scrollTop() + $(window).height();
		var footerPos = $("#footer-sitemap").offset().top;
		if($(window).width() > "993"){
			if(windowBotPos > footerPos) {
				$("#footer-first").removeClass("footer-fixed");
				$("#footer-first").addClass("footer-inline");
			} else {
				$("#footer-first").addClass("footer-fixed");
				$("#footer-first").removeClass("footer-inline");
			}
		} else {
			if($("#footer-first").hasClass("footer-inline")){
				$("#footer-first").addClass("footer-fixed");
				$("#footer-first").removeClass("footer-inline");
			}
		}
	}
	
	sticky_footer();
	
	$(window).scroll(function(){
		sticky_footer();
	});
});



// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.
function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};