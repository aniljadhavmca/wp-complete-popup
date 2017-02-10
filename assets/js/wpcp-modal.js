jQuery(document).ready(function(){
	// Single image
	jQuery(".read-more").click(function(){
		jQuery("#wpcp-page").addClass("wpcp-page-popup");
	});
		jQuery(".close-image").click(function(){
		jQuery("#wpcp-page").addClass("closeimage");
			setTimeout(function() {
	        	jQuery("#wpcp-page").removeClass("wpcp-page-popup closeimage");}, 400);
	});
});

