//Dance the Blues Javascript
$(document).ready(function(){

	$(window).swipe( {
		self: this,
		isScroll: false,
		startScrollPosition: 0,

		swipeStatus: function(event, phase) {
			var currentScrollPosition = $('body').scrollTop();

			switch (phase) {
			  case "start":
				  self.startScrollPosition = currentScrollPosition;
				  self.isScroll = false;
				  break;

			  case "end":
				  if (currentScrollPosition !== self.startScrollPosition) self.isScroll = true;
				  break;
			}
		},
		swipe:function(event, direction) {
			// Ignore event if it was recognised as scrolling
			if (self.isScroll) {
				return true;
			}

			switch (direction) {
				case 'left':
					// Handle LeftSwipe
					if($(window).width() <= "768"){
						//close menu
						$("#menu-vertical").removeClass("menu-opened");
						$("#menu-vertical").addClass("menu-closed");
						$(".dropdown-v-open").addClass("dropdown-v-closed");
						$(".dropdown-v-open").removeClass("dropdown-v-open");
					}  
					break;
				case 'right':
					// Handle RightSwipe
					if($(window).width() <= "768"){
					//open menu
						$("#menu-vertical").addClass("menu-opened");
						$("#menu-vertical").removeClass("menu-closed");
					} 
					break;
		
				case null:
					if(!(($(event.target).hasClass("drop-button")) || ($(evt.target).closest("#menu-button").length > 0))) {
						$("#menu-vertical").removeClass("menu-opened");
						$("#menu-vertical").addClass("menu-closed");
					}
					break;
			}
		},
		threshold: 5,
		allowPageScroll: "vertical"
    });

	$("#menu-button").swipe( {
		tap:function(event, target){
			if($("#menu-vertical").hasClass("menu-opened")){
				$("#menu-vertical").removeClass("menu-opened");
				$("#menu-vertical").addClass("menu-closed");
				$(".dropdown-v-open").addClass("dropdown-v-closed");
				$(".dropdown-v-open").removeClass("dropdown-v-open");
			} else {
				$("#menu-vertical").removeClass("menu-closed");
				$("#menu-vertical").addClass("menu-opened");
			}
		}
	});
	$('.drop-button').swipe ({
		tap:function(event, target){
			$(target).parent().toggleClass("dropdown-v-open");
			$(target).parent().toggleClass("dropdown-v-closed");
		}
	});
	$(".expandable-trigger").swipe ({
		tap:function(event, target){
			$(event.target).parentsUntil(".standard-content").each(function(){
			if($(this).hasClass("expandable-open")){
				$(this).removeClass("expandable-open");
				$(this).addClass("expandable-closed");
			} else {
				$(".expandable-open").addClass("expandable-closed");
				$(".expandable-open").removeClass("expandable-open");
				$(this).addClass("expandable-open");
				$(this).removeClass("expandable-closed");
				$('html, body').animate({
					scrollTop: $(event.target).offset().top - 60
				}, 1000);
			}
			});
			/*if($(event.target).parent().hasClass("expandable-closed")){
				$(".expandable-open").addClass("expandable-closed");
				$(".expandable-open").removeClass("expandable-open");
				$(event.target).parent().removeClass("expandable-closed");
				$(event.target).parent().addClass("expandable-open");
				$('html, body').animate({
					scrollTop: $(event.target).offset().top - 60
				}, 2000);
			} else {
				$(event.target).parent().addClass("expandable-closed");
				$(event.target).parent().removeClass("expandable-open");
			}*/
		}
	});

});
