$(document).ready(function() {

	if ($('.navbar .campus').text('null'))
		$('.navbar .campus').text(getCookie('defaultCampus'));
	
	campus 	= getActualCampusName();

	$('.campusName').click(function() {
		addCampusToNavBar($(this));
		campus 		= getActualCampusName();
	});

	$('.sidebarLink').click(function(){
		var page 	 	= $(this).attr('id');
		loadPageContent(campus, page);
	});
})
