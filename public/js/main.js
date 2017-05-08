$(document).on("scroll", function() {

	if($(document).scrollTop()>100) {
		$("#segundo-menu").addClass("resized");
		$("li.active a").addClass("con-scroll");
	} else {
		$("#segundo-menu").removeClass("resized");
		$("li.active a").removeClass("con-scroll");
	}
	
});