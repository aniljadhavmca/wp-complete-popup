jQuery(document).ready(function(){
	// Single image
	jQuery("#single-image").click(function(){
		jQuery("#cp-social-share").addClass("cp-social-share-popup");
	});
		jQuery(".close-image").click(function(){
		jQuery("#cp-social-share").addClass("closeimage");
			setTimeout(function() {
	        	jQuery("#cp-social-share").removeClass("cp-social-share-popup closeimage");}, 400);
	});
});